<?php
  include "../../security/authentication/validationurl.php";
  $locationTxt = "Location: ../../index.php";

  $nome        = $_POST['nome'];
  $descricao   = $_POST['descricao'];

  $msg = "";
  $status = "danger";

  if($nome==""){
    $msg = "Preencha o campo nome.";
  }elseif($descricao==""){
    $msg = "Preencha o campo descricao.";
  }else{

    $sql = "SELECT nome FROM categorias WHERE nome=:nome";

    $stm_sql = $db_connection->prepare($sql);
    $stm_sql->bindParam(':nome', $nome);
    $stm_sql->execute();

    if($stm_sql->rowCount()==0){

      $sql = "INSERT INTO categorias (id, nome, descricao) VALUES (:id, :nome, :descricao)";

      $stm_sql = $db_connection->prepare($sql);

      $id = null;

      $stm_sql->bindParam(':id', $id);
      $stm_sql->bindParam(':nome', $nome);
      $stm_sql->bindParam(':descricao', $descricao);

      $result = $stm_sql->execute();

      if($result){
        $msg = "Cadastro efetuado com sucesso!";
        $status = "success";
      }else{
        $msg = "Falha ao cadastrar!";
      }
    }else{
      $msg = "Esse usuário já está cadastrado no banco de dados.";
      $status = "warning";
    }
  }

  header("Location: main.php?folder=categories/&file=frmins.php&msg=".$msg."&status=".$status);
?>
