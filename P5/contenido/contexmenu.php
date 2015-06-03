<div id="ponencias">
    <h1>Ponencias relacionadas</h1>
    
    <?php
        switch($poncat){
            //Ingeniería del software
            case 'ing-software':
                echo '<h2>Ingeniería del software</h2>
                        <ul>';
                if($ponencia!='metod-agiles')
                    echo '<li><a href="index.php?cat=programa&poncat=ing-software&pon=metod-agiles">Metodologias ágiles</a></li>
                    ';               
                if($ponencia!='ifml')
                   echo '<li><a href="index.php?cat=programa&poncat=ing-software&pon=ifml">IFML</a></li>
                   ';               
                if($ponencia!='prince2')
                    echo '<li><a href="index.php?cat=programa&poncat=ing-software&pon=prince2">Prince2</a></li>
                    ';
                 break;
            //Informática gráfica
            case 'inf-grafica':
                echo '<h2>Informática gráfica</h2>
                        <ul>';
                if($ponencia!='visu-realismo')
                    echo '<li><a href="index.php?cat=programa&poncat=inf-grafica&pon=visu-realismo">Visualización y realismo</a></li>
                    ';
                if($ponencia!='digitalizacion')
                    echo '<li><a href="index.php?cat=programa&poncat=inf-grafica&pon=digitalizacion">Digitalizacion 3D</a></li>
                    ';
                if($ponencia!='realidad-aumentada')
                    echo '<li><a href="index.php?cat=programa&poncat=inf-grafica&pon=realidad-aumentada">Realidad aumentada</a></li>
                    ';
                break;
            //Bases de datos
            case 'bd':
                echo '<h2>Bases de datos</h2>
                        <ul>';
                if($ponencia!='bd-multidim')
                    echo '<li><a href="index.php?cat=programa&poncat=bd&pon=bd-multidim">Bases de datos multidimensionales</a></li>
                    ';
                if($ponencia!='bd-oo')
                    echo '<li><a href="index.php?cat=programa&poncat=bd&pon=bd-oo">Bases de datos orientada a objetos</a></li>
                    ';
                if($ponencia!='bd-distribuidas')
                    echo '<li><a href="index.php?cat=programa&poncat=bd&pon=bd-distribuidas">Bases de datos distribuidas</a></li>
                    ';
                break;
            //Compiladores
            case 'compiladores':
                echo '<h2>Compiladores</h2>
                        <ul>';
                if($ponencia!='procesadores-lenguaje')
                    echo '<li><a href="index.php?cat=programa&poncat=compiladores&pon=procesadores-lenguaje">Procesadores del lenguaje</a></li>
                    ';
                if($ponencia!='traductores')
                     echo '<li><a href="index.php?cat=programa&poncat=compiladores&pon=traductores">Traductores</a></li>
                    ';
                if($ponencia!='procesamiento-habla')
                    echo '<li><a href="index.php?cat=programa&poncat=compiladores&pon=procesamiento-habla">Procesamiento del habla</a></li>
                    ';
                break;
            //Sistemas operativos
            case 'so':
                echo '<h2>Sistemas operativos</h2>
                        <ul>';
                if($ponencia!='sist-windows')
                    echo '<li><a href="index.php?cat=programa&poncat=so&pon=sist-windows">Sistemas Windows</a></li>
                    ';
                if($ponencia!='sist-linux')
                    echo '<li><a href="index.php?cat=programa&poncat=so&pon=sist-linux">Sistemas Unix/Linux</a></li>
                    ';
                if($ponencia!='sist-mac')
                    echo '<li><a href="index.php?cat=programa&poncat=so&pon=sist-mac">Sistemas iOS/Mac</a></li>
                    ';
                break;
            //Sistemas complejos
            case 'sistemas-complejos':
                echo '<h2>Sistemas complejos</h2>
                        <ul>';
                if($ponencia!='programacion-paralela')
                    echo '<li><a href="index.php?cat=programa&poncat=sistemas-complejos&pon=programacion-paralela">Programación paralela</a></li>
                    ';
                if($ponencia!='sis-distribuidos')
                    echo '<li><a href="index.php?cat=programa&poncat=sistemas-complejos&pon=sis-distribuidos">Sistemas distribuidos</a></li>
                    ';
                if($ponencia!='sis-tiempo-real')
                    echo '<li><a href="index.php?cat=programa&poncat=sistemas-complejos&pon=sis-tiempo-real">Sistemas en tiempo real</a></li>
                    ';
                break;
            //Interfaces de usuario
            case 'interfaz-usu':
                echo '<h2>Interfaces de usuario</h2>
                        <ul>';
                if($ponencia!='interaccion-haptica')
                    echo '<li><a href="index.php?cat=programa&poncat=interfaz-usu&pon=interaccion-haptica">Interacción háptica</a></li>
                    ';
                if($ponencia!='wearables')
                    echo '<li><a href="index.php?cat=programa&poncat=interfaz-usu&pon=wearables">Wearables</a></li>
                    ';
                if($ponencia!='realidad-virtual')
                    echo '<li><a href="index.php?cat=programa&poncat=interfaz-usu&pon=realidad-virtual">Realidad virtual</a></li>
                    ';
                break;
        }   
    ?>
    </ul>
</div>