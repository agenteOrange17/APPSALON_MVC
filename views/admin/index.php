<h1 class="nombre-pagina">Panel de administracion</h1>

<?php include_once __DIR__ . '/../templates/barra.php'; ?>


<h2>Buscar citas</h2>
<div class="busqueda">
    <form class="formulario">
        <div class="campo">
            <label for="fecha">Fecha</label>
            <input type="date" id="fecha" name="fecha" value="<? echo $fecha;?>">
        </div>
    </form>
</div>

<!-- Se coloca este codigo para que en caso de no encontrar citas mostrar mensaje -->
<?php 
 if (count($citas) === 0) {
    echo "<h2>No hay Citas en esta fecha</h2>";
 }
?>


<div id="citas-admin">

    <ul class="citas">
        <?php
        //Se crea esta variable para que no marque como indefinida        
        $idCita = 0;
        
        //as key=> 
        foreach ($citas as $key => $cita) {

            // debuguear($key);
            //Se agrega una condicional para que no se repitan los id y cada que retorne el foreach evite estar repitiendo el id
            if ($idCita !== $cita->id) {
                //Aqui se inicia en 0 para empezar a sumar los servicio
                $total = 0;
        ?>
                <li>
                    <p>ID: <span><?php echo  $cita->id; ?></span></p>
                    <p>Hora: <span><?php echo  $cita->hora; ?></span></p>
                    <p>Cliente: <span><?php echo  $cita->cliente; ?></span></p>
                    <p>Email: <span><?php echo  $cita->email; ?></span></p>
                    <p>Teléfono: <span><?php echo  $cita->telefono; ?></span></p>

                    <h3>Servicios</h3>
                <?php
                $idCita = $cita->id;
            } //fin de if
                //Suma de servicios 
                $total += $cita->precio;
            ?>
                <!-- Para mostrar todos los servicio -->
                <p class="servicios"><?php echo $cita->servicio . " " . $cita->precio;?></p>
                
            <?php 
                //retormar el id en el cual no encontramos
                $actual = $cita->id;
                //Es el indice en la base de rato empieza en el 1, 2 o 3 identifica cual es la cita que tiene el mismo el ultimo
                $proximo = $citas[$key +1]->id ?? 0;

                if (esUltimo($actual, $proximo)) { ?>
                    <p class="total">Total: <span>$<?php echo $total;?></span></p>

                    <!-- Para eliminar las citas -->
                    <form action="/api/eliminar" method="POST">
                        <input type="hidden" name="id" value="<?php echo $cita->id; ?>">
                        
                        <input type="submit" class="boton-eliminar" value="Eliminar">
                    </form>
            <?php  } 
             } //Fin de foreach?>
    </ul>

</div>

<?php
    $script = "<script src='build/js/buscador.js'></script>"
 ?>