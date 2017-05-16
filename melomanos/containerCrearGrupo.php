<link id="estilo-containerLogin" rel="stylesheet" type="text/css" href="css/containerLogin.css" />
<div class="login-page">
  <div class="form">
    <form class="login-form" action="procesarGrupo.php" method="POST" enctype="multipart/form-data">
      <select name="grupo">
        <option value="Rock and roll">Rock and roll</option>
        <option value="Pop">Pop</option>
        <option value="Rap">Rap</option>
        <option value="Ska">Ska</option>
        <option value="Reggae">Reggae</option>
        <option value="Blues">Blues</option>
        <option value="Jazz">Jazz</option>
        <option value="Musica clasica">Musica clasica</option>
        <option value="Salsa">Salsa</option>
        <option value="Cumbia">Cumbia</option>
      </select>
      <input type="number" placeholder="Edad mínima" name="min"/>
      <input type="number" placeholder="Edad máxima" name="max"/>
      <input type="file" name="file" required>
      <button type="submit">Crear grupo</button>
    </form>
  </div>
</div>
