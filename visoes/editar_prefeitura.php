<?php


include "..\controles\controlar_prefeituras.php";

    $id_municipios = "";
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

    if(isset($_GET["id_municipios"])){
        $id_municipios = $_GET["id_municipios"];

        $result = pegarPrefeitura($id_municipios);
        $numRegistros = mysqli_num_rows($result);

        if($numRegistros > 0){
            while($row = mysqli_fetch_assoc($result)){
                $id_municipios = $row['id_municipios'];
                $nome_municipio = $row['nome_municipio'];
                $uf = $row['uf'];
                $regiao_turistica = $row['regiao_turistica'];
                $logradouro = $row['logradouro'];
                $numero = $row['numero'];
                $complemento = $row['complemento'];
                $bairro = $row['bairro'];
                $email = $row['email'];
                $site = $row['site'];
                $cnpj = $row['cnpj'];
                $latitude = $row['latitude'];
                $longitude = $row['longitude'];
                $distancia_capital = $row['distancia_capital_km'];
                $qtd_Funcionarios = $row['qtd_Funcionarios'];
                $qtd_funcionarios_deficiencia = $row['qtd_funcionarios_deficiencia'];
                $nome_prefeito = $row['nome_prefeito'];
                $aniversario_municipal = $row['aniversario_municipal'];
                $santo_padroeiro = $row['santo_padroeiro'];

            }
        }
    }




    if(isset($_POST["btnAtualizar"])) {
        if(isset($_POST["id_municipios"])){
            $id_municipios = $_POST["id_municipios"];
        }
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
        if(isset($_POST["distancia_capital_km"])){
            $distancia_capital = $_POST["distancia_capital_km"];
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

        $msg = editarPrefeitura($id_municipios, $nome_municipio, $uf, $regiao_turistica, $logradouro, $numero, $complemento, $bairro, $email, $site, $cnpj, $latitude, $longitude, $distancia_capital, $qtd_Funcionarios, $qtd_funcionarios_deficiencia, $nome_prefeito, $aniversario_municipal, $santo_padroeiro);

    }



?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="editar_prefeitura.php" name="editar_prefeitura.php" id="editar_prefeitura.php" method = "POST"> 
    
    <table>
        <tr>
            <td colspan = "2"><a href="../index.php"> Voltar à página inicial </a></td>
        </tr>
        <tr>
            <td colspan = "2"> <h2>Atualizar prefeitura</h2></td>
        </tr>
        <tr>
            <td>Identificador</td>
            <td> <input type="text" name="id_municipios" value=<?php echo $id_municipios;?>></td>
        </tr>
        <tr>
            <td>Nome do município: </td>
            <td><input type="text" name="nome_municipio" id="nome_municipio" value=<?php echo $nome_municipio;?>></td>
        </tr>
        <tr>
            <td>Unidade Federativa: </td>
            <td><input type="text" name = "uf" id = "uf" value=<?php echo $uf;?>></td>
        </tr>
        <tr>
            <td>Região Turística: </td>
            <td><input type="text" name = "regiao_turistica" id = "regiao_turistica" value=<?php echo $regiao_turistica;?>></td>
        </tr>
        <tr>
            <td>Logradouro: </td>
            <td><input type="text" name = "logradouro" id = "logradouro" value=<?php echo $logradouro;?>></td>
        </tr>
        <tr>
            <td>Número: </td>
            <td><input type="number" name = "numero" id = "numero" value=<?php echo $numero;?>></td>
        </tr>

        <tr>
            <td>Complemento (opcional): </td>
            <td><input type="text" name = "complemento" id = "complemento" value=<?php echo $complemento;?>></td>
        </tr>
        <tr>
            <td>Bairro: </td>
            <td><input type="text" name = "bairro" id = "bairro" value=<?php echo $bairro;?>></td>
        </tr>
        <tr>
            <td>Email: </td>
            <td><input type="email" name = "email" id = "email" value=<?php echo $email;?>></td>
        </tr>
        <tr>
            <td>Site (opcional): </td>
            <td><input type="text" name = "site" id = "site" value=<?php echo $site;?>></td>
        </tr>
        <tr>
            <td>CNPJ: </td>
            <td><input type="number" name = "cnpj" id = "cnpj" value=<?php echo $cnpj;?>></td>
        </tr>
        <tr>
            <td>Latitude: </td>
            <td><input type="number" name = "latitude" id = "latitude" value=<?php echo $latitude;?>></td>
        </tr>
        <tr>
            <td>Longitude: </td>
            <td><input type="number" name = "longitude" id = "longitude" value=<?php echo $longitude;?>></td>
        </tr>
        <tr>
            <td>Distância da capital em km: </td>
            <td><input type="number" name = "distancia_capital_km" id = "distancia_capital" value=<?php echo $distancia_capital;?>></td>
        </tr>
        <tr>
            <td>Quantidade de funcionários: </td>
            <td><input type="number" name = "qtd_Funcionarios" id = "qtd_Funcionarios" value=<?php echo $qtd_Funcionarios;?>></td>
        </tr>
        <tr>
            <td>Quantidade de funcionários deficientes: </td>
            <td><input type="number" name = "qtd_funcionarios_deficiencia" id = "qtd_funcionarios_deficiencia" value=<?php echo $qtd_funcionarios_deficiencia;?>></td>
        </tr>
        <tr>
            <td>Nome do prefeito: </td>
            <td><input type="text" name="nome_prefeito" id="nome_prefeito" value=<?php echo $nome_prefeito;?>></td>
        </tr>
        <tr>
            <td>Aniversário do município: </td>
            <td><input type="text" name = "aniversario_municipal" id = "aniversario_municipal" value=<?php echo $aniversario_municipal;?>></td>
        </tr>
        <tr>
            <td>Santo(a) padroeiro(a):</td>
            <td><input type="text" name = "santo_padroeiro" id = "santo_padroeiro" value=<?php echo $santo_padroeiro;?>></td>
        </tr>
        <tr>
            <td><input type="submit" name = "btnAtualizar" value = "Atualizar"></td>
        </tr>
        
    </table>



</form>
    
</body>
</html>