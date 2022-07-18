<?php

include "../controles/controlar_abastecimento_agua.php";
    $verificar = '';
    $fkid_municipios = '';
    $tipo_abastecimento = '';
    $domicilios_atendidos = '';
    $empresa_responsavel = '';


    if(isset($_POST["fkid_municipios"])) {
        $fkid_municipios = $_POST["fkid_municipios"];
    }
    if(isset($_POST["tipo_abastecimento"])) {
        $tipo_abastecimento = $_POST["tipo_abastecimento"];
    }
    if(isset($_POST["domicilios_atendidos"])){
        $domicilios_atendidos = $_POST["domicilios_atendidos"];
    }
    if(isset($_POST["empresa_responsavel"])){
        $empresa_responsavel = $_POST["empresa_responsavel"];
    }
    
    if(isset($_POST["btnCadastrar"])){

        $verificar = verificarEntradas($fkid_municipios, $tipo_abastecimento, $domicilios_atendidos, $empresa_responsavel);

        $msg = cadastrarAbastecimentoAgua($fkid_municipios, $tipo_abastecimento, $domicilios_atendidos, $empresa_responsavel);

    }

?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de caracteristicas</title>
</head>
<body>
    <form action="cadastrar_abastecimento_agua.php" name="cadastrar_abastecimento_agua.php" id="cadastrar_abastecimento_agua.php" method = "POST"> 
    
        <table>
            <tr>
                <td colspan = "2"><a href="../index.php"> Voltar à página inicial </a></td>
            </tr>
            <tr>
                <td colspan = "2"> <h2>Cadastrar abastecimento agua</h2></td>
            </tr>
            <tr>
                <td colspan = "2"> <?php echo "$verificar"; ?></td>
            </tr>
            <tr>
                <td>Fkid  do município: </td>
                <td><input type="number" name="fkid_municipios" id="fkid_municipios" placeholder = ""></td>
            </tr>
            <tr>
                <td>Agua nao canalizada</td>
                <td><input type="radio" name = "tipo_abastecimento" id= "tipo_abastecimento" value = "agua_nao_canalizada" placeholder = ""></td>
            </tr>
            <tr>
                <td>Canalizada de poço</td>
                <td><input type="radio" name = "tipo_abastecimento" id= "tipo_abastecimento" value = "canalizada_poco" placeholder = ""></td>
            </tr>
            <tr>
                <td>Canalizada de nascente </td>
                <td><input type="radio" name = "tipo_abastecimento"  id= "tipo_abastecimento" value = "canalizada_nascente" placeholder = ""></td>
            </tr>
            <tr>
                <td>Canalizada de curso</td>
                <td><input type="radio" name = "tipo_abastecimento" id= "tipo_abastecimento" value = "canalizada_de_curso" placeholder = ""></td>
            </tr>
            <tr>
                <td>Outros</td>
                <td><input type="radio" name="tipo_abastecimento" id= "tipo_abastecimento" value ="outros"></td>
            </tr>
            <tr>
                <td>Informe o total de domicilios atendidos (%) </td>
                <td><input type="number" name="domicilios_atendidos" id ="domicilios_atendidos" placeholder = ""></td>
            </tr>
            <tr>
                <td>Informe a empresa responsavel pelo abastecimento</td>
                <td><input type="text" name = "empresa_responsavel" id = "empresa_responsavel" placeholder = ""></td>
            </tr>
            <tr>
                <td><input type="submit" name = "btnCadastrar" value = "Cadastrar"></td>
            </tr>
            
        </table>
    
    
    
    </form>
</body>
</html>