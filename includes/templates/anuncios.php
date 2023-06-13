<?php
  //Importar la conexión
  //El require es relativo al documento
  require "includes/config/database.php";
  $db = conectarDB();

  //consultar
  $query = "SELECT * FROM propiedades LIMIT {$limite}";

  //obtener resultado
  $resultado = mysqli_query($db, $query);
?> 

<div class="contenedor-anuncios">
  <?php while($propiedad = mysqli_fetch_assoc($resultado)): ?>
  <div class="anuncio">

      <img loading="lazy" src="/imagenes/<?php echo $propiedad['imagen'] ?>" alt="anuncio">

      <div class="contenido-anuncios">
        <h3><?php echo $propiedad['titulo'] ?></h3>
        <p>
          <?php echo $propiedad['descripcion'] ?>
        </p>
        <p class="precio">$<?php echo $propiedad['precio'] ?></p>
          <ul class="iconos-caracteristicas">
            <li>
              <img class="icono" src="build/img/icono_wc.svg" alt="icono wc">
              <p><?php echo $propiedad['wc'] ?></p>
            </li>
            <li>
              <img class="icono" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
              <p><?php echo $propiedad['estacionamiento'] ?></p>
            </li>
            <li>
              <img class="icono" src="build/img/icono_dormitorio.svg" alt="icono habitaicones">
              <p><?php echo $propiedad['habitaciones'] ?></p>
            </li>
          </ul>

        <a href="anuncio.php?id=<?php echo $propiedad['id']?>" class="boton-amarillo-block">
          Ver Propiedad
        </a>
      </div><!--contenido-anuncios-->
  </div><!--anuncios-->
  <?php endwhile; ?>
</div><!--contenedor-anuncios-->

<?php
//Cerrar conexión
  mysqli_close($db);
?>
