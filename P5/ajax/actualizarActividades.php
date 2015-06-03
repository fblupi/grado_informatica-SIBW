<?php
    include '../contenido/comun/conexionDB.php';

    $cuota=$_GET['cuota'];


    $seleccion="SELECT actividades.ID_act, actividades.Titulo FROM actividades JOIN cuota_actividad ON actividades.ID_act=cuota_actividad.ID_act WHERE ID_cuota=$cuota";
    $resultado=mysql_query ($seleccion, $conexion);
    while($fila=mysql_fetch_array($resultado)) {
        echo '<p>'.$fila['Titulo'].'</p>';
        /*
        echo '<li>';
        echo '<label for="'.$fila["ID_act"].'">'.$fila["Titulo"].'</label>';
        echo '<input type="checkbox" id="'.$fila["ID_act"].'" name="actividad[]" value="'.$fila["ID_act"].'"/>';
        echo '</li>';
        */
    }

    echo '<p>lo hagooo </p>';
    mysql_close();