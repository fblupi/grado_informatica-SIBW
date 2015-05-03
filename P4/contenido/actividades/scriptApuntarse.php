<?php
    session_start();
    include '../comun/conexionDB.php';

    $usuario=$_SESSION['usuario'];
    $actividad=$_GET['act'];

    $inserta_act="INSERT INTO apuntados_actividad (email,ID_act) VALUES('$usuario','$actividad')";
    $res=mysql_query($inserta_act,$conexion);

    header ('location: ../../index.php?cat=actividades&act='.$actividad);