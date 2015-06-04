<?php
    include '../contenido/comun/conexionDB.php';
    
    $cuota=$_GET['cuota'];
    
    $seleccion="SELECT ID_act,Titulo,Minifoto_src,Foto_title, Foto_alt FROM actividades";
    $resultado=mysql_query ($seleccion, $conexion);
    while($fila=mysql_fetch_array($resultado)) {
        echo '<li class="actividades-form">';
        echo '<label for="'.$fila["ID_act"].'">'.$fila["Titulo"].'</label>';
        echo '<input type="checkbox" id="'.$fila["ID_act"].'" name="actividad[]" value="'.$fila["ID_act"].'" onchange="actualizarFoto(\''.$fila["ID_act"].'\')"/>';
        echo '<div id="divpic-'.$fila["ID_act"].'"></div>';
        echo '</li>';
    }    
    
    $seleccion="SELECT ID_act FROM cuota_actividad WHERE ID_cuota='$cuota'"; // Selecciona las actividades que se van a marcar
    $resultado=mysql_query ($seleccion, $conexion);
    if(mysql_num_rows($resultado)>0){
        while($fila=mysql_fetch_array($resultado)) {
            $actividad=$fila["ID_act"];
            //echo '<p>Meto '.$actividad.'</p>';
            echo '<script type="text/javascript">';
            echo '  alert("Lanzo script");';
            echo '  marcar(\''.$actividad.'\');';
            echo '  actualizarFoto(\''.$actividad.'\');';
            echo '</script>';
        }
    }
    
    mysql_close();
?>