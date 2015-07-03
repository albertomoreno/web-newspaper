<?php namespace Core;


class Response {
  public static function view($view) {    
    header('Content-Type: text/html; charset=utf-8');
    echo $view->baseBuild();
  }

  public static function redirect($url) {
    header(':', true, 301);
    header('Content-Type: text/html; charset=utf-8');
    header('Location: ' . $url);
  }

}