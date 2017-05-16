<!--Author: Javier Martín Villarreal-->
<?php session_start();?>
<html lang="es">

    <head>
        <title>Melomanos - Mis mensajes</title>
        <link id="estilo-principal" rel="stylesheet" type="text/css" href="css/index.css" />
        <meta charset="utf-8">
    </head>

    <body>
        <?php
            require("conexion.php");
            include("menu.php");
            include("sidebarIndex.php");
            include("containerTodosMensajes.php");
            include("footer.php");
        ?>
    </body>
</html>