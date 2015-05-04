<?php
    $categoria=isset($_GET['cat']) ? $_GET['cat'] : '';
    
    switch($categoria){
        case 'home':
            include 'content-index.php';
            break;
        case 'programa':
            include 'content-programa.php';
            break;
        case 'actividades':
            include 'content-actividades.php';
            break;
        case 'ciudad':
            include 'content-ciudad.php';
            break;
        case 'como-llegar':
            include 'content-como-llegar.php';
            break;
        case 'patrocinadores':
            include 'content-patrocinadores.php';
            break;
        case 'inscripcion':
            include 'content-inscripcion.php';
            break;
        case 'contacto':
            include 'content-contacto.php';
            break;
        case 'usuario':
            include 'content-usuario.php';
            break;
        case 'olvido-contra':
            include 'content-olvido-contra.php';
            break;
        case 'ver-congresistas':
            include 'content-congresistas.php';
            break;
        default:
            include 'content-index.php';
            break;
    }
?>
