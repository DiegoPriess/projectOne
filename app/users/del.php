<?php
  include "../../security/authentication/validationurl.php";

  $locationTxt = "Location: ../../index.php";
  $status = "danger";
  $msg = "";

  $id = $_GET['id'];

  $sql = "DELETE FROM usuarios WHERE id=:id";

  $stm_sql = $db_connection->prepare($sql);
  $stm_sql->bindParam(':id', $id);

  $result = $stm_sql->execute();

  if($result){
    $msg = "Usuário excluído com sucesso.";
    $status = "success";
  }else{
    $msg = "Erro ao exluir usuário.";
  }

  header("Location: main.php?folder=users/&file=frmins.php&msg=".$msg."&status=".$status);

?>
