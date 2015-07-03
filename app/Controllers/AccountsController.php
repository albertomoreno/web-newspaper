<?php namespace Controllers;

use Core\View;
use Core\App;
use Core\Input;
use Models\User;
use Core\Controller;
use Core\Response;
use Core\Session;

class AccountsController extends BaseController{

  public function login() {
    $error = Input::get('error');
    return $this->base('accounts/login.t', array(
      'error' => $error,
    ));
  }

  public function auth() {
    $user = Input::get('user');
    $pasw = Input::get('password');

    $result = User::query()->where('user', '=', $user)->first();
    if(is_null($result)) {
      return Response::redirect('/login?error=login');
    }

    if($result->password !== md5($pasw)) {
      return Response::redirect('/login?error=login');
    }

    Session::set('id', $result->id);

    return Response::redirect('/');
  }

  public function logout() {
    Session::delete('id');

    return Response::redirect('/');
  }

  public function subscription() {
    $error = Input::get('error');
    return $this->base('accounts/subscription.t', array(
      'error' => $error,
    ));
  }

  public function subscribe() {
    $user = Input::get('user');
    $password = Input::get('password');
    $name = Input::get('name');
    $email = Input::get('email');
    $address = Input::get('address');
    $gender = Input::get('gender');

    $result = User::query()->where('user', '=', $user)->first();
    if(!is_null($result)){
      return Response::redirect('/login?error=subscribe');
    }

    User::insert(array(
      'user' => $user,
      'password' => md5($password),
      'name' => $name,
      'email' => $email,
      'address' => $address,
      'gender' => $gender,
    ));

    return Response::redirect('/login');
  }


}