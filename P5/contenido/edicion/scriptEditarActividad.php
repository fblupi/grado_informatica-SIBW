<?php
include '../comun/conexionDB.php';

$id=$_POST['id'];
$titulo=$_POST['titulo'];
$precio=$_POST['precio'];
$descripcion=$_POST['descripcion'];
$detalles=$_POST['detalles'];
$fecha=$_POST['fecha'];
$hora_salida=$_POST['hora_salida'];
$hora_llegada=$_POST['hora_llegada'];
$foto_src=$_POST['foto_src'];
$foto_alt=$_POST['foto_alt'];
$foto_title=$_POST['foto_title'];

echo $detalles;

$resultado=mysql_query("UPDATE actividades SET Titulo='$titulo', Detalles='$detalles', Fecha='$fecha', Hora_salida='$hora_salida', Hora_llegada='$hora_llegada', Foto_src='$foto_src', Foto_alt='$foto_alt', Foto_title='$foto_title', Descripcion='$descripcion',Precio='$precio' WHERE ID_act='$id'");


mysql_close($conexion);

if($resultado) {
    header('location: ../../index.php?cat=opciones-admin&mod=success');
}else{
    header('location: ../../index.php?cat=opciones-admin&mod=error');
}
