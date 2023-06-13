<?php 
require '../../includes/funciones.php';

$auth = estaAutenticado();
if(!$auth) {
  header('Loacation: /');
}

require '../../includes/config/database.php';
$db = conectarDB();

$query = "SELECT * FROM usuario";

$resultadoConsulta = mysqli_query($db, $query);

$resultado = $_GET['resultado'] ?? null;

if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = $_POST['id'];
  $id = filter_var($id, FILTER_VALIDATE_INT);

  if($id) {
    $query = "DELETE FROM usuario where id = {$id}";
    $resultado = mysqli_query($db, $query);

    if($resultado) {
      header('Location: /admin/usuarios/usuarios.php?resultado=3');
    }
  }

}


incluirTemplate('header');
?>

<main class="contenedor seccion">
  <h1>Administrar Usuarios</h1>
  <?php if(intval($resultado) === 1): ?>
    <p class="alerta exito">Usuario Creado Correctamente</p>
  <?php endif; ?>
  <?php if(intval($resultado) === 3): ?>
    <p class="alerta exito">Usuario Eliminado Correctamente</p>
  <?php endif; ?>
  
  <a href="/admin" class="boton boton-verde">Volver</a>
  <a href="/admin/usuarios/crearUsuario.php" class="boton boton-verde">Crear Usuario</a>

  <table class="propiedades">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Correo</th>
        <th>Acciones</th>
      </tr>
    </thead>

    <tbody>
      <?php while ($usuario = mysqli_fetch_assoc($resultadoConsulta)): ?>
      <tr>
        <td><?php echo $usuario['id'] ?></td>   
        <td><?php echo $usuario['nombre'] ?></td>   
        <td><?php echo $usuario['apellido'] ?></td>   
        <td><?php echo $usuario['email'] ?></td>
        <td>
          <form method="POST" class="w-100">
            <input type="hidden" name="id" value="<?php echo $usuario['id']?> ">
            <input type="submit" class="boton-rojo-block" value="Eliminar">
          </form>
          <a 
            href="/admin/propiedades/actualizar.php?id=<?php echo $usuario['id']; ?>" 
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
