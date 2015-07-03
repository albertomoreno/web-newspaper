'use strict';


document.addEventListener('DOMContentLoaded', function() {
  var form = document.getElementById('comment-form');
  var comment = document.getElementById('comment');
  var message = document.getElementById('comment-error');


  //Submit
  form.addEventListener('submit', function(event){
    if(comment.value.length > 0) {
      message.innerHTML = '';
      
      if(comment.value.length < 500) {
        message.innerHTML = '';
      } else {
        message.innerHTML = 'No puedes escribir mas de 500 caracteres';
        event.preventDefault();
      }
    } else {
      message.innerHTML = 'Introduce un comentario';
      event.preventDefault();
    }

    
  }, false);

});
