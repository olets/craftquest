<?php

namespace craftquest\services;

use Craft;
use craft\base\Component;

/**
 * Class AccountTypeService
 * @package craftquest\services
 */
class AccountTypeService extends Component
{

    /**
     * @return string
     */
    public function getAccountType(): string
    {
        $accountType = 'guest';

        if (Craft::$app->config->general->devMode || Craft::$app->user->checkPermission('accessCp')) {
            $accountType = 'logged in';
        }

        return $accountType;
    }
}