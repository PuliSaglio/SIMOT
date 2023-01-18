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
<html lang="pt-BR">
<head>
<meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/fontawesome.min.css" integrity="sha512-giQeaPns4lQTBMRpOOHsYnGw1tGVzbAIHUyHRgn7+6FmiEgGGjaG0T2LZJmAPMzRCl+Cug0ItQ2xDZpTmEc+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/brands.min.css" integrity="sha512-G/T7HQJXSeNV7mKMXeJKlYNJ0jrs8RsWzYG7rVACye+qrcUhEAYKYzaa+VFy6eFzM2+/JT1Q+eqBbZFSHmJQew==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/solid.min.css" integrity="sha512-6mc0R607di/biCutMUtU9K7NtNewiGQzrvWX4bWTeqmljZdJrwYvKJtnhgR+Ryvj+NRJ8+NnnCM/biGqMe/iRA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="../templates/style.css">
  <style>

  </style>
</head>
<body>
  <main class="main-content-container">
    <div class="search-container centralizar">
      <div class="container">
        <form class="search-form"  action="login.php" method="POST" >
            <table>
              <tr>
                <td><label>Login:</label></td>
                <td><input type="text" name="login" id="login" class="search-input" ><br></td>
              </tr>
              <tr>
                <td><label>Senha:</label></td>
                <td><input type="password" name="senha" id="senha" class="search-input"><br><br></td>
              </tr>
              <tr>
                <td colspan="2"> <input type="submit" value="entrar" id="entrar" name="entrar" class="search-button"><br></td>
              </tr>
              <tr>
                <td colspan="2"> <a href="cadastro.html">Cadastre-se</a></td>
              </tr>
            </table>
        </form>
      </div>
    </div>

  </main>
</body>


</html>