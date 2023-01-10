<?php
include_once "../controles/a_conexao.php";

function fazerLogin($login, $senha){
    $con = abrirConexao();
    $sql = "SELECT * FROM usuarios WHERE login =
    '$login' AND senha = '$senha'" or die("erro ao selecionar");

    $result = mysqli_query($con, $sql);
    mysqli_close($con);

    return $result;
}

  if (isset($_POST['entrar'])) { 
    if(isset($_POST['login'])){
        $login = $_POST['login'];
      }
      if(isset($_POST['senha'])){
        $senha = MD5($_POST['senha']);
      }

    $verifica = fazerLogin($login, $senha);
      if (mysqli_num_rows($verifica)<=0){
        echo"<script language='javascript' type='text/javascript'>
        alert('Login e/ou senha incorretos');window.location
        .href='login.php';</script>";
        die();
      }else{
        setcookie('login', $login);
        setcookie('senha', $senha);
        header("Location:./pesquisar_prefeituras.php?login=".base64_encode($login)."&".base64_encode($senha));
      }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form  action="login.php" method="POST">
        <label>Login:</label><input type="text" name="login" id="login"><br>
        <label>Senha:</label><input type="password" name="senha" id="senha"><br>
        <input type="submit" value="entrar" id="entrar" name="entrar"><br>
        <a href="cadastro.html">Cadastre-se</a>
    </form>
</body>
</html>