<!--Author: Javier Martín Villarreal-->
<?php
session_start();
require("conexion.php");
$name = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["username"];
    $sql ="SELECT * FROM usuarios WHERE user = '$name' LIMIT 1;";
    $consulta = mysqli_query($db, $sql) or die("Muerto");
    if($fila = $consulta->fetch_array(MYSQL_ASSOC)){

    }else{
    $password = md5($_POST["password"]);
    $edad =  $_POST["edad"];
    $gustos =  $_POST["gustos"];
    $sql = "INSERT INTO usuarios VALUES ('$name', '$password' , '$edad', 0);";
    $consulta = mysqli_query($db, $sql) or die("Muerto");
	$idgustos = array();
	for($i=0;$i<sizeof($gustos);$i++){
		$g=$gustos[$i];
		$sql = "SELECT id FROM grupos WHERE tipo = '$g' AND min <= '$edad' AND max >= '$edad';";
		$consulta = mysqli_query($db, $sql) or die("Muerto 1");
		while($fila = $consulta->fetch_array(MYSQL_ASSOC)){
			$idgustos[] = $fila;
		}
	}
	
	echo(json_encode($idgustos)); 
	for($i=0;$i<sizeof($idgustos);$i++){
		$id=$idgustos[$i]['id'];
		if($id!=0){
		$sql = "INSERT INTO pertenece VALUES ('$name', '$id');";
    	$consulta = mysqli_query($db, $sql) or die("Muerto 2");
		}
	}


	$filename = $_FILES["file"]["name"];
	$file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
	$file_ext = substr($filename, strripos($filename, '.')); // get file name
	$filesize = $_FILES["file"]["size"];
	$allowed_file_types = array('.jpeg','.jpg','.png');	

	if (in_array($file_ext,$allowed_file_types) && ($filesize < 200000))
	{	
		// Rename file
		$newfilename = $name . '.png';
		if (file_exists("img/user/" . $newfilename))
		{
			// file already exists error
			echo "You have already uploaded this file.";
		}
		else
		{		
			move_uploaded_file($_FILES["file"]["tmp_name"], "img/user/" . $newfilename);
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
  }
  require("desconexion.php");
header('Location:login.php');
?>