<!--Author: Javier Martín Villarreal-->
<?php session_start();?>
<!doctype html>
<html lang="es">

    <head>
        <title>Melomanos</title>
        <link id="estilo-principal" rel="stylesheet" type="text/css" href="css/index.css" />
        <meta charset="utf-8">
    </head>

    <body>
        <?php
            require("conexion.php");
            include("menu.php");
            include("sidebarIndex.php");
            include("containerIndex.php");
            include("footer.php");
            require("desconexion.php");
        ?>
    </body>
</html>