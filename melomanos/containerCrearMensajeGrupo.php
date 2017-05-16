<link id="estilo-containerLogin" rel="stylesheet" type="text/css" href="css/containerLogin.css" />
<div class="login-page">
  <div class="form">
    <form class="login-form" action="procesarMensaje.php" method="POST" enctype="multipart/form-data">
      <input type="text" placeholder="Mensaje" name="mensaje"/>
      <input type="hidden" value="" name="username"/>
      <?php
        $user=$_SESSION["name"];
        $sql ="SELECT * FROM pertenece WHERE user = '$user';";
        $consulta = mysqli_query($db, $sql) or die("Muerto");
        $myArray = array();
        while($fila = $consulta->fetch_array(MYSQL_ASSOC)){
            $myArray[] = $fila;
        }
        echo "<select name='grupo'>";
        for($i=0;$i<sizeof($myArray);$i++){
          $grupo=$myArray[$i]['grupo'];
          echo " <option value='$grupo'>$grupo</option>";
        }
        echo "</select>";
      ?>
      <button type="submit">Enviar mensaje</button>
    </form>
  </div>
</div>
