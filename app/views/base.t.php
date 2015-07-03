<!DOCTYPE html>
<html>
<head>

  <meta charset="UTF-8">

  <title>Periódico Digital</title>

  <link href='http://fonts.googleapis.com/css?family=Cantata+One|Raleway|Droid+Serif:400,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="/~76668144/periodicoII/public_html/styles/style.css">

  @yield('scripts')

</head>
<body>

  <div id="container">
    <a class="name" href="/"><h1>Periódico Digital</h1></a>

      <ul class="sessions-menu">
        @if (is_null($user))
          <li><a href="/login">Iniciar Sesion</a></li>
          <li><a href="/subscribe">Suscribirse</a></li>
        @else
          <li>{{ $user->user }}</li>
          @if ( $user->admin )
            <li><a href="/admin/news">Panel de administración</a></li>
          @endif
          <li><a href="/logout">Cerrar Sesion</a></li>

        @endif
      </ul>

    <div class="clearfix"></div>
  </div>

  <nav class="sections">
    <div id="container">
      <ul>
        <li class="internacional"><a href="/international">Internacional</a></li>
        <li class="deportes"><a href="/sports">Deportes</a></li>
        <li class="motor"><a href="/motor">Motor</a></li>
        <li class="tecnologia"><a href="/technology">Tecnologia</a></li>
        <li class="politica"><a href="/policy">Politica</a></li>
      </ul>
      <div class="clearfix"></div>
    </div>
  </nav>

  @yield('name-section')

  <div id="container">
    @yield('content')
  </div>

  <footer>
    <div id="container">
      <section class="footer-left columns">
        <h3>Secciones</h3>
        <ul>
        <li><a href="/international">Internacional</a></li>
        <li><a href="/sports">Deportes</a></li>
        <li><a href="/motor">Motor</a></li>
        <li><a href="/technology">Tecnologia</a></li>
        <li><a href="/policy">Politica</a></li>
      </ul>
      </section>
      <section class="footer-center columns">
        <h3>Sobre nosotros</h3>
        <p>Periodico Digital es un periodico creado en 2014 que intenta diseñar un nuevo modelo de difusión de información que permite acercarse con confianza a sus lectores.</p>
        <p>Para ver cómo se ha realizado el periódico, puedes verlo en <a href="/como_se_hizo.pdf">como_se_hizo</a>.</p>
      </section>
      <section class="footer-right columns">
        <h3>Contacta con nosotros</h3>
        <address>C/ Periodista Daniel Saucedo Aranda, 1, Granada</address>
        <p>Telefono: 958 098 153</p>
        <p>periodico@periodicodigital.com</p>
        <p><strong>Alberto Moreno Alcaraz</strong> </p>
      </section>
      <div class="clearfix"></div>
    </div>
  </footer>


</body>
</html>