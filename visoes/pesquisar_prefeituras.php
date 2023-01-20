
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisar Prefeituras</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/fontawesome.min.css" integrity="sha512-giQeaPns4lQTBMRpOOHsYnGw1tGVzbAIHUyHRgn7+6FmiEgGGjaG0T2LZJmAPMzRCl+Cug0ItQ2xDZpTmEc+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/brands.min.css" integrity="sha512-G/T7HQJXSeNV7mKMXeJKlYNJ0jrs8RsWzYG7rVACye+qrcUhEAYKYzaa+VFy6eFzM2+/JT1Q+eqBbZFSHmJQew==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/solid.min.css" integrity="sha512-6mc0R607di/biCutMUtU9K7NtNewiGQzrvWX4bWTeqmljZdJrwYvKJtnhgR+Ryvj+NRJ8+NnnCM/biGqMe/iRA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="../templates/estilo.css">
  <link rel="stylesheet" href="../templates/style.css">
    <style>
        body{
            background-color: white;
        }
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

<main class="main-content-conteiner centralizar">

    <form class="" action="pesquisar_prefeituras.php" method="post">
        <table>
            <tr>
            <td><input type ="submit" name="btnLogout" value="Logout"></td>
            </tr>
        </table>
    <?php
        include "../controles/controle.php";
        include_once "../controles/a_conexao.php";
        $login_cookie = $_COOKIE['login'];
        $senha_cookie = $_COOKIE['senha'];
      
        

        if(isset($login_cookie) && isset($senha_cookie)){
            setcookie('login', $login_cookie, time()+3600, "localhost");
            setcookie('senha', $senha_cookie, time()+3600, "localhost");
            echo"Bem-Vindo!<br>";
    ?>
<h1>PESQUISAR PREFEITURAS</h1>
    <form class="search-form" action="pesquisar_prefeituras.php" method="post">
        <table>
            <tr>
            <td> <input type="text" name="search" placeholder="Nome da Prefeitura"></td>
            <td><input type ="submit" name="btnPesquisar" value="Pesquisar"></td>
            </tr>
        </table>
    </form>
    <?php
            if (isset($_POST['btnLogout'])) {
                setcookie('login', '');
                setcookie('senha', '');
                header("Location:./login.php");
            }
            if(isset($_POST['btnPesquisar'])){
                if (isset($_POST['search'])) {
                    $search = $_POST['search'];
                }
                $con = abrirConexao();

                $sql = "select * from infobas_municipios where nome_municipio like '%$search%'";

            
                $result = mysqli_query($con,$sql);

                if ($result->num_rows > 0){
                while($row = $result->fetch_assoc() ){
                    echo "<p><a href='form_a1.php?id_municipios=".$row["id_municipios"]."&fkid_municipios=".$row["id_municipios"]."'>".$row["nome_municipio"]."</a></p>";
                    
                }
                } else {
                    echo "Nao encontrado.";
                }
            }
                echo "<h2>LISTA DAS PREFEITURAS CADASTRADAS</h2>";

            $result = listarPrefeituras();

            while($registro = mysqli_fetch_array($result)){
                $nome_municipio = $registro["nome_municipio"]; 

                echo "<p id='$nome_municipio'><a href = 'form_a1.php?id_municipios=".$registro["id_municipios"]."&fkid_municipios=".$registro["id_municipios"]."'>" . $nome_municipio. "</a></p>";
                
            }
            echo "<p><button><a href='form_a1.php'>Cadastrar Nova Prefeitura</a></button></p>";
        }else{
            echo"Bem-Vindo, convidado <br>";
            echo"Essas informações <font color='red'>NÃO PODEM</font> ser acessadas por você";
            echo"<br><a href='./login.php'>Faça Login</a> Para ler o conteúdo";
        }
    ?>
    </main>
</body>
</html>