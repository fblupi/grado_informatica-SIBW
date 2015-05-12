<div id="content">
    <section>
        <article>
            <?php
            if($_SESSION['privilegio']==1) {
                include 'comun/conexionDB.php';

                $cuota=$_GET['cuota'];

                $resultado=mysql_query("SELECT * FROM cuotas WHERE ID_cuota='$cuota'");


                $fila=mysql_fetch_array($resultado);

                echo '<h1>Panel de edicion cuota '.$fila['Nombre_cuota'].' </h1>'; ?>

                <form  id="formEditCuota" class="contact_form" action="contenido/edicion/scriptEditarCuota.php" method="post" name="contact_form">

                    <ul>
                        <li>
                            <label for="id">Título:</label>
                            <input type="text" name="id" value="<?php echo $cuota; ?>" readonly/>
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
                            <button class="submit">Editar</button>
                        </li>
                    </ul>
                </form>




           <?php }?>
        </article>
    </section>
</div> <!-- end content -->