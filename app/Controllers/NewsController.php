<?php namespace Controllers;

use Core\App;
use Core\Input;
use Core\Response;
use Models\News;
use Models\User;
use Models\Comment;


class NewsController extends BaseController{

  public function news($section, $newsId) {
    $news = News::findById($newsId);

    if(is_null($news)) {
      App::abort(404, 'Noticia no encontrada');
    }

    $related = News::query()->where('section', '=', $news->section)->limit(0,2)->get();

    $user = User::get();

    $comments = Comment::query()->where('newsId', '=', $newsId)->get();

    return $this->base('news/news.t', array(
      'comments' => $comments,
      'user' => $user,
      'news' => $news,
      'related' => $related,
    ));
  }

  public function comment($section, $newsId) {
    $comment = Input::get('comment');
    $user = User::get();

    Comment::Insert(array(
      'newsId' => $newsId,
      'userId' => $user->id,
      'comment' => $comment,
    ));

    Response::redirect('/' . $section . '/' . $newsId);
  }

}