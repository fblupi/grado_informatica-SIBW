<div id="content">
    <section>
        <article>
<?php
    if($_SESSION['privilegio']==1){ //¿Solo usuario administrado o uso columna tipo?
        include 'comun/conexionDB.php';
        if(isset($_GET['user'])){
            $email=$_GET['user'];
            echo '<h1>Datos de '.$email.'</h1>';
            //include 'comun/conexionDB.php';

            $seleccion="SELECT * FROM usuarios WHERE usuarios.email='".$email."'";
            $resultado=mysql_query($seleccion);

            if(mysql_num_rows($resultado)>0){
                $fila=mysql_fetch_array($resultado);
                echo '<ul>';
                echo '<li> Nombre: '.$fila['Nombre'].'</li>';
                echo '<li> Apellidos: '.$fila['Apellidos'].'</li>';
                if($fila['Telefono']!=null)
                    echo '<li>Telefono: '.$fila['Telefono'].'</li>';
                echo '<li> Cuota: '.$fila['ID_cuota'].'</li>';
                echo '</ul>';
            }else{
                echo '<p>No existe un usuario con ese email</p>';
            }

        }
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
        mysql_close($conexion);
    }else{
        echo '<p>No tienes permiso para acceder a esta página';
    }


?>
</article>
    </section>
</div> <!-- end content -->