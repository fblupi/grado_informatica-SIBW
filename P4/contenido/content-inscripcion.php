<div id="content">
    <section>
        <?php if(isset($_SESSION['usuario'])) {?>
            <p>Debes cerrar sesión para poder inscribirte.</p>
        <?php }else{ ?>
        <form class="contact_form" action="contenido/inscripcion/scriptInscripcion.php" method="post" name="inscripcion_form" >
            <h1>Formulario de Inscripción</h1>
            <ul>
                <li>
                    <label for="name">Nombre:</label>
                    <input type="text" name="nombre" placeholder="Alan" maxlength="20" required/>
                </li>
                <li>
                    <label for="name">Apellidos:</label>
                    <input type="text" name="apellidos" placeholder="Turing" maxlength="20" required/>
                </li>
                <li>
                    <label for="name">Centro de trabajo:</label>
                    <input type="text" name="centro" placeholder="Universidad de Granada" maxlength="20"/>
                </li>
                <li>
                    <label for="subject">Teléfono:</label>
                    <input type="text" name="telefono" placeholder="612345678" maxlength="12"/>
                </li>
                <li>
                    <label for="email">Email:</label>
                    <input type="email" name="email" placeholder="turing@gmail.com" maxlength="40" required/>
                </li>
                <li>
                    <label for="contrasena">Contraseña:</label>
                    <input type="password" name="contrasena" required/>
                </li>

                <li>
                    <label for="type">Cuota: </label>
                    <select name="cuota" required>
                        <?php
                            include 'comun/conexionDB.php';
                            $seleccion="SELECT ID_cuota,Nombre_cuota FROM cuotas";
                            $resultado = mysql_query ($seleccion, $conexion);

                            while($fila=mysql_fetch_array($resultado))
                                echo'<option value="'.$fila["ID_cuota"].'">'.$fila["Nombre_cuota"].'</option>';

                        ?>

                    </select>
                </li>
                <li>
                    <button class="submit" type="submit">Enviar</button>
                </li>
            </ul>
        </form>
        <?php
        if(isset($_GET['reg_error'])){
            if($_GET['reg_error']=='error'){
                echo '<div class=error> <p>Ha habido un error en el registro.</p> </div>';
            }else{
                echo '<div class=success><p>Registro completado con éxito.</p> </div>';
            }

        }
        ?>
        <article>
            <h1>Lista de precios</h1>
            <?php
                echo '<ul>';
                $selec_cuotas="SELECT Nombre_cuota, Precio, Descripcion FROM cuotas";
                $res=mysql_query($selec_cuotas,$conexion);
                while($fila=mysql_fetch_array($res))
                    echo '<li>'.$fila['Nombre_cuota'].': '.$fila['Precio'].'€ ('.$fila['Descripcion'].')</li>';
                echo '</ul>';

            ?>

        </article>
        <?php } ?>
    </section>
</div> <!-- end content -->