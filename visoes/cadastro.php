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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/fontawesome.min.css" integrity="sha512-giQeaPns4lQTBMRpOOHsYnGw1tGVzbAIHUyHRgn7+6FmiEgGGjaG0T2LZJmAPMzRCl+Cug0ItQ2xDZpTmEc+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/brands.min.css" integrity="sha512-G/T7HQJXSeNV7mKMXeJKlYNJ0jrs8RsWzYG7rVACye+qrcUhEAYKYzaa+VFy6eFzM2+/JT1Q+eqBbZFSHmJQew==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/solid.min.css" integrity="sha512-6mc0R607di/biCutMUtU9K7NtNewiGQzrvWX4bWTeqmljZdJrwYvKJtnhgR+Ryvj+NRJ8+NnnCM/biGqMe/iRA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="../templates/estilo.css">
  <link rel="stylesheet" href="../templates/style.css">
  <style>

  </style>
</head>
<body>
<header id="header" class="header has-sticky sticky-jump sticky-hide-on-scroll">
            <div class="header-wrapper">
                <div id="masthead" class="header-main  ">
                    <div class="header-inner flex-row container logo-left" role="navigation">

                        <!-- Logo -->
                        <div id="logo" class="flex-col logo">
                            <!-- Header logo -->
                            <a href="../templates/media/logosimot01.jpeg"
                                title="SIMOT" rel="home">
                                <img width="200" height="154"
                                    src="../templates/media/logosimot01.jpeg"
                                    class="header_logo header-logo" alt="Simot" /><img width="200" height="154"
                                    src="../templates/simot.html"
                                    class="header-logo-dark" alt="Simot" /></a>
                        </div>

                        <!-- Mobile Left Elements -->
                        <div class="flex-col show-for-medium flex-left">
                            <ul class="mobile-nav nav nav-left ">
                            </ul>
                        </div>

                        <!-- Left Elements -->
                        <div class="flex-col hide-for-medium flex-left flex-grow">
                            <ul class="header-nav header-nav-main nav nav-left  nav-size-medium nav-spacing-large">
                            </ul>
                        </div>

                        <!-- Right Elements -->
                        <div class="flex-col hide-for-medium flex-right">
                            <ul class="header-nav header-nav-main nav nav-right  nav-size-medium nav-spacing-large">

                                <li id="menu-item-13792" 
                                    class="menuborder contato-topo menu-item menu-item-type-post_type menu-item-object-page menu-item-13792 menu-item-design-default">
                                    <a href="http://localhost/SIMOT/templates/simot.html"
                                     class="nav-top-link">Voltar</a></li>
                          
                            </ul>
                        </div>

                        <!-- Mobile Right Elements -->
                        <div class="flex-col show-for-medium flex-right">
                            <ul class="mobile-nav nav nav-right ">
                                <li class="nav-icon has-icon">
                                    <a href="#" data-open="#main-menu" data-pos="left" data-bg="main-menu-overlay"
                                        data-color="dark" class="is-small" aria-label="Menu" aria-controls="main-menu"
                                        aria-expanded="false">

                                        <i class="icon-menu"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div><!-- .header-inner -->

                </div><!-- .header-main -->
                <div class="header-bg-container fill">
                    <div class="header-bg-image fill"></div>
                    <div class="header-bg-color fill"></div>
                </div>
            </div><!-- header-wrapper-->

            <!-- <script src="//code.jivosite.com/widget/HlRFWX5HNL" async></script> -->

        </header>
<form action="cadastro.php" method="POST">
    <label>Login:</label><input type="text" name="login" id="login"><br>
    <label>Senha:</label><input type="password" name="senha" id="senha"><br>
    <input type="submit" value="Cadastrar" id="cadastrar" name="cadastrar">
</form>
</body>
</html>