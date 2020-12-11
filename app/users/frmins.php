<?php include "../../security/authentication/validationurl.php"; ?>

<div class="col-12">
  <div class="row">
    <div class="col-6">
      <h2>Cadastro de Usuário</h2>
    </div>
    <div class="col-6">
      <h3>Usuários Cadastrados</h3>
    </div>
  </div>
</div>

<div class="col-12">
  <div class="row">
    <div class="col-6">
      <form name="auth" action="main.php?folder=users/&file=ins.php" method="POST">
        <div class="form-group">
          <label for="idemail">E-mail:</label>
          <input name="email" type="email" class="form-control" id="idemail">
        </div>
        <div class="form-group">
          <label for="idcadastrausuario">Usuário:</label>
          <input name="usuario" type="text" class="form-control" id="idcadastrausuario">
        </div>
        <div class="form-group">
          <label for="idcadastrasenha">Senha:</label>
          <input name="senha" type="password" class="form-control" id="idcadastrasenha">
        </div>
        <button type="reset" class="btn btn-warning">Limpar</button>
        <button type="submit" class="btn btn-success">Enviar</button>
      </form>
      <br>
      <a href="main.php">Voltar</a>
    </div>
    <div class="col-6">
      <?php
        $locationTxt = "Location: ../../index.php";

        $sql = "SELECT * FROM usuarios";

        $stm_sql = $db_connection->prepare($sql);
        $stm_sql->execute();

        $users = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
      ?>
      <div class="table-responsive">
        <table class="table table-striped table-dark">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Usuário</th>
              <th scope="col">Senha</th>
              <th scope="col">E-mail</th>
              <th scope="col">Permissão</th>
              <th scope="col">Ativo</th>
              <th scope="col">Alterar</th>
              <th scope="col">Excluir</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach($users as $user){

              if($user['permissao'] == 0){
                $permissao = "ADM";
              }else if($user['permissao'] == 1){
                $permissao = "Comum";
              }else{
                $permissao = "Erro";
              }

              $ativo = ($user['ativo']==0)?"Sim":"Não";

            ?>
            <tr>
              <th scope="row"><?php   echo $user['id'];      ?></td>
              <td><?php   echo $user['usuario'];             ?></td>
              <td><?php   echo $user['senha'];               ?></td>
              <td><?php   echo $user['email'];               ?></td>
              <td><?php   echo $permissao;                   ?></td>
              <td><?php   echo $ativo;                       ?></td>
              <td><a href="main.php?folder=users/&file=frmupd.php&id=<?php echo $user['id'];?>"><img src="../assets/images/editar.png" width="20px" height="20px"></a></td>
              <td><a href="main.php?folder=users/&file=del.php&id=<?=$user['id'];?>" onclick="return valDel('<?= $user['id'];?>', '<?=  $user['usuario'];?>')"><img src="../assets/images/excluir.png " width="20px" height="20px"></a></td>
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
