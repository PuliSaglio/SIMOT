<?php
include_once "../controles/a_conexao.php";
include "./visoes/login.php";


if (isset($_POST['cadastrar'])) {
  if(isset($_POST['login'])){
    $login = $_POST['login'];
  }
  if(isset($_POST['senha'])){
    $senha = MD5($_POST['senha']);
  }
  $con = abrirConexao();
  $sql = "SELECT login FROM usuarios WHERE login = '$login'";
  
  $select = mysqli_query($con, $sql);
  $array = mysqli_fetch_array($select);
  $logarray = $array['login'];

  if ($login == "" || $login == null) {
    echo "<script language='javascript' type='text/javascript'>
    alert('O campo login deve ser preenchido');window.location.href='
    cadastro.html';</script>";

  } else {
    if ($logarray == $login) {

      echo "<script language='javascript' type='text/javascript'>
        alert('Esse login já existe');window.location.href='
        cadastro.html';</script>";
      die();

    } else {
      $con = abrirConexao();
      $sql = "INSERT INTO usuarios (login,senha) VALUES ('$login','$senha')";

      if(mysqli_query($con, $sql)){
        echo "Cadastro realizado com sucesso! <a href='login.php'>Ir para a página de Login</a>";
      } else {
          echo "Erro ao tentar cadastrar prefeitura: ";
      }
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="../templates/estilo.css">
</head>
<body>
<form action="cadastro.php" method="POST">
    <label>Login:</label><input type="text" name="login" id="login"><br>
    <label>Senha:</label><input type="password" name="senha" id="senha"><br>
    <input type="submit" value="Cadastrar" id="cadastrar" name="cadastrar">
</form>
</body>
</html>