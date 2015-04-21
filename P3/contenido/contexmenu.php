<div id="ponencias">
    <h1>Ponencias relacionadas</h1>
    <ul>
    <?php
        switch($poncat){
            case 'ing-software':
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
            case 'inf-grafica':
                if($ponencia!='visu-realismo')
                    echo '<li><a href="index.php?cat=programa&poncat=inf-grafica&pon=visu-realismo">Visualizacion y realismo</a></li>
                    ';
                if($ponencia!='digitalizacion')
                    echo '<li><a href="index.php?cat=programa&poncat=inf-grafica&pon=digitalizacion">Digitalizacion 3D</a></li>
                    ';
                if($ponencia!='realidad-aumentada')
                    echo '<li><a href="index.php?cat=programa&poncat=inf-grafica&pon=realidad-aumentada">Realidad aumentada</a></li>
                    ';
                break;
        }   
    ?>
    </ul>
</div>