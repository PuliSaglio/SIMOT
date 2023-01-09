
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisar Prefeituras</title>
</head>
<body>
<form action="pesquisar_prefeituras.php" method="post">
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
    <form action="pesquisar_prefeituras.php" method="post">
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
    
</body>
</html>