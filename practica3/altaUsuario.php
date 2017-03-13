<!DOCTYPE html>
<html lang = "es">
  <head>
      <title>
        Alta usuario - Pr3
      </title>
      <meta charset="utf-8">
  </head>
  <body>
<h1>Nuevo usuario</h1>
	<form method="post" action="altaUsuario.php">
		<p><input type="text" name="usuario" value="" placeholder="Usuario"></p>
		<p><input type="password" name="password" value="" placeholder="password"></p>
		<p class="submit"><input type="submit" name="commit" value="Añadir usuario"></p>
	</form>

	<?php
		$procesando=isset($_POST['usuario'])?$_POST['password']:null;

		if($procesando!=null){

			$usuario=$_POST['usuario'];
			$password=$_POST['password'];
			$db = @mysqli_connect('localhost','root','','libreria');
			$sql="INSERT INTO usuarios (user, password) VALUES ('$usuario', '$password')";
			$consulta=mysqli_query($db, $sql);
			}
		@mysqli_close($db);
	?>
</body>
</html>
