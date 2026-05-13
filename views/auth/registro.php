<main class="auth">
    <h2 class="auth__heading"><?php echo $titulo; ?></h2>
    <p class="auth__texto">Registrate en Devwebcamp</p>

    <?php
        require_once __DIR__ . '/../templates/alertas.php';
    ?>

    <form method="POST" action="/registro" class="formulario">
        <div class="formulario__campo">
            <label for="nombre" class="formulario__label">Nombre</label>
            <input type="text" id="nombre" class="formulario__input" placeholder="Tu nombre" 
            name="nombre" value="<?php echo $usuario->nombre; ?>">
        </div>

        <div class="formulario__campo">
            <label for="apellido" class="formulario__label">Apellido</label>
            <input type="text" id="apellido" class="formulario__input" placeholder="Tu apellido" 
            name="apellido" value="<?php echo $usuario->apellido; ?>">
        </div>
        
        <div class="formulario__campo">
            <label for="email" class="formulario__label">Email</label>
            <input type="email" id="email" class="formulario__input" placeholder="Tu email" 
            name="email" value="<?php echo $usuario->email; ?>">
        </div>

        <div class="formulario__campo">
            <label for="password" class="formulario__label">Password</label>
            <input type="password" id="password" class="formulario__input" placeholder="Tu password" name="password">
        </div>

        <div class="formulario__campo">
            <label for="password2" class="formulario__label">Repetir password</label>
            <input type="password" id="password2" class="formulario__input" placeholder="Repetir password" name="password2">
        </div>

        <input type="submit" value="Crear Cuenta" class="formulario__submit">
    </form>

    <div class="acciones">
        <a href="/login" class="acciones__enlace">¿Ya tienes una cuenta? Inicia sesión</a>
        <a href="/olvide" class="acciones__enlace">¿Olvidaste tu password?</a>
    </div>
</main>