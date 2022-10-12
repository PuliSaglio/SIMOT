<?php

include "../controles/controlar_servicos_lixo.php";

    $verificar = "";
    $fkid_municipios = ""; 
    $coleta_seletiva = ""; 
    $total_atendido_coleta_seletiva = ""; 
    $domicilios_urbanos_atendidos_coleta_seletiva = ""; 
    $domicilios_rurais_atendidos_coleta_seletiva = ""; 
    $entidade_responsavel_coleta_seletiva = ""; 
    $coleta_nao_seletiva = ""; 
    $total_atendido_coleta_nao_seletival = ""; 
    $domicilios_urbanos_atendidos_coleta_nao_seletiva = ""; 
    $domicilios_rurais_atendidos_coleta_nao_seletiva = ""; 
    $entidade_responsavel_coleta_nao_seletiva= ""; 
    $sem_coleta = ""; 
    $total_atendido_sem_coleta = ""; 
    $domicilios_urbanos_atendidos_sem_coleta = ""; 
    $domicilios_rurais_atendidos_sem_coleta = "";

    if(isset($_POST["fkid_municipios"])) {
        $fkid_municipios = $_POST["fkid_municipios"];
    }
    if(isset($_POST["coleta_seletiva"])) {
        $coleta_seletiva = $_POST["coleta_seletiva"];
    }
    if(isset($_POST["total_atendido_coleta_seletiva"])) {
        $total_atendido_coleta_seletiva = $_POST["total_atendido_coleta_seletiva"];
    }
    if(isset($_POST["domicilios_urbanos_atendidos_coleta_seletiva"])){
        $domicilios_urbanos_atendidos_coleta_seletiva = $_POST["domicilios_urbanos_atendidos_coleta_seletiva"];
    }
    if(isset($_POST["domicilios_rurais_atendidos_coleta_seletiva"])){
        $domicilios_rurais_atendidos_coleta_seletiva = $_POST["domicilios_rurais_atendidos_coleta_seletiva"];
    }
    if(isset($_POST["entidade_responsavel_coleta_seletiva"])){
        $entidade_responsavel_coleta_seletiva = $_POST["entidade_responsavel_coleta_seletiva"];
    }
    if(isset($_POST["coleta_nao_seletiva"])){
        $coleta_nao_seletiva = $_POST["coleta_nao_seletiva"];
    }
    if(isset($_POST["total_atendido_coleta_nao_seletival"])){
        $total_atendido_coleta_nao_seletival = $_POST["total_atendido_coleta_nao_seletival"];
    }
    if(isset($_POST["domicilios_urbanos_atendidos_coleta_nao_seletiva"])){
        $domicilios_urbanos_atendidos_coleta_nao_seletiva = $_POST["domicilios_urbanos_atendidos_coleta_nao_seletiva"];
    }
    if(isset($_POST["domicilios_rurais_atendidos_coleta_nao_seletiva"])){
        $domicilios_rurais_atendidos_coleta_nao_seletiva = $_POST["domicilios_rurais_atendidos_coleta_nao_seletiva"];
    }
    if(isset($_POST["entidade_responsavel_coleta_nao_seletiva"])){
        $entidade_responsavel_coleta_nao_seletiva = $_POST["entidade_responsavel_coleta_nao_seletiva"];
    }
    if(isset($_POST["sem_coleta"])){
        $sem_coleta = $_POST["sem_coleta"];
    }
    if(isset($_POST["total_atendido_sem_coleta"])){
        $total_atendido_sem_coleta = $_POST["total_atendido_sem_coleta"];
    }
    if(isset($_POST["domicilios_urbanos_atendidos_sem_coleta"])){
        $domicilios_urbanos_atendidos_sem_coleta = $_POST["domicilios_urbanos_atendidos_sem_coleta"];
    }
    if(isset($_POST["domicilios_rurais_atendidos_sem_coleta"])){
        $domicilios_rurais_atendidos_sem_coleta = $_POST["domicilios_rurais_atendidos_sem_coleta"];
    }
    if(isset($_POST["btnCadastrar"])){

        $verificar = verificarEntradas($fkid_municipios, $coleta_seletiva, $coleta_nao_seletiva, $sem_coleta);

        $msg = cadastrarServicosLixo($fkid_municipios, $coleta_seletiva, $total_atendido_coleta_seletiva, $domicilios_urbanos_atendidos_coleta_seletiva, 
        $domicilios_rurais_atendidos_coleta_seletiva, $entidade_responsavel_coleta_seletiva, $coleta_nao_seletiva, $total_atendido_coleta_nao_seletival, 
        $domicilios_urbanos_atendidos_coleta_nao_seletiva, $domicilios_rurais_atendidos_coleta_nao_seletiva, $entidade_responsavel_coleta_nao_seletiva, 
        $sem_coleta, $total_atendido_sem_coleta, $domicilios_urbanos_atendidos_sem_coleta, $domicilios_rurais_atendidos_sem_coleta);

    }

?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Servicos Lixo</title>
</head>
<body>
    <form action="cadastrar_servicos_lixo.php" name="cadastrar_servicos_lixo.php" id="cadastrar_servicos_lixo.php" method = "POST"> 
    
        <table>
            <tr>
                <td colspan = "2"><a href="../index.php"> Voltar à página inicial </a></td>
            </tr>
            <tr>
                <td colspan = "2"> <h2>Cadastrar Serviços de Lixo</h2></td>
            </tr>
            <tr>
                <td colspan = "2"> <?php echo "$verificar"; ?></td>
            </tr>
            <tr>
                <td>FKid Municipio</td>
                <td><input type="number" name = "fkid_municipios" id = "fkid_municipios"></td>
            </tr>
            <tr>
                <td style="font-weight:bold">Coleta Seletiva</td>
            </tr>
            <tr>
                <td>Sim</td>
                <td><input type="radio" name="coleta_seletiva" id="coleta_seletiva" placeholder = "" value="SIM"></td>
            </tr>
            <tr>
                <td>Não</td>
                <td><input type="radio" name="coleta_seletiva" id="coleta_seletiva" placeholder = "" value="NAO"></td>
            </tr>
        
            <tr>
                <td>Total Atendido(%)</td>
                <td><input type="number" name = "total_atendido_coleta_seletiva" id = "total_atendido_coleta_seletiva" placeholder = ""></td>
            </tr>
            <tr>
                <td>Domicilios Urbanos Atendidos(%)</td>
                <td><input type="number" name = "domicilios_urbanos_atendidos_coleta_seletiva" id = "domicilios_urbanos_atendidos_coleta_seletiva" placeholder = ""></td>
            </tr>
            <tr>
                <td>Domicilios Rurais Atendidos(%)</td>
                <td><input type="number" name = "domicilios_rurais_atendidos_coleta_seletiva" id = "domicilios_rurais_atendidos_coleta_seletiva" placeholder = ""></td>
            </tr>
            <tr>
                <td>Entidade Responsavel</td>
                <td><input type="text" name = "entidade_responsavel_coleta_seletiva" id = "entidade_responsavel_coleta_seletiva" placeholder = ""></td>
            </tr>
        
            <tr>
                <td style="font-weight:bold">Coleta Nao Seletiva</td>
            </tr>
            <tr>
                <td>SIM</td>
                <td><input type="radio" name = "coleta_nao_seletiva" id = "coleta_nao_seletiva" placeholder = "" value = "sim"></td>
            </tr>
            <tr>
                <td>NÃO</td>
                <td><input type="radio" name = "coleta_nao_seletiva" id = "coleta_nao_seletiva" placeholder = "" value = "nao"></td>
            </tr>
            <tr>
                <td>Total Atendido(%)</td>
                <td><input type="number" name = "total_atendido_coleta_nao_seletival" id = "total_atendido_coleta_nao_seletival" placeholder = ""></td>
            </tr>
            <tr>
                <td>Domicilios Urbanos Atendidos(%)</td>
                <td><input type="number" name = "domicilios_urbanos_atendidos_coleta_nao_seletiva" id = "domicilios_urbanos_atendidos_coleta_nao_seletiva" placeholder = ""></td>
            </tr>
            <tr>
                <td>Domicilios Rurais Atendidos(%)</td>
                <td><input type="number" name = "domicilios_rurais_atendidos_coleta_nao_seletiva" id = "domicilios_rurais_atendidos_coleta_nao_seletiva" placeholder = ""></td>
            </tr>
            <tr>
                <td>Entidade Responsavel</td>
                <td><input type="text" name = "entidade_responsavel_coleta_nao_seletiva" id = "entidade_responsavel_coleta_nao_seletiva" placeholder = ""></td>
            </tr>
            <tr>
                <td style="font-weight:bold">Sem Coleta</td>
            </tr>
            <tr>
                <td>SIM</td>
                <td><input type="radio" name = "sem_coleta" id = "sem_coleta" placeholder = "" value = "sim"></td>
            </tr>
            <tr>
                <td>NÃO</td>
                <td><input type="radio" name = "sem_coleta" id = "sem_coleta" placeholder = "" value = "nao"></td>
            </tr>
            <tr>
                <td>Total Atendido(%)</td>
                <td><input type="number" name = "total_atendido_sem_coleta" id = "total_atendido_sem_coleta" placeholder = ""></td>
            </tr>
            <tr>
                <td>Domicilios Urbanos Atendidos(%)</td>
                <td><input type="number" name = "domicilios_urbanos_atendidos_sem_coleta" id = "domicilios_urbanos_atendidos_sem_coleta" placeholder = ""></td>
            </tr>
            <tr>
                <td>Domicilios Rurais Atendidos(%)</td>
                <td><input type="number" name = "domicilios_rurais_atendidos_sem_coleta" id = "domicilios_rurais_atendidos_sem_coleta" placeholder = ""></td>
            </tr>
            <tr>
                <td><input type="submit" name = "btnCadastrar" value = "Cadastrar"></td>
            </tr>
            
        </table>
    
    
    
    </form>
</body>
</html>
