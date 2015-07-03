
@extends('base.t')

@section ('scripts')

  <script type="text/javascript" src="/~76668144/periodicoII/public_html/scripts/login.js"></script>

@endsection

@section('content')


<h2>Iniciar sesión</h2>

  @if ($error)
    <section class="error">
      Usuario o contraseña no encontrado
    </section>

  @endif

  <form action="/login" method="POST" id="login">
    <div class="form-group">       
      <label class="form-label" for="user">Nombre</label>
      <input class="form-control" type="text" placeholder="User" name="user" id="user">
    </div>
    <p id="user-error"></p>

    <div class="form-group">  
      <label class="form-label" for="password">Contraseña</label>
      <input class="form-control" type="password" placeholder="Password" name="password" id="passw">
    </div>
    <p id="passw-error"></p>

    <p>&nbsp;</p>

    <button class="button">Iniciar sesion</button>

  </form>

@endsection