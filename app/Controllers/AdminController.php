<?php namespace Controllers;

use Core\Input;
use Models\News;
use Core\Response;

class AdminController extends BaseController{

  public function news() {
    $news = News::query()->get();

    return $this->base('admin/news.t', array(
      'news' => $news,
    ));
  }

  public function create() {
    return $this->base('admin/create.t');
  }

  public function store() {
    $title = Input::get('title');
    $body = Input::get('body');
    $section = Input::get('section');
    $file = Input::file('image');

    $news = News::insert(array(
      'title' => $title,
      'body' => $body,
      'image' => !is_null($file),
      'section' => $section,
    ));

    if(!is_null($file)) {
      $file->moveTo('images/' . $news->id . '.jpg');
    }

    return Response::redirect('/admin/news');
  }

  public function edit($newsId) {
    $news = News::findById($newsId);

    return $this->base('admin/edit.t', array(
      'news' => $news,
    ));
  }

  public function update($newsId) {
    $news = News::findById($newsId);

    $news->title = Input::get('title');
    $news->body = Input::get('body');
    $news->section = Input::get('section');

    $news->save();

    Response::redirect('/admin/news');
  }

  public function delete($newsId){
    $news = News::findById($newsId);

    $news->delete();

    Response::redirect('/admin/news');
  }

}
