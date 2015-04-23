<?php
    $ponencia=isset($_GET['pon']) ? $_GET['pon'] : '';
    switch($ponencia){
        //Ingeniería del software
        case 'metod-agiles':
            include 'ponencias/ingenieria-del-software/metodologias-agiles.php';
            break;
        case 'ifml':
            include 'ponencias/ingenieria-del-software/ifml.php';
            break;
        case 'prince2':
            include 'ponencias/ingenieria-del-software/prince2.php';
            break;
        //Informática gráfica
        case 'visu-realismo':
            include 'ponencias/informatica-grafica/visualizacion-y-realismo.php';
            break;
        case 'digitalizacion':
            include 'ponencias/informatica-grafica/digitalizacion-3d.php';
            break;
        case 'realidad-aumentada':
            include 'ponencias/informatica-grafica/realidad-aumentada.php';
            break;
        //Bases de datos
        case 'bd-distribuidas':
            include 'ponencias/bases-de-datos/bases-de-datos-distribuidas.php';
            break;
        case 'bd-multidim':
            include 'ponencias/bases-de-datos/bases-de-datos-multidimensionales.php';
            break;
        case 'bd-oo':
            include 'ponencias/bases-de-datos/bases-de-datos-orientadas-a-objetos.php';
            break;
        //Compiladores
        case 'procesadores-lenguaje':
            include 'ponencias/compiladores/procesadores-de-lenguajes.php';
            break;
        case 'traductores':
            include 'ponencias/compiladores/traductores.php';
            break;
        case 'procesamiento-habla':
            include 'ponencias/compiladores/procesamiento-de-habla.php';
            break;
        //Sistemas operativos
        case 'sist-windows':
            include 'ponencias/sistemas-operativos/sistemas-windows.php';
            break;
        case 'sist-linux':
            include 'ponencias/sistemas-operativos/sistemas-unix-linux.php';
            break;
        case 'sist-mac':
            include 'ponencias/sistemas-operativos/sistemas-ios-mac.php';
            break;
        //Sistemas complejos
        case 'programacion-paralela':
            include 'ponencias/sistemas-complejos/programacion-paralela.php';
            break;
        case 'sis-distribuidos':
            include 'ponencias/sistemas-complejos/sistemas-distribuidos.php';
            break;
        case 'sis-tiempo-real':
            include 'ponencias/sistemas-complejos/sistemas-en-tiempo-real.php';
            break;
        //Interfaces de usuario
        case 'interaccion-haptica':
            include 'ponencias/interfaces-de-usuario/interaccion-haptica.php';
            break;
        case 'wearables':
            include 'ponencias/interfaces-de-usuario/wearables.php';
            break;
        case 'realidad-virtual':
            include 'ponencias/interfaces-de-usuario/realidad-virtual.php';
            break;        
        default:
            include 'ponencias/tabla-ponencias.php';
    }
?>