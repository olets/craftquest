<?php

namespace craftquest\twigextensions;

use Twig\Extension\AbstractExtension;
use Twig\Extension\GlobalsInterface;

/**
 * Class CQGlobalVariables
 * @package craftquest\twigextensions
 */
class CQGlobalVariables extends AbstractExtension implements GlobalsInterface
{
    public function getGlobals(): array
    {
        return [
            'courseName' => 'Extending Twig in Craft CMS',
        ];
    }
}