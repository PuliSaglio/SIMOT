<?php

include "../controles/controlar_servicos_energia.php";

    $verificar = "";
    $fkid_municipios = "";
    $energia_eletrica = "";
    $capacidade_kva = "";
    $gerador_emergencia = "";
    $capacidade_kva_gerador = "";
    $abastecimento_energia_urbana = ""; 
    $total_abastecido_energia_urbana = "";
    $entidade_responsavel_energia_urbana = "";
    $abastecimento_energia_rural = "";
    $total_abastecido_energia_rural = "";
    $entidade_responsavel_energia_rural = "";
    $abastecimento_proprio_energia = "";
    $total_abastecimento_energia_propria= ""; 
    $domicilios_urbanos_atendidos_energia_propria = ""; 
    $domicilios_rurais_atendidos_energia_propria = "";
    $entidade_responsavel_energia_propria = "";
    $outros_tipos_abastecimento = "";
    $total_abastecido_outros_tipos = "";
    $domicilios_urbanos_atendidos_outros_tipos = ""; 
    $entidade_responsavel_outros_tipos = "";

    if(isset($_POST["fkid_municipios"])) {
        $fkid_municipios = $_POST["fkid_municipios"];
    }
    if(isset($_POST["energia_eletrica"])) {
        $energia_eletrica = $_POST["energia_eletrica"];
    }
    if(isset($_POST["capacidade_kva"])) {
        $capacidade_kva = $_POST["capacidade_kva"];
    }
    if(isset($_POST["gerador_emergencia"])){
        $gerador_emergencia = $_POST["gerador_emergencia"];
    }
    if(isset($_POST["capacidade_kva_gerador"])){
        $capacidade_kva_gerador = $_POST["capacidade_kva_gerador"];
    }
    if(isset($_POST["abastecimento_energia_urbana"])){
        $abastecimento_energia_urbana = $_POST["abastecimento_energia_urbana"];
    }
    if(isset($_POST["total_abastecido_energia_urbana"])){
        $total_abastecido_energia_urbana = $_POST["total_abastecido_energia_urbana"];
    }
    if(isset($_POST["entidade_responsavel_energia_urbana"])){
        $entidade_responsavel_energia_urbana = $_POST["entidade_responsavel_energia_urbana"];
    }
    if(isset($_POST["abastecimento_energia_rural"])){
        $abastecimento_energia_rural = $_POST["abastecimento_energia_rural"];
    }
    if(isset($_POST["total_abastecido_energia_rural"])){
        $total_abastecido_energia_rural = $_POST["total_abastecido_energia_rural"];
    }
    if(isset($_POST["entidade_responsavel_energia_rural"])){
        $entidade_responsavel_energia_rural = $_POST["entidade_responsavel_energia_rural"];
    }
    if(isset($_POST["abastecimento_proprio_energia"])){
        $abastecimento_proprio_energia = $_POST["abastecimento_proprio_energia"];
    }
    if(isset($_POST["total_abastecimento_energia_propria"])){
        $total_abastecimento_energia_propria = $_POST["total_abastecimento_energia_propria"];
    }
    if(isset($_POST["domicilios_urbanos_atendidos_energia_propria"])){
        $domicilios_urbanos_atendidos_energia_propria = $_POST["domicilios_urbanos_atendidos_energia_propria"];
    }
    if(isset($_POST["domicilios_rurais_atendidos_energia_propria"])){
        $domicilios_rurais_atendidos_energia_propria = $_POST["domicilios_rurais_atendidos_energia_propria"];
    }
    if(isset($_POST["entidade_responsavel_energia_propria"])){
        $entidade_responsavel_energia_propria = $_POST["entidade_responsavel_energia_propria"];
    }
    if(isset($_POST["outros_tipos_abastecimento"])){
        $outros_tipos_abastecimento = $_POST["outros_tipos_abastecimento"];
    }
    if(isset($_POST["total_abastecido_outros_tipos"])){
        $total_abastecido_outros_tipos = $_POST["total_abastecido_outros_tipos"];
    }
    if(isset($_POST["domicilios_urbanos_atendidos_outros_tipos"])){
        $domicilios_urbanos_atendidos_outros_tipos = $_POST["domicilios_urbanos_atendidos_outros_tipos"];
    }
    if(isset($_POST["entidade_responsavel_outros_tipos"])){
        $entidade_responsavel_outros_tipos = "entidade_responsavel_outros_tipos";
    }
    if(isset($_POST["btnCadastrar"])){

        $verificar = verificarEntradas($fkid_municipios, $energia_eletrica, $capacidade_kva, $gerador_emergencia, $abastecimento_energia_urbana,
        $abastecimento_energia_rural, $abastecimento_proprio_energia);

        $msg = cadastrarServicosEnergia($fkid_municipios, $energia_eletrica, $capacidade_kva, $gerador_emergencia, $capacidade_kva_gerador,
        $abastecimento_energia_urbana, $total_abastecido_energia_urbana, $entidade_responsavel_energia_urbana, $abastecimento_energia_rural,
        $total_abastecido_energia_rural ,$entidade_responsavel_energia_rural ,$abastecimento_proprio_energia ,$total_abastecimento_energia_propria,
        $domicilios_urbanos_atendidos_energia_propria, $domicilios_rurais_atendidos_energia_propria ,$entidade_responsavel_energia_propria ,$outros_tipos_abastecimento,
        $total_abastecido_outros_tipos, $domicilios_urbanos_atendidos_outros_tipos, $entidade_responsavel_outros_tipos);

    }

?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Servicos Energia</title>
</head>
<body>
    <form action="cadastrar_servicos_energia.php" name="cadastrar_servicos_energia.php" id="cadastrar_servicos_energia.php" method = "POST"> 
    
        <table>
            <tr>
                <td colspan = "2"><a href="../index.php"> Voltar à página inicial </a></td>
            </tr>
            <tr>
                <td colspan = "2"> <h2>Cadastrar Serviços de Energia</h2></td>
            </tr>
            <tr>
                <td colspan = "2"> <?php echo "$verificar"; ?></td>
            </tr>
            <tr>
                <td>FKid Municipio</td>
                <td><input type="number" name = "fkid_municipios" id = "fkid_municipios"></td>
            </tr>
            <tr>
                <td style="font-weight:bold">Energia Eletrica</td>
            </tr>
            <tr>
                <td>110 Volts</td>
                <td><input type="radio" name="energia_eletrica" id="energia_eletrica" placeholder = "" value="110"></td>
            </tr>
            <tr>
                <td>220 Volts</td>
                <td><input type="radio" name="energia_eletrica" id="energia_eletrica" placeholder = "" value="220"></td>
            </tr>
            <tr>
                <td>110/220 Volts</td>
                <td><input type="radio" name="energia_eletrica" id="energia_eletrica" placeholder = "" value="110 220"></td>
            </tr>
            <tr>
                <td>Capacidade KVA</td>
                <td><input type="number" name = "capacidade_kva" id = "capacidade_kva" placeholder = ""></td>
            </tr>
            <tr>
                <td style="font-weight:bold">Gerador de Emergencia</td>
            </tr>
            <tr>
                <td>SIM</td>
                <td><input type="radio" name = "gerador_emergencia" id = "gerador_emergencia" placeholder = "" value = "sim"></td>
            </tr>
            <tr>
                <td>NÃO</td>
                <td><input type="radio" name = "gerador_emergencia" id = "gerador_emergencia" placeholder = "" value = "nao"></td>
            </tr>
            <tr>
                <td>Capacidade em KVA</td>
                <td><input type="number" name = "capacidade_kva_gerador" id = "capacidade_kva_gerador" placeholder = ""></td>
            </tr>
            <tr>
                <td style="font-weight:bold">Rede Urbana</td>
            </tr>
            <tr>
                <td>SIM</td>
                <td><input type="radio" name = "abastecimento_energia_urbana" id = "abastecimento_energia_urbana" placeholder = "" value = "sim"></td>
            </tr>
            <tr>
                <td>NÃO</td>
                <td><input type="radio" name = "abastecimento_energia_urbana" id = "abastecimento_energia_urbana" placeholder = "" value = "nao"></td>
            </tr>
            <tr>
                <td>Total abastecido(%)</td>
                <td><input type="number" name = "total_abastecido_energia_urbana" id = "total_abastecido_energia_urbana" placeholder = ""></td>
            </tr>
            <tr>
                <td>Entidade Responsável</td>
                <td><input type="text" name = "entidade_responsavel_energia_urbana" id = "entidade_responsavel_energia_urbana" placeholder = ""></td>
            </tr>
            <tr>
                <td style="font-weight:bold">Rede Rural</td>
            </tr>
            <tr>
                <td>SIM</td>
                <td><input type="radio" name = "abastecimento_energia_rural" id = "abastecimento_energia_rural" placeholder = "" value = "sim"></td>
            </tr>
            <tr>
                <td>NÃO</td>
                <td><input type="radio" name = "abastecimento_energia_rural" id = "abastecimento_energia_rural" placeholder = "" value = "nao"></td>
            </tr>
            <tr>
                <td>Total abastecido(%)</td>
                <td><input type="number" name = "total_abastecido_energia_rural" id = "total_abastecido_energia_rural" placeholder = ""></td>
            </tr>
            <tr>
                <td>Entidade Responsável</td>
                <td><input type="text" name = "entidade_responsavel_energia_rural" id = "entidade_responsavel_energia_rural" placeholder = ""></td>
            </tr>
            <tr>
                <td style="font-weight:bold">Abastecimento Proprio</td>
            </tr>
            <tr>
                <td>SIM</td>
                <td><input type="radio" name = "abastecimento_proprio_energia" id = "abastecimento_proprio_energia" placeholder = "" value = "sim"></td>
            </tr>
            <tr>
                <td>NÃO</td>
                <td><input type="radio" name = "abastecimento_proprio_energia" id = "abastecimento_proprio_energia" placeholder = "" value = "nao"></td>
            </tr>
            <tr>
                <td>Total abastecido(%)</td>
                <td><input type="number" name = "total_abastecimento_energia_propria" id = "total_abastecimento_energia_propria" placeholder = ""></td>
            </tr>
            <tr>
                <td>Domicilios urbanos atendidos(%)</td>
                <td><input type="number" name="domicilios_urbanos_atendidos_energia_propria" id=""></td>
            </tr>
            <tr>
                <td>Domicilios rurais atendidos(%)</td>
                <td><input type="number" name="domicilios_rurais_atendidos_energia_propria" id=""></td>
            </tr>
            <tr>
                <td>Entidade Responsável</td>
                <td><input type="text" name = "entidade_responsavel_energia_urbana" id = "entidade_responsavel_energia_urbana" placeholder = ""></td>
            </tr>
            <tr>
                <td style="font-weight:bold">Outros</td>
                <td><input type="text" name = "outros_tipos_abastecimento" id = "outros_tipos_abastecimento"></td>
            </tr>
            <tr>
                <td>Total Abastecido(%)</td>
                <td><input type="number" name = "total_abastecido_outros_tipos" id="total_abastecido_outros_tipos"></td>
            </tr>
            <tr>
                <td>Domicilios Urbanos Atendidos(%)</td>
                <td><input type="number" name = "domicilios_urbanos_atendidos_outros_tipos" id="domicilios_urbanos_atendidos_outros_tipos"></td>
            </tr>
            <tr>
                <td>Entidade Responsavel</td>
                <td><input type="text" name = "entidade_responsavel_outros_tipos" id="entidade_responsavel_outros_tipos"></td>
            </tr>
            <tr>
                <td><input type="submit" name = "btnCadastrar" value = "Cadastrar"></td>
            </tr>
            
        </table>
    
    
    
    </form>
</body>
</html>

