<!--Author: Javier Martín Villarreal-->
<link id="estilo-containerLogin" rel="stylesheet" type="text/css" href="css/containerLogin.css" />
<div class="login-page">
  <div class="form">
    <form class="login-form" action="procesarLogin.php" method="POST">
      <input type="text" placeholder="usuario" name="username"/>
      <input type="password" placeholder="contraseña" name="password"/>
      <button type="submit">Iniciar sesión</button>
      <p class="message">¿No tienes cuenta? <a href="signIn.php">Crear cuenta</a></p>
    </form>
  </div>
</div>
