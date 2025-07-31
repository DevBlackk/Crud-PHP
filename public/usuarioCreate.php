<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Usuário - Criar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>
  <?php include('navBar.php'); ?>
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4>Adicionar Usuário
              <a href="index.php" class="btn btn-danger float-end">Voltar</a>
            </h4>
          </div>
          <div class="card-body">
            <form action="actions.php" method="post">
              <div class="mb-3">
                <label for="nome">Nome</label>
                <input type="text" name="nome" class="form-control" id="nome">
              </div>
              <div class="mb-3">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" id="email">
              </div>
              <div class="mb-3">
                <label for="data-nascimento">Data de Nascimento</label>
                <input type="date" name="data-nascimento" class="form-control" id="data-nascimento">
              </div>
              <div class="mb-3">
                <label for="password">Senha</label>
                <input type="password" name="password" class="form-control" id="password">
              </div>
              <div class="mb-3">
                <button type="submit" name="createUsuario" class="btn btn-primary">Salvar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>
