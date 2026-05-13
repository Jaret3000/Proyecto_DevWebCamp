<main class="agenda">
    <h2 class="agenda__heading">Workshops & Conferencias</h2>
    <p class="agenda__descripcion">Talleres y conferencias dictados por expertos en desarrollo web</p>
    
    <div class="eventos">
        <h3 class="eventos__heading">&lt;Conferecias /></h3>
        <p class="eventos__fecha">Jueves 5 de febrero</p>
        <div class="eventos__listado slider swiper">
            <div class="swiper-wrapper">
                <?php foreach ($eventos['conferencias']['j'] as $evento){ ?>
                    <?php include __DIR__ . '../../templates/evento.php'; ?>
                <?php } ?>
            </div>
    
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

        </div>

        <p class="eventos__fecha">Viernes 6 de febrero</p>
        <div class="eventos__listado slider swiper">
            <div class="swiper-wrapper">
                <?php foreach ($eventos['conferencias']['v'] as $evento){ ?>
                    <?php include __DIR__ . '../../templates/evento.php'; ?>
                <?php } ?>
            </div>
    
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

        </div>

        <p class="eventos__fecha">Sabado 7 de febrero</p>
        <div class="eventos__listado slider swiper">
            <div class="swiper-wrapper">
                <?php foreach ($eventos['conferencias']['s'] as $evento){ ?>
                    <?php include __DIR__ . '../../templates/evento.php'; ?>
                <?php } ?>
            </div>
    
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

        </div>

        <p class="eventos__fecha">Domingo 8 de febrero</p>
        <div class="eventos__listado slider swiper">
            <div class="swiper-wrapper">
                <?php foreach ($eventos['conferencias']['d'] as $evento){ ?>
                    <?php include __DIR__ . '../../templates/evento.php'; ?>
                <?php } ?>
            </div>
    
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

        </div>
    </div>

    <div class="eventos eventos--workshops">
        <h3 class="eventos__heading">&lt;Workshops /></h3>
        <p class="eventos__fecha">Jueves 5 de febrero</p>
        <div class="eventos__listado slider swiper">
            <div class="swiper-wrapper">
                <?php foreach ($eventos['workshops']['j'] as $evento){ ?>
                    <?php include __DIR__ . '../../templates/evento.php'; ?>
                <?php } ?>
            </div>
    
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

        </div>

        <p class="eventos__fecha">Viernes 6 de febrero</p>
        <div class="eventos__listado slider swiper">
            <div class="swiper-wrapper">
                <?php foreach ($eventos['workshops']['v'] as $evento){ ?>
                    <?php include __DIR__ . '../../templates/evento.php'; ?>
                <?php } ?>
            </div>
    
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

        </div>

        <p class="eventos__fecha">Sabado 7 de febrero</p>
        <div class="eventos__listado slider swiper">
            <div class="swiper-wrapper">
                <?php foreach ($eventos['workshops']['s'] as $evento){ ?>
                    <?php include __DIR__ . '../../templates/evento.php'; ?>
                <?php } ?>
            </div>
    
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

        </div>

        <p class="eventos__fecha">Domingo 8 de febrero</p>
        <div class="eventos__listado slider swiper">
            <div class="swiper-wrapper">
                <?php foreach ($eventos['workshops']['d'] as $evento){ ?>
                    <?php include __DIR__ . '../../templates/evento.php'; ?>
                <?php } ?>
            </div>
    
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

        </div>
    </div>
</main>