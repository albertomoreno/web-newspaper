<?php namespace Core;


class Router {
  private static $routes = array();

  public static function get($path, $handler) {
    static::handle($path, $handler, 'GET');
  }

  public static function post($path, $handler) {
    static::handle($path, $handler, 'POST');
  }

  public static function delete($path, $handler) {
    static::handle($path, $handler, 'DELETE');
  }

  public static function put($path, $handler) {
    static::handle($path, $handler, 'PUT');
  }

  private static function handle($path, $handler, $method) {
    $parts = explode('@', $handler);

    if(count($parts) !== 2) {
      throw new \Exception('Error al poner la ruta: ' . $handler);
    }

    $path = preg_replace('@{[^}]+}@', '([^/]+)', $path);
    $path = '@^' . $path . '$@i';

    static::$routes[] = array(
      'path' => $path,
      'method' => $method,
      'class' => $parts[0],
      'function' => $parts[1],
    );
  }

  public static function run() {
    $currentPath = substr($_SERVER['REQUEST_URI'], 44);
    $currentMethod = $_SERVER['REQUEST_METHOD'];

    if(strpos($currentPath, '?') !== false){
      $currentPath = explode('?', $currentPath);
      $currentPath = $currentPath[0];
    }

    foreach (static::$routes as $value) {
      $matches[] = array();
      if(preg_match($value['path'], $currentPath, $matches) === 0) {
        continue;
      }
      if($currentMethod !== $value['method']) {
        continue;
      }

      unset($matches[0]);

      $controller = new $value['class'];

      
      $info = new \ReflectionMethod($controller, $value['function']);
      if($info->getNumberOfParameters() !== count($matches)) {
        throw new \Exception('Numero de parametros incorrecto: ' . $value['class'] . '::' . $value['function']);
      }
      
      $response = $info->invokeArgs($controller, $matches);
      if (is_null($response)) {
        return;
      }

      if($response instanceof View) {
        Response::view($response);
      }

      return;
    }

    // Lanzar 404 
    App::abort(404, 'No se encuentra la ruta');
  }

}