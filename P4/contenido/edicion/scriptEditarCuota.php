<?php
include '../comun/conexionDB.php';

$id=$_POST['id'];
$precio=$_POST['precio'];
$descripcion=$_POST['descripcion'];

echo 'Precio: '.$precio;
echo 'Desc: '.$descripcion;

$resultado=mysql_query("UPDATE cuotas SET Descripcion='$descripcion',Precio='$precio' WHERE ID_cuota='$id'");


mysql_close($conexion);

if($resultado) {
    header('location: ../../index.php?cat=opciones-admin$mod=success');
}else{
    header('location: ../../index.php?cat=opciones-admin&mod=error');
}
