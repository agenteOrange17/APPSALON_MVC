<?php

//Alertas correctas
foreach ($alertas as $key => $mensajes) :
    foreach ($mensajes as $mensaje) :
?>
        
        <div class="alerta btn <?php echo $key; ?>">
        <?php echo $mensaje; ?>

        </div>

<?php
    endforeach;
endforeach;
?>