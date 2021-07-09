<?php

namespace widgetopia\widgets;

use craft\base\Widget;
use Craft;
use craft\helpers\UrlHelper;


class DeprecWidget extends Widget {

    public static function displayName(): string
    {
        return "Deprecation Warnings";
    }

    public function getTitle(): string
    {
        return "";
    }

    public function getBodyHtml(): string
    {
        $count = Craft::$app->getDeprecator()->getTotalLogs();
        $deprecUrl = UrlHelper::url('utilities/deprecations-errors');
        return "<div class='centeralign'><h2 style='font-size: 3rem;'>{$count}</h2><p>Deprecation warnings to address</p><p><a href='{$deprecUrl}' class='btn small'>Review and Fix</a></p></div>";
    }
}