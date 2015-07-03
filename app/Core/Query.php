<?php namespace Core;


class Query {

  private $className, $table;
  private $where = '';
  private $parameters = array();
  private $col = '';
  private $order = '';
  private $start = 0;
  private $end = 0;

  public function __construct($className, $table) {
    $this->className = $className;
    $this->table = $table;
  }

  public function where($col, $sign, $value) {
    if($this->where) {
      $this->where .= ' AND ';  
    }
    $this->where .= $col . $sign . '?';
    $this->parameters[] = $value; 
    return $this;
  }

  public function first() {
    $statement = $this->sql();

    $result = $statement->fetch();
    if(!$result) {
      return null;
    }

    return $this->buildModel($result);
  }

  public function get() {
    $statement = $this->sql();

    $results = $statement->fetchAll();
    if(!$results) {
      return array();
    }

    $models = array();
    foreach ($results as $value) {
      $models[] = $this->buildModel($value);
    }

    return $models;
  }

  private function sql() {
    $sql = 'SELECT * FROM ' . $this->table;
    if($this->where) {
      $sql .= ' WHERE ' . $this->where;
    }

    if($this->order) {
      $sql .= ' ORDER BY ' . $this->order;
    }

    if($this->start !== $this->end) {
      $sql .= ' LIMIT ' . $this->start . ', ' . $this->end;
    }

    $statement = Connection::prepare($sql);
    $statement->execute($this->parameters);

    return $statement;
  }

  private function buildModel($result) {
    $model = new $this->className;
    $model->setAttributes($result);

    return $model;
  }

  public function orderBy($col, $order) {
    $this->order = $col . ' ' . $order;
    return $this;
  }

  public function limit($start, $end) {
    $this->start = $start;
    $this->end = $end;
    return $this;
  }

}