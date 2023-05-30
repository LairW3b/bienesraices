<?php
  require 'includes/funciones.php';
  incluirTemplate('header');
?>
  <main class="contenedor seccion">
    <h1>Conoce sobre Nosotros</h1> 

    <div class="contenido-nosotros">
      <div class="imagen">
        <picture>
          <source srcset="build/img/nosotros.webp" type="imagen/webp">
          <source srcset="build/img/nosotros.jpg" type="imagen/jpeg">
          <img loading="lazy" src="build/img/nosotros.webp" alt="sobre nosotros">
        </picture>
      </div>

      <div class="texto-nosotros">
        <blockquote>
          25 Años de experiencia
        </blockquote>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe eius quisquam facilis nobis,
          nihil ex repellat sit vitae corrupti quis, sapiente alias doloribus hic eveniet culpa
          distinctio iusto. Nemo, dolorum! Lorem ipsum dolor sit amet consectetur, adipisicing elit.
          Totam nobis alias nesciunt minus, animi qui, a eum sed in placeat, inventore autem labore
          officia tenetur ex fugit voluptatum dolorem! Quam.
        </p>
        <p>
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dignissimos provident eaque accusantium hic, ipsam adipisci odio nobis, magnam distinctio, tenetur animi pariatur asperiores officiis eum placeat nostrum cumque nemo repellat!
        </p>
      </div>
    </div>
  </main>

  <section class="contenedor seccion">
    <h1> Más Sobre Nosotros</h1> 

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

  </section>
<?php 
  incluirTemplate('footer');
?>