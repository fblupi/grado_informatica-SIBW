<?php
    include '../contenido/comun/conexionDB.php';
    
    $actividad=$_GET['actividad'];
    
    $seleccion="SELECT ID_act,Minifoto_src,Foto_title, Foto_alt FROM actividades WHERE ID_act='$actividad'";
    $resultado=mysql_query ($seleccion, $conexion);
    $fila=mysql_fetch_array($resultado);
    echo '<img class="pic-actividad" id="pic-'.$fila["ID_act"].'" alt="'.$fila["Foto_alt"].'" title='.$fila["Foto_title"].'" src="'.$fila["Minifoto_src"].'"/>';
    
    mysql_close();
?>