<header id="cabecera">
    <img title="CEIIE" alt="cabecera" src="images/cabecera.png"/>
</header>
<nav id="menu">
    <ul>
        <?php
            $categoria=isset($_GET['cat']) ? $_GET['cat'] : 'home';
            //Categoria HOME
            if($categoria=='home'){
                echo '<li class="active"><a>Home</a></li>';
            }else{
                echo '<li><a href="index.php?cat=home">Home</a></li>';
            }
            //Categoria PROGRAMA o ACTIVIDADES
            if($categoria=='programa' || $categoria=='actividades'){
                echo'<li class="active"><a class="with-sub">Congreso</a>
                        <ul class="sub">
                            <li><a href="index.php?cat=programa">Programa</a></li>
                            <li><a href="index.php?cat=actividades">Actividades</a></li>
                        </ul>
                    </li>';            
            }else{
                echo'<li><a class="with-sub">Congreso</a>
                <ul class="sub">
                    <li><a href="index.php?cat=programa">Programa</a></li>
                    <li><a href="index.php?cat=actividades">Actividades</a></li>
                </ul>
            </li>';
            }
            //Categoria CIUDAD o COMO LLEGAR
            if($categoria=='ciudad' || $categoria=='como-llegar'){
                echo '<li class="active"><a class="with-sub">Sede</a>
                        <ul class="sub">
                            <li><a href="index.php?cat=ciudad">Ciudad</a></li>
                            <li><a href="index.php?cat=como-llegar">¿Cómo llegar?</a></li>
                        </ul>
                    </li>';            
            }else{
                echo '<li><a class="with-sub">Sede</a>
                <ul class="sub">
                    <li><a href="index.php?cat=ciudad">Ciudad</a></li>
                    <li><a href="index.php?cat=como-llegar">¿Cómo llegar?</a></li>
                </ul>
            </li>';
            }
            //Categoria PATROCINADORES
            if($categoria=='patrocinadores'){
                echo '<li class="active"><a>Patrocinadores</a></li>';
            }else{
                echo '<li><a href="index.php?cat=patrocinadores">Patrocinadores</a></li>';
            }
            //Categoria INSCRIPCION
            if($categoria=='inscripcion'){
                echo '<li class="active"><a>Inscripción</a></li>';
            }else{
                echo '<li><a href="index.php?cat=inscripcion">Inscripción</a></li>';
            }
            //Categoria CONTACTO
            if($categoria=='contacto'){
                echo '<li class="active"><a>Contacto</a></li>';
            }else{
                echo '<li><a href="index.php?cat=contacto">Contacto</a></li>';
            }

        ?>  
        
    </ul>
    
</nav>