<?php

include "../controles/controlar_caracteristicas.php";
    $verificar = "";
    $fkid_municipios = "";
    $area_total_km = "";
    $area_urbana_km = "";
    $area_rural_km = "";
    $ano_base_area = "";
    $populacao_total = "";
    $populacao_urbana = "";
    $populacao_rural = "";
    $ano_base_populacao = "";
    $altitude_media = "";
    $media_temperatura = "";
    $minima_temperatura = "";
    $maxima_temperatura = "";
    $meses_mais_frios = "";
    $meses_mais_quentes = "";
    $meses_mais_chuvosos = "";
    $meses_menos_chuvosos = "";
    $principais_atv_economicas = "";


    if(isset($_POST["fkid_municipios"])) {
        $fkid_municipios = $_POST["fkid_municipios"];
    }
    if(isset($_POST["area_total_km"])) {
        $area_total_km = $_POST["area_total_km"];
    }
    if(isset($_POST["area_urbana_km"])){
        $area_urbana_km = $_POST["area_urbana_km"];
    }
    if(isset($_POST["area_rural_km"])){
        $area_rural_km = $_POST["area_rural_km"];
    }
    if(isset($_POST["ano_base_area"])){
        $ano_base_area = $_POST["ano_base_area"];
    }
    if(isset($_POST["populacao_total"])){
        $populacao_total = $_POST["populacao_total"];
    }
    if(isset($_POST["populacao_urbana"])){
        $populacao_urbana = $_POST["populacao_urbana"];
    }
    if(isset($_POST["populacao_rural"])){
        $populacao_rural = $_POST["populacao_rural"];
    }
    if(isset($_POST["ano_base_populacao"])){
        $ano_base_populacao = $_POST["ano_base_populacao"];
    }
    if(isset($_POST["altitude_media"])){
        $altitude_media = $_POST["altitude_media"];
    }
    if(isset($_POST["media_temperatura"])){
        $media_temperatura = $_POST["media_temperatura"];
    }
    if(isset($_POST["minima_temperatura"])){
        $minima_temperatura = $_POST["minima_temperatura"];
    }
    if(isset($_POST["maxima_temperatura"])){
        $maxima_temperatura = $_POST["maxima_temperatura"];
    }
    if(isset($_POST["meses_mais_frios"])){
        $meses_mais_frios = $_POST["meses_mais_frios"];
    }
    if(isset($_POST["meses_mais_quentes"])){
        $meses_mais_quentes = $_POST["meses_mais_quentes"];
    }
    if(isset($_POST["meses_mais_chuvosos"])){
        $meses_mais_chuvosos = $_POST["meses_mais_chuvosos"];
    }
    if(isset($_POST["meses_menos_chuvosos"])){
        $meses_menos_chuvosos = $_POST["meses_menos_chuvosos"];
    }
    if(isset($_POST["principais_atv_economicas"])){
        $principais_atv_economicas = $_POST["principais_atv_economicas"];
    }
    if(isset($_POST["btnCadastrar"])){

        $verificar = verificarEntradas($fkid_municipios, $area_total_km, $area_urbana_km, $area_rural_km, $ano_base_area, $populacao_total, $populacao_urbana, $populacao_rural, $ano_base_populacao, $altitude_media,$media_temperatura, $minima_temperatura, $maxima_temperatura, $meses_mais_frios, $meses_mais_quentes, $meses_mais_chuvosos, $meses_menos_chuvosos, $principais_atv_economicas);

        $msg = cadastrarCaracteristicas($fkid_municipios, $area_total_km, $area_urbana_km, $area_rural_km, $ano_base_area, $populacao_total, $populacao_urbana, $populacao_rural, $ano_base_populacao, $altitude_media,$media_temperatura, $minima_temperatura, $maxima_temperatura, $meses_mais_frios, $meses_mais_quentes, $meses_mais_chuvosos, $meses_menos_chuvosos, $principais_atv_economicas);

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
    <form action="cadastrar_caracteristicas.php" name="cadastrar_caracteristicas.php" id="cadastrar_caracteristicas.php" method = "POST"> 
    
        <table>
            <tr>
                <td colspan = "2"><a href="../index.php"> Voltar à página inicial </a></td>
            </tr>
            <tr>
                <td colspan = "2"> <h2>Cadastrar caracteristicas</h2></td>
            </tr>
            <tr>
                <td colspan = "2"> <?php echo "$verificar"; ?></td>
            </tr>
            <tr>
                <td>Fkid  do município: </td>
                <td><input type="number" name="fkid_municipios" id="fkid_municipios" placeholder = ""></td>
            </tr>
            <tr>
                <td>Area total em km²: </td>
                <td><input type="number" name = "area_total_km" id = "area_total_km" placeholder = ""></td>
            </tr>
            <tr>
                <td>Area urbana em km²: </td>
                <td><input type="number" name = "area_urbana_km" id = "area_urbana_km" placeholder = ""></td>
            </tr>
            <tr>
                <td>Area rural em km²: </td>
                <td><input type="number" name = "area_rural_km" id = "area_rural_km" placeholder = ""></td>
            </tr>
            <tr>
                <td>Ano base da coleta de dados para a area: </td>
                <td><input type="number" name = "ano_base_area" id = "ano_base_area" placeholder = ""></td>
            </tr>

            <tr>
                <td>População total: </td>
                <td><input type="number" name = "populacao_total" id = "populacao_total" placeholder = ""></td>
            </tr>
            <tr>
                <td>População urbana: </td>
                <td><input type="number" name = "populacao_urbana" id = "populacao_urbana" placeholder = ""></td>
            </tr>
            <tr>
                <td>População rural: </td>
                <td><input type="number" name = "populacao_rural" id = "populacao_rural" placeholder = ""></td>
            </tr>
            <tr>
                <td>Ano base da coleta de dados para a população: </td>
                <td><input type="number" name = "ano_base_populacao" id = "ano_base_populacao" placeholder = ""></td>
            </tr>
            
            <tr>
                <td>Temperatura media °C: </td>
                <td><input type="number" name = "media_temperatura" id = "media_temperatura" placeholder = ""></td>
            </tr>
            <tr>
                <td>Temperatura minima °C: </td>
                <td><input type="number" name = "minima_temperatura" id = "minima_temperatura" placeholder = ""></td>
            </tr>
            <tr>
                <td>Temperatura maxima °C: </td>
                <td><input type="number" name = "maxima_temperatura" id = "maxima_temperatura" placeholder = ""></td>
            </tr>
            <tr>
                <td>Meses mais frios: </td>
                <td><input type="text" name = "meses_mais_frios" id = "meses_mais_frios" placeholder = ""></td>
            </tr>
            <tr>
                <td>Meses mais quentes: </td>
                <td><input type="text" name="meses_mais_quentes" id="meses_mais_quentes"></td>
            </tr>
            <tr>
                <td>Meses mais chuvosos: </td>
                <td><input type="text" name = "meses_mais_chuvosos" id = "meses_mais_chuvosos" placeholder = ""></td>
            </tr>
            <tr>
                <td>Meses menos chuvosos:</td>
                <td><input type="text" name = "meses_menos_chuvosos" id = "meses_menos_chuvosos"></td>
            </tr>
            <tr>
                <td>Altitude media: </td>
                <td><input type="number" name = "altitude_media" id = "altitude_media" placeholder = ""></td>
            </tr>
            <tr>
                <td>Principais atividades economicas:</td>
                <td><input type="text" name = "principais_atv_economicas" id = "meses_menos_chuvosos"></td>
            </tr>
            <tr>
                <td><input type="submit" name = "btnCadastrar" value = "Cadastrar"></td>
            </tr>
            
        </table>
    
    
    
    </form>
</body>
</html>

