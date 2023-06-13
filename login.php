<?php 
  include 'includes/funciones.php';

  //conexición a la base de datos
  include 'includes/config/database.php';
  $db = conectarDB();

  $errores = [];

  //Autenticar usuario
if($_SERVER['REQUEST_METHOD'] === 'POST') {

  //campo para validar email
  //mysqli_real_escape_string: sanitizar datos en la base de datos
  $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
  $pass = mysqli_real_escape_string($db, $_POST['pass']);

  if(!$email) {
    $errores[] = "El email es obligatorio o no es válido";
  }

  if(!$pass) {
    $errores[] = "El password es obligatorio";
  }

  if(empty($errores)) {
    //Revisar si el usuario existe 
    $query = "SELECT * FROM usuario WHERE email = '{$email}'";
    //resultado debuelve un objeto, lo que me interesa es el num_rows
    $resultado = mysqli_query($db, $query);


    if( $resultado->num_rows ) {
      //Revisar si el password es correcto
      $usuario = mysqli_fetch_assoc($resultado);

      //Verificar si el password es correcto
      //php nos proporsiona un función para saber si el password es correcto
      $auth = password_verify($pass, $usuario['pass']);

      if($auth) {
        //El usuario esta autenticado
        session_start();
        /** LLenar el arreglo de sesión 
         * en la super global sesión se puede almacenar lo que quieras 
         * y es aquí donde podrias dar roles para modificar solo ciertas
         * partes del sistema */
        $_SESSION['usuario'] = $usuario['email'];
        $_SESSION['login'] = true;
        //$_SESSION['rol'] = 1;
        header('Location: /admin');

      } else {
        $errores[] = 'El password es incorrecto';
      }
      
    } else {
      $errores[] = "El Usuario no existe";
    }
    
  }

}

  incluirTemplate('header');
?>
  <main class="contendor seccion contenido-centrado">
    <h1>Iniciar Seción</h1>

    <?php foreach ($errores as $error): ?>
      <div class="alerta error">
        <?php echo $error; ?>
      </div>
    <?php endforeach; ?>

    <form method="POST" action="#" class="formulario">
      <fieldset>
        <legend>Email y Password</legend>
      
        <label for="email">E-mail</label>
        <input type="email" name="email" placeholder="Tu Email" id="email">
        
        <label for="password">Password</label>
        <input type="password" name="pass" placeholder="Tu Password" id="password">
      </fieldset>
      
      <input type="submit" value="Iniciar Seción" class="boton boton-verde">
    </form>
  </main>
<?php
  incluirTemplate('footer');
?>
