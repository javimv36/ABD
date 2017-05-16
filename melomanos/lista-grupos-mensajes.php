<link id="estilo-lista-mensajes" rel="stylesheet" type="text/css" href="css/lista-mensajes.css" />
<?php
 if (isset($_SESSION["name"])){
    $usuario=$_SESSION["name"];
    $sql ="SELECT grupo FROM pertenece WHERE user = '$usuario';";
    $consulta = mysqli_query($db, $sql) or die("Muerto");
    $gustos = array();
    while($fila = $consulta->fetch_array(MYSQL_ASSOC)){
        $gustos[] = $fila;
    }
    $myArray = array();
    for ($i = 0; $i < sizeof($gustos) ; $i++){
        $id=$gustos[$i]['grupo'];
        $sql ="SELECT * FROM mensajes WHERE idGrupo = $id;";
        $consulta = mysqli_query($db, $sql) or die("Muerto");
        while($fila = $consulta->fetch_array(MYSQL_ASSOC)){
            $myArray[] = $fila;
        }
    }

    echo '<div id="mensajes">';
    echo '<h4>Mensajes grupales</h4>';
    for ($i = 0; $i < sizeof($myArray) ; $i++){
        echo '<div class="mensaje" >';
        echo '<img src="img/grupo/' . $myArray[$i]['idGrupo'] . '.png">';
        echo  '<p>' . $myArray[$i]['mensaje'] . '</p>';
        echo ' </div>';
    }
    echo '</div>';
 }else{
    echo '<p>Iniciar sesión para ver contenido</p>';
 }
 ?>