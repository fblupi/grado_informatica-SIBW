<?php
    include '../contenido/comun/conexionDB.php';
    
    $nombre = isset($_GET['nombre']) ? $_GET['nombre'] : '';
    $apellidos = isset($_GET['apellidos']) ? $_GET['apellidos'] : '';
    $cuota = isset($_GET['cuota']) ? $_GET['cuota'] : '';
    $email = isset($_GET['email']) ? $_GET['email'] : '';
    $telefono = isset($_GET['telefono']) ? $_GET['telefono'] : '';
    $centro = isset($_GET['centro']) ? $_GET['centro'] : '';
    
    if($nombre=='' && $apellidos=='' && $cuota=='' && $email=='' && $telefono=='' && $centro=='') {
	   $resultado=null;
    } else {
        if ($telefono=='' and $centro=='') {
            $seleccion="SELECT Nombre, Apellidos, email FROM usuarios WHERE Nombre LIKE '%".$nombre."%' and Apellidos LIKE '%".$apellidos."%' and ID_Cuota LIKE '%".$cuota."%' and email LIKE '%".$email."%' and (Telefono LIKE '%".$telefono."%' or Telefono IS NULL) and (Centro LIKE '%".$centro."%' or Centro IS NULL) and Tipo=0";
        } else if ($telefono=='' and $centro!='') {
            $seleccion="SELECT Nombre, Apellidos, email FROM usuarios WHERE Nombre LIKE '%".$nombre."%' and Apellidos LIKE '%".$apellidos."%' and ID_Cuota LIKE '%".$cuota."%' and email LIKE '%".$email."%' and (Telefono LIKE '%".$telefono."%' or Telefono IS NULL) and Centro LIKE '%".$centro."%' and Tipo=0";
        } else if ($telefono!='' and $centro=='') {
            $seleccion="SELECT Nombre, Apellidos, email FROM usuarios WHERE Nombre LIKE '%".$nombre."%' and Apellidos LIKE '%".$apellidos."%' and ID_Cuota LIKE '%".$cuota."%' and email LIKE '%".$email."%' and Telefono LIKE '%".$telefono."%' and (Centro LIKE '%".$centro."%' or Centro IS NULL) and Tipo=0";
        } else {
            $seleccion="SELECT Nombre, Apellidos, email FROM usuarios WHERE Nombre LIKE '%".$nombre."%' and Apellidos LIKE '%".$apellidos."%' and ID_Cuota LIKE '%".$cuota."%' and email LIKE '%".$email."%' and Telefono LIKE '%".$telefono."%' and Centro LIKE '%".$centro."%' and Tipo=0";
        }
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
        echo'</ul>';
    }
    mysql_close($conexion);
 ?>