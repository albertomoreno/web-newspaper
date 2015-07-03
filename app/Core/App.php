<?php namespace Core;


class App {

  public static function abort($code, $message) {
    header(':', true, $code);

    $exception = new \Exception();
    $trace = nl2br($exception->getTraceAsString());

    $str = '<!DOCTYPE html><html><head><meta charset="utf-8"><title>Error ' . $code . '</title></head>';
    $str .= '<body><h1>Error ' . $code . '</h1><p>' . $message . '</p><p>' . $trace . '</p></body></html>';

    header('Content-Type: text/html; charset=utf-8');
    echo $str;

    die();
  }

  public static function run() {
    Connection::connect();
    Session::start();
    Router::run();
    Connection::disconnect();
  }

}