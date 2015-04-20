<?php
    $categoria=isset($_GET['cat']) ? $_GET['cat'] : '';
    
    switch($categoria){
        case 'home':
            include 'contenido/content-index.php';
            break;
        case 'programa':
            include 'contenido/content-programa.php';
            break;
        case 'actividades':
            include 'contenido/content-actividades.php';
            break;
        case 'ciudad':
            include 'contenido/content-ciudad.php';
            break;
        case 'como-llegar':
            include 'contenido/content-como-llegar.php';
            break;
        case 'patrocinadores':
            include 'contenido/content-patrocinadores.php';
            break;
        case 'inscripcion':
            include 'contenido/content-inscripcion.php';
            break;
        case 'contacto':
            include 'contenido/content-contacto.php';
            break;        
        default:
            include 'contenido/content-index.php';
            break;
    }
?>
