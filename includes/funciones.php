<?php
require 'app.php';

function incluirTemplate(string $nombre, bool $inicio = false) {
  // echo  ."{$nombre}.php";
  include TEMPLATES_URL . "/{$nombre}.php";
}

function mostrarVar($var) {
  echo "<pre>";
  var_dump($var);
  echo "</pre>";
}

function estaAutenticado() : bool {
  session_start();

  $auth = $_SESSION['login'];
  if($auth) {
    return true;
  }
  return false;
}
