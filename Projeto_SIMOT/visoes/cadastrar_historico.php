<?php

    include "../controles/controlar_historicos.php";

    $verificar = "";
    $fkid_municipios = "";
    $origem_nome = "";
    $data_fundacao = "";
    $data_emancipacao = "";
    $fundadores = "";
    $outros_fatos = "";

    if(isset($_POST["fkid_municipios"])){
        $fkid_municipios = $_POST["fkid_municipios"];
    }

    if(isset($_POST["origem_nome"])){
        $origem_nome =  $_POST["origem_nome"];
    }

    if(isset($_POST["data_fundacao"])){
        $data_fundacao =  $_POST["data_fundacao"];
    }

    if(isset($_POST["data_emancipacao"])){
        $data_emancipacao =  $_POST["data_emancipacao"];
    }

    if(isset($_POST["fundadores"])){
        $fundadores =  $_POST["fundadores"];
    }

    if(isset($_POST["outros_fatos"])){
        $outros_fatos =  $_POST["outros_fatos"];
    }

    if(isset( $_POST["btnCadastrarHistorico"])){

        $msg = cadastrarHistorico($fkid_municipios, $origem_nome, $data_fundacao, $data_emancipacao, $fundadores, $outros_fatos);
        $verificar = verificarEntradas($fkid_municipios, $origem_nome, $data_fundacao, $data_emancipacao, $fundadores);

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar histórico do município</title>
</head>
<body>

    <form action="cadastrar_historico.php" name = "cadastrar_historico" id = "CadastrarHistorico" method = "POST">
        <table>
            <tr>
                <td><a href="acessar_prefeitura.php">Voltar</a></td>
            </tr>
            <tr>
                <td><h2>Cadastrar Histórico</h2></td>
            </tr>
            <tr>
                <td>Identificador:</td>
                <td><input type="number" name="fkid_municipios" id="fkid_municipios"></td>
            </tr>
            <tr>
                <td>Origem do nome:</td>
                <td><textarea name="origem_nome" id="" cols="30" rows="10"></textarea></td>
            </tr>
            <tr>
                <td>Data de fundação:</td>
                <td><input type="text" name="data_fundacao"></td>
            </tr>
            <tr>
                <td>Data de emancipação:</td>
                <td><input type="text" name="data_emancipacao"></td>
            </tr>
            <tr>
                <td>Fundadores:</td>
                <td><textarea name="fundadores" id="fundadores" cols="30" rows="10"></textarea></td>
            </tr>
            <tr>
                <td>Outros fatos de importância histórica:</td>
                <td><textarea name="outros_fatos" id="outros_fatos" cols="30" rows="10"></textarea></td>
            </tr>
            <tr><td><input type="submit" name="btnCadastrarHistorico" value="Cadastrar Histórico"></td></tr>
        
        </table>

    

    </form>
    
</body>
</html>