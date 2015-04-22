<?php
    $ponencia=isset($_GET['pon']) ? $_GET['pon'] : '';
    switch($ponencia){
        //Ingeniería del software
        case 'metod-agiles':
            include '/contenido/ponencias/ingenieria-del-software/metodologias-agiles.php';
            break;
        case 'ifml':
            include '/contenido/ponencias/ingenieria-del-software/ifml.php';
            break;
        case 'prince2':
            include '/contenido/ponencias/ingenieria-del-software/prince2.php';
            break;
        //Informática gráfica
        case 'visu-realismo':
            include '/contenido/ponencias/informatica-grafica/visualizacion-y-realismo.php';
            break;
        case 'digitalizacion':
            include '/contenido/ponencias/informatica-grafica/digitalizacion-3d.php';
            break;
        case 'realidad-aumentada':
            include '/contenido/ponencias/informatica-grafica/realidad-aumentada.php';
            break;
        //Bases de datos
        case 'bd-distribuidas':
            include '/contenido/ponencias/bases-de-datos/bases-de-datos-distribuidas.php';
            break;
        case 'bd-multidim':
            include '/contenido/ponencias/bases-de-datos/bases-de-datos-multidimensionales.php';
            break;
        case 'bd-oo':
            include '/contenido/ponencias/bases-de-datos/bases-de-datos-orientadas-a-objetos.php';
            break;
        //Compiladores
        case 'procesadores-lenguaje':
            include '/contenido/ponencias/compiladores/procesadores-de-lenguajes.php';
            break;
        case 'traductores':
            include '/contenido/ponencias/compiladores/traductores.php';
            break;
        case 'procesamiento-habla':
            include '/contenido/ponencias/compiladores/procesamiento-de-habla.php';
            break;
        //Sistemas operativos
        case 'sist-windows':
            include '/contenido/ponencias/sistemas-operativos/sistemas-windows.php';
            break;
        case 'sist-linux':
            include '/contenido/ponencias/sistemas-operativos/sistemas-unix-linux.php';
            break;
        case 'sist-mac':
            include '/contenido/ponencias/sistemas-operativos/sistemas-ios-mac.php';
            break;
        //Sistemas complejos
        case 'programacion-paralela':
            include '/contenido/ponencias/sistemas-complejos/programacion-paralela.php';
            break;
        case 'sis-distribuidos':
            include '/contenido/ponencias/sistemas-complejos/sistemas-distribuidos.php';
            break;
        case 'sis-tiempo-real':
            include '/contenido/ponencias/sistemas-complejos/sistemas-en-tiempo-real.php';
            break;
        //Interfaces de usuario
        case 'interaccion-haptica':
            include '/contenido/ponencias/interfaces-de-usuario/interaccion-haptica.php';
            break;
        case 'wearables':
            include '/contenido/ponencias/interfaces-de-usuario/wearables.php';
            break;
        case 'realidad-virtual':
            include '/contenido/ponencias/interfaces-de-usuario/realidad-virtual.php';
            break;        
        default:
            include 'contenido/ponencias/tabla-ponencias.php';
    }
?>