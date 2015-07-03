<?php namespace Core;

use PDO;

class Connection {

  private static $connection;

  public static function connect() {
    static::$connection = new PDO('mysql:host=localhost;dbname=76668144', '76668144', '76668144x');
    //Da permiso a que salgan excepciones cuando hay errores
    static::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //Le decimos que solo devuelva un array asociativo(clave,valor) con los resultados de las consultas
    static::$connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  }

  public static function disconnect() {
    static::$connection = null;
  }

  public static function prepare($sql) {
    return static::$connection->prepare($sql);
  }

  public static function lastInsertId() {
    return static::$connection->lastInsertId();

  }

}