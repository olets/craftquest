<?php

namespace craftquest;

use Craft;
use craft\events\RegisterCpNavItemsEvent;
use craft\web\twig\variables\Cp;
use Yii\base\Module;
use Yii\base\Event;

class CQControlPanel extends Module
{
  public function init()
  {
    Craft::setAlias('@cqcontrolpanel', __DIR__);
    parent::init();
    Event::on(
      Cp::class,
      Cp::EVENT_REGISTER_CP_NAV_ITEMS,
      function(RegisterCpNavItemsEvent $event) {
        $event->navItems[] = [
          'url' => 'entries/podcast',
          'label' => 'Podcast Episodes',
          'icon' => '@cqcontrolpanel/web/img/fa-microphone.svg',
        ];
      }
    );
  }
}
