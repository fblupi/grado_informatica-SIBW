<?php
$conexion=mysql_connect('localhost','root','macoy123');
$abreDB = mysql_select_db('sibw_db',$conexion);
if(!$abreDB)
die("No se ha establecido conexión con la base de datos");
?>