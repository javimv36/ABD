<?php session_start();?>
<html lang="es">

    <head>
        <title>Investo - SignIn</title>
        <link id="estilo-principal" rel="stylesheet" type="text/css" href="css/index.css" />
        <meta charset="utf-8">
    </head>

    <body>
        <?php
            require("conexion.php");
            include("menu.php");
            include("containerSignin.php");
            include("footer.php");
            require("desconexion.php");
        ?>
    </body>
</html>