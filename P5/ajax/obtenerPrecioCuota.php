<?php
    if(isset($_GET['cuota'])) {
        $cuota = $_GET['cuota'];


        include '../contenido/comun/conexionDB.php';

        $seleccion = "SELECT Precio FROM cuotas WHERE ID_cuota='$cuota'";

        $resultado = mysql_query($seleccion, $conexion);


        if ($fila = mysql_fetch_array($resultado)) {
            echo $fila['Precio'];
        }


        mysql_close();
    }