<?php
    session_start();
    $usuario=$_SESSION['usuario'];

    $antiguaContrasena=$_POST['contra-actual'];
    $nuevaContrasena=$_POST['contra-nueva'];
    $nuevaContrasena2=$_POST['contra-nueva2'];

    include '../comun/conexionDB.php';

    $consulta="SELECT email,Contrasena,Nombre FROM usuarios WHERE usuarios.email='".$usuario."'";
    $resultado=mysql_query($consulta);

    if($fila=mysql_fetch_array($resultado)){
        if($fila['Contrasena']==SHA1($antiguaContrasena)){
            if(strcmp($nuevaContrasena,$nuevaContrasena2)==0){
                $hashContrasena=SHA1($nuevaContrasena);
                $modificaContrasena="UPDATE usuarios SET usuarios.contrasena='".$hashContrasena."' WHERE usuarios.email='".$usuario."'";
                $res=mysql_query($modificaContrasena);
                if($res)
                    // Enviar correo
                    // incluimos la clase PHPMailer
                    require_once('../../php/PHPMailer/class.phpmailer.php');
                    require_once('../../php/PHPMailer/class.smtp.php');
                    $email=$usuario;
                    $nombre=$fila['Nombre'];
                    $asunto = "[Mensaje de Web] Modificación de contraseña CEIIE";
                    $mensaje = "Hola, ".$nombre." <br/>Su antigua contraseña ha sido modificada. Su nueva contraseña es: ".$nuevaContrasena ;
                    // Envío
                    $mail = new PHPMailer(); // instancio un objeto de la clase PHPMailer
                    // para que funcionen caracteres de otros idiomas
                    $mail->CharSet = 'UTF-8';
                    $mail->Encoding = 'quoted-printable';
                    $mail->IsSMTP(); // indico a la clase que use SMTP
                    // Debo de hacer autenticación SMTP
                    $mail->SMTPAuth = true;
                    $mail->SMTPSecure = 'ssl';
                    $mail->Host = 'smtp.gmail.com'; // indico el servidor de Gmail para SMTP
                    $mail->Port = 465; // indico el puerto que usa Gmail
                    $mail->Username = 'ceiieetsiit@gmail.com'; // indico un usuario
                    $mail->Password = 'congreso2015'; // indico clave de un usuario de gmail
                    $mail->SetFrom('ceiieetsiit@gmail.com', 'CEIIE ETSIIT'); // defino el email y nombre del remitente del mensaje
                    $mail->AddReplyTo($email,$nombre); // defino la dirección de correo a la que se envía el mensaje
                    $mail->Subject = $asunto; // añado un asunto al mensaje
                    $mail->MsgHTML($mensaje); // inserto el texto del mensaje en formato HTML
                    $mail->AddAddress($email,$nombre); // la añado a la clase, indicando el nombre de la persona destinatario
                    if($mail->Send()){
                        header ('location: ../../index.php?cat=usuario&mod_error=success');
                    }else{
                        header ('location: ../../index.php?cat=usuario&mod_error=mail');
                    }
            }else{
                header ('location: ../../index.php?cat=usuario&mod_error=nueva-match');
            }
        }else{
            header ('location: ../../index.php?cat=usuario&mod_error=antigua-match');
        }
    }

    mysql_close($conexion);
?>