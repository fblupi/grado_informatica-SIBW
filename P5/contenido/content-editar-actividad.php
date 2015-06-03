<div id="content">
    <section>
        <article>
            <?php
            if($_SESSION['privilegio']==1) {
                include 'comun/conexionDB.php';

                $actividad=$_GET['act'];

                $resultado=mysql_query("SELECT * FROM actividades WHERE ID_act='$actividad'");


                $fila=mysql_fetch_array($resultado);

                echo '<h1>Panel de edicion actividad '.$fila['ID_act'].' </h1>'; ?>

                <form  id="formEditActividad" class="contact_form" action="contenido/edicion/scriptEditarActividad.php" method="post" name="contact_form">

                    <ul>
                        <li>
                            <label for="id">ID:</label>
                            <input type="text" name="id" value="<?php echo $actividad; ?>" readonly/>
                        </li>
                        <li>
                            <label for="titulo">Título:</label>
                            <input type="text" name="titulo" value="<?php echo $fila['Titulo']; ?>" required />
                        </li>
                        <li>
                            <label for="fecha">Fecha:</label>
                            <input type="date" name="fecha" value="<?php echo $fila['Fecha']; ?>" required />
                        </li>
                        <li>
                            <label for="hora_salida">Hora salida:</label>
                            <input type="time" name="hora_salida" value="<?php echo $fila['Hora_salida']; ?>" required />
                        </li>
                        <li>
                            <label for="hora_llegada">Hora llegada:</label>
                            <input type="time" name="hora_llegada" value="<?php echo $fila['Hora_llegada']; ?>"  />
                        </li>
                        <li>
                            <label for="precio">Precio:</label>
                            <input pattern="[0-9]+" type="text" name="precio" value="<?php echo $fila['Precio']; ?>" required/>
                        </li>
                        <li>
                            <label for="descripcion">Descripción:</label>
                            <textarea type="textarea" name="descripcion" cols="40" rows="6" required><?php echo $fila['Descripcion']; ?></textarea>
                        </li>
                        <li>
                            <label for="detalles">Detalles:</label>
                            <textarea type="textarea" name="detalles" cols="40" rows="6" required><?php echo $fila['Detalles']; ?></textarea>
                        </li>
                        <li>
                            <label for="foto_src">Foto src:</label>
                            <input type="text" name="foto_src" value="<?php echo $fila['Foto_src']; ?>" required />
                        </li>
                        <li>
                            <label for="foto_alt">Foto alt:</label>
                            <input type="text" name="foto_alt" value="<?php echo $fila['Foto_alt']; ?>" required />
                        </li>
                        <li>
                            <label for="foto_title">Foto title:</label>
                            <input type="text" name="foto_title" value="<?php echo $fila['Foto_title']; ?>" required />
                        </li>
                        <li>
                            <button class="submit">Editar</button>
                        </li>
                    </ul>
                </form>




            <?php }?>
        </article>
    </section>
</div> <!-- end content -->