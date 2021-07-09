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

    public static function isSelectable(): bool
    {
        // return Craft::$app->getUser()->getIsAdmin();
        return Craft::$app->getUser()->checkPermission('utility:deprecation-errors');
    }

    protected static function allowMultipleInstances(): bool
    {
        return false;
    }

    public static function icon(): string
    {
        return Craft::getAlias('@appicons/bug.svg');
    }

    public static function maxColspan(): int
    {
        return 2;
    }

    public function getBodyHtml(): string
    {
        $count = Craft::$app->getDeprecator()->getTotalLogs();
        $deprecUrl = UrlHelper::url('utilities/deprecations-errors');
        return "<div class='centeralign'><h2 style='font-size: 3rem;'>{$count}</h2><p>Deprecation warnings to address</p><p><a href='{$deprecUrl}' class='btn small'>Review and Fix</a></p></div>";
    }
}