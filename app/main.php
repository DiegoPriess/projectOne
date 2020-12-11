<?php
  include "../security/authentication/validation.php";
  include "../security/database/connection.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Project One</title>
    <script src="../assets/js/main.js"></script>
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="../assets/js/bootstrap.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="main.php">Project One</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="main.php?folder=users/&file=frmins.php">Usuários</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="main.php?folder=categories/&file=frmins.php">Adicione categorias</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="main.php?folder=products/&file=frmins.php">Adicione um produto</a>
          </li>
          <li class="nav-item float-right">
            <a class="nav-link" href="../security/authentication/logout.php">Sair</a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="container-fluid mt-3">
      <?php
        $locationTxt = "Location: ../index.php";

        if(isset($_GET['msg'])&&isset($_GET['status'])){ ?>
          <div class="alert alert-<?php echo $_GET['status'] ?>" role="alert">
            <?php echo $_GET['msg']; ?>
          </div>
      <?php } ?>

      <div id="conteudo" class="row">
        <?php

          if((isset($_GET['file']))&(isset($_GET['folder']))){
            if(@!include $_GET['folder'].$_GET['file']){
              include "404.php";
            }
          }else{
            echo "Bem vindo(a) " . $_SESSION['usuario'];
            echo " - " . $_SESSION['idsessao'];
          }

        ?>
      </div>
    </div>
  </body>
</html>
