<div class="container">
    
     <?php
     if(!isset($_SESSION["login"]))
      include("indexSinLogin.php");
     else
            include("triptico-mensajes.php");
        ?>
</div>