<?php
  include "../../security/authentication/validationurl.php";

  $locationTxt = "Location: ../../index.php";

  $id = $_GET['id'];

  $sql = "SELECT email, usuario FROM usuarios WHERE id=:id";

  $stm_sql = $db_connection->prepare($sql);
  $stm_sql->bindParam(':id', $id);
  $result = $stm_sql->execute();

  $user = $stm_sql->fetch(PDO::FETCH_ASSOC);
?>

<div class="col-12">
  <div class="row">
    <div class="col-6">
      <h2>Alteração de Usuário</h2>
    </div>
  </div>
</div>

<div class="col-12">
  <div class="row">
    <div class="col-6">
      <form name="auth" action="main.php?folder=users/&file=upd.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <div class="form-group">
          <label for="idupdemail">E-mail:</label>
          <input name="email" type="email" class="form-control" id="idupdemail" value="<?php echo $user['email'];?>">
        </div>
        <div class="form-group">
          <label for="idupdcadastrausuario">Usuário:</label>
          <input name="usuario" type="text" class="form-control" id="idupdcadastrausuario" value="<?php echo $user['usuario'];?>">
        </div>
        <div class="form-group">
          <label for="idupdcadastrasenha">Senha:</label>
          <input name="senha" type="password" class="form-control" id="idupdcadastrasenha">
        </div>
        <button type="reset" class="btn btn-warning">Limpar</button>
        <button type="submit" class="btn btn-success">Enviar</button>
      </form>

      <br>
      <a href="main.php?folder=users/&file=frmins.php">Voltar</a>
    </div>
  </div>
</div>
