<?php
  include "../../security/authentication/validationurl.php";
  $locationTxt = "Location: ../../index.php";

  $id        = $_POST['id'];
  $email     = $_POST['email'];
  $usuario   = $_POST['usuario'];
  $senha     = $_POST['senha'];

  $status    = "danger";

  $senha_criptografada = md5($senha);

  $msg = "";
  $link = "main.php?folder=users/&file=frmupd.php&id=".$id;

  if($email==""){
    $msg = "Preencha o campo e-mail.";
  }elseif($usuario==""){
    $msg = "Preencha o campo usuário.";
  }elseif($senha==""){
    $msg = "Preencha o campo senha.";
  }else{

    $sql = "SELECT * FROM usuarios WHERE usuario=:usuario AND id<>:id";

    $stm_sql = $db_connection->prepare($sql);
    $stm_sql->bindParam(':usuario', $usuario);
    $stm_sql->bindParam(':id', $id);
    $stm_sql->execute();

    if($stm_sql->rowCount()==0){

      $sql = "UPDATE usuarios SET email=:email, usuario=:usuario, senha=:senha WHERE id=:id";
      $stm_sql = $db_connection->prepare($sql);
      $stm_sql->bindParam(':email', $email);
      $stm_sql->bindParam(':usuario', $usuario);
      $stm_sql->bindParam(':senha', $senha_criptografada);
      $stm_sql->bindParam(':id', $id);

      $result = $stm_sql->execute();

      if($result){
        $link   = "main.php?folder=users/&file=frmins.php";
        $msg    = "Alteração efetuada com sucesso!";
        $status = "success";
      }else{
        $msg = "Falha ao alterar!";
      }
    }else{
      $msg    = "Esse usuário já está cadastrado no banco de dados.";
      $status = "warning";
    }

  }

  header("Location: " . $link . "&msg=".$msg."&status=".$status);
?>
