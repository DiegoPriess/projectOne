<?php
  include "../../security/authentication/validationurl.php";
  $locationTxt = "Location: ../../index.php";

  $code        = $_POST['codigo'];
  $model       = $_POST['modelo'];
  $cost        = $_POST['valor'];
  $description = $_POST['descricao'];
  $category    = $_POST['categoria'];

  $status = "danger";

  $msg = "";
  $link = "main.php?folder=products/&file=frmupd.php&codigo=".$code."&idCategoria=".$category;

  if($category==""){
    $msg = "Selecione uma categoria.";
    }elseif($model==""){
        $msg = "Preencha o campo de modelo.";
      }elseif($cost==""){
        $msg = "Preencha o campo de valor.";
        }elseif($description==""){
          $msg = "Preencha o campo descricao.";
          }elseif($code==""){
              $msg = "Hmmm, parece que temos um hackermen do html aqui.";
  }else{

    $sql = "SELECT modelo FROM produtos WHERE modelo=:modelo AND codigo<>:codigo";

    $stm_sql = $db_connection->prepare($sql);
    $stm_sql->bindParam(':modelo', $model);
    $stm_sql->bindParam(':codigo', $code);
    $stm_sql->execute();

    if($stm_sql->rowCount()==0){

      $sql = "UPDATE produtos SET modelo=:modelo, valor=:valor, descricao=:descricao, categorias_id=:categorias_id WHERE codigo=:codigo";
      $stm_sql = $db_connection->prepare($sql);
      $stm_sql->bindParam(':modelo', $model);
      $stm_sql->bindParam(':valor', $cost);
      $stm_sql->bindParam(':descricao', $description);
      $stm_sql->bindParam(':categorias_id', $category);
      $stm_sql->bindParam(':codigo', $code);

      $result = $stm_sql->execute();

      if($result){
        $link = "main.php?folder=products/&file=frmins.php";
        $msg = "Alteração efetuada com sucesso!";
        $status = "success";
      }else{
        $msg = "Falha ao alterar!";
      }
    }else{
      $msg = "Esse produtos já está cadastrado no banco de dados.";
      $status = "warning";
    }
  }

  header("Location: " . $link . "&msg=".$msg."&status=".$status);
?>
