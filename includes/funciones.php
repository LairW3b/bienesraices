<?php
require 'app.php';

function incluirTemplate(string $nombre, bool $inicio = false) {
  // echo  ."{$nombre}.php";
  include TEMPLATES_URL . "/{$nombre}.php";
}

function hola() {
  echo 'Hola funciones';
}