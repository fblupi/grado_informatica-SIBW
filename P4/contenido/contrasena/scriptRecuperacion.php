<?php
    // incluimos la clase PHPMailer
    require_once('../../php/PHPMailer/class.phpmailer.php');
    require_once('../../php/PHPMailer/class.smtp.php');

    //Obtenemos el email enviado en el formulario
    $usuario=$_POST['email'];

    //Realizamos una consulta para obtener los datos
    include '../comun/conexionDB.php';

    $consulta="SELECT * FROM usuarios WHERE usuarios.email='".$usuario."'";
    $resultado=mysql_query($consulta,$conexion);


    //Comprobamos si el email esta en la base de datos
    if(mysql_num_rows($resultado)>0){
        $fila=mysql_fetch_array($resultado);
        $nombre=$fila['Nombre'];
        //Creamos una nueva contraseña
        $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        $nuevaContrasena = "";
        for($i=0;$i<10;$i++) {
            $nuevaContrasena .= substr($str,rand(0,62),1);
        }
        $hashContrasena=SHA1($nuevaContrasena);
        $modificaContrasena="UPDATE usuarios SET usuarios.contrasena='".$hashContrasena."' WHERE usuarios.email='".$usuario."'";
        $res=mysql_query($modificaContrasena,$conexion);
        //Si se ha modificado la contraseña correctamente
        if($res){
            // Completamos los datos
            $email=$usuario;
            $asunto = "Recuperación de contraseña CEIIE";
            $mensaje = "Hola ".$nombre.": <br/> Su antigua contraseña ha sido modificada. Su nueva contraseña es: ".$nuevaContrasena."<br/> Le recomendamos modificar esta contraseña en su panel de control." ;

            // Primer envío
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
                header('location: ../../index.php?cat=olvido-contra&olv_error=success');
            }else{
                header('location: ../../index.php?cat=olvido-contra&olv_error=mail');
            }
        }

    }else{
        header('location: ../../index.php?cat=olvido-contra&olv_error=no-user');
    }



    /*

    // Primer envío
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
    $mail->AddReplyTo('ceiieetsiit@gmail.com', 'CEIIE ETSIIT'); // defino la dirección de correo a la que se envía el mensaje
    $mail->Subject = '[Mensaje de Web] '.$asunto; // añado un asunto al mensaje
    $mail->MsgHTML($nombre.' con email '.$email.' ha enviado el siguiente mensaje:<br/>'.$mensaje); // inserto el texto del mensaje en formato HTML
    $mail->AddAddress('ceiieetsiit@gmail.com', 'CEIIE ETSIIT'); // la añado a la clase, indicando el nombre de la persona destinatario

    // Se envía el primer mensaje
    if(!$mail->Send()) {
        echo '<script type="text/javascript">alert("Error al enviar");</script>';
    } else { // Si se ha enviado el primer mensaje, se envía el segundo confirmando al usuario que lo ha enviado

        // Segundo envío: al mail de la web
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
        $mail->Subject = '[Mensaje de Web] '.$asunto; // añado un asunto al mensaje
        $mail->MsgHTML('El mensaje correspondiente ha sido enviado al mail de contacto de CEIIE:<br/>'.$mensaje); // inserto el texto del mensaje en formato HTML
        $mail->AddAddress($email,$nombre); // la añado a la clase, indicando el nombre de la persona destinatario

        // Se envía el segundo mensaje
        if($mail->Send()) {
            echo
            '<script type="text/javascript">location.href="../index.php?cat=contacto";alert("Mensaje enviado correctamente");</script>';
        } else {
            echo
            '<script type="text/javascript">alert("Error al enviar");</script>';
        }
    }
    */

?>