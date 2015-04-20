<?php
    $actividad=isset($_GET['act']) ? $_GET['act'] : '';
    switch($actividad){
        case 'alhambra':
        case 'sierra-nevada':
                include('contenido/actividades/carga-actividad.php');
                break;
        default:            
            include('contenido/actividades/actividades.php');
    }
?>