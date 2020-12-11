<?php

  $usuario = $_POST['usuario'];
  $senha = $_POST['senha'];

  $senha_criptografada = md5($senha);

  $msg = "";

  if($usuario == ""){
    $msg = "Preencha o campo usuario";
    $link = "../../index.php?msg=".$msg;
    }else if($senha == ""){
      $msg = "Preencha o campo senha";
      $link = "../../index.php?msg=".$msg;
    }else{

      include "../database/connection.php";

      $sql = "SELECT usuario, senha FROM usuarios WHERE usuario=:usuario AND senha=:senha";

      $stm_sql = $db_connection->prepare($sql);
      $stm_sql->bindParam(':usuario', $usuario);
      $stm_sql->bindParam(':senha', $senha_criptografada);
      $stm_sql->execute();

      if($stm_sql->rowCount()==1){
        session_start();
        $_SESSION['usuario']  = $usuario;
        $_SESSION['senha']    = $senha;
        $_SESSION['idsessao'] = session_id();

        $link = "../../app/main.php";
      }else{
        $msg = "Usuário ou senha incorretos";
        $link = "../../index.php?msg=".$msg;
      }
    }

    header("location:" . $link );

?>
