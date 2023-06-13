<?php
  require 'includes/funciones.php';
  incluirTemplate('header', $inicio = true);
?>

  <main class="contenedor seccion">
    <h1> Más Sobre Nosotros</h1> 
    <h2>Crear registrar usuario</h2>

    <div class="iconos-nosotros">
      <div class="icono">
        <img src="build/img/icono1.svg" alt="icono seguridad" loading="lazy">
        <h3>Seguridad</h3>
        <p>
          Harum deleniti, placeat voluptatem repellendus architecto ipsam quibusdam autem doloribus eos adipisci, et facere quos consectetur dolore asperiores quidem aperiam perspiciatis cumque.
        </p>
      </div>
      <div class="icono">
        <img src="build/img/icono2.svg" alt="icono precio" loading="lazy">
        <h3>Precio</h3>
        <p>
          Harum deleniti, placeat voluptatem repellendus architecto ipsam quibusdam autem doloribus eos adipisci, et facere quos consectetur dolore asperiores quidem aperiam perspiciatis cumque.
        </p>
      </div>
      <div class="icono">
        <img src="build/img/icono3.svg" alt="icono tiempo" loading="lazy">
        <h3>A Tiempo</h3>
        <p>
          Harum deleniti, placeat voluptatem repellendus architecto ipsam quibusdam autem doloribus eos adipisci, et facere quos consectetur dolore asperiores quidem aperiam perspiciatis cumque.
        </p>
      </div>
    </div>

  </main>

  <section class="seccion contenedor">
    <h2>Casas y Depas en Venta</h2>

    <?php
      $limite = 3;
      include 'includes/templates/anuncios.php';
    ?>
    

    <div class="alinear-derecha">
      <a href="anuncios.php" class="boton-verde">Ver Todas</a>
    </div>
  </section>

  <section class="imagen-contacto">
    <h2>Encuentra la casa de tus sueños</h2>
    <p>
      Llena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad
    </p>
    <a href="contacto.html" class="boton-amarillo">Contactános</a>
  </section>

  <div class="contenedor seccion seccion-inferior">
    <section class="blog">
      <h3>Nuestro Blog</h3>

      <article class="entrada-blog">
        <div class="imagen">
          <picture>
            <source srcset="build/img/blog1.webp" type="image/webp">
            <source srcset="build/img/blog1.jpg" type="image/jpeg">
            <img src="build/img/blog1.jpg" alt="Texto de entrada blog">
          </picture>
        </div>

        <div class="texto-entrada">
          <a href="entrada.html">
            <h4>Terraza en el techo de tu casa</h4>
            <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>
            <p>
              Consejo para construir una terraza en el techo de tu casa con los 
              mejores materiales y ahorrar dinero
            </p>
          </a>
        </div>
      </article>

      <article class="entrada-blog">
        <div class="imagen">
          <picture>
            <source srcset="build/img/blog2.webp" type="image/webp">
            <source srcset="build/img/blog2.jpg" type="image/jpeg">
            <img src="build/img/blog2.jpg" alt="Texto de entrada blog">
          </picture>
        </div>

        <div class="texto-entrada">
          <a href="entrada.html">
            <h4>Guía para la decoración de tu hogar</h4>
            <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>
            <p>
              Maximiza el espacio en tu hogar con esta guía, aprende a combinar
              muebles y colores para darle vida a tu espacio.
            </p>
          </a>
        </div>
      </article>
    </section>

    <div class="testimoniales">
      <h3>Testimoniales</h3>

      <div class="testionial">
        <blockquote>
          El personal se comporto de una excelente forma, muy buena atención y 
          la casa que me ofrecieron cumple todas mis espectaticvas.
        </blockquote>
        <p>- Lair Rico</p>
      </div>
    </div>
  </div>

<?php
  incluirTemplate('footer');
?> 
