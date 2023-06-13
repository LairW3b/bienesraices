<?php
require '../../includes/funciones.php';
$auth = estaAutenticado();
if(!$auth) {
  header('Location: /');
}
// Base de datos 
// $_GET y $_POST son super globales con las cuales puedo acceder a los valores que se envian
require '../../includes/config/database.php';
$db = conectarDB();


// Consulta para obtener vendeores
$consulta = "SELECT * FROM vendedores";
//mysqli: recibe dos parametros
$resultado = mysqli_query($db, $consulta);


$titulo = 'titulo';
$precio = 'precio';
$descripcion = 'descripcion';
$habitaciones = 'habitaciones';
$wc = 'wc';
$estacionamineto = 'estacionamiento';
$vendedor_id = 'vendedor';

// Arreglo con mensajes de error
$errores = [];

$vendedor_id = $_POST['vendedor'];

if($_SERVER['REQUEST_METHOD'] === 'POST') {
  //php tiene filtros de validación y de saneamiento los puedo consultar en su web
  //filter_var(): es una función que nos ayuda a sanitizar recibe dos parametros la variable y el filtro


  // echo "<pre>";
  // var_dump($_POST); 
  // echo "</pre>";

  // echo "<pre>";
  //var_dump($_FILES); //files nos permite ver el contenido de los archivos
  // echo "</pre>";

  //mysqli_real_escape_string: esta función nos protege de un ataque de inyección sql 
  //guardando los datos de forma no ejecutabel, su  primer parametro es la BD y el segundo
  //lo que vamos a validar;
  $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
  $precio = mysqli_real_escape_string($db, $_POST['precio']);
  $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
  $habitaciones =mysqli_real_escape_string($db, $_POST['habitaciones']);
  $wc =mysqli_real_escape_string($db, $_POST['wc']);
  $estacionamineto = mysqli_real_escape_string($db, $_POST['estacionamiento']);
  $vendedor_id = mysqli_real_escape_string($db, $_POST['vendedor']);
  $creado = mysqli_real_escape_string($db, date('Y/m/d'));

  // Asignar files a una variable
  $imagen = $_FILES['imagen'];
  //var_dump($imagen);

  if(!$titulo) {
    $errores[] = "Debes añadir un titulo";
  }

  if(!$precio) {
    $errores[] = "El Precio es obligatorio";
  }

  if( strlen($descripcion) < 50) {
    $errores[] = "La Descripcion es obligatoria";
  }

  if(!$habitaciones) {
    $errores[] = "El Número de habitaciones es obligatorio";
  }

  if(!$wc) {
    $errores[] = "El Número de Baños es obligatorio";
  }

  if(!$estacionamineto) {
    $errores[] = "El Número de Estacionamientos es obligatorio";
  }

  if(!$vendedor_id) {
    $errores[] = "Elige un vendedor";
  }

  if(!$imagen['name']) {
    $errores[] = "La imagen es obligatoria";
  }

  //Validar por tamaño (1mb máximo)
  $medida = 1000 * 1000;

  if($imagen['size'] > $medida || $imagen['error']) {
    $errores[] = 'La Imagen es muy grande';
  }



  /*echo "<pre>";*/
  /*var_dump($errores);*/
  /*echo "</pre>";*/

  if(empty($errores)){
    /**Subir archivos */
    // Crear carpeta
    $carpetaImagenes = '../../imagenes/';

    //Comprobar si la carpeta existe
    //is_dir: comprueba si una carpeta existe
    if(!is_dir($carpetaImagenes)) {
      mkdir($carpetaImagenes);//crea el directorio
    }

    //Generar un nombre único
    $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";

    //Subir imagen
    move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen );

    // Insertar en la base de datos
    $query = " INSERT INTO propiedades (titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creado, vendedores_id) VALUES ('$titulo','$precio', '$nombreImagen', '$descripcion','$habitaciones','$wc', '$estacionamineto', '$creado','$vendedor_id') ";

    // echo $query;

    // Insertar en la base de datos
    $resultado = mysqli_query($db, $query);

    if($resultado) {
      //echo "Insertado Correctamente";
      //Redireccionar al usuario
      //Apartir del "?" estoy pasando un query string
      header("Location: /admin?resultado=1");
    }   
  }

}

incluirTemplate('header');
?>

<main class="contenedor seccion">
  <h1>Crear</h1>
  <a href="/admin" class="boton boton-verde">Volver</a>

  <?php foreach ($errores as $error): ?>
    <div class="alerta error">
      <?php  echo $error;?>
    </div>
  <?php endforeach; ?>

  <form 
    action="/admin/propiedades/crear.php" 
    method="POST" 
    class="formulario" 
    enctype="multipart/form-data"
  >
    <fieldset>
      <legend>Información General</legend>

      <label for="titulo">Titulo:</label>
      <input 
        type="text" 
        id="titulo" 
        name="titulo" 
        placeholder="Titulo Propiedad" 
        value="<?php echo $titulo ?>"
      >

      <label for="precio">Precio:</label>
      <input 
        type="number" 
        id="precio" 
        name="precio" 
        placeholder="Precio Propiedad"
        value="<?php echo $precio ?>"
      >

      <label for="imagen">Imagen:</label>
      <input 
        type="file" 
        id="imagen" 
        accept="image/jpeg, image/png" 
        name="imagen"
        value="<?php echo $imagen ?>"
      >

      <label for="descripcion">Descripción</label>
      <textarea 
        name="descripcion" 
        id="descripcion"
      >
      <?php echo $descripcion  ?>
      </textarea>

    </fieldset>

    <fieldset>
      <legend>Información Propiedades</legend>

      <label for="habitaciones">Habitaciones:</label>
      <input 
        type="number" 
        id="habitaciones" 
        name="habitaciones"
        placeholder="Ej: 3"
        min="1"
        max="9"
        value="<?php echo $habitaciones ?>"
      >

      <label for="wc">Baños:</label>
      <input 
        type="number" 
        id="wc" 
        name="wc"
        placeholder="Ej: 3"
        min="1"
        max="9"
        value="<?php echo $wc ?>"
      >

      <label for="estacionamiento">Estacionamiento:</label>
      <input 
        type="number" 
        id="estacionamiento" 
        name="estacionamiento" 
        placeholder="Ej: 3"
        min="1"
        max="9"
        value="<?php echo $estacionamineto ?>"
      >
    </fieldset>

    <fieldset>
      <legend>Vendedor</legend>

      <select name="vendedor">
        <option value="">-- Seleccione --</option>
          <!--fetch_assoc nos devuelve un arreglo aociativo-->
        <?php while($vendedor = mysqli_fetch_assoc($resultado)) : ?>
          <option 
            <?php echo $vendedor_id === $vendedor['id'] ? 'selected' : ''; ?>
            value="<?php echo $vendedor['id']; ?>"
          >   
            <?php echo $vendedor['nombre'] . " " . $vendedor['apellido']; ?> 
          </option>
        <?php endwhile; ?>
      </select>
    </fieldset>

    <input type="submit" value="Crear Propiedad" class="boton boton-verde">
  </form>
</main>

<?php 
incluirTemplate('footer');
?>
