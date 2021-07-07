<?php

namespace craftquest;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

/**
 * Class PlantifyExtension
 * @package craftquest
 */
class PlantifyExtension extends AbstractExtension
{
    const MEATS = [
        'sausage',
        'goose',
        'chicken',
        'beef',
        'duck',
        'pork',
    ];

    const PLANT_INGREDIENTS = [
        'tofu',
        'cashew',
        'spinach',
        'lettuce',
        'eggplant',
        'celery',
    ];

    /**
     * @param $text
     * @return array|string|string[]
     */
    public function plantifyFilter($text)
    {
        return str_replace(self::MEATS, 'tofu', $text);
    }

    /**
     * @param int $limit
     * @return string[]
     */
    public function plantIngredients($limit = 10)
    {
        return array_slice(self::PLANT_INGREDIENTS, 0, $limit);
    }

    /**
     * @param array|string $meatReplacements
     * @param string $text
     * @return array|string|string[]
     */
    public function plantifyFunction($meatReplacements, $text)
    {
        return str_replace(self::MEATS, $meatReplacements, $text);
    }

    /**
     * @return TwigFilter[]
     */
    public function getFilters(): array
    {
        return [
            new TwigFilter('plantify', [$this, 'plantifyFilter']),
        ];
    }


    /**
     * @return TwigFunction[]
     */
    public function getFunctions(): array
    {
        return [
            new TwigFunction('plantIngredients', [$this, 'plantIngredients']),
            new TwigFunction('plantify', [$this, 'plantifyFunction']),
        ];
    }
}