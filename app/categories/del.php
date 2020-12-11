<?php
  include "../../security/authentication/validationurl.php";
  $locationTxt = "Location: ../../index.php";
  $status = "danger";

  $id = $_GET['id'];

  $msg = "";

  $sql = "DELETE FROM categorias WHERE id=:id";

  $stm_sql = $db_connection->prepare($sql);
  $stm_sql->bindParam(':id', $id);

  $result = $stm_sql->execute();

  if($result){
    $msg = "Categoria excluída com sucesso.";
    $status = "success";
  }else{
    $msg = "Erro ao exluir categoria.";
  }

  header("Location: main.php?folder=categories/&file=frmins.php&msg=".$msg."&status=".$status);

?>
