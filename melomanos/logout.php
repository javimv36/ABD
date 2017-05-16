<!--Author: Javier Martín Villarreal-->
<?php 
  session_start();
  session_destroy();
  header('Location:index.php');
?>