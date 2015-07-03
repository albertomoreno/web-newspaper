'use strict';

document.addEventListener('DOMContentLoaded', function() {
  var form = document.getElementById('subscribe');

  var elems = {
    user: document.getElementById('user'),
    password: document.getElementById('password'),
    name: document.getElementById('name'),
    email: document.getElementById('email'),
    address: document.getElementById('address'),
    age: document.getElementById('age'),
    terms: document.getElementById('terms'),
  }

  var messages = {
    user: document.getElementById('user-error'),
    password: document.getElementById('password-error'),
    name: document.getElementById('name-error'),
    email: document.getElementById('email-error'),
    address: document.getElementById('address-error'),
    age: document.getElementById('age-error'),
    terms: document.getElementById('terms-error'),
  }

  var error = {
    user: false,
    password: false,
    name: false,
    email: false,
    address: false,
    age: false,
    terms: false,
  };

  //Submit
  form.addEventListener('submit', function(event){
    if(elems.age.checked){
      error.age = false;
      messages.age.innerHTML = '';
    } else {
      error.age = true;
      messages.age.innerHTML = 'Debes ser mayor de edad';
    }
    if(elems.terms.checked){
      error.terms = false;
      messages.terms.innerHTML = '';
    } else {
      error.terms = true;
      messages.terms.innerHTML = 'Debes ser mayor de edad';
    }

    for (var key in error) {
      if (error[key]) {
        event.preventDefault();
      }
    }

  }, false);

  //User
  elems.user.addEventListener('blur', function() {
    if(!elems.user.value) {
      error.user = true;
      messages.user.innerHTML = 'Campo obligatorio';
    }
  }, false);

  elems.user.addEventListener('focus', function() {
    messages.user.innerHTML = '';
    error.user = false;
  }, false);

  //password
  elems.password.addEventListener('blur', function() {
    if(elems.password.value.length < 6) {
      error.password = true;
      messages.password.innerHTML = 'La contraseña debe tener al menos 6 caracteres';
    }
  }, false);

  elems.password.addEventListener('focus', function() {
    messages.password.innerHTML = '';
    error.password = false;
  }, false);

  //Name
  elems.name.addEventListener('blur', function() {
    if(!elems.name.value) {
      error.name = true;
      messages.name.innerHTML = 'Campo obligatorio';
    }
  }, false);

  elems.name.addEventListener('focus', function() {
    messages.name.innerHTML = '';
    error.name = false;
  }, false);

  //Email
  elems.email.addEventListener('blur', function() {
    if(elems.email.value.length < 7) {
      error.email = true;
      messages.email.innerHTML = 'Escribe un email';
    }
    if(elems.email.value.indexOf('@') < 0) {
      error.email = true;
      messages.email.innerHTML = 'Escribe un email';
    }
    if(elems.email.value.indexOf('.') < 0) {
      error.email = true;
      messages.email.innerHTML = 'Escribe un email';
    }
  }, false);

  elems.email.addEventListener('focus', function() {
    messages.email.innerHTML = '';
    error.email = false;
  }, false);

  //Address
  elems.address.addEventListener('blur', function() {
    if(!elems.address.value) {
      error.address = true;
      messages.address.innerHTML = 'Campo obligatorio';
    }
  }, false);

  elems.address.addEventListener('focus', function() {
    messages.address.innerHTML = '';
    error.address = false;
  }, false);

});
