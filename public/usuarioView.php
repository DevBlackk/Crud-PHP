<?php
require '../confgs/connection.php';
?>
<!doctype html>
<html lang="pr-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Usuário - Visualizar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>
<?php include('navBar.php'); ?>
<div class="container mt-5">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4>Usuário - Visualizar
            <a href="index.php" class="btn btn-danger float-end">Voltar</a>
          </h4>
        </div>
        <div class="card-body">
          <?php
          if (isset($_GET['id'])) {
            $usuarioId = (int)pg_escape_string($connection, $_GET['id']);
            $sql = "SELECT * FROM usuarios WHERE id = {$usuarioId}";
            $result = pg_query($connection, $sql);

            if (pg_num_rows($result) > 0) {
              $usuario = pg_fetch_assoc($result)
          ?>
          <div class="mb-3">
            <label for="nome">Nome</label>
            <p class="form-control">
              <?= $usuario['nome'] ?>
            </p>
          </div>
          <div class="mb-3">
            <label for="nome">Email</label>
            <p class="form-control">
              <?= $usuario['email'] ?>
            </p>
          </div>
          <div class="mb-3">
            <label for="nome">Data Nascimento</label>
            <p class="form-control">
              <?= date("d/m/Y", strtotime($usuario['data_nascimento'])) ?>
            </p>
          </div>
          <?php
            } else {
              echo "<h5>Usuário não encontrado!</h5>";
            }
            pg_free_result($result);
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>
