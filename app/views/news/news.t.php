@extends('base.t')

@section('name-section')

  <div class="name-section name-{{ $news->section }}">
    <h2>{{ Models\Section::getSection($news->section) }}</h2>
  </div>

@endsection

@section ('scripts')

  <script type="text/javascript" src="/~76668144/periodicoII/public_html/scripts/comment.js"></script>

@endsection

@section('content')

  <section class="noticia">
    <article>
      <div id="news-title">
        <h3>{{ $news->title }}</h3>
        @if(count($related))
          <div class="popup-container">
            <div id="popup">
              <ul>
                @foreach ($related as $news)
                  <li><a href="/{{ $news->section }}/{{ $news->id }}">{{ $news->title }}</a></li>
                @endforeach
              </ul>
            </div>
          </div>
        @endif
      </div>

      @if ($news->image)
        <img src="/~76668144/periodicoII/public_html/uploads/images/{{ $news->id }}.jpg">
      @endif
      <p>{{ $news->body }}</p>
    </article>
    <hr>

    @if($user)
      <form action="/{{ $news->section }}/{{ $news->id }}" method="POST" enctype="multipart/form-data" id="comment-form">
        <div class="form-group">       
          <label class="form-label" for="comment">Deja tu comentario</label>
          <textarea class="form-control" placeholder="Comentario" name="comment" id="comment" rows="4"></textarea>
        </div>
        <p id="comment-error"></p>
        <p>&nbsp;</p>

        <button class="button">Comentar</button>
      </form>
    @endif

    <div class="comentarios">
      <h2>Comentarios</h2>
      @foreach ($comments as $comment)
        <p><strong>{{ $comment->getUserName() }}</strong>  -  {{ $comment->created }}</p>
        <p>{{ $comment->comment }}</p>
        <p>&nbsp;</p>
      @endforeach
    </div>
  </section>

  <section class="section-right columns">
    <div class="relacionada">
      <h3>Noticia relacionada</h3>
      <hr>
      <article>
        <a href="/{{ $related[0]->section }}/{{ $related[0]->id }}">
          <img src="/~76668144/periodicoII/public_html/uploads/images/{{ $related[0]->id }}.jpg">
        </a>
        <a href="/{{ $related[0]->section }}/{{ $related[0]->id }}">
          <h3>{{ $related[0]->title }}</h3>
        </a>
        <p>{{ $related[0]->shortContent() }}</p>
    </article>
    </div>

    <div class="suscripcion">
      <h3>Suscríbete</h3>
      <p>Entérate de todas las últimas noticias <a href="/subscribe">suscribiéndote a nuestro periódico</a>.</p>

  </section>
  <div class="clearfix"></div>


@endsection