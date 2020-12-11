<?php
  include "../../security/authentication/validationurl.php";
  $locationTxt = "Location: ../../index.php";
  $status = "danger";

  $codigo = $_GET['codigo'];
  $msg = "";

  $sql = "DELETE FROM produtos WHERE codigo=:codigo";

  $stm_sql = $db_connection->prepare($sql);
  $stm_sql->bindParam(':codigo', $codigo);

  $result = $stm_sql->execute();

  if($result){
    $msg = "Produto excluído com sucesso.";
    $status = "success";
  }else{
    $msg = "Erro ao exluir produto.";
  }

  header("Location: main.php?folder=products/&file=frmins.php&msg=".$msg."&status=".$status);

?>
