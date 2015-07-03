<?php namespace Core;

use Exception;

class ViewEnvironment {

  private $name = null;
  private $sections = array();
  private $baseTemplate = null;
  private $data = array();

  public function __construct($data) {
    $this->data = $data;
  }

  public function getBaseTemplate() {
    return $this->baseTemplate;
  }

  public function getSections() {
    return $this->sections;
  }

  public function escape($str) {
    return htmlspecialchars($str, ENT_COMPAT, 'UTF-8');
  }

  public function startSection($name) {
    if(!is_null($this->name)){
      throw new Exception('Una seccion ya iniciada.');
    }
    $this->name = $name;
    ob_start();
  }

  public function stopSection() {
    $this->sections[$this->name] = ob_get_clean();
    $this->name = null;
  }

  public function yieldSection($name) {
    if(isset($this->data['__section' . $name])) {
      echo $this->data['__section' . $name];
      return;
    }

    if(!isset($this->sections[$name])) {
      return;
    }
    echo $this->sections[$name];
  }

  public function extendsTemplate($name) {
    $this->baseTemplate = $name;

  }

}