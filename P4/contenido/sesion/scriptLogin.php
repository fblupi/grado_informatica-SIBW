<?php
    include '../comun/conexionDB.php';
    $email=$_POST['email'];
    $contrasena=$_POST['contrasena'];

    $seleccion="SELECT * FROM usuarios WHERE usuarios.email='".$email."'";
    $resultado=mysql_query($seleccion,$conexion);

    if($fila=mysql_fetch_array($resultado)){
        if($fila['Contrasena']==SHA1($contrasena)) {
            session_start();
            $_SESSION['usuario'] = $email;
            $_SESSION['privilegio']=$fila['Tipo'];
            mysql_close($conexion);
            header('location:' . getenv('HTTP_REFERER'));
        }else{
            mysql_close($conexion);
            header ('location: ../../index.php?cat=home&login_error=no-contra');
        }
    }else{
        mysql_close($conexion);
        header ('location: ../../index.php?cat=home&login_error=no-email');
    }



?>