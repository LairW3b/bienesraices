<?php
require '../includes/funciones.php';
$auth = estaAutenticado();
if(!$auth) {
  header('Location: /');
}

//Importar la conexión
require '../includes/config/database.php';
$db = conectarDB();

//Escribir el Query
$query = "SELECT * FROM propiedades";

//Consultar la DB
$resultadoConsulta = mysqli_query($db, $query);


$resultado = $_GET['resultado'] ?? null; // ?? -> agrego un valor por default
//lo mismo que hacia isset


if($_SERVER['REQUEST_METHOD'] === 'POST') { 
  //El método post solo va a existir hasta que se mande el REQUEST_METHOD
  $id = $_POST['id'];
  $id = filter_var($id, FILTER_VALIDATE_INT);

  if($id) {

    //Eliminar el archivo
    $query = "SELECT imagen FROM propiedades WHERE id = {$id}";

    $resultado = mysqli_query($db, $query);
    $propiedad = mysqli_fetch_assoc($resultado);

    unlink('../imagenes/' . $propiedad['imagen']);


    //Eliminar la propiedad
    $query = "DELETE FROM propiedades WHERE id = {$id}";
    $resultado = mysqli_query($db, $query);

    if($resultado) {
      header('Location: /admin?resultado=3');
    }
  }


}


//get para acceder a los valores de la url
//mostrarVar($_GET);
incluirTemplate('header');
?>
<main class="contenedor seccion">
  <h1>Administrador</h1>
  <?php if(intval($resultado) === 1): ?>
    <p class="alerta exito">Anuncico Creado Correctamente</p>
  <?php elseif(intval($resultado) === 2): ?>
    <p class="alerta exito">Anuncico Actualizado Correctamente</p>
  <?php elseif(intval($resultado) === 3): ?>
    <p class="alerta exito">Anuncico Eliminado Correctamente</p>
  <?php endif; ?>

  <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>

  <table class="propiedades">
    <thead>
      <tr>
        <th>ID</th>
        <th>Titulo</th>
        <th>Imagen</th>
        <th>Precio</th>
        <th>Acciones</th>
      </tr>
    </thead>

    <tbody>
      <?php while ($propiedad = mysqli_fetch_assoc($resultadoConsulta)): ?>
      <tr>
      <td><?php echo $propiedad['id']?></td>
      <td><?php echo $propiedad['titulo'] ?></td>
        <td>
          <img 
          src="/imagenes/<?php echo $propiedad['imagen'] ?>" 
            alt="imagen casa" 
            class="imagen-tabla"
          >
        </td>
        <td><?php echo $propiedad['precio']?></td>
        <td>
        <form method="POST" class="w-100">
           <input type="hidden" name="id" value="<?php echo $propiedad['id'] ?>">
           <input type="submit" class="boton-rojo-block" value="Eliminar">
        </form>
          <a 
            href="/admin/propiedades/actualizar.php?id=<?php echo $propiedad['id']; ?>" 
            class="boton-amarillo-block"
          >
            Actualizar
          </a>
        </td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</main>
<?php
mysqli_close($db);
incluirTemplate('footer');
?>
