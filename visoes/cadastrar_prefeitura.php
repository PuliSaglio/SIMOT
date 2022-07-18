
<?php

include "../controles/controlar_prefeituras.php";

    $verificar = "";
    $nome_municipio = "";  
    $uf = "";
    $regiao_turistica = "";
    $logradouro = "";
    $numero = "";
    $complemento = "";
    $bairro = "";
    $email = "";
    $site = "";
    $cnpj = "";
    $latitude = "";
    $longitude = "";
    $distancia_capital = "";
    $qtd_Funcionarios = "";
    $qtd_funcionarios_deficiencia = "";
    $nome_prefeito = "";
    $aniversario_municipal = "";
    $santo_padroeiro = "";

    if(isset($_POST["nome_municipio"])) {
        $nome_municipio = $_POST["nome_municipio"];
    }
    if(isset($_POST["uf"])) {
        $uf = $_POST["uf"];
    }
    if(isset($_POST["regiao_turistica"])){
        $regiao_turistica = $_POST["regiao_turistica"];
    }
    if(isset($_POST["logradouro"])){
        $logradouro = $_POST["logradouro"];
    }
    if(isset($_POST["numero"])){
        $numero = $_POST["numero"];
    }
    if(isset($_POST["complemento"])){
        $complemento = $_POST["complemento"];
    }
    if(isset($_POST["bairro"])){
        $bairro = $_POST["bairro"];
    }
    if(isset($_POST["email"])){
        $email = $_POST["email"];
    }
    if(isset($_POST["site"])){
        $site = $_POST["site"];
    }
    if(isset($_POST["cnpj"])){
        $cnpj = $_POST["cnpj"];
    }
    if(isset($_POST["latitude"])){
        $latitude = $_POST["latitude"];
    }
    if(isset($_POST["longitude"])){
        $longitude = $_POST["longitude"];
    }
    if(isset($_POST["distancia_capital"])){
        $distancia_capital = $_POST["distancia_capital"];
    }
    if(isset($_POST["qtd_Funcionarios"])){
        $qtd_Funcionarios = $_POST["qtd_Funcionarios"];
    }
    if(isset($_POST["qtd_funcionarios_deficiencia"])){
        $qtd_funcionarios_deficiencia = $_POST["qtd_funcionarios_deficiencia"];
    }
    if(isset($_POST["nome_prefeito"])){
        $nome_prefeito = $_POST["nome_prefeito"];
    }
    if(isset($_POST["aniversario_municipal"])){
        $aniversario_municipal = $_POST["aniversario_municipal"];
    }
    if(isset($_POST["santo_padroeiro"])){
        $santo_padroeiro = $_POST["santo_padroeiro"];
    }
    if(isset($_POST["btnCadastrar"])){

        $verificar = verificarEntradas($nome_municipio, $uf, $regiao_turistica, $logradouro, $numero, $bairro, $email, $cnpj, $latitude, $longitude, $distancia_capital, $qtd_Funcionarios, $qtd_funcionarios_deficiencia, $nome_prefeito, $aniversario_municipal, $santo_padroeiro);

        $msg = cadastrarPrefeitura($nome_municipio, $uf, $regiao_turistica, $logradouro, $numero, $complemento, $bairro, $email, $site, $cnpj, $latitude, $longitude, $distancia_capital, $qtd_Funcionarios, $qtd_funcionarios_deficiencia, $nome_prefeito, $aniversario_municipal, $santo_padroeiro);

    }

?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de prefeitura</title>
</head>
<body>
    <form action="cadastrar_prefeitura.php" name="cadastrar_prefeitura.php" id="cadastrar_prefeitura.php" method = "POST"> 
    
        <table border = "2">
            <tr>
                <td colspan = "2"><a href="../index.php"> Voltar à página inicial </a></td>
            </tr>
            <tr>
                <td colspan = "2"> <h2>Cadastrar prefeitura</h2></td>
            </tr>
            <tr>
                <td colspan = "2"> <?php echo "$verificar"; ?></td>
            </tr>
            <tr>
                <td>Nome do município: </td>
                <td><input type="text" name="nome_municipio" id="nome_municipio" placeholder = "Município"></td>
            </tr>
            <tr>
                <td>Unidade Federativa: </td>
                <td><input type="text" name = "uf" id = "uf" placeholder = "UF"></td>
            </tr>
            <tr>
                <td>Região Turística: </td>
                <td><input type="text" name = "regiao_turistica" id = "regiao_turistica" placeholder = ""></td>
            </tr>
            <tr>
                <td>Logradouro: </td>
                <td><input type="text" name = "logradouro" id = "logradouro" placeholder = ""></td>
            </tr>
            <tr>
                <td>Número: </td>
                <td><input type="number" name = "numero" id = "numero" placeholder = ""></td>
            </tr>

            <tr>
                <td>Complemento (opcional): </td>
                <td><input type="text" name = "complemento" id = "complemento" placeholder = ""></td>
            </tr>
            <tr>
                <td>Bairro: </td>
                <td><input type="text" name = "bairro" id = "bairro" placeholder = ""></td>
            </tr>
            <tr>
                <td>Email: </td>
                <td><input type="email" name = "email" id = "email" placeholder = ""></td>
            </tr>
            <tr>
                <td>Site (opcional): </td>
                <td><input type="text" name = "site" id = "site" placeholder = ""></td>
            </tr>
            <tr>
                <td>CNPJ: </td>
                <td><input type="number" name = "cnpj" id = "cnpj" placeholder = ""></td>
            </tr>
            <tr>
                <td>Latitude: </td>
                <td><input type="number" name = "latitude" id = "latitude" placeholder = ""></td>
            </tr>
            <tr>
                <td>Longitude: </td>
                <td><input type="number" name = "longitude" id = "longitude" placeholder = ""></td>
            </tr>
            <tr>
                <td>Distância da capital em km: </td>
                <td><input type="number" name = "distancia_capital" id = "distancia_capital" placeholder = ""></td>
            </tr>
            <tr>
                <td>Quantidade de funcionários: </td>
                <td><input type="number" name = "qtd_Funcionarios" id = "qtd_Funcionarios" placeholder = ""></td>
            </tr>
            <tr>
                <td>Quantidade de funcionários deficientes: </td>
                <td><input type="number" name = "qtd_funcionarios_deficiencia" id = "qtd_funcionarios_deficiencia" placeholder = ""></td>
            </tr>
            <tr>
                <td>Nome do prefeito: </td>
                <td><input type="text" name="nome_prefeito" id="nome_prefeito"></td>
            </tr>
            <tr>
                <td>Aniversário do município: </td>
                <td><input type="text" name = "aniversario_municipal" id = "aniversario_municipal" placeholder = "yyyy-mm-dd"></td>
            </tr>
            <tr>
                <td>Santo(a) padroeiro(a):</td>
                <td><input type="text" name = "santo_padroeiro" id = "santo_padroeiro"></td>
            </tr>
            <tr>
                <td><input type="submit" name = "btnCadastrar" value = "Cadastrar"></td>
            </tr>
            
        </table>
    
    
    
    </form>
</body>
</html>

