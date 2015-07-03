@extends('base.t')

@section('name-section')

  <div class="name-section name-{{ $section }}">
    <h2>{{ Models\Section::getSection($section) }}</h2>
  </div>

@endsection


@section('content')

  @if (!is_null($featured))

    <div class="noticia-destacada">
      <article>
        @if ($featured->image)
          <a href="/{{ $featured->section }}/{{ $featured->id }}">
            <img src="/~76668144/periodicoII/public_html/uploads/images/{{ $featured->id }}.jpg">
          </a>
        @endif
        <a href="/{{ $featured->section }}/{{ $featured->id }}">
          <h3>{{ $featured->title }}</h3>
        </a>
        <p>{{ $featured->shortContent() }}</p>
      </article>
      <div class="clearfix"></div>
    </div>

  @endif

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
    <div class="suscripcion">
      <h3>Suscríbete</h3>
      <p>Entérate de todas las últimas noticias <a href="/subscribe">suscribiéndote a nuestro periódico</a>.</p>
    </div>
  </section>
  <div class="clearfix"></div>


@endsection