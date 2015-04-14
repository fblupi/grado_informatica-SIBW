<header id="cabecera">
    <img title="CEIIE" alt="cabecera" src="images/cabecera.png"/>
</header>
<nav id="menu">
    <?php switch($activo){
        case "home":
            echo '<ul>
                <li class="active"><a>Home</a></li>
                <li><a class="with-sub">Congreso</a>
                    <ul class="sub">
                        <li><a href="contenido/programa.html">Programa</a></li>
                        <li><a href="contenido/actividades.html">Actividades</a></li>
                    </ul>
                </li>
                <li><a class="with-sub">Sede</a>
                    <ul class="sub">
                        <li><a href="contenido/ciudad.html">Ciudad</a></li>
                        <li><a href="contenido/como-llegar.html">¿Cómo llegar?</a></li>
                    </ul>
                </li>
                <li><a href="contenido/patrocinadores.html">Patrocinadores</a></li>
                <li><a href="contenido/inscripcion.html">Inscripción</a></li>
                <li><a href="contenido/contacto.html">Contacto</a></li>
            </ul>';
            break;
    case "programa":
        echo '<ul>
                <li><a href="index.html">Home</a></li>
                <li class="active"><a class="with-sub">Congreso</a>
                    <ul class="sub">
                        <li class="sub-active"><a>Programa</a></li>
                        <li><a href="contenido/actividades.html">Actividades</a></li>
                    </ul>
                </li>
                <li><a class="with-sub">Sede</a>
                    <ul class="sub">
                        <li><a href="contenido/ciudad.html">Ciudad</a></li>
                        <li><a href="contenido/como-llegar.html">¿Cómo llegar?</a></li>
                    </ul>
                </li>
                <li><a href="contenido/patrocinadores.html">Patrocinadores</a></li>
                <li><a href="contenido/inscripcion.html">Inscripción</a></li>
                <li><a href="contenido/contacto.html">Contacto</a></li>
            </ul>';
    case 'actividades':
        echo '<ul>
                <li><a href="index.html">Home</a></li>
                <li class="active"><a class="with-sub">Congreso</a>
                    <ul class="sub">
                        <li><a href="contenido/programa.html">Programa</a></li>
                        <li class="sub-active"><a>Actividades</a></li>
                    </ul>
                </li>
                <li><a class="with-sub">Sede</a>
                    <ul class="sub">
                        <li><a href="contenido/ciudad.html">Ciudad</a></li>
                        <li><a href="contenido/como-llegar.html">¿Cómo llegar?</a></li>
                    </ul>
                </li>
                <li><a href="contenido/patrocinadores.html">Patrocinadores</a></li>
                <li><a href="contenido/inscripcion.html">Inscripción</a></li>
                <li><a href="contenido/contacto.html">Contacto</a></li>
            </ul>';
    case 'como-llegar':
        echo '<ul>
                <li><a href="index.html">Home</a></li>
                <li><a class="with-sub">Congreso</a>
                    <ul class="sub">
                        <li><a href="contenido/programa.html">Programa</a></li>
                        <li><a href="contenido/actividades.html">Actividades</a></li>
                    </ul>
                </li>
                <li class="active"><a class="with-sub">Sede</a>
                    <ul class="sub">
                        <li><a href="contenido/ciudad.html">Ciudad</a></li>
                        <li class="sub-active"><a>¿Cómo llegar?</a></li>
                    </ul>
                </li>
                <li><a href="contenido/patrocinadores.html">Patrocinadores</a></li>
                <li><a href="contenido/inscripcion.html">Inscripción</a></li>
                <li><a href="contenido/contacto.html">Contacto</a></li>
            </ul>';
    case 'ciudad':
        echo '<ul>
                <li><a href="index.html">Home</a></li>
                <li><a class="with-sub">Congreso</a>
                    <ul class="sub">
                        <li><a href="contenido/programa.html">Programa</a></li>
                        <li><a href="contenido/actividades.html">Actividades</a></li>
                    </ul>
                </li>
                <li class="active"><a class="with-sub">Sede</a>
                    <ul class="sub">
                        <li class="sub-active"><a>Ciudad</a></li>
                        <li><a href="contenido/como-llegar.html">¿Cómo llegar?</a></li>
                    </ul>
                </li>
                <li><a href="contenido/patrocinadores.html">Patrocinadores</a></li>
                <li><a href="contenido/inscripcion.html">Inscripción</a></li>
                <li><a href="contenido/contacto.html">Contacto</a></li>
            </ul>';
    case 'patrocinadores':
        echo '<ul>
                <li><a href="index.html">Home</a></li>
                <li><a class="with-sub">Congreso</a>
                    <ul class="sub">
                        <li><a href="contenido/programa.html">Programa</a></li>
                        <li><a href="contenido/actividades.html">Actividades</a></li>
                    </ul>
                </li>
                <li><a class="with-sub">Sede</a>
                    <ul class="sub">
                        <li><a href="contenido/ciudad.html">Ciudad</a></li>
                        <li><a href="contenido/como-llegar.html">¿Cómo llegar?</a></li>
                    </ul>
                </li>
                <li class="active"><a>Patrocinadores</a></li>
                <li><a href="contenido/inscripcion.html">Inscripción</a></li>
                <li><a href="contenido/contacto.html">Contacto</a></li>
            </ul>';
    case 'inscripcion':
        echo '<ul>
                <li><a href="index.html">Home</a></li>
                <li><a class="with-sub">Congreso</a>
                    <ul class="sub">
                        <li><a href="contenido/programa.html">Programa</a></li>
                        <li><a href="contenido/actividades.html">Actividades</a></li>
                    </ul>
                </li>
                <li><a class="with-sub">Sede</a>
                    <ul class="sub">
                        <li><a href="contenido/ciudad.html">Ciudad</a></li>
                        <li><a href="contenido/como-llegar.html">¿Cómo llegar?</a></li>
                    </ul>
                </li>
                <li><a href="contenido/patrocinadores.html">Patrocinadores</a></li>
                <li class="active"><a>Inscripción</a></li>
                <li><a href="contenido/contacto.html">Contacto</a></li>
            </ul>';
    case 'contacto';
        echo '<ul>
                <li><a href="index.html">Home</a></li>
                <li><a class="with-sub">Congreso</a>
                    <ul class="sub">
                        <li><a href="contenido/programa.html">Programa</a></li>
                        <li><a href="contenido/actividades.html">Actividades</a></li>
                    </ul>
                </li>
                <li><a class="with-sub">Sede</a>
                    <ul class="sub">
                        <li><a href="contenido/ciudad.html">Ciudad</a></li>
                        <li><a href="contenido/como-llegar.html">¿Cómo llegar?</a></li>
                    </ul>
                </li>
                <li><a href="contenido/patrocinadores.html">Patrocinadores</a></li>
                <li><a href="contenido/inscripcion.html">Inscripción</a></li>
                <li class="active"><a>Contacto</a></li>
            </ul>';
    
    default:
        echo 'Error en la carga';           

    }
    ?>
    
</nav>