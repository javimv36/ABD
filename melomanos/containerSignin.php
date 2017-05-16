<link id="estilo-containerLogin" rel="stylesheet" type="text/css" href="css/containerLogin.css" />
<div class="login-page">
  <div class="form">
    <form class="login-form" action="procesarSignin.php" method="POST" enctype="multipart/form-data">
      <input type="text" placeholder="usuario" name="username" required/>
      <input type="password" placeholder="contraseña" name="password" required/>
      <input type="number" placeholder="Edad" name="edad" required/>
      <input type="file" name="file" required>
        <?php
        $sql ="SELECT DISTINCT tipo FROM grupos;";
        $consulta = mysqli_query($db, $sql) or die("Muerto");
        $myArray = array();
        while($fila = $consulta->fetch_array(MYSQL_ASSOC)){
            $myArray[] = $fila;
        }
        for($i=0;$i<sizeof($myArray);$i++){
        $tipo=$myArray[$i]['tipo'];
        echo "<input type='checkbox' name='gustos[]' value='$tipo'>$tipo<br>";
          
        }
        ?>
      <button type="submit">Registrarse</button>
    </form>
  </div>
</div>
