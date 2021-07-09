<?php

namespace craftquest\twigextensions;

use Twig\Extension\AbstractExtension;
use Twig\Extension\GlobalsInterface;
use craftquest\services\AccountTypeService;

/**
 * Class CQGlobalVariables
 * @package craftquest\twigextensions
 */
class CQGlobalVariables extends AbstractExtension implements GlobalsInterface
{
    public function getGlobals(): array
    {
        $accountType = (new AccountTypeService)->getAccountType();

        return [
            'courseName' => 'Extending Twig in Craft CMS',
            'accountType' => $accountType,
        ];
    }
}