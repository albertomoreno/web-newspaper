
@extends('base.t')

@section ('scripts')

  <script type="text/javascript" src="/~76668144/periodicoII/public_html/scripts/subscribe.js"></script>

@endsection

@section('content')

  <h2>Formulario de suscripción</h2>

  @if ($error)
    <section class="error">
      Usuario ya existente
    </section>
  @endif

  <form action="/subscribe" method="POST" id="subscribe">
    <div class="form-group">
      <label class="form-label" for="name">Nombre y Apellidos</label>
      <input class="form-control" type="text" placeholder="Nombre Apellido1 Apellido2" name="name" id="name">
    </div>
    <p id="name-error"></p>

    <div class="form-group">  
      <label class="form-label" for="email">Email</label>
      <input class="form-control" type="email" placeholder="example@example.com" name="email" id="email">
    </div>
    <p id="email-error"></p>

    <div class="form-group"> 
      <label class="form-label" for="user">Usuario</label>
      <input class="form-control" type="text" placeholder="Usuario" name="user" id="user">
    </div>
    <p id="user-error"></p>

    <div class="form-group">  
      <label class="form-label" for="password">Contraseña</label>
      <input class="form-control" type="password" name="password" id="password">
    </div>
    <p id="password-error"></p>

    <div class="form-group">  
      <label class="form-label" for="address">Direccion</label>
      <input class="form-control" type="text" placeholder="C/ Daniel Saucedo Aranda, 1" name="address" id="address">
    </div>
    <p id="address-error"></p>

    <div class="form-group">  
      <label class="form-label" for="gender">Sexo</label>
      <select class="form-control" name="gender" id="gender">
        <option value="man">Hombre</option>
        <option value="woman">Mujer</option>
      </select>
    </div>

    <p>&nbsp;</p>

    <div class="form-group checkboxes">
      <input type="checkbox" name="age" id="age">
      <label for="age">Soy mayor de 18 años o tengo permiso paterno.</label>
    </div>
    <p id="age-error"></p>

    <div class="form-group checkboxes">
      <input type="checkbox" name="terms" id="terms">
      <label for="terms">He leido y acepto los términos de uso y política de privacidad.</label>
    </div>
    <p id="terms-error"></p>

    <p>&nbsp;</p>

    <button class="button">Suscribirse</button>

  </form>


@endsection
