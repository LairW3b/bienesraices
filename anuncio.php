<?php
  include 'includes/funciones.php';
  incluirTemplate('header');

  $id = $_GET["id"];
  $id = filter_var($id, FILTER_VALIDATE_INT);

  if(!$id) {
    header('Location: /');
  }

  //Conectar a la db
  include 'includes/config/database.php';
  $db = conectarDB();

  //Consultar
  $query = "SELECT * FROM propiedades WHERE id = {$id}";

  //Obtenr resultado
  $resultado = mysqli_query($db, $query);

  if(!$resultado->num_rows) {
    header('Location: /');
  }

  $propiedad = mysqli_fetch_assoc($resultado);
?>
  <main class="contenedor seccion contenido-centrado">
    <h1><?php echo $propiedad['titulo']; ?></h1> 

    <img loading="lazy" src="imagenes/<?php echo $propiedad['imagen']; ?>" alt="anuncio">

    <div class="resumen-propiedad">
      <p class="precio">$<?php echo $propiedad['precio'] ?></p>

      <ul class="iconos-caracteristicas">
        <li>
          <img src="build/img/icono_wc.svg" alt="icono wc">
          <p><?php echo $propiedad['wc']?></p>
        </li>
        <li>
          <img src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
          <p><?php echo $propiedad['estacionamiento']?></p>
        </li>
        <li>
          <img src="build/img/icono_dormitorio.svg" alt="icono habitaicones">
          <p><?php echo $propiedad['habitaciones'] ?></p>
        </li>
      </ul>
      <p> <?php echo $propiedad['descripcion'] ?> </p>     
    </div>
  </main>
<?php
  mysqli_close($db);
  incluirTemplate('footer');
?>
