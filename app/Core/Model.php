<?php namespace Core;


class Model {

  private $attributes = array();

  public static function query() {
    //static no sabra que clase es hasta que se este ejecutando, asi que cuando
    //se este ejecutando sera un User, no un Model porque es estatico
    return new Query(static::className(), static::table());
  }

  private static function className() {
    return get_called_class();
  }

  private static function table() {
    $table = explode('\\', static::className());
    $table = strtolower($table[count($table)-1]);

    if(substr($table, -1) !== 's') {
      $table .= 's';      
    }


    return $table;
  }  

  public function setAttributes($attributes) {
    $this->attributes = $attributes;
  }
  
  public static function insert($attributes) {
    $sql = 'INSERT INTO ' . static::table();
    $sql .= ' (' . implode(',', array_keys($attributes)) . ') VALUES (';
    $sql .= implode(',', array_fill (0, count($attributes), '?')) . ')';

    $statement = Connection::prepare($sql);
    $statement->execute(array_values($attributes));

    $id = Connection::lastInsertId();

    $attributes['id'] = $id;

    $cls = static::className();
    $model = new $cls;
    $model->setAttributes($attributes);

    return $model;
  }
  
  public function save() {
    $sql = 'UPDATE ' . static::table() . ' SET ';

    $cols = array();
    foreach ($this->attributes as $attr => $value) {
      $cols[] = $attr . ' = ?';
    }

    $sql .= implode(', ', $cols) . ' WHERE id = ?';

    $statement = Connection::prepare($sql);

    $params = array_values($this->attributes);
    $params[] = $this->id;
    $statement->execute($params);
  }

  public function delete() {
    $sql = 'DELETE FROM ' . static::table() . ' WHERE id = ?';

    $statement = Connection::prepare($sql);

    $statement->execute(array($this->id));
  }

  public function __get($key) {
    if(!isset($this->attributes[$key])) {
      throw new \Exception('No existe la clave: ' . $key);
    }
    return $this->attributes[$key];
  }

  public function __set($key, $value) {
    $this->attributes[$key] = $value;
  }

  public static function findById($id) {
    return static::query()->where('id', '=', $id)->first();
  }

}