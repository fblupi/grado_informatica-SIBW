<?php
    include '../comun/conexionDB.php';

    $nombre=$_POST['nombre'];
    $apellidos=$_POST['apellidos'];
    $telefono=$_POST['telefono'];
    $email=$_POST['email'];
    $contrasena=$_POST['contrasena'];
    $cuota=$_POST['cuota'];
    $centro=$_POST['centro'];

    if(isset($_POST['habitaciones'])){
        require '../../php/apiConnect.php';

        $llegada=$_POST['llegada'];
        $salida=$_POST['salida'];
        $habitaciones=$_POST['habitaciones'];

        $habitacion;
        foreach($habitaciones as $hab){
            if($hab!='NO')
                $habitacion=$hab;
        }

        $hotel=$_POST['hotel'];

        setReserva($hotel,$habitacion,$llegada,$salida);

    }

    $insercion="INSERT INTO usuarios (email, Nombre, Apellidos, Telefono, Contrasena, ID_cuota, Tipo, Centro) VALUES ('$email', '$nombre', '$apellidos', '$telefono', SHA1('$contrasena'), '$cuota', '0', '$centro'); ";
    $resultado=mysql_query ($insercion, $conexion);
    
    if($resultado) {
        // Se incluyen las actividades por defecto de una cuota
        $selectActividadesPorDefecto="SELECT ID_act FROM cuota_actividad WHERE ID_cuota='$cuota'";
        $resultadoActividadesPorDefecto=mysql_query($selectActividadesPorDefecto, $conexion);
        if(mysql_num_rows($resultadoActividadesPorDefecto)>0) {
            while($actividadPorDefecto=mysql_fetch_array($resultadoActividadesPorDefecto)) {
                $idActividadPorDefecto=$actividadPorDefecto['ID_act'];
                $insercion="INSERT INTO apuntados_actividad (email,ID_act) VALUES('$email','$idActividadPorDefecto')";
                $resultado=mysql_query($insercion,$conexion);
            }
        }
        // Se incluyen las actidades seleccionadas
        $actividades = $_POST['actividad'];
        for($i=0; $i<count($actividades) && $resultado; $i++) { 
            $insercion="INSERT INTO apuntados_actividad (email,ID_act) VALUES('$email','$actividades[$i]')";
            $resultado=mysql_query($insercion,$conexion);
        }
    }

    if($resultado) {
        // Enviar correo
        // incluimos la clase PHPMailer
        require_once('../../php/PHPMailer/class.phpmailer.php');
        require_once('../../php/PHPMailer/class.smtp.php');
        $asunto = "[Mensaje de Web] Inscripción CEIIE";
        $mensaje = "Hola, $nombre<br/>Acaba de ser inscrito en el I Congreso de Estudiantes de Ingeniería Informática de España (CEIIE) como $cuota.<br/>" ;
        
        // Se incluyen las actidades seleccionadas
        $actividades = "SELECT ID_act FROM apuntados_actividad WHERE email='$email'";
        $resultado = mysql_query($actividades, $conexion);
        if(mysql_num_rows($resultado)>0) {
            $mensaje = $mensaje."Está inscrito a las siguientes actividades:<br/><ul>";
            while($actividad=mysql_fetch_array($resultado)) {
                $idActividad = $actividad['ID_act'];
                $mensaje = $mensaje."<li>";
                $select = "SELECT Titulo FROM actividades WHERE ID_act='$idActividad'";
                $resultadoSelect = mysql_query($select,$conexion);
                $fila = mysql_fetch_array($resultadoSelect);
                $mensaje = $mensaje.$fila['Titulo'];
                $mensaje = $mensaje."</li>";
            }
            $mensaje = $mensaje."</ul>";
        }
        
        mysql_close($conexion);
        
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
            header('location: ../../index.php?cat=inscripcion&reg_error=success');
        }else{
            header ('location: ../../index.php?cat=inscripcion&reg_error=mail');
        }
    } else header('location: ../../index.php?cat=inscripcion&reg_error=error');
?>