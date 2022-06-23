<?php

    include "../controler/controlar_feriados.php";

    $verificar = "";
    $idFeriados = ""; 
    $nome_feriado = "";
    $data_feriado= "";
    $fkid_municipios = "";

    if(isset($_GET["idFeriados"])){
        $fkid_municipios = $_GET["idFeriados"];

        $result = pegarFeriado($idFeriados);
        $numRegistros = mysqli_num_rows($result);

        if($numRegistros > 0){
            while($row = mysqli_fetch_assoc($result)){
                $idFeriados = $row["idFeriados"];
                $nome_feriado = $row["nome_feriado"];
                $data_feriado = $row["data_feriado"];
                $fkid_municipios = $row["fkid_municipios"];
            }
        }
    }


    if(isset( $_POST["btnAtualizarFeriado"])){

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

    
    $msg = editarFeriado($fkid_municipios, $origem_nome, $data_fundacao, $data_emancipacao, $fundadores, $outros_fatos);
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

    <form action="editar_feriados.php" name = "editar_feriados" id = "EditarFeriados" method = "POST">
        <table>
            <tr>
                <td><a href="acessar_prefeitura.php">Voltar</a></td>
            </tr>
            <tr>
                <td><h2>Atualizar Feriados</h2></td>
            </tr>
            
            <tr>
                <td>Data do feriado:</td>
                <td><input type="date" name="data_feriado" id="data_feriado" ></td>
            </tr>
            <tr>
                <td>Data de fundação:</td>
                <td><input type="text" name="data_fundacao"></td>
            </tr>
            <tr><td><input type="submit" name="btnCadastrarHistorico" value="Cadastrar Histórico"></td></tr>
            <tr>
                    <td>Identificador:</td>
                    <td><input type="number" name="fkid_municipios" id="fkid_municipios"></td>
                </tr>
        </table>

    

    </form>
    
</body>
</html>