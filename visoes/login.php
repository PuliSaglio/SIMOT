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

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../templates/estilo.css">
        <link rel="stylesheet" href="../templates/style.css">
        <style>

        </style>
    </head>
    <body>
        <main>
            <div class="container  text-center">
            <ul>
                <form  action="login.php" method="POST">
            <li><label>Login:</label><input type="text" name="login" id="login"><br></li>
            <li><label>Senha:</label><input type="password" name="senha" id="senha"><br></li>
            <li><input type="submit" value="entrar" id="entrar" name="entrar"><br></li>
                    <li><p>Não tem login? clique aqui embaixo para cadastrar-se</p></li>
            <a href="cadastro.html"><button>Cadastre-se</button></a>
            </form>
            <ul>
            </div>   
        </main>
    </body>
</html>