<?php include "../../security/authentication/validationurl.php"; ?>

<div class="col-12">
  <div class="row">
    <div class="col-6">
      <h2>Cadastro de produtos</h2>
    </div>
    <div class="col-6">
      <h3>Produtos Cadastrados</h3>
    </div>
  </div>
</div>


<div class="col-12">
  <div class="row">
    <div class="col-6">
      <form name="auth" action="main.php?folder=products/&file=ins.php" method="POST">
        <div class="form-group">
          <label for="idselecionacategoria">Categoria:</label>
          <select class="form-control" id="idselecionacategoria" name="categoria">
            <option value="0">Selecione...</option>
            <?php

              $locationTxt = "Location: ../../index.php";

              $sql = "SELECT id, nome FROM categorias";

              $stm_sql = $db_connection->prepare($sql);
              $stm_sql->execute();

              $category = $stm_sql->fetchAll(PDO::FETCH_ASSOC);

              foreach($category as $category){
            ?>

              <option value="<?php echo $category['id'];?>"><?php echo $category['nome']; ?></option>

            <?php
              }
            ?>
          </select>
        </div>
        <div class="form-group">
          <label for="idmodelo">Modelo:</label>
          <input name="modelo" type="text" class="form-control" id="idmodelo">
        </div>
        <div class="form-group">
          <label for="idvalor">Valor:</label>
          <input name="valor" type="number" step=".01" min="0" class="form-control" id="idvalor">
        </div>
        <div class="form-group">
          <label for="iddescricaoproduto">Descrição:</label>
          <input name="descricao" type="text" class="form-control" id="iddescricaoproduto">
        </div>
        <button type="reset" class="btn btn-warning">Limpar</button>
        <button type="submit" class="btn btn-success">Enviar</button>
      </form>
      <br>
      <a href="main.php">Voltar</a>
    </div>
    <div class="col-6">
      <?php

        $sql = "SELECT produtos.codigo, produtos.modelo, produtos.valor, produtos.descricao, categorias.nome, produtos.categorias_id FROM produtos INNER JOIN categorias ON produtos.categorias_id = categorias.id";

        $stm_sql = $db_connection->prepare($sql);
        $stm_sql->execute();

        $product = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
      ?>

      <div class="table-responsive">
        <table class="table table-striped table-dark">
          <thead>
            <tr>
              <th scope="col">Código</th>
              <th scope="col">Modelo</th>
              <th scope="col">Valor</th>
              <th scope="col">Descrição</th>
              <th scope="col">Categoria</th>
              <th scope="col">Alterar</th>
              <th scope="col">Excluir</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach($product as $product){
            ?>
            <tr>
              <th scope="row"> <?php   echo $product['codigo'];     ?>       </td>
              <td> <?php   echo $product['modelo'];     ?>       </td>
              <td> R$ <?php   echo $product['valor'];   ?>       </td>
              <td> <?php   echo $product['descricao'];  ?>       </td>

              <td>
                 <?php   echo $product['nome'];  ?>
              </td>

              <td>
                <a href="main.php?folder=products/&file=frmupd.php&
                codigo=<?php echo $product['codigo'];?>
                &nomeCategoria=<?php echo $product['nome'];?>
                &idCategoria=<?php echo $product['categorias_id'];?>">
                <img src="../assets/images/editar.png" width="20px" height="20px"></a>
              </td>
              <td><a href="main.php?folder=products/&file=del.php&codigo=<?=$product['codigo'];?>" onclick="return valDel('<?= $product['codigo'];?>', '<?=  $product['modelo'];?>')"><img src="../assets/images/excluir.png " width="20px" height="20px"></a></td>
            </tr>
            <?php
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
