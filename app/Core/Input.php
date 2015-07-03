<?php namespace Core;


class Input {

  public static function get($key, $default='') {
    if(isset($_GET[$key])){
      return $_GET[$key];
    }

    if(isset($_POST[$key])){
      return $_POST[$key];
    }

    return $default;
  }

  public static function file($key) {

    if(!isset($_FILES[$key]) || $_FILES[$key]['error'] !== UPLOAD_ERR_OK) {
      return null;
    }

    $filepath = $_FILES[$key]['tmp_name'];
    return new File($filepath);
  }

}