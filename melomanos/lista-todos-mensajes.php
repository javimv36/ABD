<link id="estilo-lista-mensajes" rel="stylesheet" type="text/css" href="css/lista-mensajes.css" />
<?php
 if (isset($_SESSION["name"])){
    $destino=$_SESSION["name"];
    $sql ="SELECT * FROM mensajes WHERE destino = '' AND idGrupo = 0;";
    $consulta = mysqli_query($db, $sql) or die("Muerto");
    $myArray = array();
    while($fila = $consulta->fetch_array(MYSQL_ASSOC)){
        $myArray[] = $fila;
    }
    echo '<div id="mensajes">';
    echo '<h4>Todos los mensajes</h4>';
    for ($i = 0; $i < sizeof($myArray) ; $i++){
        echo '<div class="mensaje" >';
        echo '<img src="img/user/' . $myArray[$i]['origen'] . '.png">';
        echo  '<p>' . $myArray[$i]['mensaje'] . '</p>';
        echo ' </div>';
    }
    echo '</div>';
 }else{
    echo '<p>Iniciar sesión para ver contenido</p>';
 }
 ?>