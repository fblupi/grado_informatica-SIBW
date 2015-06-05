<?php

    if(isset($_GET['actividad'])) {
        $actividad = $_GET['actividad'];

        include '../contenido/comun/conexionDB.php';

        $seleccion = "SELECT Precio FROM actividades WHERE ID_act='$actividad'";

        $resultado = mysql_query($seleccion, $conexion);


        if ($fila = mysql_fetch_array($resultado)) {
            echo $fila['Precio'];
        }

        mysql_close();
    }