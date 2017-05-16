<!--Author: Javier Martín Villarreal-->
<?php
session_start();
require("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $min = $_POST["min"];
    $max = $_POST["max"];
    $grupo = $_POST["grupo"];
    $sql = "INSERT INTO grupos VALUES (NULL, '$grupo', '$min' , '$max');";
    $consulta = mysqli_query($db, $sql) or die("Muerto");

	$filename = $_FILES["file"]["name"];
	$file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
	$file_ext = substr($filename, strripos($filename, '.')); // get file name
	$filesize = $_FILES["file"]["size"];
	$allowed_file_types = array('.jpeg','.jpg','.png');	

	if (in_array($file_ext,$allowed_file_types) && ($filesize < 200000))
	{	
        $sql = "SELECT * FROM grupos WHERE tipo = '$grupo' AND min = '$min' AND max = '$max'  LIMIT 1;";
        $consulta = mysqli_query($db, $sql) or die("Muerto");
        $fila = $consulta->fetch_array(MYSQL_ASSOC);
        $idgrupo = $fila["id"];
		// Rename file
		$newfilename = $idgrupo . '.png';
		if (file_exists("img/grupo/" . $newfilename))
		{
			// file already exists error
			echo "You have already uploaded this file.";
		}
		else
		{		
			move_uploaded_file($_FILES["file"]["tmp_name"], "img/grupo/" . $newfilename);
			echo "File uploaded successfully.";		
		}
	}
	elseif (empty($file_basename))
	{	
		// file selection error
		echo "Please select a file to upload.";
	} 
	elseif ($filesize > 200000)
	{	
		// file size error
		echo "The file you are trying to upload is too large.";
	}
	else
	{		// file type error
		echo "Only these file typs are allowed for upload: " . implode(', ',$allowed_file_types);
		unlink($_FILES["file"]["tmp_name"]);
	}
}
 require("desconexion.php");
 header('Location:index.php');
?>