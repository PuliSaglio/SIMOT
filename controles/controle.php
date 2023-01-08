<?php

    include "../controles/a_conexao.php";

    //PREFEITURA!!!
    function verificarEntradasPrefeitura($nome_municipio, $uf, $regiao_turistica, $logradouro, $numero, $bairro, $email, $cnpj, $latitude, $longitude, $distancia_capital_km, $qtd_Funcionarios, $qtd_funcionarios_deficiencia, $nome_prefeito, $aniversario_municipal, $santo_padroeiro){

        if($nome_municipio == ""){
            return "Informe o nome do municipio.";
        }
        if($uf == ""){
            return "Informe a unidade federativa.";
        }
        if($regiao_turistica == "") {
            return "Informe a região turística.";
        }
        if($logradouro == "") {
            return "Informe o logradouro.";
        }
        if($numero == ""){
            return "Informe o número.";
        }
        if($latitude == ""){
            return "Informe a latitude.";
        }
        if($longitude == ""){
            return "Informe a longitude.";
        }
        if($distancia_capital_km == ""){
            return "Informe a distância da capital.";
        }
        if($qtd_Funcionarios == "") {
            return "Inform a quantidade de funcionários.";
        }
        if($qtd_funcionarios_deficiencia == "") {
            return "Informe a quantidade de funcionários com deficiência.";
        }
        if($nome_prefeito == "") {
            return "Informe o nome do prefeito.";
        }
        if($aniversario_municipal == ""){
            return "Informe o aniversário municipal.";
        }
        if($santo_padroeiro == "") {
            return "Informe o(a) santo(a) padroeiro(a) do município.";
        }

        return "";

    }


    function cadastrarPrefeitura($nome_municipio, $uf, $regiao_turistica, $logradouro, $numero, $complemento, $bairro, $email, $site, $cnpj, $latitude, $longitude, $distancia_capital_km, $qtd_Funcionarios, $qtd_funcionarios_deficiencia, $nome_prefeito, $aniversario_municipal, $santo_padroeiro){

        $msg = verificarEntradasPrefeitura($nome_municipio, $uf, $regiao_turistica, $logradouro, $numero, $bairro, $email, $cnpj, $latitude, $longitude, $distancia_capital_km, $qtd_Funcionarios, $qtd_funcionarios_deficiencia, $nome_prefeito, $aniversario_municipal, $santo_padroeiro);

        if($msg == "") {
            $con = abrirConexao();
                $sql = "INSERT INTO Infobas_Municipios (nome_municipio, uf, regiao_turistica, logradouro, numero, complemento, bairro, email, site, cnpj, latitude, longitude, distancia_capital_km, qtd_Funcionarios, qtd_funcionarios_deficiencia, nome_prefeito, aniversario_municipal, santo_padroeiro) VALUES ('$nome_municipio', '$uf', '$regiao_turistica', '$logradouro', '$numero', '$complemento', '$bairro', '$email', '$site', '$cnpj', '$latitude', '$longitude', '$distancia_capital_km', '$qtd_Funcionarios', '$qtd_funcionarios_deficiencia', '$nome_prefeito', '$aniversario_municipal', '$santo_padroeiro')";

                if(mysqli_query($con, $sql)){
                    echo "Cadastro realizado com sucesso! <a href='consultar_prefeituras.php'>Consultar prefeituras cadastradas.</a>";
                } else {
                    echo "Erro ao tentar cadastrar prefeitura: ";
                }


            mysqli_close($con);
        }
        
        return array($msg);
    }

    function pegarPrefeitura($id_municipios){

        $con = abrirConexao();

            $sql = "SELECT * FROM Infobas_Municipios WHERE id_municipios = " . $id_municipios . ";";
            $result = mysqli_query($con, $sql);
            mysqli_close($con);

            return $result;
        
    }

    function listarPrefeituras(){

        $con = abrirConexao();
        $sql = "SELECT * FROM Infobas_Municipios;";
        $resultadoListagem = mysqli_query($con, $sql);
        mysqli_close($con);

        return $resultadoListagem;
    }

    function listarNomePrefeituras(){
        $con = abrirConexao();
        $sql = "SELECT id_municipios ,nome_municipio FROM Infobas_Municipios;";
        $resultadoListagem = mysqli_query($con, $sql);
        mysqli_close($con);

        return $resultadoListagem;
    }

    function editarPrefeitura($id_municipios, $nome_municipio, $uf, $regiao_turistica, $logradouro, $numero, $complemento, $bairro, $email, $site, $cnpj, $latitude, $longitude, $distancia_capital, $qtd_Funcionarios, $qtd_funcionarios_deficiencia, $nome_prefeito, $aniversario_municipal, $santo_padroeiro){

        $msg = verificarEntradasPrefeitura($nome_municipio, $uf, $regiao_turistica, $logradouro, $numero, $bairro, $email, $cnpj, $latitude, $longitude, $distancia_capital, $qtd_Funcionarios, $qtd_funcionarios_deficiencia, $nome_prefeito, $aniversario_municipal, $santo_padroeiro);

        if($msg == ""){

            $con = abrirConexao();

            $sql = "UPDATE Infobas_Municipios SET 
            nome_municipio = '$nome_municipio',  
            uf = '$uf',
            regiao_turistica = '$regiao_turistica',
            logradouro = '$logradouro',
            numero = '$numero',
            complemento = '$complemento',
            bairro = '$bairro',
            email = '$email',
            site = '$site',
            cnpj = '$cnpj',
            latitude = '$latitude',
            longitude = '$longitude',
            distancia_capital_km = '$distancia_capital',
            qtd_Funcionarios = '$qtd_Funcionarios',
            qtd_funcionarios_deficiencia = '$qtd_funcionarios_deficiencia',
            nome_prefeito = '$nome_prefeito',
            aniversario_municipal = '$aniversario_municipal',
            santo_padroeiro = '$santo_padroeiro' WHERE id_municipios = '$id_municipios';";

            if(mysqli_query($con, $sql)) {
                echo "Alteração realizada com sucesso! Verificar atualização no <a href='consultar_prefeituras.php'>banco de dados</a>";
            } else {
                echo "Atualização não pode ser realizada.";
            }

            mysqli_close($con);
            return array($msg);
        }
    }
        
    function excluirPrefeitura($id_municipios){
        $con = abrirConexao();

        $sql = "DELETE FROM infobas_municipios WHERE id_municipios='$id_municipios'";

        if(mysqli_query($con, $sql)) {
            echo "Excluido com sucesso! Verificar no <a href='consultar_prefeituras.php'>banco de dados</a>";
        }else{
           echo "Erro, não pode ser excluida :(";
        }

        mysqli_close($con);
    }  


    //ORGAO OFICIAL DE TURISMO!!!
    function verificarEntradasOrgaoOficialTur($nome_orgao_oficial_tur, $logradouro, $bairro, $distrito, $cep, $email, $qtd_funcionarios, $qtd_funcionarios_superior_turismo){
        if($nome_orgao_oficial_tur == ""){
            return "Informe o nome do orgao de turismo.";
        }
        if($logradouro == ""){
            return "Informe o logradouro.";
        }
        if($bairro == "") {
            return "Informe o bairro.";
        }
        if($distrito == "") {
            return "Informe o distrito";
        }
        if($cep == ""){
            return "Informe o CEP.";
        }
        if($email == ""){
            return "Informe o email.";
        }
        if($qtd_funcionarios == ""){
            return "Informe a quantidade de funcionarios.";
        }
        if($qtd_funcionarios_superior_turismo == ""){
            return "Informe a quantidade de funcionarios com formaçao superior.";
        }
        return "";

    }


    function cadastrarOrgaoOficialTur($fkid_municipios, $nome_orgao_oficial_tur, $logradouro, $bairro, $distrito, $cep, $email, $site, $qtd_funcionarios, $qtd_funcionarios_superior_turismo){

        $msg = verificarEntradasOrgaoOficialTur($nome_orgao_oficial_tur, $logradouro, $bairro, $distrito, $cep, $email, $qtd_funcionarios, $qtd_funcionarios_superior_turismo);

        if($msg == "") {
            $con = abrirConexao();
                $sql = "INSERT INTO orgao_oficial_tur(fkid_municipios, nome_orgao_oficial_tur, logradouro, bairro, distrito, cep, email, site, qtd_funcionarios, qtd_funcionarios_superior_turismo) VALUES ('$fkid_municipios','$nome_orgao_oficial_tur', '$logradouro', '$bairro', '$distrito', '$cep', '$email', '$site', '$qtd_funcionarios', '$qtd_funcionarios_superior_turismo')";

                if(mysqli_query($con, $sql)){
                    echo "Cadastro realizado com sucesso! <a href='consultar_orgao_oficial_tur.php'>Consultar Orgaos cadastrados.</a>";
                } else {
                    echo "Erro ao tentar cadastrar orgao de turismo: ";
                }


            mysqli_close($con);
        }
        
        return array($msg);
    }

    function pegarOrgaoOficialTur($fkid_municipios){

        $con = abrirConexao();

            $sql = "SELECT * FROM orgao_oficial_tur WHERE fkid_municipios = " . $fkid_municipios . ";";
            $result = mysqli_query($con, $sql);
            mysqli_close($con);

            return $result;
        
    }

    function listarOrgaoOficialTur(){

        $con = abrirConexao();
        $sql = "SELECT * FROM orgao_oficial_tur;";
        $resultadoListagem = mysqli_query($con, $sql);
        mysqli_close($con);

        return $resultadoListagem;
    }

    function editarOrgaoOficialTur($fkid_municipios, $nome_orgao_oficial_tur, $logradouro, $bairro, $distrito, $cep, $email, $site, $qtd_funcionarios, $qtd_funcionarios_superior_turismo){

        $msg = verificarEntradasOrgaoOficialTur($nome_orgao_oficial_tur, $logradouro, $bairro, $distrito, $cep, $email, $qtd_funcionarios, $qtd_funcionarios_superior_turismo);

        if($msg == ""){

            $con = abrirConexao();

            $sql = "UPDATE orgao_oficial_tur SET 
            nome_orgao_oficial_tur = '$nome_orgao_oficial_tur',  
            logradouro = '$logradouro',
            bairro = '$bairro',
            distrito = '$distrito',
            cep = '$cep',
            email = '$email',
            site = '$site',
            qtd_funcionarios = '$qtd_funcionarios',
            qtd_funcionarios_superior_turismo = '$qtd_funcionarios_superior_turismo' WHERE fkid_municipios = '$fkid_municipios';";

            if(mysqli_query($con, $sql)) {
                echo "Alteração realizada com sucesso! Verificar atualização no <a href='consultar_orgao_oficial_tur.php'>banco de dados</a>";
            } else {
                echo "Atualização não pode ser realizada.";
            }

            mysqli_close($con);
            return array($msg);
        }
    }
        
    function excluirOrgaoOficialTur($fkid_municipios){
        $con = abrirConexao();

        $sql = "DELETE FROM orgao_oficial_tur WHERE fkid_municipios='$fkid_municipios'";

        if(mysqli_query($con, $sql)) {
            echo "Excluido com sucesso! Verificar no <a href='consultar_orgao_oficial_tur.php'>banco de dados</a>";
        }else{
           echo "Erro, não pode ser excluido :(";
        }

        mysqli_close($con);
    }  
    //INSTANCIAS GOVERNAMENTAIS!!!
    function verificarEntradasInstancias($municipal, $estadual, $regional, $nacional, $internacional, $fkid_municipios){

        if($municipal == ""){
            return "Informe a Instância Municipal";
        }

        if($estadual == ""){
            return "Informe a Instância Estadual";
        }

        if($regional == ""){
            return "Informe a Instância Regional";
        }

        if($nacional == ""){
            return "Informe a Instância Nacional";
        }

        if($internacional == "") {
            return "Informe a Instância Internacional";
        }

        if($fkid_municipios == "") {
            return "Informe o identificador";
        }

        return "";

    }

    function cadastrarInstancias($municipal, $estadual, $regional, $nacional, $internacional, $fkid_municipios){

        $msg = verificarEntradasInstancias($municipal, $estadual, $regional, $nacional, $internacional, $fkid_municipios);
        if($msg == "") {
            $con = abrirConexao();

            $sql = "INSERT INTO Instancias_Governanca (municipal, estadual, regional, nacional, internacional, fkid_municipios) VALUES ('$municipal', '$estadual', '$regional', '$nacional', '$internacional', '$fkid_municipios');";

            if(mysqli_query($con, $sql)){
                echo "Cadastro realizado com sucesso! Verificar no <a href='consultar_instancias.php'>banco de dados</a>.";
            } else {
                echo "Cadastro não pode ser realizado.";
                echo "Error: " . $sql . "<br>" . mysqli_error($con);
            }

            mysqli_close($con);
            return array($msg);
        }
    }

        
    function pegarInstancias($fkid_municipios){
        $con = abrirConexao();
        $sql = "SELECT * FROM Instancias_Governanca WHERE fkid_municipios = ".$fkid_municipios.";";

        $result = mysqli_query($con, $sql);
        mysqli_close($con);

        return $result;
    }

    function listarInstancias(){
        $con = abrirConexao();
        $sql = "SELECT * FROM Instancias_Governanca;";

        $resultadoListagem = mysqli_query($con, $sql);
        mysqli_close($con);

        return $resultadoListagem;

    }

    function editarInstancias($municipal, $estadual, $regional, $nacional, $internacional, $fkid_municipios) {

        $msg = verificarEntradasInstancias($municipal, $estadual, $regional, $nacional, $internacional, $fkid_municipios);

        if($msg == "") {
            $con = abrirConexao();

             //nome da tabela, =, '', variavel, ",", eterno retorno
            $sql = "UPDATE instancias_governanca SET 
            municipal = '$municipal', 
            estadual = '$estadual', 
            regional = '$regional', 
            nacional = '$nacional', 
            internacional = '$internacional' 
            WHERE fkid_municipios = '$fkid_municipios';";

            if(mysqli_query($con, $sql)){
                echo "Alteração realizada com sucesso! Verificar <a href='consultar_instancias.php'>alteração</a>.";
            } else {
                echo "Alteração não pode ser realizada.";
                echo "Error: " . $sql . "</br>" . mysqli_error($con);
            }

            mysqli_close($con);
            return array($msg);
        }
    } 
    
    function excluirInstancias($fkid_municipios){
        $con = abrirConexao();
        $sql = "DELETE FROM instancias_governanca WHERE fkid_municipios = '$fkid_municipios'";

        if(mysqli_query($con, $sql)){
            echo "Excluida com Sucesso! Verificar em <a href='consultar_instancias.php'>Consultar banco de dados</a>";
        } else {
            echo "ERRO!Não pode ser  excluída :(";
        }

        mysqli_close($con);
    }
    //HISTORICO MUNICIPAL
    function verificarEntradasHistorico($fkid_municipios, $origem_nome, $data_fundacao, $data_emancipacao, $fundadores) {

        if($fkid_municipios == "") {
            return "Informe o identificador.";
        }

        if($origem_nome == ""){
            return "Informe a origem do nome.";
        }

        if($data_fundacao == ""){
            return "Informe a data de fundação.";
        }

        if($data_emancipacao == ""){
            return "Informe a data da emancipação.";
        }

        if($fundadores == ""){
            return "Informe os fundadores.";
        }

        return "";
        
    }

    function cadastrarHistorico($fkid_municipios, $origem_nome, $data_fundacao, $data_emancipacao, $fundadores, $outros_fatos) {

        $msg = verificarEntradasHistorico($fkid_municipios, $origem_nome, $data_fundacao, $data_emancipacao, $fundadores);
        
        if($msg == "") {
            $con = abrirConexao();
            $sql = "INSERT INTO historico_municipio (fkid_municipios, origem_nome, data_fundacao, data_emancipacao, fundadores, outros_fatos) VALUES ('$fkid_municipios', '$origem_nome', '$data_fundacao', '$data_emancipacao', '$fundadores', '$outros_fatos');";

            if(mysqli_query($con, $sql)){
                echo "Cadastro realizado com sucesso! Verificar cadastro no <a href='consultar_historico.php'>banco de dados</a>.";
            } else {
                echo "Cadastro não pôde ser realizado.";
                echo "ERRO: " .$sql. "</br>" . mysqli_error($con);

                mysqli_close($con); 
            }

            return array($msg);
        }
        
    }

    function pegarHistorico($fkid_municipios){
        $con = abrirConexao();
        $sql = "SELECT * FROM Historico_Municipio WHERE fkid_municipios = ".$fkid_municipios.";";
        $result = mysqli_query($con, $sql);
        mysqli_close($con);

        return $result;


    }

    function listarHistorico(){
        $con = abrirConexao();
        $sql = "SELECT * FROM Historico_Municipio;";
        $resultadoListagem = mysqli_query($con, $sql);
        mysqli_close($con);

        return $resultadoListagem;
    }

    function editarHistorico($fkid_municipios, $origem_nome, $data_fundacao, $data_emancipacao, $fundadores, $outros_fatos){

        $msg = verificarEntradasHistorico($fkid_municipios, $origem_nome, $data_fundacao, $data_emancipacao, $fundadores);

        if($msg == ""){
            $con = abrirConexao();

            //nome da tabela, =, '', variavel, ",", eterno retorno.
            $sql = "UPDATE Historico_Municipio SET 
            origem_nome = '$origem_nome',
            data_fundacao = '$data_fundacao', 
            data_emancipacao = '$data_emancipacao',
            fundadores = '$fundadores', 
            outros_fatos = '$outros_fatos'
            WHERE fkid_municipios = '$fkid_municipios';";

            if(mysqli_query($con, $sql)){
                echo "Alteração realizada com sucesso! Verificar <a href='consultar_historico.php'>atualização</a>";
            } else {
                echo "Alteração não pôde ser realizada.";
                echo "ERROR: " . $sql . "</br>" . mysqli_error($con);
            }

            mysqli_close($con);
            return array($msg);
        }

    }

    function excluirHistorico($fkid_municipios){

        $con = abrirConexao();
        $sql = "DELETE FROM historico_municipio WHERE fkid_municipios = '$fkid_municipios'";

        if(mysqli_query($con, $sql)){
            echo "Excluido com sucesso! consultar em <a href='consultar_historico.php'>Listar Historico</a>";
        } else {
            echo "Erro! Nao pode ser excluido :(";
        }
        mysqli_close($con);
    }

    //CARACTERISTICAS DO MUNICIPIO
    function verificarEntradasCaracteristicas($fkid_municipios, $area_total_km, $area_urbana_km, $area_rural_km, $ano_base_area, $populacao_total, $populacao_urbana, $populacao_rural, $ano_base_populacao, $altitude_media,$media_temperatura, $minima_temperatura, $maxima_temperatura, $meses_mais_frios, $meses_mais_quentes, $meses_mais_chuvosos, $meses_menos_chuvosos, $principais_atv_economicas){
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

        $msg = verificarEntradasCaracteristicas($fkid_municipios, $area_total_km, $area_urbana_km, $area_rural_km, $ano_base_area, $populacao_total, $populacao_urbana, $populacao_rural, $ano_base_populacao, $altitude_media,$media_temperatura, $minima_temperatura, $maxima_temperatura, $meses_mais_frios, $meses_mais_quentes, $meses_mais_chuvosos, $meses_menos_chuvosos, $principais_atv_economicas);

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

        $msg = verificarEntradasCaracteristicas($fkid_municipios, $area_total_km, $area_urbana_km, $area_rural_km, $ano_base_area, $populacao_total, $populacao_urbana, $populacao_rural, $ano_base_populacao, $altitude_media, $media_temperatura, $minima_temperatura, $maxima_temperatura, $meses_mais_frios, $meses_mais_quentes, $meses_mais_chuvosos, $meses_menos_chuvosos, $principais_atv_economicas);

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
    //ABASTECIMENTO DE AGUA DO MUNICIPIO
    function verificarEntradasAbastecimentoAgua($fkid_municipios, $tipo_abastecimento, $domicilios_atendidos, $empresa_responsavel) {

        if($fkid_municipios == "") {
            return "Informe o identificador.";
        }
        if($tipo_abastecimento == ""){
            return "Informe o tipo de abastecimento";
        }
        if($domicilios_atendidos == ""){
            return "Informe a quantidade de domicilios atendidos";
        }
        if($empresa_responsavel == ""){
            return "Informe a empresa responsavel";
        }
        return "";
        
    }

    function cadastrarAbastecimentoAgua($fkid_municipios, $tipo_abastecimento, $domicilios_atendidos, $empresa_responsavel) {

        $msg = verificarEntradasAbastecimentoAgua($fkid_municipios, $tipo_abastecimento, $domicilios_atendidos, $empresa_responsavel);
        
        if($msg == "") {
            $con = abrirConexao();
            $sql = "INSERT INTO abastecimento_agua (fkid_municipios, tipo_abastecimento, domicilios_atendidos, empresa_responsavel) VALUES ('$fkid_municipios', '$tipo_abastecimento', '$domicilios_atendidos', '$empresa_responsavel');";
            if(mysqli_query($con, $sql)){
                echo "Cadastro realizado com sucesso! Verificar cadastro no <a href='consultar_abastecimento_agua.php'>banco de dados</a>.";
            } else {
                echo "Cadastro não pôde ser realizado.";
                echo "ERRO: " .$sql. "</br>" . mysqli_error($con);

                mysqli_close($con); 
            }

            return array($msg);
        }
        
    }

    function pegarAbastecimentoAgua($fkid_municipios){
        $con = abrirConexao();
        $sql = "SELECT * FROM abastecimento_agua WHERE fkid_municipios = ".$fkid_municipios.";";
        $result = mysqli_query($con, $sql);
        mysqli_close($con);

        return $result;


    }

    function listarAbastecimentoAgua(){
        $con = abrirConexao();
        $sql = "SELECT * FROM abastecimento_agua;";
        $resultadoListagem = mysqli_query($con, $sql);
        mysqli_close($con);

        return $resultadoListagem;
    }

    function editarAbastecimentoAgua($fkid_municipios, $tipo_abastecimento, $domicilios_atendidos, $empresa_responsavel){

        $msg = verificarEntradasAbastecimentoAgua($fkid_municipios, $tipo_abastecimento, $domicilios_atendidos, $empresa_responsavel);

        if($msg == ""){
            $con = abrirConexao();

            $sql = "UPDATE abastecimento_agua SET 
            tipo_abastecimento = '$tipo_abastecimento', 
            domicilios_atendidos = '$domicilios_atendidos',
            empresa_responsavel = '$empresa_responsavel'
            WHERE fkid_municipios = '$fkid_municipios';";

            if(mysqli_query($con, $sql)){
                echo "Alteração realizada com sucesso! Verificar <a href='consultar_abastecimento_agua.php'>atualização</a>";
            } else {
                echo "Alteração não pôde ser realizada.";
                echo "ERROR: " . $sql . "</br>" . mysqli_error($con);
            }

            mysqli_close($con);
            return array($msg);
        }

    }

    function excluirAbastecimentoAgua($fkid_municipios){

        $con = abrirConexao();
        $sql = "DELETE FROM historico_Municipio WHERE fkid_municipios = '$fkid_municipios'";

        if(mysqli_query($con, $sql)){
            $msg = "Excluída.";
        } else {
            $msg = "Não excluída.";
        }

        mysqli_close($con);
        return $msg;
    }

    //Serviços de esgoto
    function verificarEntradasColetaDeposicaoEsgoto($fkid_municipios) {

        if($fkid_municipios == ""){
            return "Informe o fkid do municipio";
        }
        return "";

    }

    function cadastrarColetaDeposicaoEsgoto($fkid_municipios, $rede_esgoto, $total_atendido_rede_esgoto, $domicilios_urbanos_atendidos_rede_esgoto, $domicilios_rurais_atendidos_rede_esgoto, $entidade_responsavel_rede_esgoto, $fossa_septica, $total_atendido_fossa_septica, $domicilios_urbanos_atendidos_fossa_septica,
    $domicilios_rurais_atendidos_fossa_septica,$entidade_responsavel_fossa_septica, $fossa_rudimentar, $total_atendido_fossa_rudimentar, $domicilios_urbanos_atendidos_fossa_rudimentar, $domicilios_rurais_atendidos_fossa_rudimentar,
    $entidade_responsavel_fossa_rudimentar, $vala, $total_atendido_vala, $domicilios_urbanos_atendidos_vala, $domicilios_rurais_atendidos_vala, $entidade_responsavel_vala, $estacao_tratamento, $total_atendido_estacao_tratamento,
    $domicilios_urbanos_atendidos_estacao, $domicilios_rurais_atendidos_estacao, $entidade_responsavel_estacao_tratamento, $esgoto_tratado, $total_atendido_esgoto_tratado, $domicilios_urbanos_atendidos_esgoto_tratado,
    $domicilios_rurais_atendidos_esgoto_tratado, $entidade_responsavel_esgoto_tratado, $outros, $total_atendido_outros, $domicilios_urbanos_atendidos_outros, $domicilios_rurais_atendidos_outros, $entidade_responsavel_outros){

        $msg = verificarEntradasColetaDeposicaoEsgoto($fkid_municipios);

        if($msg == "") {
            $con = abrirConexao();
            $sql = "INSERT INTO servicos_esgoto_coleta_deposicao (fkid_municipios, rede_esgoto, total_atendido_rede_esgoto, domicilios_urbanos_atendidos_rede_esgoto, domicilios_rurais_atendidos_rede_esgoto, entidade_responsavel_rede_esgoto, fossa_septica, domicilios_urbanos_atendidos_fossa_septica, total_atendido_fossa_septica,
            domicilios_rurais_atendidos_fossa_septica, entidade_responsavel_fossa_septica, fossa_rudimentar, total_atendido_fossa_rudimentar, domicilios_urbanos_atendidos_fossa_rudimentar, domicilios_rurais_atendidos_fossa_rudimentar,
            entidade_responsavel_fossa_rudimentar, vala, total_atendido_vala, domicilios_urbanos_atendidos_vala, domicilios_rurais_atendidos_vala, entidade_responsavel_vala, estacao_tratamento, total_atendido_estacao_tratamento,
            domicilios_urbanos_atendidos_estacao, domicilios_rurais_atendidos_estacao, entidade_responsavel_estacao_tratamento, esgoto_tratado, total_atendido_esgoto_tratado, domicilios_urbanos_atendidos_esgoto_tratado,
            domicilios_rurais_atendidos_esgoto_tratado, entidade_responsavel_esgoto_tratado, outros, total_atendido_outros, domicilios_urbanos_atendidos_outros, domicilios_rurais_atendidos_outros, entidade_responsavel_outros) 
            VALUES ('$fkid_municipios','$rede_esgoto', '$total_atendido_rede_esgoto', '$domicilios_urbanos_atendidos_rede_esgoto', '$domicilios_rurais_atendidos_rede_esgoto', '$entidade_responsavel_rede_esgoto', '$fossa_septica','$total_atendido_fossa_septica' ,'$domicilios_urbanos_atendidos_fossa_septica',
        '$domicilios_rurais_atendidos_fossa_septica','$entidade_responsavel_fossa_septica', '$fossa_rudimentar', '$total_atendido_fossa_rudimentar', '$domicilios_urbanos_atendidos_fossa_rudimentar', '$domicilios_rurais_atendidos_fossa_rudimentar',
        '$entidade_responsavel_fossa_rudimentar', '$vala', '$total_atendido_vala', '$domicilios_urbanos_atendidos_vala', '$domicilios_rurais_atendidos_vala', '$entidade_responsavel_vala', '$estacao_tratamento', '$total_atendido_estacao_tratamento',
        '$domicilios_urbanos_atendidos_estacao', '$domicilios_rurais_atendidos_estacao', '$entidade_responsavel_estacao_tratamento', '$esgoto_tratado', '$total_atendido_esgoto_tratado', '$domicilios_urbanos_atendidos_esgoto_tratado',
        '$domicilios_rurais_atendidos_esgoto_tratado', '$entidade_responsavel_esgoto_tratado', '$outros', '$total_atendido_outros', '$domicilios_urbanos_atendidos_outros', '$domicilios_rurais_atendidos_outros', '$entidade_responsavel_outros');";

            if(mysqli_query($con, $sql)){
                echo "Coleta e deposiçao do esgoto cadastrado com sucesso! Verificar cadastro no <a href='consultar_Coleta_Deposicao_Esgoto.php'>banco de dados</a>";
            } else {
                echo "Cadastro não pode ser realizado.";
                echo "Error: " . $sql . "<br>" . mysqli_error($con);
            }

            mysqli_close($con);
        }
        
        return array($msg);
    }

    function pegarColetaDeposicaoEsgoto($fkid_municipios){
        $con = abrirConexao();
        $sql = "SELECT * FROM servicos_esgoto_coleta_deposicao WHERE fkid_municipios = '$fkid_municipios'";

        $result = mysqli_query($con, $sql);
        mysqli_close($con);

        return $result;
    }

    function listarColetaDeposicaoEsgoto(){
        $con = abrirConexao();
        $sql = "SELECT * FROM servicos_esgoto_coleta_deposicao;";

        $resultadoListagem = mysqli_query($con, $sql);
        mysqli_close($con);

        return $resultadoListagem;



    }

    function editarColetaDeposicaoEsgoto($fkid_municipios, $rede_esgoto, $total_atendido_rede_esgoto, $domicilios_urbanos_atendidos_rede_esgoto, $domicilios_rurais_atendidos_rede_esgoto, $entidade_responsavel_rede_esgoto, $fossa_septica, $total_atendido_fossa_septica, $domicilios_urbanos_atendidos_fossa_septica,
    $domicilios_rurais_atendidos_fossa_septica,$entidade_responsavel_fossa_septica, $fossa_rudimentar, $total_atendido_fossa_rudimentar, $domicilios_urbanos_atendidos_fossa_rudimentar, $domicilios_rurais_atendidos_fossa_rudimentar,
    $entidade_responsavel_fossa_rudimentar, $vala, $total_atendido_vala, $domicilios_urbanos_atendidos_vala, $domicilios_rurais_atendidos_vala, $entidade_responsavel_vala, $estacao_tratamento, $total_atendido_estacao_tratamento,
    $domicilios_urbanos_atendidos_estacao_tratamento, $domicilios_rurais_atendidos_estacao_tratamento, $entidade_responsavel_estacao_tratamento, $esgoto_tratado, $total_atendido_esgoto_tratado, $domicilios_urbanos_atendidos_esgoto_tratado,
    $domicilios_rurais_atendidos_esgoto_tratado, $entidade_responsavel_esgoto_tratado, $outros, $total_atendido_outros, $domicilios_urbanos_atendidos_outros, $domicilios_rurais_atendidos_outros, $entidade_responsavel_outros){

        $msg = verificarEntradas($fkid_municipios);

        if($msg == ""){

            $con = abrirConexao();

            $sql = "UPDATE servicos_esgoto_coleta_deposicao SET 
            rede_esgoto = '$rede_esgoto', 
            total_atendido_rede_esgoto = '$total_atendido_rede_esgoto', 
            domicilios_urbanos_atendidos_rede_esgoto = '$domicilios_urbanos_atendidos_rede_esgoto', 
            domicilios_rurais_atendidos_rede_esgoto = '$domicilios_rurais_atendidos_rede_esgoto', 
            entidade_responsavel_rede_esgoto = '$entidade_responsavel_rede_esgoto', 
            fossa_septica = '$fossa_septica', 
            total_atendido_fossa_septica = '$total_atendido_fossa_septica', 
            domicilios_urbanos_atendidos_fossa_septica = '$domicilios_urbanos_atendidos_fossa_septica',
            domicilios_rurais_atendidos_fossa_septica = '$domicilios_rurais_atendidos_fossa_septica',
            entidade_responsavel_fossa_septica = $entidade_responsavel_fossa_septica, 
            fossa_rudimentar = $fossa_rudimentar, 
            total_atendido_fossa_rudimentar =  $total_atendido_fossa_rudimentar, 
            domicilios_urbanos_atendidos_fossa_rudimentar =  $domicilios_urbanos_atendidos_fossa_rudimentar, 
            domicilios_rurais_atendidos_fossa_rudimentar =  $domicilios_rurais_atendidos_fossa_rudimentar,
            entidade_responsavel_fossa_rudimentar =  $entidade_responsavel_fossa_rudimentar, 
            vala =  $vala, 
            total_atendido_vala =  $total_atendido_vala, 
            domicilios_urbanos_atendidos_vala =  $domicilios_urbanos_atendidos_vala, 
            domicilios_rurais_atendidos_vala =  $domicilios_rurais_atendidos_vala, 
            entidade_responsavel_vala =  $entidade_responsavel_vala, 
            estacao_tratamento =  $estacao_tratamento, 
            total_atendido_estacao_tratamento =  $total_atendido_estacao_tratamento,
            domicilios_urbanos_atendidos_estacao_tratamento =  $domicilios_urbanos_atendidos_estacao_tratamento, 
            domicilios_rurais_atendidos_estacao_tratamento =  $domicilios_rurais_atendidos_estacao_tratamento, 
            entidade_responsavel_estacao_tratamento =  $entidade_responsavel_estacao_tratamento, 
            esgoto_tratado =  $esgoto_tratado, 
            total_atendido_esgoto_tratado =  $total_atendido_esgoto_tratado, 
            domicilios_urbanos_atendidos_esgoto_tratado =  $domicilios_urbanos_atendidos_esgoto_tratado,
            domicilios_rurais_atendidos_esgoto_tratado =  $domicilios_rurais_atendidos_esgoto_tratado, 
            entidade_responsavel_esgoto_tratado = $entidade_responsavel_esgoto_tratado, 
            outros =  $outros, 
            total_atendido_outros =  $total_atendido_outros, 
            domicilios_urbanos_atendidos_outros =  $domicilios_urbanos_atendidos_outros, 
            domicilios_rurais_atendidos_outros =  $domicilios_rurais_atendidos_outros, 
            entidade_responsavel_outros =  $entidade_responsavel_outros
            WHERE fkid_municipios = '$fkid_municipios';";

            if(mysqli_query($con, $sql)) {
                echo "Alteração realizada com sucesso! Verificar alteração no <a href='consultar_coleta_deposicao_esgoto.php'>banco de dados</a>";
            } else {
                echo "Erro ao tentar atualizar.";
                echo "Error: " . $sql . "<br>" . mysqli_error($con);
            }

            mysqli_close($con);
            return array($msg);
        }


    }

    function excluirColetaDeposicao($idColetaDeposicao){

        $con = abrirConexao();
        $sql = "DELETE FROM servicos_esgoto_coleta_deposicao WHERE idColetaDeposicao = ".$idColetaDeposicao.";";

        if(mysqli_query($con, $sql)){
            $msg =  "Coleta e Deposiçao de esgoto excluída.";
        } else {
            $msg =  "Coleta e deposicao de esgoto excluída.";
        }

        mysqli_close($con);
        return $msg;

    }
    //SERVIÇOS DE ENERGIA
    function verificarEntradasServicosEnergia($fkid_municipios, $energia_eletrica, $capacidade_kva, $gerador_emergencia, $abastecimento_energia_urbana,
    $abastecimento_energia_rural, $abastecimento_proprio_energia){
        if($fkid_municipios == ""){
            return "informe o fkid do municipio";
        }
        if($energia_eletrica == ""){
            return "Informe se há energia eletrica";
        }
        if($capacidade_kva == ""){
            return "Informe a capacidade em kva";
        }
        if($gerador_emergencia == ""){
            return "Informe se há gerador de emergencia";
        }
        if($abastecimento_energia_urbana == ""){
            return "Informe se há abastecimento de energia urbana";
        }
        if($abastecimento_energia_rural == ""){
            return "Informe se há abastecimento de energia rural";
        }
        if($abastecimento_proprio_energia == ""){
            return "Informe se há abastecimento proprio";
        }

        return "";
    }
    
    function cadastrarServicosEnergia($fkid_municipios, $energia_eletrica, $capacidade_kva, $gerador_emergencia, $capacidade_kva_gerador,
    $abastecimento_energia_urbana, $total_abastecido_energia_urbana, $entidade_responsavel_energia_urbana, $abastecimento_energia_rural,
    $total_abastecido_energia_rural ,$entidade_responsavel_energia_rural ,$abastecimento_proprio_energia ,$total_abastecimento_energia_propria,
    $domicilios_urbanos_atendidos_energia_propria, $domicilios_rurais_atendidos_energia_propria ,$entidade_responsavel_energia_propria ,$outros_tipos_abastecimento,
    $total_abastecido_outros_tipos, $domicilios_urbanos_atendidos_outros_tipos, $entidade_responsavel_outros_tipos){

        $msg = verificarEntradasServicosEnergia($fkid_municipios, $energia_eletrica, $capacidade_kva, $gerador_emergencia, $abastecimento_energia_urbana,
        $abastecimento_energia_rural, $abastecimento_proprio_energia);

        if($msg == "") {
            $con = abrirConexao();
                $sql = "INSERT INTO servicos_energia (fkid_municipios, energia_eletrica, capacidade_kva, gerador_emergencia, capacidade_kva_gerador, abastecimento_energia_urbana, total_abastecido_energia_urbana, entidade_responsavel_energia_urbana, abastecimento_energia_rural, total_abastecido_energia_rural, entidade_responsavel_energia_rural, abastecimento_proprio_energia, total_abastecimento_energia_propria, domicilios_urbanos_atendidos_energia_propria, domicilios_rurais_atendidos_energia_propria, entidade_responsavel_energia_propria, outros_tipos_abastecimento, total_abastecido_outros_tipos, domicilios_urbanos_atendidos_outros_tipos, entidade_responsavel_outros_tipos)
                VALUES ('$fkid_municipios','$energia_eletrica', '$capacidade_kva', '$gerador_emergencia', '$capacidade_kva_gerador',
                '$abastecimento_energia_urbana', '$total_abastecido_energia_urbana', '$entidade_responsavel_energia_urbana', '$abastecimento_energia_rural',
                '$total_abastecido_energia_rural' ,'$entidade_responsavel_energia_rural' ,'$abastecimento_proprio_energia' ,'$total_abastecimento_energia_propria',
                '$domicilios_urbanos_atendidos_energia_propria', '$domicilios_rurais_atendidos_energia_propria' ,'$entidade_responsavel_energia_propria' ,'$outros_tipos_abastecimento',
                '$total_abastecido_outros_tipos', '$domicilios_urbanos_atendidos_outros_tipos', '$entidade_responsavel_outros_tipos')";

                if(mysqli_query($con, $sql)){
                    echo "Cadastro realizado com sucesso! <a href='consultar_servicos_energia.php'>Consultar Servicos de Energia.</a>";
                } else {
                    echo "Erro ao tentar cadastrar servicos de energia ";
                }


            mysqli_close($con);
        }
        
        return array($msg);
    }

    function pegarServicosEnergia($fkid_municipios){

        $con = abrirConexao();

            $sql = "SELECT * FROM servicos_energia WHERE fkid_municipios = " . $fkid_municipios . ";";
            $result = mysqli_query($con, $sql);
            mysqli_close($con);

            return $result;
        
    }

    function listarServicosEnergia(){

        $con = abrirConexao();
        $sql = "SELECT * FROM servicos_energia;";
        $resultadoListagem = mysqli_query($con, $sql);
        mysqli_close($con);

        return $resultadoListagem;
    }

    function editarServicosEnergia($fkid_municipios, $energia_eletrica, $capacidade_kva, $gerador_emergencia, $capacidade_kva_gerador,
    $abastecimento_energia_urbana, $total_abastecido_energia_urbana, $entidade_responsavel_energia_urbana, $abastecimento_energia_rural,
    $total_abastecido_energia_rural ,$entidade_responsavel_energia_rural ,$abastecimento_proprio_energia ,$total_abastecimento_energia_propria,
    $domicilios_urbanos_atendidos_energia_propria, $domicilios_rurais_atendidos_energia_propria ,$entidade_responsavel_energia_propria ,$outros_tipos_abastecimento,
    $total_abastecido_outros_tipos, $domicilios_urbanos_atendidos_outros_tipos, $entidade_responsavel_outros_tipos){

        $msg = verificarEntradasServicosEnergia($fkid_municipios, $energia_eletrica, $capacidade_kva, $gerador_emergencia, $abastecimento_energia_urbana,
        $abastecimento_energia_rural, $abastecimento_proprio_energia);

        if($msg == ""){

            $con = abrirConexao();

            $sql = "UPDATE servicos_energia SET 
            energia_eletrica = '$energia_eletrica',  
            capacidade_kva = '$capacidade_kva',
            gerador_emergencia = '$gerador_emergencia',
            capacidade_kva_gerador = '$capacidade_kva_gerador',
            abastecimento_energia_urbana = '$abastecimento_energia_urbana',
            total_abastecido_energia_urbana = '$total_abastecido_energia_urbana',
            entidade_responsavel_energia_urbana = '$entidade_responsavel_energia_urbana',
            abastecimento_energia_rural = '$abastecimento_energia_rural',
            total_abastecido_energia_rural = '$total_abastecido_energia_rural',
            entidade_responsavel_energia_rural = '$entidade_responsavel_energia_rural',
            abastecimento_proprio_energia = '$abastecimento_proprio_energia',
            total_abastecimento_energia_propria = '$total_abastecimento_energia_propria',
            domicilios_urbanos_atendidos_energia_propria = '$domicilios_urbanos_atendidos_energia_propria',
            domicilios_rurais_atendidos_energia_propria = '$domicilios_rurais_atendidos_energia_propria',
            entidade_responsavel_energia_propria = '$entidade_responsavel_energia_propria',
            outros_tipos_abastecimento = '$outros_tipos_abastecimento',
            domicilios_urbanos_atendidos_outros_tipos = '$domicilios_urbanos_atendidos_outros_tipos',
            entidade_responsavel_outros_tipos = '$entidade_responsavel_outros_tipos' WHERE fkid_municipios = '$fkid_municipios';";

            if(mysqli_query($con, $sql)) {
                echo "Alteração realizada com sucesso! Verificar atualização no <a href='consultar_servicos_energia.php'>banco de dados</a>";
            } else {
                echo "Atualização não pode ser realizada.";
            }

            mysqli_close($con);
            return array($msg);
        }
    }


    function excluirServicosEnergia($fkid_municipios){
        $con = abrirConexao();

        $sql = "DELETE FROM servicos_energia WHERE fkid_municipios = ".$fkid_municipios.";";

        if(mysqli_query($con, $sql)){
            $msg = "Excluída.";
        } else {
            $msg = "Não excluída.";
        }

        mysqli_close($con);
        return $msg;
    }
    //SERVIÇOS DE LIXO
    function verificarEntradasServicosLixo($fkid_municipios, $coleta_seletiva, $coleta_nao_seletiva, $sem_coleta){
        if($fkid_municipios == ""){
            return "informe o fkid do municipio";
        }
        if($coleta_seletiva == ""){
            return "Informe se há coleta seletiva";
        }
        if($coleta_nao_seletiva == ""){
            return "Informe se há coleta seletiva";
        }
        if($sem_coleta == ""){
            return "Informe se há coleta seletiva";
        }
        return "";
    }
    
    function cadastrarServicosLixo($fkid_municipios, $coleta_seletiva, $total_atendido_coleta_seletiva, $domicilios_urbanos_atendidos_coleta_seletiva, 
    $domicilios_rurais_atendidos_coleta_seletiva, $entidade_responsavel_coleta_seletiva, $coleta_nao_seletiva, $total_atendido_coleta_nao_seletival, 
    $domicilios_urbanos_atendidos_coleta_nao_seletiva, $domicilios_rurais_atendidos_coleta_nao_seletiva, $entidade_responsavel_coleta_nao_seletiva, 
    $sem_coleta, $total_atendido_sem_coleta, $domicilios_urbanos_atendidos_sem_coleta, $domicilios_rurais_atendidos_sem_coleta){

        $msg = verificarEntradasServicosLixo($fkid_municipios, $coleta_seletiva, $coleta_nao_seletiva, $sem_coleta);

        if($msg == "") {
            $con = abrirConexao();
                $sql = "INSERT INTO servicos_lixo (fkid_municipios, coleta_seletiva, total_atendido_coleta_seletiva, domicilios_urbanos_atendidos_coleta_seletiva, domicilios_rurais_atendidos_coleta_seletiva, entidade_responsavel_coleta_seletiva, coleta_nao_seletiva, total_atendido_coleta_nao_seletival, domicilios_urbanos_atendidos_coleta_nao_seletiva, domicilios_rurais_atendidos_coleta_nao_seletiva ,entidade_responsavel_coleta_nao_seletiva ,sem_coleta, total_atendido_sem_coleta, domicilios_urbanos_atendidos_sem_coleta ,domicilios_rurais_atendidos_sem_coleta)
                VALUES ('$fkid_municipios','$coleta_seletiva', '$total_atendido_coleta_seletiva', '$domicilios_urbanos_atendidos_coleta_seletiva', '$domicilios_rurais_atendidos_coleta_seletiva',
                '$entidade_responsavel_coleta_seletiva', '$coleta_nao_seletiva', '$total_atendido_coleta_nao_seletival', '$domicilios_urbanos_atendidos_coleta_nao_seletiva',
                '$domicilios_rurais_atendidos_coleta_nao_seletiva' ,'$entidade_responsavel_coleta_nao_seletiva' ,'$sem_coleta',
                '$total_atendido_sem_coleta', '$domicilios_urbanos_atendidos_sem_coleta' ,'$domicilios_rurais_atendidos_sem_coleta')";

                if(mysqli_query($con, $sql)){
                    echo "Cadastro realizado com sucesso! <a href='consultar_servicos_lixo.php'>Consultar Servicos de Energia.</a>";
                } else {
                    echo "Erro ao tentar cadastrar servicos de energia ";
                }


            mysqli_close($con);
        }
        
        return array($msg);
    }

    function pegarServicosLixo($fkid_municipios){

        $con = abrirConexao();

            $sql = "SELECT * FROM servicos_lixo WHERE fkid_municipios = " . $fkid_municipios . ";";
            $result = mysqli_query($con, $sql);
            mysqli_close($con);

            return $result;
        
    }

    function listarServicosLixo(){

        $con = abrirConexao();
        $sql = "SELECT * FROM servicos_lixo;";
        $resultadoListagem = mysqli_query($con, $sql);
        mysqli_close($con);

        return $resultadoListagem;
    }

    function editarServicosLixo($fkid_municipios, $coleta_seletiva, $total_atendido_coleta_seletiva, $domicilios_urbanos_atendidos_coleta_seletiva, 
    $domicilios_rurais_atendidos_coleta_seletiva, $entidade_responsavel_coleta_seletiva, $coleta_nao_seletiva, $total_atendido_coleta_nao_seletival, 
    $domicilios_urbanos_atendidos_coleta_nao_seletiva, $domicilios_rurais_atendidos_coleta_nao_seletiva, $entidade_responsavel_coleta_nao_seletiva, 
    $sem_coleta, $total_atendido_sem_coleta, $domicilios_urbanos_atendidos_sem_coleta, $domicilios_rurais_atendidos_sem_coleta){

        $msg = verificarEntradasServicosLixo($fkid_municipios, $coleta_seletiva, $coleta_nao_seletiva, $sem_coleta);

        if($msg == ""){

            $con = abrirConexao();

            $sql = "UPDATE servicos_energia SET 
            fkid_municipios = '$fkid_municipios',  
            coleta_seletiva = '$coleta_seletiva',
            total_atendido_coleta_seletiva = '$total_atendido_coleta_seletiva',
            domicilios_urbanos_atendidos_coleta_seletiva = '$domicilios_urbanos_atendidos_coleta_seletiva',
            domicilios_rurais_atendidos_coleta_seletiva = '$domicilios_rurais_atendidos_coleta_seletiva',
            entidade_responsavel_coleta_seletiva = '$entidade_responsavel_coleta_seletiva',
            coleta_nao_seletiva = '$coleta_nao_seletiva',
            total_atendido_coleta_nao_seletival = '$total_atendido_coleta_nao_seletival',
            domicilios_urbanos_atendidos_coleta_nao_seletiva = '$domicilios_urbanos_atendidos_coleta_nao_seletiva',
            domicilios_rurais_atendidos_coleta_nao_seletiva = '$domicilios_rurais_atendidos_coleta_nao_seletiva',
            entidade_responsavel_coleta_nao_seletiva = '$entidade_responsavel_coleta_nao_seletiva',
            sem_coleta = '$sem_coleta',
            total_atendido_sem_coleta = '$total_atendido_sem_coleta',
            domicilios_urbanos_atendidos_sem_coleta = '$domicilios_urbanos_atendidos_sem_coleta',
            domicilios_rurais_atendidos_sem_coleta = '$domicilios_rurais_atendidos_sem_coleta' WHERE fkid_municipios = '$fkid_municipios';";

            if(mysqli_query($con, $sql)) {
                echo "Alteração realizada com sucesso! Verificar atualização no <a href='consultar_servicos_lixo.php'>banco de dados</a>";
            } else {
                echo "Atualização não pode ser realizada.";
            }

            mysqli_close($con);
            return array($msg);
        }
    }


    function excluirServicosLixo($fkid_municipios){
        $con = abrirConexao();

        $sql = "DELETE FROM servicos_lixo WHERE fkid_municipios = '$fkid_municipios';";

        if(mysqli_query($con, $sql)){
            $msg = "Excluída.";
        } else {
            $msg = "Não excluída.";
        }

        mysqli_close($con);
        return $msg;
    }
    //SERVIÇOS COMUNICAÇAO
    function verificarEntradasServicosComunicacao($fkid_municipios,$telefonia_movel, $telefonia_fixa){
        if($fkid_municipios == ""){
            return "informe o fkid do municipio";
        }  
        if($telefonia_movel == ""){
            return "Informe se há telefonia movel";
        }
        if($telefonia_fixa == ""){
            return "Informe se há coleta seletiva";
        }

        return "";
    }
    
    function cadastrarServicosComunicacao($fkid_municipios, $internet_radio, $internet_cabo, $internet_banda_larga, $internet_discada, $internet_wireless, $internet_3g, $telefonia_movel, 
    $area_municipio_tmovel, $telefonia_fixa, $area_municipio_tfixa){

        $msg = verificarEntradasServicosComunicacao($fkid_municipios,$telefonia_movel, $telefonia_fixa);

        if($msg == "") {
            $con = abrirConexao();
                $sql = "INSERT INTO servicos_comunicacao (fkid_municipios, internet_radio, internet_cabo, internet_banda_larga, internet_discada, internet_wireless, internet_3g, telefonia_movel, 
                area_municipio_tmovel, telefonia_fixa, area_municipio_tfixa)
                VALUES ('$fkid_municipios', '$internet_radio', '$internet_cabo', '$internet_banda_larga', '$internet_discada', '$internet_wireless', '$internet_3g', '$telefonia_movel', 
                '$area_municipio_tmovel', '$telefonia_fixa', '$area_municipio_tfixa')";

                if(mysqli_query($con, $sql)){
                    echo "Cadastro realizado com sucesso! <a href='consultar_servicos_comunicacao.php'>Consultar Servicos de Comunicacao.</a>";
                } else {
                    echo "Erro ao tentar cadastrar servicos de comunicacao ";
                }


            mysqli_close($con);
        }
        
        return array($msg);
    }

    function pegarServicosComunicacao($fkid_municipios){

        $con = abrirConexao();

            $sql = "SELECT * FROM servicos_comunicacao WHERE fkid_municipios = " . $fkid_municipios . ";";
            $result = mysqli_query($con, $sql);
            mysqli_close($con);

            return $result;
        
    }

    function listarServicosComunicacao(){

        $con = abrirConexao();
        $sql = "SELECT * FROM servicos_comunicacao;";
        $resultadoListagem = mysqli_query($con, $sql);
        mysqli_close($con);

        return $resultadoListagem;
    }

    function editarServicosComunicacao($fkid_municipios, $internet_radio, $internet_cabo, $internet_banda_larga, $internet_discada, $internet_wireless, $internet_3g, $telefonia_movel, 
    $area_municipio_tmovel, $telefonia_fixa, $area_municipio_tfixa){

        $msg = verificarEntradasServicosComunicacao($fkid_municipios,$telefonia_movel, $telefonia_fixa);

        if($msg == ""){

            $con = abrirConexao();

            $sql = "UPDATE servicos_energia SET 
            fkid_municipios = '$fkid_municipios',  
            internet_radio = '$internet_radio',
            internet_cabo = '$internet_cabo',
            internet_banda_larga = '$internet_banda_larga',
            internet_discada = '$internet_discada',
            internet_wireless = '$internet_wireless',
            internet_3g = '$internet_3g',
            telefonia_movel = '$telefonia_movel',
            area_municipio_tmovel = '$area_municipio_tmovel',
            telefonia_fixa = '$telefonia_fixa',
            area_municipio_tfixa = '$area_municipio_tfixa' WHERE fkid_municipios = '$fkid_municipios';";

            if(mysqli_query($con, $sql)) {
                echo "Alteração realizada com sucesso! Verificar atualização no <a href='consultar_servicos_comunicacao.php'>banco de dados</a>";
            } else {
                echo "Atualização não pode ser realizada.";
            }

            mysqli_close($con);
            return array($msg);
        }
    }


    function excluirServicosComunicacao($fkid_municipios){
        $con = abrirConexao();

        $sql = "DELETE FROM servicos_comunicacao WHERE fkid_municipios = '$fkid_municipios';";

        if(mysqli_query($con, $sql)){
            $msg = "Excluída.";
        } else {
            $msg = "Não excluída.";
        }

        mysqli_close($con);
        return $msg;
    }
    //SERVIÇOS TURISTICOS
    function verificarEntradasServicosTuristicos($fkid_municipios, $divulgacao_impressa, $divulgacao_televisiva, $informativos_impressos, $visitantes_ano, $visitantes_alta, $meses_alta, $origem_turistas){
        if($fkid_municipios == ""){
            return "informe o fkid do municipio";
        }
        if($divulgacao_impressa == ""){
            return "Informe se há divulgaçao impressa";
        }
        if($divulgacao_televisiva == ""){
            return "Informe há divulgaçao televisiva";
        }
        if($informativos_impressos == ""){
            return "Informe se há Informativos impressos";
        }
        if($visitantes_ano == ""){
            return "Informe os Visitantes por ano";
        }
        if($visitantes_alta == ""){
            return "Informe os Visitantes na alta";
        }
        if($meses_alta == ""){
            return "Informe os Meses de alta";
        }
        if($origem_turistas == ""){
            return "Informe a origem dos turistas";
        }

        return "";
    }
    
    function cadastrarServicosTuristicos($fkid_municipios, $divulgacao_impressa, $folder, $revista, $jornal, $outros, $divulgacao_televisiva, $atendimento_lingua_estrangeira, $informativos_impressos, $visitantes_ano, $visitantes_alta, $meses_alta, $origem_turistas, $origem_turistas_nacionais, $origem_turistas_internacionais, $ano_base, $atrativos_mais_visitados){

        $msg = verificarEntradasServicosTuristicos($fkid_municipios, $divulgacao_impressa, $divulgacao_televisiva, $informativos_impressos, $visitantes_ano, $visitantes_alta, $meses_alta, $origem_turistas);

        if($msg == "") {
            $con = abrirConexao();
                $sql = "INSERT INTO servicos_turisticos (fkid_municipios, divulgacao_impressa, folder, revista, jornal, outros, divulgacao_televisiva, atendimento_lingua_estrangeira, informativos_impressos, visitantes_ano, visitantes_alta, meses_alta, origem_turistas, origem_turistas_nacionais, origem_turistas_internacionais, ano_base, atrativos_mais_visitados)
                VALUES ('$fkid_municipios', '$divulgacao_impressa', '$folder', '$revista', '$jornal', '$outros', '$divulgacao_televisiva', '$atendimento_lingua_estrangeira', '$informativos_impressos', '$visitantes_ano',
                 '$visitantes_alta', '$meses_alta', '$origem_turistas', '$origem_turistas_nacionais', '$origem_turistas_internacionais', '$ano_base', '$atrativos_mais_visitados')";

                if(mysqli_query($con, $sql)){
                    echo "Cadastro realizado com sucesso! <a href='consultar_servicos_turisticos.php'>Ver no Banco de dados.</a>";
                } else {
                    echo "Erro ao tentar cadastrar servicos de energia ";
                }


            mysqli_close($con);
        }
        
        return array($msg);
    }

    function pegarServicosTuristicos($fkid_municipios){

        $con = abrirConexao();

            $sql = "SELECT * FROM servicos_turisticos WHERE fkid_municipios = " . $fkid_municipios . ";";
            $result = mysqli_query($con, $sql);
            mysqli_close($con);

            return $result;
        
    }

    function listarServicosTuristicos(){

        $con = abrirConexao();
        $sql = "SELECT * FROM servicos_turisticos;";
        $resultadoListagem = mysqli_query($con, $sql);
        mysqli_close($con);

        return $resultadoListagem;
    }

    function EditarServicosTuristicos($fkid_municipios, $divulgacao_impressa, $folder, $revista, $jornal, $outros, $divulgacao_televisiva, $atendimento_lingua_estrangeira, $informativos_impressos,
     $visitantes_ano, $visitantes_alta, $meses_alta, $origem_turistas, $origem_turistas_nacionais, $origem_turistas_internacionais, $ano_base, $atrativos_mais_visitados){

        $msg = verificarEntradasServicosTuristicos($fkid_municipios, $divulgacao_impressa, $divulgacao_televisiva, $informativos_impressos, $visitantes_ano,
         $visitantes_alta, $meses_alta, $origem_turistas);

        if($msg == ""){

            $con = abrirConexao();

            $sql = "UPDATE servicos_turisticos SET 
            energia_eletrica = '$divulgacao_impressa',  
            capacidade_kva = '$folder',
            gerador_emergencia = '$revista',
            capacidade_kva_gerador = '$jornal',
            abastecimento_energia_urbana = '$outros',
            total_abastecido_energia_urbana = '$divulgacao_televisiva',
            entidade_responsavel_energia_urbana = '$atendimento_lingua_estrangeira',
            abastecimento_energia_rural = '$informativos_impressos',
            total_abastecido_energia_rural = '$visitantes_ano',
            entidade_responsavel_energia_rural = '$visitantes_alta',
            abastecimento_proprio_energia = '$meses_alta',
            total_abastecimento_energia_propria = '$origem_turistas',
            domicilios_urbanos_atendidos_energia_propria = '$origem_turistas_nacionais',
            domicilios_rurais_atendidos_energia_propria = '$origem_turistas_internacionais',
            entidade_responsavel_energia_propria = '$ano_base',
            outros_tipos_abastecimento = '$atrativos_mais_visitados' WHERE fkid_municipios = '$fkid_municipios';";

            if(mysqli_query($con, $sql)) {
                echo "Alteração realizada com sucesso! Verificar atualização no <a href='consultar_servicos_turisticos.php'>banco de dados</a>";
            } else {
                echo "Atualização não pode ser realizada.";
            }

            mysqli_close($con);
            return array($msg);
        }
    }


    function excluirServicosTuristicos($fkid_municipios){
        $con = abrirConexao();

        $sql = "DELETE FROM servicos_turisticos WHERE fkid_municipios = ".$fkid_municipios.";";

        if(mysqli_query($con, $sql)){
            $msg = "Excluída.";
        } else {
            $msg = "Não excluída.";
        }

        mysqli_close($con);
        return $msg;
    }
?>