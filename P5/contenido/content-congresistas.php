<div id="content">
    <section>
        <article>
<?php
    if($_SESSION['privilegio']==1){
        include 'comun/conexionDB.php';
        if(isset($_GET['user'])){
            $email=$_GET['user'];
            echo '<h1>Datos de '.$email.'</h1>';

            $seleccion="SELECT * FROM usuarios WHERE usuarios.email='".$email."'";
            $resultado=mysql_query($seleccion);

            if(mysql_num_rows($resultado)>0){
                $seleccionActividades="SELECT Titulo FROM actividades, apuntados_actividad WHERE actividades.ID_act=apuntados_actividad.ID_act AND email='".$email."'";
                $resultadoActividades=mysql_query($seleccionActividades);
                $fila=mysql_fetch_array($resultado);
                echo '<ul>';
                echo '<li> Nombre: '.$fila['Nombre'].'</li>';
                echo '<li> Apellidos: '.$fila['Apellidos'].'</li>';
                if($fila['Centro']!=null)
                    echo '<li>Centro de trabajo: '.$fila['Centro'].'</li>';
                if($fila['Telefono']!=null)
                    echo '<li>Telefono: '.$fila['Telefono'].'</li>';
                echo '<li> Cuota: '.$fila['ID_cuota'].'</li>';
                if(mysql_num_rows($resultadoActividades)>0) {
                    echo '<li> Actividades:</li><ul>';
                    while($filaActividad=mysql_fetch_array($resultadoActividades)) {
                        echo '<li>'.$filaActividad['Titulo'].'</li>';
                    }
                    echo '</ul>';
                }
                echo '</ul>';
            }else{
                echo '<p>No existe un usuario con ese email</p>';
            }

        }
        /*
        echo '<h1>Congresistas registrados</h1>';
        $seleccion="SELECT * FROM usuarios";
        $resultado=mysql_query($seleccion);
        echo'<ul>';
        if(mysql_num_rows($resultado)>0){
            while($fila=mysql_fetch_array($resultado)){
                $email=$fila['email'];
                $nombre=$fila['Nombre'];
                $apellidos=$fila['Apellidos'];
                echo '<li><a href="index.php?cat=ver-congresistas&user='.$email.'">'.$apellidos.', '.$nombre.'</a></li>';
            }

        }
        */
        mysql_close($conexion);
    }else{
        echo '<p>No tienes permiso para acceder a esta página';
    }
?>
            <form class="contact_form">
            <h1>Buscar congresistas</h1>
                <ul>
                    <li>
                        <label for="nombre">Nombre: </label>
                        <input type="text" id="nombre" name="nombre" onkeyup="buscarCongresistas();">
                    </li>
                    <li>
                        <label for="apellidos">Apellidos: </label>
                        <input type="text" id="apellidos" name="apellidos" onkeyup="buscarCongresistas();">
                    </li>
                    <li>
                        <label for="email">Email: </label>
                        <input type="email" id="email" name="email" onkeyup="buscarCongresistas();">
                    </li>
                    <li>
                        <label for="telefono">Teléfono: </label>
                        <input type="tel" id="telefono" name="telefono" onkeyup="buscarCongresistas();">
                    </li>
                    <li>
                        <label for="centro">Centro: </label>
                        <input type="text" id="centro" name="centro" onkeyup="buscarCongresistas();">
                    </li>
                    <li>
                        <label for="cuota">Cuota: </label>
                        <select id="cuota" name="cuota" onchange="buscarCongresistas();">
                            <option value=""></option>
                            <?php
                                include 'comun/conexionDB.php';
                                $seleccion="SELECT ID_cuota, Nombre_cuota FROM cuotas";
                                $resultado = mysql_query ($seleccion, $conexion);
                                while($fila=mysql_fetch_array($resultado))
                                    echo'<option value="'.$fila["ID_cuota"].'">'.$fila["Nombre_cuota"].'</option>';
                            ?>
                        </select>
                    </li>
                </ul>
            </form>
            <h1>Resultados de búsqueda</h1>
            <div id="congresistas"></div>
        </article>
    </section>
</div> <!-- end content -->