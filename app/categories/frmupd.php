<?php
  include "../../security/authentication/validationurl.php";
  $locationTxt = "Location: ../../index.php";

  $id = $_GET['id'];

  $sql = "SELECT nome, descricao FROM categorias WHERE id=:id";

  $stm_sql = $db_connection->prepare($sql);
  $stm_sql->bindParam(':id', $id);
  $result = $stm_sql->execute();

  $category = $stm_sql->fetch(PDO::FETCH_ASSOC);

?>


<div class="col-12">
  <div class="row">
    <div class="col-6">
      <h2>Alteração de Categorias</h2>
    </div>
  </div>
</div>

<div class="col-12">
  <div class="row">
    <div class="col-6">
      <form name="upduser" action="main.php?folder=categories/&file=upd.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <div class="form-group">
          <label for="idupdnome">Nome:</label>
          <input name="nome" type="text" class="form-control" id="idupdnome" value="<?php echo $category['nome'];?>">
        </div>
        <div class="form-group">
          <label for="idupddescricaocategoria">Descrição:</label>
          <input name="descricao" type="text" class="form-control" id="idupddescricaocategoria" value="<?php echo $category['descricao'];?>">
        </div>
        <button type="reset" class="btn btn-warning">Limpar</button>
        <button type="submit" class="btn btn-success">Enviar</button>
      </form>
       <br>
       <a href="main.php?folder=categories/&file=frmins.php">Voltar</a>
    </div>
  </div>
</div>
