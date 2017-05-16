<!--Author: Javier Martín Villarreal-->
<?php
session_start();
require("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $origen = $_SESSION["name"];
    $destino=NULL;
    if($_POST["username"]!="publico"){
            $destino = $_POST["username"];
    }
    $grupo = 0;
    if($_POST["grupo"]!=""){
        $grupo =  $_POST["grupo"];
    }
    $mensaje = $_POST["mensaje"];
    $sql = "INSERT INTO mensajes VALUES (NULL, '$mensaje', '$origen' , '$destino', $grupo);";
    $consulta = mysqli_query($db, $sql) or die("Muerto");
    }
    require("desconexion.php");
 header('Location:index.php');
?>