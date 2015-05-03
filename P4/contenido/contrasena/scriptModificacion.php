<?php
    session_start();
    $usuario=$_SESSION['usuario'];

    $antiguaContrasena=$_POST['contra-actual'];
    $nuevaContrasena=$_POST['contra-nueva'];
    $nuevaContrasena2=$_POST['contra-nueva2'];

    include '../comun/conexionDB.php';

    $consulta="SELECT email,Contrasena FROM usuarios WHERE usuarios.email='".$usuario."'";
    $resultado=mysql_query($consulta);

    if($fila=mysql_fetch_array($resultado)){
        if($fila['Contrasena']==SHA1($antiguaContrasena)){
            if(strcmp($nuevaContrasena,$nuevaContrasena2)==0){
                $hashContrasena=SHA1($nuevaContrasena);
                $modificaContrasena="UPDATE usuarios SET usuarios.contrasena='".$hashContrasena."' WHERE usuarios.email='".$usuario."'";
                $res=mysql_query($modificaContrasena);
                if($res)
                    header ('location: ../../index.php?cat=usuario&mod_error=success');
            }else{
                header ('location: ../../index.php?cat=usuario&mod_error=nueva-match');
            }
        }else{
            header ('location: ../../index.php?cat=usuario&mod_error=antigua-match');
        }
    }