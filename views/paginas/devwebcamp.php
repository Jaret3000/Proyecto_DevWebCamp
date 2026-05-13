<main class="devwebcamp">
    <h2 class="devwebcamp__heading"><?php echo $titulo; ?></h2>
    <p class="devwebcamp__descripcion">Conoce la conferencia mas importante de Latinoamerica</p>
    <div class="devwebcamp__grid">
        <div <?php aos_animacion(); ?> class="devwebcamp__image">
            <picture>
                <source srcset="build/img/sobre_devwebcamp.avif" type="image/avif">
                <source srcset="build/img/sobre_devwebcamp.webp" type="image/webp">
                <img loading="lazy" width="200" height="300" src="build/img/sobre_devwebcamp.jpg" 
                alt="Imagen Devwebcamp">
            </picture>
        </div>

        <div class="devwebcamp__contenido">
            <p <?php aos_animacion(); ?> class="devwebcamp__texto">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                Nihil eum aut perspiciatis atque quas quam ipsum voluptas reiciendis, 
                voluptatem quasi explicabo! Consequuntur vitae illo, eius eveniet aspernatur 
                delectus qui modi.
            </p>
            <p <?php aos_animacion(); ?> class="devwebcamp__texto">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                Nihil eum aut perspiciatis atque quas quam ipsum voluptas reiciendis, 
                voluptatem quasi explicabo! Consequuntur vitae illo, eius eveniet aspernatur 
                delectus qui modi.
            </p>
        </div>
    </div>
</main>