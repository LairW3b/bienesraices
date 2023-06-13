<?php 
include '../../includes/funciones.php';
incluirTemplate('header');

$auth = estaAutenticado();
if(!$auth) {
  header('Location: /');
}

require '../../includes/config/database.php';
$db = conectarDB();

/*$email = 'email';*/
/*$password = 'pass';*/
/*$comprobacion = 'comprobacion';*/

$errores = [];

//var_dump($_POST);

if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nombre = mysqli_real_escape_string($db, $_POST['nombre']);
  $apellido = mysqli_real_escape_string($db, $_POST['apellido']);
  $email = mysqli_real_escape_string(
    $db, 
    filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)
  );
  $pass = mysqli_real_escape_string($db, $_POST['pass']);
  $comprobacion = $_POST['comprobacion'];

  if(!$nombre) {
    $errores[] = 'El nombre es obligatorio';
  }
  
  if(!$apellido) {
    $errores[] = 'El apellido es obligatorio';
  }

  if(!$email) {
    $errores[] = 'El email es obligatorio';
  } 

  if(!$pass) {
    $errores[] = 'El password es obligatorio';
  }

  if(!$comprobacion) {
    $errores[] = 'El password de comprobación es obligatorio';
  } else {
    if($pass != $comprobacion) {
      $errores[] = 'Los password no coinciden';
    }
  }

  if(empty($errores)) {

    $passwordHash = password_hash($pass, PASSWORD_BCRYPT);

    $query = "INSERT INTO usuario (
        email, pass, nombre, apellido 
      ) VALUES (
        '$email','$passwordHash','$nombre','$apellido'
      )";

    mostrarVar($query);

    $resultado = mysqli_query($db, $query);

    if($resultado) {
      header('Location: /admin/usuarios/usuarios.php?resultado=1');
    }
      
  }
}

?>

<main class="contenedor seccion">
<h1>Crear Usuario</h1>

<a href="/admin/usuarios/usuarios.php" class="boton boton-verde">Volver</a>

<?php foreach ($errores as $error): ?>
  <div class="alerta error">
    <?php echo $error ?>
  </div>
<?php endforeach; ?>
<form 
  method="POST"
  class="formulario"
  enctype="multipart/form-data"
>
<fieldset>
    <legend>Información</legend>

      <label for="nombre">Nombre:</label>
      <input  
        type="text" 
        placeholder="Introduce tu nombre" 
        name="nombre"
        value="<?php echo $nombre ?>"
      >
      <label for="nombre">Apellido:</label>
      <input  
        type="text" 

        placeholder="Introduce tu apellido" 
        name="apellido"
        value="<?php echo $apellido ?>"
      >
      <label for="email">Email:</label>
      <input  
        type="text" 
        placeholder="Introduce tu email" 
        name="email"
        value="<?php echo $email ?>"
      >

      <label for="pass">Password:</label>
      <input type="password" name="pass" placeholder="Introduce tu password">

      <label for="comprobacion">Repite tu password:</label>
      <input
        type="password" 
        name="comprobacion" 
        placeholder="Introduce de nuevo tu password"
      > 
    </fieldset>
  
    <input type="submit" value="Crear Usuario" class="boton boton-verde">

  </main>
</form>
 
