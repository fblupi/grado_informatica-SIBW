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

        }else{
            echo 'alert("Contraseña incorrecta.");';
        }
    }else{
        alert("Usuario no encontrado.");
    }
    mysql_close($conexion);

    header('location:' . getenv('HTTP_REFERER'));
?>