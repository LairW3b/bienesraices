<?php
  include './includes/templates/header.php';
?>
  <main class="contenedor seccion contenido-centrado">
    <h1>Casa en Venta frente al bosque</h1> 

    <picture>
      <source srcset="build/img/destacada.webp" type="image/webp">
      <source srcset="build/img/destacada.jpg" type="image/jpeg">
      <img loading="lazy" src="build/img/destacada.jpg" alt="anuncio">
    </picture>

    <div class="resumen-propiedad">
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
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ullam, et deleniti alias dolorum repellat nostrum sed reprehenderit eius, accusamus dignissimos commodi ad quos impedit unde placeat fuga omnis laboriosam. Atque totam repellat delectus perspiciatis sit ullam quod, tenetur natus et fuga dolor, quae reiciendis ipsam. Laudantium natus molestias quaerat. Voluptatibus pariatur nobis quis, expedita alias labore eveniet doloribus assumenda commodi sed illo optio sint fugiat? Itaque earum impedit, sit debitis, tempora quod voluptatem unde, consequatur voluptatum mollitia autem explicabo cupiditate fugit sapiente labore dolorem rerum. Facere doloribus voluptatibus veritatis voluptas, deserunt assumenda molestiae, cum nesciunt suscipit, dolores nostrum similique.</p>
      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Adipisci cupiditate enim ex nobis itaque perspiciatis ipsam, doloribus consequatur dolores laboriosam modi ducimus aut, libero qui vitae earum aspernatur ea a.</p>
    </div>
  </main>
<?php
  incluirTemplate('footer');
?>
