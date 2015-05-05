<div id="content">
    <section>
        <article>
            <?php

                $conexion = mysql_connect('localhost','root','macoy123') or exit('No se pudo conectar con el servidor');
                $abreDB = mysql_select_db('sibw_db',$conexion);
                if(!$abreDB){
                    die('No se pudo abrir la base de datos.Error: '.mysql_error() );
                }

                $seleccion = "SELECT * FROM actividades WHERE ID_act='".$actividad."'";
                $resultado = mysql_query ($seleccion, $conexion);

                if($resultado){
                    $numFilas = mysql_num_rows($resultado);

                    if($numFilas>0) {
                        while ($fila = mysql_fetch_array($resultado)) {
                            //Titulo
                            echo '<h1>' . $fila['Titulo'] . '</h1>';

                            //Imagen
                            echo '   <img title="' . $fila['Foto_title'] . '" alt="' . $fila['Foto_alt'] . '"src="' . $fila['Foto_src'] . '"/>';

                            //Descripcion
                            echo '<h2>Descripción</h2>';
                            $descripcion = explode(';', utf8_encode($fila['Descripcion']));
                            for ($i = 0; $i < count($descripcion); $i = $i + 1)
                                echo '<p>' . $descripcion[$i] . '</p>';

                            //Detalles
                            echo '<h2>Detalles</h2>';
                            $detalles = explode(';', utf8_encode($fila['Detalles']));
                            echo '<ul>';
                            for ($i = 0; $i < count($detalles); $i = $i + 1)
                                echo '<li>' . $detalles[$i] . '</li>';
                            echo '</ul>';
                            //Fecha
                            echo '<h2>Fecha</h2>';
                            echo '<ul>';
                            echo '<li> Fecha: ' . date('d M Y',strtotime($fila['Fecha'])). '</li>';
                            echo '<li> Hora salida: ' . date('G:m ',strtotime($fila['Hora_salida'])) . '</li>';
                            if ($fila['Hora_llegada'] != null)
                                echo '<li> Hora llegada: ' . date('G:m ',strtotime($fila['Hora_llegada'])) . '</li>';
                            echo '</ul>';

                            //Precio
                            echo '<h2>Precio</h2>';
                            echo $fila['Precio'] . '€ (IVA Incluido)';

                            //Boton apuntarse
                            if(isset($_SESSION['usuario'])){
                                $usuario=$_SESSION['usuario'];
                                $comprueba_act="SELECT * FROM apuntados_actividad WHERE apuntados_actividad.email='".$usuario."' and apuntados_actividad.ID_act='".$actividad."'";
                                $res=mysql_query($comprueba_act,$conexion);
                                if(mysql_num_rows($res)>0){
                                    echo '<form class="contact_form" action="contenido/actividades/scriptDesapuntarse.php?act='.$actividad.'" method="post">';
                                    echo '        <button class="submit" type="submit">Desapuntarse</button>';
                                    echo '</form>';
                                }else{
                                    echo '<form class="contact_form" action="contenido/actividades/scriptApuntarse.php?act='.$actividad.'" method="post">';
                                    echo '        <button class="submit" type="submit">Apuntarse</button>';
                                    echo '</form>';

                                }

                            }


                        }
                    }
                }
                mysql_close($conexion);
            ?> 
            <p class="go-back"><a href="index.php?cat=actividades">Volver a actividades</a></p>
        </article>
    </section>
</div> <!-- end content -->