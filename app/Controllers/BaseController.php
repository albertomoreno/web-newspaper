<?php namespace Controllers;

use Core\Controller;
use Core\View;
use Models\User;

class BaseController extends Controller{

  public function base($template, $data = array()) {
    return View::build($template, array_merge($data, array(
      'user' => User::get(),
    )));
  }

}
