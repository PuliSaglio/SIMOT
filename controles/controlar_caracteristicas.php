<?php

    include "../controles/a_conexao.php";
     
    function verificarEntradas($fkid_municipios, $area_total_km, $area_urbana_km, $area_rural_km, $ano_base_area, $populacao_total, $populacao_urbana, $populacao_rural, $ano_base_populacao, $altitude_media,$media_temperatura, $minima_temperatura, $maxima_temperatura, $meses_mais_frios, $meses_mais_quentes, $meses_mais_chuvosos, $meses_menos_chuvosos, $principais_atv_economicas){
        if($fkid_municipios == ""){
            return "Informe a chave estrangeira do municipio";
        }
        if($area_total_km == ""){
            return "Informe a area total do municipio em km.";
        }
        if($area_urbana_km == "") {
            return "Informe a area urbana do municipio em km.";
        }
        if($area_rural_km == "") {
            return "Informe a area rural do municipio em km.";
        }
        if($ano_base_area == ""){
            return "Informe o ano base?";
        }
        if($populacao_total == ""){
            return "Informe a populaçao total do municipio.";
        }
        if($populacao_urbana == ""){
            return "Informe a populaçao urbana do municipio.";
        }
        if($populacao_rural == ""){
            return "Informe a populaçao rural do municipio.";
        }
        if($ano_base_populacao == "") {
            return "Informe o ano base da populaçao?.";
        }
        if($altitude_media == "") {
            return "Informe a altitude media do municipio.";
        }
        if($media_temperatura == "") {
            return "Informe a media da temperatura";
        }
        if($minima_temperatura == ""){
            return "Informe a temperatura minima.";
        }
        if($maxima_temperatura == "") {
            return "Informe a temperatura maxima.";
        }
        if($meses_mais_frios == "") {
            return "Informe os meses mais frios.";
        }
        if($meses_mais_quentes == "") {
            return "Informe os meses mais quentes.";
        }
        if($meses_mais_chuvosos == "") {
            return "Informe os meses mais chuvosos.";
        }
        if($meses_menos_chuvosos == "") {
            return "Informe os meses menos chuvosos.";
        }
        if($principais_atv_economicas == "") {
            return "Informe as principais atividades economicas.";
        }

        return "";

    }


    function cadastrarCaracteristicas($fkid_municipios, $area_total_km, $area_urbana_km, $area_rural_km, $ano_base_area, $populacao_total, $populacao_urbana, $populacao_rural, $ano_base_populacao, $altitude_media,$media_temperatura, $minima_temperatura, $maxima_temperatura, $meses_mais_frios, $meses_mais_quentes, $meses_mais_chuvosos, $meses_menos_chuvosos, $principais_atv_economicas){

        $msg = verificarEntradas($fkid_municipios, $area_total_km, $area_urbana_km, $area_rural_km, $ano_base_area, $populacao_total, $populacao_urbana, $populacao_rural, $ano_base_populacao, $altitude_media,$media_temperatura, $minima_temperatura, $maxima_temperatura, $meses_mais_frios, $meses_mais_quentes, $meses_mais_chuvosos, $meses_menos_chuvosos, $principais_atv_economicas);

        if($msg == "") {
            $con = abrirConexao();
                $sql = "INSERT INTO caracteristicas_municipios (fkid_municipios, area_total_km, area_urbana_km, area_rural_km, ano_base_area, populacao_total, populacao_urbana, populacao_rural, ano_base_populacao, altitude_media,media_temperatura, minima_temperatura, maxima_temperatura, meses_mais_frios, meses_mais_quentes, meses_mais_chuvosos, meses_menos_chuvosos, principais_atv_economicas) VALUES ('$fkid_municipios', '$area_total_km', '$area_urbana_km', '$area_rural_km', '$ano_base_area', '$populacao_total', '$populacao_urbana', '$populacao_rural', '$ano_base_populacao', '$altitude_media' , '$media_temperatura', '$minima_temperatura', '$maxima_temperatura', '$meses_mais_frios', '$meses_mais_quentes', '$meses_mais_chuvosos', '$meses_menos_chuvosos', '$principais_atv_economicas')";

                if(mysqli_query($con, $sql)){
                    echo "Cadastro realizado com sucesso! <a href='consultar_caracteristicas.php'>Consultar caracteristicas cadastradas.</a>";
                } else {
                    echo "Erro ao tentar cadastrar caracteristicas: ";
                }


            mysqli_close($con);
        }
        
        return array($msg);
    }

    function pegarCaracteristicas($fkid_municipios){

        $con = abrirConexao();

            $sql = "SELECT * FROM caracteristicas_municipios WHERE fkid_municipios = " . $fkid_municipios . ";";
            $result = mysqli_query($con, $sql);
            mysqli_close($con);

            return $result;
        
    }

    function listarCaracteristicas(){

        $con = abrirConexao();
        $sql = "SELECT * FROM caracteristicas_municipios;";
        $resultadoListagem = mysqli_query($con, $sql);
        mysqli_close($con);

        return $resultadoListagem;
    }

    function editarCaracteristicas($fkid_municipios, $area_total_km, $area_urbana_km, $area_rural_km, $ano_base_area, $populacao_total, $populacao_urbana, $populacao_rural, $ano_base_populacao, $altitude_media,$media_temperatura, $minima_temperatura, $maxima_temperatura, $meses_mais_frios, $meses_mais_quentes, $meses_mais_chuvosos, $meses_menos_chuvosos, $principais_atv_economicas){

        $msg = verificarEntradas($fkid_municipios, $area_total_km, $area_urbana_km, $area_rural_km, $ano_base_area, $populacao_total, $populacao_urbana, $populacao_rural, $ano_base_populacao, $altitude_media, $media_temperatura, $minima_temperatura, $maxima_temperatura, $meses_mais_frios, $meses_mais_quentes, $meses_mais_chuvosos, $meses_menos_chuvosos, $principais_atv_economicas);

        if($msg == ""){

            $con = abrirConexao();

            $sql = "UPDATE caracteristicas_municipios SET 
            fkid_municipios = '$fkid_municipios',  
            area_total_km = '$area_total_km',
            area_urbana_km = '$area_urbana_km',
            area_rural_km = '$area_rural_km',
            ano_base_area = '$ano_base_area',
            populacao_total = '$populacao_total',
            populacao_urbana = '$populacao_urbana',
            populacao_rural = '$populacao_rural',
            ano_base_populacao = '$ano_base_populacao',
            altitude_media = '$altitude_media',
            media_temperatura = '$media_temperatura',
            minima_temperatura = '$minima_temperatura',
            maxima_temperatura = '$maxima_temperatura',
            meses_mais_frios = '$meses_mais_frios',
            meses_mais_quentes = '$meses_mais_quentes',
            meses_mais_chuvosos = '$meses_mais_chuvosos',
            meses_menos_chuvosos = '$meses_menos_chuvosos',
            principais_atv_economicas = '$principais_atv_economicas' WHERE fkid_municipios = '$fkid_municipios';";

            if(mysqli_query($con, $sql)) {
                echo "Alteração realizada com sucesso! Verificar atualização no <a href='consultar_caracteristicas.php'>banco de dados</a>";
            } else {
                echo "Atualização não pode ser realizada.";
            }

            mysqli_close($con);
            return array($msg);
        }
    }
        
    function excluirCaracteristicas($fkid_municipios){
        $con = abrirConexao();

        $sql = "DELETE FROM caracteristicas_municipios WHERE fkid_municipios = '$fkid_municipios'";

        if(mysqli_query($con, $sql)){
            echo "Excluida com Sucesso! Verificar em <a href='consultar_caracteristicas.php'>Consultar banco de dados</a>";
        } else {
            echo "ERRO! Não pode ser excluída :(";
        }

        mysqli_close($con);
    }

  


?>