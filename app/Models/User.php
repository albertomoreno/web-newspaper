<?php namespace Models;

use Core\Model;
use Core\Session;

class User extends Model{

  public static function get() {
    return static::findById(Session::get('id'));
  }
}