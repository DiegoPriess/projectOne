<?php
  include "../../security/authentication/validationurl.php";
  $locationTxt = "Location: ../../index.php";

  $idCategory    = $_POST['categoria'];
  $model         = $_POST['modelo'];
  $cost          = $_POST['valor'];
  $description   = $_POST['descricao'];

  $status = "danger";

  $msg = "";

  if($idCategory==""){
    $msg = "Selecione uma categoria.";
    }elseif($model==""){
        $msg = "Preencha o campo de modelo.";
      }elseif($cost==""){
        $msg = "Preencha o campo de valor.";
        }elseif($description==""){
          $msg = "Preencha o campo descricao.";
  }else{

    $sql = "SELECT modelo FROM produtos WHERE modelo=:modelo";

    $stm_sql = $db_connection->prepare($sql);
    $stm_sql->bindParam(':modelo', $modelo);
    $stm_sql->execute();

    if($stm_sql->rowCount()==0){

      $sql = "INSERT INTO produtos (codigo, modelo, valor, descricao, categorias_id) VALUES (:codigo, :modelo, :valor, :descricao, :categorias_id)";

      $stm_sql = $db_connection->prepare($sql);

      $code = null;

      $stm_sql->bindParam(':codigo', $code);
      $stm_sql->bindParam(':modelo', $model);
      $stm_sql->bindParam(':valor', $cost);
      $stm_sql->bindParam(':descricao', $description);
      $stm_sql->bindParam(':categorias_id', $idCategory);

      $result = $stm_sql->execute();

      if($result){
        $msg = "Cadastro efetuado com sucesso!";
        $status = "success";
      }else{
        $msg = "Falha ao cadastrar!";
      }
    }else{
      $msg = "Esse produto já está cadastrado no banco de dados.";
      $status = "warning";
    }
  }

  header("Location: main.php?folder=products/&file=frmins.php&msg=".$msg."&status=".$status);

?>
