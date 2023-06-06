<?php

function conectarDB() {
  $db = mysqli_connect('localhost', 'root', '5486', 'bienesraices_crud');

  if(!$db) {
    echo "Error no se pudo conectar";
    exit;
  }  

  return $db;
}