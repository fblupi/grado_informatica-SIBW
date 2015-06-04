<?php
    include '../contenido/comun/conexionDB.php';
    
    $cuota=$_GET['cuota'];
    
    $seleccion="SELECT ID_act,Titulo,Minifoto_src,Foto_title, Foto_alt FROM actividades";
    $resultado=mysql_query ($seleccion, $conexion);
    while($fila=mysql_fetch_array($resultado)) {
        echo '<li class="actividades-form">';
        echo '<label for="'.$fila["ID_act"].'">'.$fila["Titulo"].'</label>';
        echo '<input type="checkbox" id="'.$fila["ID_act"].'" name="actividad[]" value="'.$fila["ID_act"].'"/>';
        echo '<img class="pic-actividad" id="pic-'.$fila["ID_act"].'" alt="'.$fila["Foto_alt"].'" title='.$fila["Foto_title"].'" src="'.$fila["Minifoto_src"].'"/>';
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
            echo '  marcar('.$actividad.');';
            echo '</script>';
        }
    }
    
    mysql_close();
?>