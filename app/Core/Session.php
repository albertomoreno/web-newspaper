<?php namespace Core;



class Session {

  public static function start() {
    session_start();
  }

  public static function get($key, $default = '') {
    if(isset($_SESSION[$key])){
      return $_SESSION[$key];
    }

    return $default;
  }

  public static function set($key, $value) {
    $_SESSION[$key] = $value;
  }

  public static function delete($key) {
    unset($_SESSION[$key]);
  }

}