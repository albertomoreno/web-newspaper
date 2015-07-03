
@extends('base.t')

@section('content')

  <section class="section-left columns">
    @foreach ($col1 as $news)
      <article>
        @if ($news->image)
          <a href="/{{ $news->section }}/{{ $news->id }}">
            <img src="/~76668144/periodicoII/public_html/uploads/images/{{ $news->id }}.jpg" >
          </a>
        @endif
        <a href="/{{ $news->section }}/{{ $news->id }}">
          <h3>{{ $news->title }}</h3>
        </a>
        <p>{{ $news->shortContent() }}</p>
      </article>
      <hr>
    @endforeach
  </section>

  <section class="section-center columns">
    @foreach ($col2 as $news)
      <article>
        @if ($news->image)
          <a href="/{{ $news->section }}/{{ $news->id }}">
            <img src="/~76668144/periodicoII/public_html/uploads/images/{{ $news->id }}.jpg" >
          </a>
        @endif
        <a href="/{{ $news->section }}/{{ $news->id }}">
          <h3>{{ $news->title }}</h3>
        </a>
        <p>{{ $news->shortContent() }}</p>
      </article>
      <hr>
    @endforeach
  </section>

  <section class="section-right columns">
    <div class="ultimas-noticias">
      <h3>Últimas noticias</h3>
      <hr>
      <ul class="lastest-news">
        @foreach($lastestNews as $news)
          <li><a href="/{{ $news->section }}/{{ $news->id }}">{{ $news->title }}</a></li>
        @endforeach
      </ul>
    </div>
    <div class="suscripcion">
      <h3>Suscríbete</h3>
      <p>Entérate de todas las últimas noticias <a href="/subscribe">suscribiéndote a nuestro periódico</a>.</p>

    </div>
  </section>
  <div class="clearfix"></div>

@endsection
