<?php
    $ponencia=isset($_GET['pon']) ? $_GET['pon'] : '';
    switch($ponencia){
        case 'metod-agiles':
            include '/contenido/ponencias/ingenieria-del-software/metodologias-agiles.php';
            break;
        case 'ifml':
            include '/contenido/ponencias/ingenieria-del-software/ifml.php';
            break;
        case 'prince2':
            include '/contenido/ponencias/ingenieria-del-software/prince2.php';
            break;
        case 'visu-realismo':
            include '/contenido/ponencias/informatica-grafica/visualizacion-y-realismo.php';
            break;
        case 'digitalizacion':
            include '/contenido/ponencias/informatica-grafica/digitalizacion-3d.php';
            break;
        case 'realidad-aumentada':
            include '/contenido/ponencias/informatica-grafica/realidad-aumentada.php';
            break;
        default:
            include 'contenido/ponencias/tabla-ponencias.php';
    }
?>