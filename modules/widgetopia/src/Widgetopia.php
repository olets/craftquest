<?php

/**
 * Widgetopia module for Craft CMS 3.x
 *
 * A module that makes multiple useful Craft CP dashboard widgets available.
 *
 * @link      https://craftquest.io
 * @copyright Copyright (c) 2021 CraftQuest
 */

namespace widgetopia;

use Yii\base\Module;
use craft\services\Dashboard;
use Yii\base\Event;
use craft\events\RegisterComponentTypesEvent;
use widgetopia\widgets\DeprecWidget;

class Widgetopia extends Module
{

    /**
     * Initialize module components, etc.
     */
    public function init()
    {
        parent::init();
        $this->_registerWidgets();

    }

    private function _registerWidgets()
    {
        Event::on(
            Dashboard::class,
            Dashboard::EVENT_REGISTER_WIDGET_TYPES,
            function(RegisterComponentTypesEvent $event) {
                $event->types[] = DeprecWidget::class;
            }
        );
    }
}
