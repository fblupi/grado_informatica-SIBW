<?php
    session_start();
    include '../comun/conexionDB.php';

    $usuario=$_SESSION['usuario'];
    $actividad=$_GET['act'];
    echo 'Usuario: '.$usuario.' Act: '.$actividad;
    $borra_act="DELETE FROM apuntados_actividad WHERE apuntados_actividad.email='".$usuario."' and apuntados_actividad.ID_act='".$actividad."'";
    $res=mysql_query($borra_act,$conexion);

    header ('location: ../../index.php?cat=actividades&act='.$actividad);
?>