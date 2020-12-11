<?php include "../../security/authentication/validationurl.php";

  $locationTxt = "Location: ../../index.php";

  $codigo = $_GET['codigo'];
  $idCategory = $_GET['idCategoria'];
  $nameCategory = $_GET['nomeCategoria'];
?>


<div class="col-12">
  <div class="row">
    <div class="col-6">
      <h2>Alteração de Produtos</h2>
    </div>
  </div>
</div>

<div class="col-12">
  <div class="row">
    <div class="col-6">
      <form name="auth" action="main.php?folder=products/&file=upd.php" method="POST">
        <div class="form-group">
          <input type="hidden" name="codigo" value="<?php echo $codigo ?>">
          <label for="idupdselecionacategoria">Categoria:</label>
          <select class="form-control" id="idupdselecionacategoria" name="categoria">

            <?php

              $sql = "SELECT id, nome FROM categorias WHERE id = $idCategory";

              $stm_sql = $db_connection->prepare($sql);
              $stm_sql->execute();

              $category = $stm_sql->fetchAll(PDO::FETCH_ASSOC);

              foreach($category as $category){
            ?>

             <option value="0">Selecione...</option>
             <option value="<?php echo $idCategory ?>" selected><?php echo $category['nome']; ?></option>

             <?php
               }
             ?>

            <?php

              $sql = "SELECT id, nome FROM categorias WHERE id <> $idCategory";

              $stm_sql = $db_connection->prepare($sql);
              $stm_sql->execute();

              $category = $stm_sql->fetchAll(PDO::FETCH_ASSOC);

              foreach($category as $category){
            ?>

              <option value="<?php echo $category['id'];?>"><?php echo $category['nome']; ?></option>

            <?php
              }

              $sql = "SELECT modelo, valor, descricao FROM produtos WHERE codigo=:codigo";

              $stm_sql = $db_connection->prepare($sql);
              $stm_sql->bindParam(':codigo', $codigo);
              $result = $stm_sql->execute();

              $product = $stm_sql->fetch(PDO::FETCH_ASSOC);
            ?>
          </select>
        </div>
        <div class="form-group">
          <label for="idupdmodelo">Modelo:</label>
          <input name="modelo" type="text" class="form-control" id="idupdmodelo" value="<?php echo $product['modelo']; ?>">
        </div>
        <div class="form-group">
          <label for="idupdvalor">Valor:</label>
          <input name="valor" type="number" step=".01" min="0" class="form-control" id="idupdvalor" value="<?php echo $product['valor']; ?>">
        </div>
        <div class="form-group">
          <label for="idupddescricaoproduto">Descrição:</label>
          <input name="descricao" type="text" class="form-control" id="idupddescricaoproduto" value="<?php echo $product['descricao']; ?>">
        </div>
        <button type="reset" class="btn btn-warning">Limpar</button>
        <button type="submit" class="btn btn-success">Enviar</button>
      </form>
      <br>
      <a href="main.php?folder=products/&file=frmins.php">Voltar</a>

    </div>
  </div>
</div>
