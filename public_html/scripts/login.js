'use strict';

//La pagina está cargada (solo html)
document.addEventListener('DOMContentLoaded', function() {
  var form = document.getElementById('login');

  var elems = {
    user: document.getElementById('user'),
    passw: document.getElementById('passw'),
  }

  var messages = {
    user: document.getElementById('user-error'),
    passw: document.getElementById('passw-error'),
  }

  var error = {
    user: false,
    passw: false,
  };

  form.addEventListener('submit', function(event){
    for (var key in error) {
      if (error[key]) {
        event.preventDefault();
      }
    }
  }, false);

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

  elems.passw.addEventListener('blur', function() {
      console.log(elems.passw.value);
    if(!elems.passw.value) {
      error.passw = true;
      messages.passw.innerHTML = 'Campo obligatorio';
    }
  }, false);

  elems.passw.addEventListener('focus', function() {
    messages.passw.innerHTML = '';
    error.passw = false;
  }, false);

});

