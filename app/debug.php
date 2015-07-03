<?php 


function dd($obj) {
  header('Content-Type: text/plain; charset=utf-8');
  die(var_export($obj, true));
}

