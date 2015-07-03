<?php namespace Core;



class File {

  private $filepath;

  public function __construct($filepath) {
    $this->filepath = $filepath;
  }

  public function moveTo($path) {
    move_uploaded_file($this->filepath, __DIR__ . '/../../public_html/uploads/' . $path);
  }


}