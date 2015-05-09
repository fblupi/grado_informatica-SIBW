<?php
/**
 * Created by PhpStorm.
 * User: MiKe1
 * Date: 02/05/2015
 * Time: 13:32
 */

    include '../comun/conexionDB.php';

    $nombre=$_POST['nombre'];
    $apellidos=$_POST['apellidos'];
    $telefono=$_POST['telefono'];
    $email=$_POST['email'];
    $contrasena=$_POST['contrasena'];
    $cuota=$_POST['cuota'];
    $cento=$_POST['centro'];

    echo 'Nombre: '.$nombre;
    echo 'email: '.$email;

    $insercion="INSERT INTO usuarios (email, Nombre, Apellidos, Telefono, Contrasena, ID_cuota, Tipo, Centro) VALUES ('$email', '$nombre', '$apellidos', '$telefono', SHA1('$contrasena'), '$cuota', '0', '$centro'); ";
    //$insercion="INSERT INTO usuarios ('email', 'Nombre', 'Apellidos', 'Telefono', 'Contraseña', 'ID_cuota', 'Tipo') VALUES ('$email','$nombre','$apellidos','$telefono','SHA1($contrasena)','$cuota','0')";
    $resultado = mysql_query ($insercion, $conexion);

    if($cuota=='congresista' || $cuota=='profesor'){
        $inserta__actividad="INSERT INTO apuntados_actividad (email,Nombre_act) VALUES ('$email','cena-gala')";
        mysql_query($inserta__actividad,$conexion);
    }

    mysql_close($conexion);

    if($resultado)
        header('location: ../../index.php?cat=inscripcion&reg_error=success');
    else
        header('location: ../../index.php?cat=inscripcion&reg_error=error');




?>