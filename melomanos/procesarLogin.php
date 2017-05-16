<!--Author: Javier Martín Villarreal-->
<?php
session_start();
require("conexion.php");
$name = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["username"];
 $sql ="SELECT * FROM usuarios WHERE user = '$name' LIMIT 1;";
 $consulta = mysqli_query($db, $sql) or die("Muerto");
 $fila = $consulta->fetch_array(MYSQL_ASSOC);
  $password = $_POST["password"];
      if( $fila['pass'] == md5($password)){
        $_SESSION["name"] = $fila['user'];
        $_SESSION["login"] = true;
        $_SESSION["esAdmin"] = $fila['admin'];
        require("desconexion.php");
        header('Location:index.php');
      }else{
      require("desconexion.php");
      header('Location:login.php');
 }

  }
   
?>