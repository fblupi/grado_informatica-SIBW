<?php
    include '../contenido/comun/conexionDB.php';
    
    $cuota=$_GET['cuota'];
    
    $seleccion="SELECT ID_act,Titulo,Minifoto_src,Foto_title, Foto_alt,Precio FROM actividades";
    $resultado=mysql_query ($seleccion, $conexion);
    while($fila=mysql_fetch_array($resultado)) {
        $encontrado=false;
        $seleccionDefault="SELECT ID_act FROM cuota_actividad WHERE ID_cuota='$cuota'"; // Selecciona las actividades que se van a marcar
        $resultadoDefault=mysql_query ($seleccionDefault, $conexion);
        if(mysql_num_rows($resultadoDefault)>0){
            while($filaDefault=mysql_fetch_array($resultadoDefault) and !$encontrado) {
                if($filaDefault["ID_act"]==$fila["ID_act"]) {
                    $encontrado=true;
                }
            }
        }
        if($encontrado) {
            echo '<li class="actividades-form">';
            echo '<label for="'.$fila["ID_act"].'">'.$fila["Titulo"].'</label>';
            echo '<input type="checkbox" id="'.$fila["ID_act"].'" name="actividad[]" value="'.$fila["ID_act"].'" disabled="true" checked="true" />';
            echo '<div id="divpic-'.$fila["ID_act"].'"><img class="pic-actividad" id="pic-'.$fila["ID_act"].'" alt="'.$fila["Foto_alt"].'" title='.$fila["Foto_title"].'" src="'.$fila["Minifoto_src"].'"/></div>';
            echo '</li>';
        } else {
            echo '<li class="actividades-form">';
            echo '<label for="'.$fila["ID_act"].'">'.$fila["Titulo"].'</label>';
            echo '<input type="checkbox" id="'.$fila["ID_act"].'" name="actividad[]" value="'.$fila["ID_act"].'" onchange="actualizarFoto(this)"/>';
            echo '<div id="divpic-'.$fila["ID_act"].'"></div>';
            echo '</li>';
        }
    }  

    mysql_close();
?>