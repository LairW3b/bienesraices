<?php 
include '../../includes/funciones.php';
incluirTemplate('header');

$auth = estaAutenticado();
if(!$auth) {
  header('Location: /');
}

require '../../includes/config/database.php';
$db = conectarDB();

//$email = '';
//$password = 'pass';
//$comprobacion = 'comprobacion';

$errores = [];

if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = mysqli_real_escape_string(
    $db, 
    filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)
  );
  $pass = mysqli_real_escape_string($db, $_POST['pass']);
  $comprobacion = $_POST['comprobacion'];
  

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

  $passwordHash = password_hash($pass, PASSWORD_BCRYPT);

  $query = "INSERT INTO usuario (email, pass) VALUES ('{$email}', '{$passwordHash}');";

  $resultado = mysqli_query($db, $query);
    
}

?>

<main class="contenedor seccion">
<h1>Crear Usuario</h1>

<a href="/admin/usuarios/usuarios.php">Volver</a>

<?php foreach ($errores as $error): ?>
  <div class="alerta error">
    <?php echo $error ?>
  </div>
<?php endforeach; ?>
<form 
  action="/admin/usuarios/crearUsuario.php"
  method="POST"
  class="formulario"
  enctype="multipart/form-data"
>
<fieldset>
    <legend>Información</legend>
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
 
