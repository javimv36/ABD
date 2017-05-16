<link id="estilo-containerLogin" rel="stylesheet" type="text/css" href="css/containerLogin.css" />
<div class="login-page">
  <div class="form">
    <form class="login-form" action="procesarMensaje.php" method="POST" enctype="multipart/form-data">
      <input type="text" placeholder="Mensaje" name="mensaje"/>
      <input type="hidden" value="" name="grupo"/>
      <?php
        $user=$_SESSION["name"];
        $sql ="SELECT * FROM usuarios;";
        $consulta = mysqli_query($db, $sql) or die("Muerto");
        $myArray = array();
        while($fila = $consulta->fetch_array(MYSQL_ASSOC)){
            $myArray[] = $fila;
        }
        echo "<select name='username'>";
        echo " <option value='publico'>Todos</option>";
        for($i=0;$i<sizeof($myArray);$i++){
          $nombre=$myArray[$i]['user'];
          echo " <option value=$nombre>$nombre</option>";
        }
        echo "</select>";
      ?>
      <p class="message">Elige el destinatario "Todos" para que el mensaje sea envíe a todos los usuarios. </p>
      <button type="submit">Enviar mensaje</button>
    </form>
  </div>
</div>
