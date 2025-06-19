<?php
namespace App\Helpers;

class AppHelper
{
  public static function sanitizeApartmentTitle($title)
  {
    return preg_replace('/[^A-Za-z0-9.\-]/', '', strtolower($title));
  }

  public static function sanitizeApartmentBuilding($title)
  {
    return preg_replace('/[^A-Za-z0-9.\-]/', '', strtolower($title));
  }

  public static function sanitizeApartmentFloor($floor)
  {
    return preg_replace('/[^A-Za-z0-9.\-]/', '', strtolower($floor));
  }

  public static function apartmentCostsToDecimal($cost)
  {
    return number_format($cost, 2, '.', "'");
  }
}