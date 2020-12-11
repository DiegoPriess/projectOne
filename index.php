<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Project One</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="assets/js/bootstrap.js"></script>
  </head>
  <body id="index-content">
    <div class="container-fluid mt-5">
      <div class="row justify-content-md-center">
        <div class="col-md-4">
            <header>
              <h1>Project One</h1>
              <h2>Entrar: </h2>
            </header>
        </div>
      </div>

      <div class="row justify-content-md-center">
        <div class="col-md-4">

          <?php if(isset($_GET['msg'])){ ?>
            <div class="alert alert-danger" role="alert">
              <?php echo $_GET['msg']; ?>
            </div>
          <?php } ?>

          <div class="shadow-lg p-3 mb-5 bg-white rounded" >
            <form name="auth" action="security/authentication/login.php" method="POST">
              <div class="form-group">
                <label for="idusuario" style="color: #551A8B">Usuário:</label>
                <input name="usuario" type="text" class="form-control" id="idusuario">
              </div>
              <div class="form-group">
                <label for="idsenha" style="color: #551A8B">Senha:</label>
                <input name="senha" type="password" class="form-control" id="idsenha">
              </div>
              <button type="submit" class="btn btn-success" style="background-color: #8B475D">Enviar</button>
            </form>
          </div>

        </div>
      </div>
    </div>

  </body>
</html>
