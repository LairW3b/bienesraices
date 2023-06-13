<?php 
//Este archivo no se lleva a producción

//Importar la conexión
require 'includes/config/database.php';
$db = conectarDB();

//Crear email y password
$email = "lair@correo.com";
$pass = "123456";

$passworHash = password_hash($pass, PASSWORD_BCRYPT);
echo var_dump($passworHash);
echo '<br>';

//Query para crear el usuario
$query = "INSERT INTO usuario (email, pass) VALUES ('{$email}', '{$passworHash}');";
exit;


//Agregar a la db
mysqli_query($db, $query);
?>
