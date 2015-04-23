<?php
    $actividad=isset($_GET['act']) ? $_GET['act'] : '';
    switch($actividad){
        case 'alhambra':
        case 'sierra-nevada':
                include('actividades/carga-actividad.php');
                break;
        default:            
            include('actividades/actividades.php');
    }
?>