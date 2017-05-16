<!--Author: Javier Martín Villarreal-->
<link id="estilo-menu" rel="stylesheet" type="text/css" href="css/menu.css" />
<div id="menu">
<a class="tituloMenu" href="index.php">Melómanos</a>
            <nav id="botones">
                <ul>
                    <?php 
                    
	                    if (isset($_SESSION["login"])){
                            if ($_SESSION["esAdmin"]==true){

                        echo '<li class="botonMenu">';
                        echo '<a href="crearGrupo.php">Crear grupo</a>';
                        echo '</li>';    
                            }
                        echo '<li class="botonMenu">';
                        echo '<a href="crearMensaje.php">Crear mensaje</a>';
                        echo '</li>';    
                        
                        echo '<li class="botonMenu">';
                        echo '<a href="crearMensajeGrupo.php">Mensaje a grupo</a>';
                        echo '</li>';

                        echo '<li class="botonMenu">';
                        echo '<a href="todosMensajes.php">Públicos</a>';
                        echo '</li>';

                        echo '<li class="botonMenu">';
                        echo '<a href="misMensajes.php"> ' . $_SESSION["name"] . '</a>';
                        echo '</li>';
                        	
                        echo '<li class="botonMenu">';
                        echo '<a href="logout.php">Salir</a>';
                        echo '</li>';
	                    }else{
                        echo '<li class="botonMenu">';
                        echo '<a href="login.php">Login</a>';
                        echo '</li>';
	                    }
	                ?>
                </ul>
            </nav>
        </div>
</div>