<?php
    if(isset($_GET['act'])){
        $actividad=$_GET['act'];
        include 'actividades/carga-actividad.php';
    }else{
        include'actividades/actividades.php';
    }

?>