<div id="content">
    <section>
<?php if(isset($_SESSION['usuario'])){?>
    <h1>Panel de control</h1>
    <article>
    <h2>Mis actividades</h2>
    <?php
        include 'comun/conexionDB.php';
        $usuario=$_SESSION['usuario'];
        $seleccion="SELECT * FROM apuntados_actividad WHERE apuntados_actividad.email='".$usuario."'";
        $resultado=mysql_query($seleccion,$conexion);

        $precio_total=0;
        while($fila=mysql_fetch_array($resultado)){
            $select_actividad="SELECT ID_act,Titulo,Precio FROM actividades WHERE actividades.ID_act='".$fila['ID_act']."'";
            $res=mysql_query($select_actividad);
            echo '<ul>';
            if($act=mysql_fetch_array($res)){
                echo '<li><a href="index.php?cat=actividades&act='.$act['ID_act'].'">'.$act['Titulo'].'</a> '.$act['Precio'].'€</li>';
                $precio_total+=$act['Precio'];
            }
            echo '</ul>';
        }

        mysql_close($conexion);

        echo '<p><b>Total: </b>'.$precio_total.'€</p>';

        echo '</article>'; ?>

        <article>
            <h2>Modificacion de contraseña</h2>
            <form class="contact_form" action="contenido/contrasena/scriptModificacion.php" method="post" name="recuperacion_form">
                <ul>
                    <li>
                        <label for="contra-actual">Contraseña actual:</label>
                        <input type="password" name="contra-actual"  required/>
                    </li>
                    <li>
                        <label for="contra-nuev">Contraseña nueva:</label>
                        <input type="password" name="contra-nueva"  required/>
                    </li>
                    <li>
                        <label for="contra-nueva2">Contraseña nueva:</label>
                        <input type="password" name="contra-nueva2"  required/>
                    </li>
                    <li>
                        <button class="submit" type="submit">Modificar contraseña</button>
                    </li>
                </ul>
            </form>

            <?php if(isset($_GET['mod_error'])){
                $error=$_GET['mod_error'];
                switch($error){
                    case 'success':
                        echo '<div class="success"><p>Contraseña modificada con éxito.</p></div>';
                        break;
                    case 'nueva-match':
                        echo '<div class="error"><p>Las contraseñas no coinciden.</p></div>';
                        break;
                    case 'antigua-match':
                        echo '<div class="error"><p>Su contraseña no es correcta.</p></div>';
                        break;
                    case 'mail':
                        echo '<div class="error"><p>No se ha podido enviar el email.</p></div>';
                        break;
                }


            } ?>
        </article>
<?php }else{?>
    <p>No has iniciado sesión.</p>
<?php } ?>
        </section>
</div>