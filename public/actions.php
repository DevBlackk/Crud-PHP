<?php
ob_start();

global $connection;
session_start();
require '../confgs/connection.php';

if (isset($_POST['createUsuario'])) {
  $name = pg_escape_string($connection, trim($_POST['nome']));
  $email = pg_escape_string($connection, trim($_POST['email']));
  $password = isset($_POST['password']) ? pg_escape_string($connection, password_hash(trim($_POST['password']), PASSWORD_DEFAULT)) : '';
  $dataNascimento = pg_escape_string($connection, trim($_POST['data-nascimento']));

  $sql = "INSERT INTO usuarios (nome, email, data_nascimento, senha) VALUES ('$name', '$email', '$dataNascimento', '$password')";

  $result = pg_query($connection, $sql);

  if ($result && pg_affected_rows($result) > 0) {
    $_SESSION['mensagem'] = 'Usuário criado com sucesso!';
    header('Location: index.php');
    exit;
  } else {
    $_SESSION['mensagem'] = 'Não foi possivel criar usuário!';
    header('Location: index.php');
    exit;
  }
}

if (isset($_POST['updateUsuario'])) {
  $usuarioId = (int)pg_escape_string($connection, $_POST['usuarioId'] ?? '');

  $name = pg_escape_string($connection, trim($_POST['nome']));
  $email = pg_escape_string($connection, trim($_POST['email']));
  $rawPassword = trim($_POST['password']);
  $dataNascimento = pg_escape_string($connection, trim($_POST['data-nascimento']));

  $sql = "UPDATE usuarios SET nome = '$name', email = '$email', data_nascimento = '$dataNascimento'";

  if (!empty($rawPassword)) {
    $hashedPassword = pg_escape_string($connection, password_hash($rawPassword, PASSWORD_DEFAULT));
    $sql .= ", senha = '$hashedPassword'";
  }

  $sql .= " WHERE id = $usuarioId";

  $result = pg_query($connection, $sql);

  if ($result && pg_affected_rows($result) > 0) {
    $_SESSION['mensagem'] = 'Usuário atualizado com sucesso!';
    header('Location: index.php');
    exit;
  } else {
    $_SESSION['mensagem'] = 'Não foi possivel atualizar usuário!';
    header('Location: index.php');
    exit;
  }
}

if (isset($_POST['deleteUsuario'])) {
  $usuarioId = (int)pg_escape_string($connection, $_POST['deleteUsuario']);

  $sql = "DELETE FROM usuarios WHERE id = '$usuarioId'";

  $result = pg_query($connection, $sql);

  if (pg_affected_rows($result) > 0) {
    $_SESSION['mensagem'] = "Usuário deletado com sucesso!";
    header('Location: index.php');
    exit;
  } else {
    $_SESSION['mensagem'] = "Usuário não foi deletado!";
    header('Location: index.php');
    exit;
  }
}

ob_end_flush();
