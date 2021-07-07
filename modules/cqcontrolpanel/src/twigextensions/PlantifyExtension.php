<?php

namespace craftquest\twigextensions;

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

  public function plantifyFilter($text)
  {
    return str_replace(self::MEATS, 'tofu', $text);
  }

  public function getFilters()
  {
    return [
      new TwigFilter('plantify', [$this, 'plantifyFilter'])
    ];
  }
}