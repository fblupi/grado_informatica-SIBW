<div id="content">
    <section>
        <?php

            $conexion = mysql_connect('localhost','root','macoy123') or exit('No se pudo conectar con el servidor');
            $abreDB = mysql_select_db('sibw_db',$conexion);
            if(!$abreDB){
                die('No se pudo abrir la base de datos.Error: '.mysql_error() );
            }

            $seleccion = "SELECT * FROM actividades";
            $resultado = mysql_query ($seleccion, $conexion);

            $numFilas = mysql_num_rows ($resultado);

            if($numFilas>0){
                while($fila = mysql_fetch_array ($resultado)){
                    echo '<article>';
                    echo '  <h1>'.$fila['Titulo'].'</h1>';
                    echo '   <img title="'.$fila['Foto_title'].'" alt="'.$fila['Foto_alt'].'"src="'.$fila['Foto_src'].'"/>';
                    $descripcion=explode(';',utf8_encode($fila['Descripcion']));

                    for($i=0;$i<count($descripcion);$i=$i+1)
                        echo '<p>'.$descripcion[$i].'</p>';
                    
                    echo '<p><a href="index.php?cat=actividades&act='.$fila['Nombre_act'].'">Leer más...</a></p>';

                    echo '</article>';
                }
            }
            mysql_close ($conexion);
        ?>

    </section>
</div> <!-- end content -->