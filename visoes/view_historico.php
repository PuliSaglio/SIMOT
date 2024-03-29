<?php

    include "../controles/controlar_historicos.php";

    $verificar = "";
    $fkid_municipios = "";
    $origem_nome = "";
    $data_fundacao = "";
    $data_emancipacao = "";
    $fundadores = "";
    $outros_fatos = "";


    if(isset($_GET["fkid_municipios"])){
        $fkid_municipios = $_GET["fkid_municipios"];

        $result = pegarHistorico($fkid_municipios);
        $numRegistros = mysqli_num_rows($result);

        if($numRegistros > 0){
            while($row = mysqli_fetch_assoc($result)){
                $fkid_municipios = $row['fkid_municipios'];
                $origem_nome = $row['origem_nome'];
                $data_fundacao = $row['data_fundacao'];
                $data_emancipacao = $row['data_emancipacao'];
                $fundadores = $row['fundadores'];
                $outros_fatos = $row['outros_fatos'];
            }
        }
    }

    #cadastro
    if(isset( $_POST["btnCadastrarHistorico"])){
        
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

        $msg = cadastrarHistorico($fkid_municipios, $origem_nome, $data_fundacao, $data_emancipacao, $fundadores, $outros_fatos);
        $verificar = verificarEntradas($fkid_municipios, $origem_nome, $data_fundacao, $data_emancipacao, $fundadores);
    }#Editar
    elseif(isset( $_POST["btnEditarHistorico"])){
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
        $msg = editarHistorico($fkid_municipios, $origem_nome, $data_fundacao, $data_emancipacao, $fundadores, $outros_fatos);
    }#Excluir
    elseif(isset($_POST["btnExcluirHistorico"])){
        if(isset($_POST["fkid_municipios"])){
            $fkid_municipios= $_POST["fkid_municipios"];
        }
    
        $result = excluirHistorico($fkid_municipios);
    
        die();
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

    <form action="view_historico.php" name = "view_historico.php" id = "view_historico.php" method = "POST">
        <table>
            <tr>
                <td><a href="../index.php">Voltar</a></td>
            </tr>
            <tr>
                <td><h2>Cadastrar Histórico</h2></td>
            </tr>
            <tr>
                <td>Identificador do Municipio:</td>
                <td><input type="number" name="fkid_municipios" id="fkid_municipios" value=<?php echo "$fkid_municipios"?>></td>
            </tr>
            <tr>
                <td>Origem do nome:</td>
                <td><textarea name="origem_nome" id="" cols="30" rows="10" value=<?php echo "$origem_nome"?>></textarea></td>
            </tr>
            <tr>
                <td>Data de fundação:</td>
                <td><input type="text" name="data_fundacao" value=<?php echo "$data_fundacao"?>></td>
            </tr>
            <tr>
                <td>Data de emancipação:</td>
                <td><input type="text" name="data_emancipacao" value=<?php echo "$data_emancipacao"?>></td>
            </tr>
            <tr>
                <td>Fundadores:</td>
                <td><textarea name="fundadores" id="fundadores" cols="30" rows="10" value=<?php echo "$fundadores"?>></textarea></td>
            </tr>
            <tr>
                <td>Outros fatos de importância histórica:</td>
                <td><textarea name="outros_fatos" id="outros_fatos" cols="30" rows="10" value=<?php echo "$outros_fatos"?>></textarea></td>
            </tr>
            <tr>
                <td><input type="submit" name="btnCadastrarHistorico" value="Cadastrar Histórico"></td>
            </tr>
            <tr>
                <td><input type="submit" name = "btnEditarHistorico" value="Editar Historico"></td>
            </tr>
            <tr>
                <td><input type="submit" name="btnExcluirHistorico" value="Excluir Historico"></td>
            </tr>
            <tr>
                <td><button><a href="consultar_historico.php">LISTAR</a></button></td>
            </tr>
        </table>

    

    </form>
    
</body>
</html>