<!DOCTYPE html>
<html lang = "es">
  <head>
      <title>
        Alta - Pr3
      </title>
      <meta charset="utf-8">
  </head>
  <body>
<h1>Nuevo libro</h1>
	<form method="post" action="alta.php">
		<p><input type="text" name="titulo" value="" placeholder="Título"></p>
		<p><input type="text" name="id" value="" placeholder="id"></p>
		<p class="submit"><input type="submit" name="commit" value="Añadir libro"></p>
	</form>

	<?php
		$procesando=isset($_POST['titulo'])?$_POST['id']:null;

		if($procesando!=null){

			$titulo=$_POST['titulo'];
			$id=$_POST['id'];
			$db = @mysqli_connect('localhost','root','','libreria');
			$sql="INSERT INTO libros (id, Titulo) VALUES ('$id', '$titulo')";
			$consulta=mysqli_query($db, $sql);
			}
		@mysqli_close($db);
	?>
</body>
</html>
