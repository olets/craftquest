<?php

namespace craftquest;

use Craft;
use craft\events\RegisterCpNavItemsEvent;
use craft\web\twig\variables\Cp;
use craftquest\services\NavItemsService;
use Yii\base\Module;
use Yii\base\Event;

class CQControlPanel extends Module
{

  const CUSTOM_NAV_ITEMS = [
    [
      'url' => 'entries/podcast',
      'label' => 'Podcast Episodes',
      'icon' => '@cqcontrolpanel/web/img/fa-microphone.svg',
    ],
    [
      'url' => 'entries/reviews',
      'label' => 'Review',
      'icon' => '@cqcontrolpanel/web/img/fa-microphone.svg',
    ],
    [
      'url' => 'entries/blog',
      'label' => 'Blog Articles',
      'icon' => '@cqcontrolpanel/web/img/fa-microphone.svg',
    ],
  ];
  
  public function init()
  {
    Craft::setAlias('@cqcontrolpanel', __DIR__);
    parent::init();
    $this->_registerServices();
    $this->_registerCpEvents();
    $this->_registerTwigExtensions();
  }

  private function registerTwigExtensions()
  {
    $extensions = [
      PlatifyExtension::class,
    ];

    foreach ($extensions as $extension) {
      Craft::$app->view->registerTwigExtension(new $extension);
    }
  }

  private function _registerServices()
  {
    $this->setComponents([
      'navItems' => NavItemsService::class,
    ]);
  }

  private function _registerCpEvents()
  {
    $events = [
      Cp::EVENT_REGISTER_CP_NAV_ITEMS,
    ];

    foreach ($events as $eventName)
    {
      Event::on(
        Cp::class,
        $eventName,
        function(RegisterCpNavItemsEvent $event) use($eventName) {
          if ($eventName == Cp::EVENT_REGISTER_CP_NAV_ITEMS)
          {
            $this->navItems->buildCustomNav($event, self::CUSTOM_NAV_ITEMS);
          }
        }
      ); 
    }
  }

}
