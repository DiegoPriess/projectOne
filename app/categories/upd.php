<?php
  include "../../security/authentication/validationurl.php";
  $locationTxt = "Location: ../../index.php";

  $id        = $_POST['id'];
  $nome    = $_POST['nome'];
  $descricao   = $_POST['descricao'];

  $status = "danger";

  $msg = "";
  $link = "main.php?folder=categories/&file=frmupd.php&id=".$id;

  if($nome==""){
    $msg = "Preencha o campo de nome.";
  }elseif($descricao==""){
    $msg = "Preencha o campo descrição.";
  }else{

    $sql = "SELECT nome FROM categorias WHERE nome=:nome AND id<>:id";

    $stm_sql = $db_connection->prepare($sql);
    $stm_sql->bindParam(':nome', $nome);
    $stm_sql->bindParam(':id', $id);
    $stm_sql->execute();

    if($stm_sql->rowCount()==0){

      $sql = "UPDATE categorias SET nome=:nome, descricao=:descricao WHERE id=:id";
      $stm_sql = $db_connection->prepare($sql);
      $stm_sql->bindParam(':nome', $nome);
      $stm_sql->bindParam(':descricao', $descricao);
      $stm_sql->bindParam(':id', $id);

      $result = $stm_sql->execute();

      if($result){
        $link = "main.php?folder=categories/&file=frmins.php";
        $msg = "Alteração efetuada com sucesso!";
        $status = "success";
      }else{
        $msg = "Falha ao alterar!";
      }
    }else{
      $msg = "Essa categoria já está cadastrada no banco de dados.";
      $status = "warning";
    }
  }

  header("Location: " . $link . "&msg=".$msg."&status=".$status);

?>
