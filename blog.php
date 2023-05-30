<?php 
  include './includes/templates/header.php';
?>
  <main class="contenedor seccion contenido-centrado">
    <h1>Nuestro Blog</h1> 

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
            <p>Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>
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
            <p>Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>
            <p>
              Maximiza el espacio en tu hogar con esta guía, aprende a combinar
              muebles y colores para darle vida a tu espacio.
            </p>
          </a>
        </div>
      </article>
  </main>
<?php
  include './includes/templates/footer.php';
?> 
