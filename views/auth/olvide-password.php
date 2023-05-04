<h1 class="nombre-pagina">Olvide el password</h1>
<p class="descripcion-pagina">Reestablece tu password escribiendo tu email a continuación</p>

<?php include_once __DIR__ . '/../templates/alertas.php'; ?>

<form action="/olvide" class="formulario" method="POST">
    <div class="campo">
        <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" placeholder="Tu Email"/>
    </div>
    <input type="submit" class="boton" value="Enviar Instrucciones">
</form>

<div class="acciones">
    <a href="/">Volver e Iniciar Sesión</a>
    <a href="/crear-cuenta">Crear una cuenta</a>
</div>