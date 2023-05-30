<?php 
  include './includes/templates/header.php';
?>

  <main class="contenedor seccion">
    <h1> Anuncios </h1> 
    <div class="contenedor-anuncios">
    <div class="anuncio">
      <picture>
        <source srcset="build/img/anuncio1.webp" type="image/webp">
        <source srcset="build/img/anuncio1.jpg" type="image/jpeg">
        <img loading="lazy" src="build/img/anuncio1.jpg" alt="anuncio">
      </picture>

      <div class="contenido-anuncios">
        <h3>Casa de Lujo en el Lago</h3>
        <p>
          Casa en el Lago con excelente vista, acabados de lujo a un excelente precio
        </p>
        <p class="precio">$3,000,000</p>
        <ul class="iconos-caracteristicas">
          <li>
            <img src="build/img/icono_wc.svg" alt="icono wc">
            <p>3</p>
          </li>
          <li>
            <img src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
            <p>3</p>
          </li>
          <li>
            <img src="build/img/icono_dormitorio.svg" alt="icono habitaicones">
            <p>4</p>
          </li>
        </ul>

        <a href="anuncios.html" class="boton-amarillo-block">
          Ver Propiedad
        </a>
      </div><!--contenido-anuncios-->
    </div><!--anuncios-->

    <div class="anuncio">
      <picture>
        <source srcset="build/img/anuncio2.webp" type="image/webp">
        <source srcset="build/img/anuncio2.jpg" type="image/jpeg">
        <img loading="lazy" src="build/img/anuncio2.jpg" alt="anuncio">
      </picture>

      <div class="contenido-anuncios">
        <h3>Casa Terminados de Lujo</h3>
        <p>
          Casa en el Lago con excelente vista, acabados de lujo a un excelente precio
        </p>
        <p class="precio">$3,000,000</p>
        <ul class="iconos-caracteristicas">
          <li>
            <img src="build/img/icono_wc.svg" alt="icono wc">
            <p>3</p>
          </li>
          <li>
            <img src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
            <p>3</p>
          </li>
          <li>
            <img src="build/img/icono_dormitorio.svg" alt="icono habitaicones">
            <p>4</p>
          </li>
        </ul>

        <a href="anuncios.html" class="boton-amarillo-block">
          Ver Propiedad
        </a>
      </div><!--contenido-anuncios-->
    </div><!--anuncios-->

    <div class="anuncio">
      <picture>
        <source srcset="build/img/anuncio3.webp" type="image/webp">
        <source srcset="build/img/anuncio3.jpg" type="image/jpeg">
        <img loading="lazy" src="build/img/anuncio3.jpg" alt="anuncio">
      </picture>

      <div class="contenido-anuncios">
        <h3>Casa con Alberca</h3>
        <p>
          Casa en el Lago con excelente vista, acabados de lujo a un excelente precio
        </p>
        <p class="precio">$3,000,000</p>
        <ul class="iconos-caracteristicas">
          <li>
            <img src="build/img/icono_wc.svg" alt="icono wc">
            <p>3</p>
          </li>
          <li>
            <img src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
            <p>3</p>
          </li>
          <li>
            <img src="build/img/icono_dormitorio.svg" alt="icono habitaicones">
            <p>4</p>
          </li>
        </ul>

        <a href="anuncios.html" class="boton-amarillo-block">
          Ver Propiedad
        </a>
      </div><!--contenido-anuncios-->
    </div><!--anuncios-->
  </div><!--contenedor-anuncios-->
  </main>
<?php 
  include './includes/templates/footer.php';
?>
