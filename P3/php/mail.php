<?php
    // incluimos la clase PHPMailer
    require_once('PHPMailer/class.phpmailer.php'); 
    require_once('PHPMailer/class.smtp.php');

    // extraemos los datos
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $asunto = $_POST['asunto'];
    $mensaje = $_POST['mensaje'];

    // Primer envío: al que envía el mensaje
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
    $address = $email; // indico destinatario
    $mail->AddAddress($address,$nombre); // la añado a la clase, indicando el nombre de la persona destinatario
    // envío el mensaje, comprobando si se envió correctamente
    if(!$mail->Send()) {
        echo'<script type="text/javascript">alert("Error al enviar");</script>';
    }

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
    $mail->AddReplyTo('ceiieetsiit@gmail.com', 'CEIIE ETSIIT'); // defino la dirección de correo a la que se envía el mensaje
    $mail->Subject = '[Mensaje de Web] '.$asunto; // añado un asunto al mensaje
    $mail->MsgHTML($nombre.' con email '.$email.' ha enviado el siguiente mensaje:<br/>'.$mensaje); // inserto el texto del mensaje en formato HTML
    $address = 'ceiieetsiit@gmail.com'; // indico destinatario
    $mail->AddAddress('ceiieetsiit@gmail.com', 'CEIIE ETSIIT'); // la añado a la clase, indicando el nombre de la persona destinatario
    // envío el mensaje, comprobando si se envió correctamente
    if(!$mail->Send()) {
        echo '<script type="text/javascript">alert("Error al enviar");</script>';
    }
?>

