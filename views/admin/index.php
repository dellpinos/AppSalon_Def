<h1 class="nombre-pagina">Panel de Administrador</h1>

<?php include_once __DIR__ .  '/../templates/barra.php'; ?>

<h2>Buscar Turnos</h2>
<div class="busqueda">
    <form class="formulario">
        <div class="campo">
            <label for="fecha">Fecha</label>
            <input id="fecha" type="date" name="fecha" value="<?php echo $fecha; ?>">
        </div>
    </form>
</div>

<?php 
    if(count($turnos) === 0){
        echo "<h2> No hay turnos programados en esta fecha. </h2>";
    }
?>

<div id="turnos-admin">
    <ul class="turnos">
        <?php
        $idTurno = '';
        foreach ($turnos as $key => $turno) {
            if ($idTurno !== $turno->id) {
                $total = 0;
        ?>
                <li>
                    <p>ID: <span><?php echo $turno->id ?></span></p>
                    <p>Hora: <span><?php echo $turno->hora ?></span></p>
                    <p>Cliente: <span><?php echo $turno->cliente ?></span></p>
                    <p>Email: <span><?php echo $turno->email ?></span></p>
                    <p>Telefono: <span><?php echo $turno->telefono ?></span></p>

                    <h3>Servicios</h3>

                <?php $idTurno = $turno->id;
            }  // Fin de if 
                ?>
                    <p class="servicio"><?php echo $turno->servicio . " $ " . $turno->precio;?></p>
                <?php
                $total += $turno->precio;
                $actual = $turno->id;
                $proximo = $turnos[$key + 1]->id ?? 0;

                if(esUltimo($actual, $proximo)) {
                    ?> <p class="total" >Total a pagar: <span> $<?php echo $total; ?> </span></p> 


                    <form action="/api/eliminar" method="POST">
                        <input type="hidden" name="id" value="<?php echo $turno->id ?>">
                        <input type="submit" class="boton-eliminar" value="Eliminar">
                    </form>
                    
                <?php }  ?>
            <?php } // Fin de forEach 
            ?>
    </ul>
</div>
<?php
    $script = "<script src='build/js/buscador.js'></script>";

?>