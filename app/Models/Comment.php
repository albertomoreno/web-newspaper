<?php namespace Models;

use Core\Model;

class Comment extends Model{

  public function getUserName() {
    $user = User::findById($this->userId);

    return $user->name;
  }

}