<?php
    $codHabitacion=$_GET['habitacion'];

    include '../php/apiConnect.php';

    $precio=getPrecio($codHabitacion);

    echo $precio[0][0];