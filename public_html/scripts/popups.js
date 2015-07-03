'use strict';


document.addEventListener('DOMContentLoaded', function() {
  var popup = document.getElementById('popup');
  var title = document.getElementById('news-title');

  title.addEventListener('mouseout', function() {
    popup.style.visibility = 'hidden';
    popup.style.opacity = 0;
  }, false);

  title.addEventListener('mouseover', function() {
    popup.style.visibility = 'visible';
    popup.style.opacity = 1;
  }, false);

});