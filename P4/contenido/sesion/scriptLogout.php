<?php
// Se recupera la sesión abierta y se cierra
session_start();
session_destroy();

header ('location: ../../index.php');
?>