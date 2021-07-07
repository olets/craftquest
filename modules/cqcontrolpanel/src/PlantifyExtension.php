<?php

namespace craftquest;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class PlantifyExtension extends AbstractExtension
{
  const MEATS = [
    'sausage',
    'meat',
    'chicken',
    'beef',
    'duck',
    'pork',
  ];

  const PLANT_INGREDIENTS = [
    'tofu',
    'cashews',
  ];

  public function plantifyFilter($text)
  {
    return str_replace(self::MEATS, 'tofu', $text);
  }

  public function plantIngredients($limit = 10)
  {
    return array_slice(self::PLANT_INGREDIENTS, 0, $limit);
  }

  public function getFilters()
  {
    return [
      new TwigFilter('plantify', [$this, 'plantifyFilter'])
    ];
  }

  public function getFunctions()
  {
    return [
      new TwigFunction('plantIngredients', [$this, 'plantIngredients'])
    ];
  }
}