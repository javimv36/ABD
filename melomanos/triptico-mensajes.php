<!--Author: Javier Martín Villarreal-->
<?php 
	if (isset($_SESSION["login"])){
        echo '<link id="estilo-triptico" rel="stylesheet" type="text/css" href="css/triptico.css" />';
        echo '<div class="tripticos">';
        echo '  <div class="triptico">';
                include("lista-todos-mensajes.php"); //lista mensajes públicos
        echo '  </div>';
        echo '  <div class="triptico">';
                include("lista-mensajes.php");//lista mensajes individuales
        echo '  </div>';
        echo '  <div class="triptico">';
                include("lista-grupos-mensajes.php"); //lista mensajes grupo
        echo '  </div>';
        echo '</div>';
    }