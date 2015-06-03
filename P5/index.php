<?php session_start(); ?>
<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>CEIIE 2015</title>
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
        <script src="js/funciones.js"></script>
        <script src="js/ajax.js"></script>
    </head>
    <body>
        <?php            
            include 'contenido/comun/header.php';
        ?>
        <div id="main">
            
            <?php
                include 'contenido/content.php';
                include 'contenido/comun/aside.php';
            ?>            
        </div> <!-- end main -->
        <?php
                include 'contenido/comun/footer.php';
        ?>
    </body>
</html>