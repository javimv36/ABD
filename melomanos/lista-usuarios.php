<!--Author: Javier Martín Villarreal-->
<link id="estilo-lista-usuarios" rel="stylesheet" type="text/css" href="css/lista-usuarios.css" />
<?php
 if (isset($_SESSION["name"])){
    $sql ="SELECT * FROM usuarios;";
    $consulta = mysqli_query($db, $sql) or die("Muerto");
    $myArray = array();
    while($fila = $consulta->fetch_array(MYSQL_ASSOC)){
        $myArray[] = $fila;
    }
    echo '<div id="usuarios">';
    echo '<h4>Lista de usuarios</h4>';
    for ($i = 0; $i < sizeof($myArray) ; $i++){
        echo '<div class="usuario" >';
        echo '<img src="img/user/' . $myArray[$i]['user'] . '.png">';
        echo  '<p>' . $myArray[$i]['user'] . '</p>';
        echo ' </div>';
    }
    echo '</div>';
 }else{
    echo '<p>Iniciar sesión para ver contenido</p>';
 }
 ?>