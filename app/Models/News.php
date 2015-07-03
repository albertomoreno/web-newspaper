<?php namespace Models;

use Core\Model;

class News extends Model{

  public function shortContent() {
    $content = explode(' ', $this->body, 100);
    array_pop($content);
    return implode(' ', $content);
  }

}