<?php
    include "../controler/controlar_feriados.php";

    $verificar = "";
    $idFeriados = ""; 
    $nome_feriado = "";
    $data_feriado= "";
    $fkid_municipios = "";

    if(isset($_POST["idFeriados"])){
        $idFeriados = $_POST["idFeriados"];
    }


    if(isset($_POST["nome_feriado"])){
        $nome_feriado =  $_POST["nome_feriado"];
    }

    if(isset($_POST["data_feriado"])){
        $data_feriado =  $_POST["data_feriado"];
    }

    if(isset($_POST["fkid_municipios"])){
        $fkid_municipios =  $_POST["fkid_municipios"];
    }

    if(isset( $_POST["btnCadastrarFeriado"])){

        $msg = cadastrarFeriado($nome_feriado, $data_feriado, $fkid_municipios);
        $verificar = verificarEntradas($nome_feriado, $data_feriado, $fkid_municipios);

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar feriados do município</title>
</head>
<body>

    <form action="cadastrar_feriados.php" name = "cadastrar_feriados" id = "CadastrarFeriados" method = "POST">
        <table>
            <tr>
                <td><a href="acessar_prefeitura.php">Voltar</a></td>
            </tr>
            <tr>
                <td><h2>Cadastrar Feriado</h2></td>
            </tr>
            <tr>
                    <td>Identificador:</td>
                    <td><input type="number" name="fkid_municipios" id="fkid_municipios"></td>
                </tr>
            <tr>
                <td>Nome do Feriado</td>
                <td><input type="text" name="nome_feriado"></td>
            </tr>
            <tr>
                <td>Data do feriado:</td>
                <td><input type="date" name="data_feriado" id="data_feriado" ></td>
            </tr>
            <tr><td><input type="submit" name="btnCadastrarFeriado" value="Cadastrar Feriado"></td></tr>
            
        </table>

    

    </form>
    
</body>
</html>