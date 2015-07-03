<?php namespace Controllers;

use Core\View;
use Core\App;
use Core\Controller;
use Models\News;
use Models\User;

class HomeController extends BaseController{

  public function home() {
    $news = News::query()->orderBy('created', 'DESC')->limit(0, 6)->get();

    $col1 = array();
    $col2 = array();

    foreach ($news as $idx => $model) {
      if($idx % 2){
        $col2[] = $model;
      } else {
        $col1[] = $model;
      }
    }


    $lastestNews = News::query()->orderBy('created', 'DESC')->limit(0, 12)->get();

    return $this->base('home/home.t', array(
      'lastestNews' => $lastestNews,
      'col1' => $col1,
      'col2' => $col2,
    ));
  }

  public function section($section) {
    $news = News::query()->where('section', '=', $section)->orderBy('created', 'DESC')->limit(0, 6)->get();

    $col1 = array();
    $col2 = array();

    $featured = null;
    foreach ($news as $idx => $model) {
      if (is_null($featured)){
        $featured = $model;
        continue;
      }
      if($idx) {
        if($idx % 2){
          $col1[] = $model;
        } else {
          $col2[] = $model;
        }
      }
    }

    return $this->base('home/section.t', array(
      'section' => $section,
      'featured' => $featured,
      'col1' => $col1,
      'col2' => $col2,
    ));
  }

}
