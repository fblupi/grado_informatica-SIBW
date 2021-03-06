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
    $resultado = mysql_query ($insercion, $conexion);
    
    if($resultado) {
        /*
        if($cuota=='Profesor'){ // Se incluye la cena de gala a los profesores
            //$insercion="INSERT INTO apuntados_actividad (email,ID_act) VALUES ('$email','cena-gala')";
            mysql_query($insercion,$conexion);
        }
        */
        $actividades = $_POST['actividad'];
        for($i=0; $i<count($actividades) && $resultado; $i++) { // Se incluyen las actidades seleccionadas
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
        
        $actividades = $_POST['actividad'];
        if(!empty($actividades)) {
            $mensaje = $mensaje."Está inscrito a las siguientes actividades:<br/><ul>"; 
            for($i=0; $i<count($actividades); $i++) {
                $mensaje = $mensaje."<li>";
                $select="SELECT Titulo FROM actividades WHERE ID_act='".$actividades[$i]."'";
                $resultado=mysql_query($select,$conexion);
                $fila=mysql_fetch_array($resultado);
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
    } else

        header('location: ../../index.php?cat=inscripcion&reg_error=error');
?>