<?php include "../../security/authentication/validationurl.php"; ?>

<div class="col-12">
  <div class="row">
    <div class="col-6">
      <h2>Cadastro de Categorias</h2>
    </div>
    <div class="col-6">
      <h2>Categorias Cadastradas</h2>
    </div>
  </div>
</div>

<div class="col-12">
  <div class="row">
    <div class="col-6">
      <form name="auth" action="main.php?folder=categories/&file=ins.php" method="POST">
        <div class="form-group">
          <label for="idnome">Nome:</label>
          <input name="nome" type="text" class="form-control" id="idnome">
        </div>
        <div class="form-group">
          <label for="iddescricaocategoria">Descrição:</label>
          <input name="descricao" type="text" class="form-control" id="iddescricaocategoria">
        </div>
        <button type="reset" class="btn btn-warning">Limpar</button>
        <button type="submit" class="btn btn-success">Enviar</button>
      </form>
      <br>
      <a href="main.php">Voltar</a>
    </div>

    <div class="col-6">
      <?php
        $sql = "SELECT id, nome, descricao FROM categorias";
        $stm_sql = $db_connection->prepare($sql);

        $stm_sql->execute();

        $categories = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
      ?>
      <div class="table-responsive">
        <table class="table table-striped table-dark">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nome</th>
              <th scope="col">Descrição</th>
              <th scope="col">Alterar</th>
              <th scope="col">Excluir</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach($categories as $category){

                $descricao = ($category['descricao']==NULL)?"-":$category['descricao'];
            ?>
              <tr>
                <th scope="row"><?php echo $category['id'];?></th>
                <td><?php echo $category['nome'];?></td>
                <td><?php echo $descricao;?></td>
                <td><a href="main.php?folder=categories/&file=frmupd.php&id=<?php echo $category['id']; ?>"> <img src="../assets/images/editar.png" width="20px" height="20px"> </a></td>
                <td><a href="main.php?folder=categories/&file=del.php&id=<?php echo $category['id']; ?>" onclick="return valDel('categoria','<?php echo $category['nome'];?>')"> <img src="../assets/images/excluir.png " width="20px" height="20px"> </a></td>
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
