<h1 class="nombre-pagina" >Recuperar Contraseña</h1>
<p class="descripcion-pagina">Ingresa tu nueva contraseña a continuación</p>

<?php include_once __DIR__ . '/../templates/alertas.php'; ?>

<?php if($error) return; ?>

<form method="POST" class="formulario">

    <div class="campo">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Ingresa tu nuevo Password"/>
    </div>

    <input type="submit" value="Restablecer Contraseña" class="boton">
</form>

<div class="acciones">
    <a href="/">Volver e Iniciar Sesión</a>
    <a href="/crear-cuenta">Crear una nueva cuenta</a>
</div>