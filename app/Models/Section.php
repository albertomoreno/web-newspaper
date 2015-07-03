<?php namespace Models;

use Core\Model;

class Section extends Model{

  public static function getSection($section) {

    $sections = array(
      'international' => 'Internacional',
      'sports' => 'Deportes',
      'motor' => 'Motor',
      'technology' => 'Tecnologia',
      'policy' => 'Politica',
    );

    return $sections[$section];
  }

}