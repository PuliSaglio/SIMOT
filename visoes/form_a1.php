<?php
    //include "../controles/controlar_prefeituras.php";
    //include "../controles/controlar_orgao_oficial_tur.php";
    include "../controles/controle.php";

    $verificar = "";
    $fkid_municipios = "";
    //Variaveis Prefeitura
    $nome_municipio = "";  
    $uf = "";
    $regiao_turistica = "";
    $logradouro = "";
    $numero = "";
    $complemento = "";
    $bairro = "";
    $email = "";
    $site = "";
    $cnpj = "";
    $latitude = "";
    $longitude = "";
    $distancia_capital = "";
    $qtd_Funcionarios = "";
    $qtd_funcionarios_deficiencia = "";
    $nome_prefeito = "";
    $aniversario_municipal = "";
    $santo_padroeiro = "";

    //Variaveis Orgao Oficial de turismo
    $nome_orgao_oficial_tur = "";
    $logradouro = "";
    $bairro = "";
    $distrito = "";
    $cep = "";
    $email = "";
    $site = "";
    $qtd_funcionarios = "";
    $qtd_funcionarios_superior_turismo = "";

    //Variaveis instancias
    $municipal = "";
    $estadual = "";
    $regional = "";
    $nacional = "";
    $internacional = "";

    //Variaveis Historico Municipio
    $origem_nome = "";
    $data_fundacao = "";
    $data_emancipacao = "";
    $fundadores = "";
    $outros_fatos = "";

    //Variaveis  caracteristicas do municipio
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

    //Variaveis abastecimento de agua
    $tipo_abastecimento = "";
    $domicilios_atendidos = "";
    $empresa_responsavel = "";

    //Variaveis Coleta e deposiçao de esgoto
    $rede_esgoto = "";
    $total_atendido_rede_esgoto = "";
    $domicilios_urbanos_atendidos_rede_esgoto = "";
    $domicilios_rurais_atendidos_rede_esgoto = "";
    $entidade_responsavel_rede_esgoto = "";
    $fossa_septica = "";
    $total_atendido_fossa_septica = "";
    $domicilios_urbanos_atendidos_fossa_septica = "";
    $domicilios_rurais_atendidos_fossa_septica = "";
    $entidade_responsavel_fossa_septica = ""; 
    $fossa_rudimentar = "";
    $total_atendido_fossa_rudimentar = "";
    $domicilios_urbanos_atendidos_fossa_rudimentar = "";
    $domicilios_rurais_atendidos_fossa_rudimentar = "";
    $entidade_responsavel_fossa_rudimentar = ""; 
    $vala = ""; 
    $total_atendido_vala = ""; 
    $domicilios_urbanos_atendidos_vala = ""; 
    $domicilios_rurais_atendidos_vala = ""; 
    $entidade_responsavel_vala = "";
    $estacao_tratamento = ""; 
    $total_atendido_estacao_tratamento = "";
    $domicilios_urbanos_atendidos_estacao_tratamento = "";
    $domicilios_rurais_atendidos_estacao_tratamento = ""; 
    $entidade_responsavel_estacao_tratamento = ""; 
    $esgoto_tratado = ""; 
    $total_atendido_esgoto_tratado = ""; 
    $domicilios_urbanos_atendidos_esgoto_tratado = "";
    $domicilios_rurais_atendidos_esgoto_tratado = ""; 
    $entidade_responsavel_esgoto_tratado = ""; 
    $outros = ""; 
    $total_atendido_outros = ""; 
    $domicilios_urbanos_atendidos_outros = ""; 
    $domicilios_rurais_atendidos_outros = ""; 
    $entidade_responsavel_outros = "";

    //Variaveis Serviços de energia
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

    //Variaveis Serviços de Lixo
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

    //INFORMAÇOES BASICAS PREFEITURA!!
    //Para os dados aparecerem automaticamente qnd clickar em editar
    if(isset($_GET["id_municipios"])){
        $id_municipios = $_GET["id_municipios"];

        $result = pegarPrefeitura($id_municipios);
        $numRegistros = mysqli_num_rows($result);

        if($numRegistros > 0){
            while($row = mysqli_fetch_assoc($result)){
                $id_municipios = $row['id_municipios'];
                $nome_municipio = $row['nome_municipio'];
                $uf = $row['uf'];
                $regiao_turistica = $row['regiao_turistica'];
                $logradouro = $row['logradouro'];
                $numero = $row['numero'];
                $complemento = $row['complemento'];
                $bairro = $row['bairro'];
                $email = $row['email'];
                $site = $row['site'];
                $cnpj = $row['cnpj'];
                $latitude = $row['latitude'];
                $longitude = $row['longitude'];
                $distancia_capital = $row['distancia_capital_km'];
                $qtd_Funcionarios = $row['qtd_Funcionarios'];
                $qtd_funcionarios_deficiencia = $row['qtd_funcionarios_deficiencia'];
                $nome_prefeito = $row['nome_prefeito'];
                $aniversario_municipal = $row['aniversario_municipal'];
                $santo_padroeiro = $row['santo_padroeiro'];

            }
        }
    }
    //Cadastro
    if(isset($_POST["btnCadastrarPrefeitura"])){
        if(isset($_POST["nome_municipio"])) {
            $nome_municipio = $_POST["nome_municipio"];
        }
        if(isset($_POST["uf"])) {
            $uf = $_POST["uf"];
        }
        if(isset($_POST["regiao_turistica"])){
            $regiao_turistica = $_POST["regiao_turistica"];
        }
        if(isset($_POST["logradouro"])){
            $logradouro = $_POST["logradouro"];
        }
        if(isset($_POST["numero"])){
            $numero = $_POST["numero"];
        }
        if(isset($_POST["complemento"])){
            $complemento = $_POST["complemento"];
        }
        if(isset($_POST["bairro"])){
            $bairro = $_POST["bairro"];
        }
        if(isset($_POST["email"])){
            $email = $_POST["email"];
        }
        if(isset($_POST["site"])){
            $site = $_POST["site"];
        }
        if(isset($_POST["cnpj"])){
            $cnpj = $_POST["cnpj"];
        }
        if(isset($_POST["latitude"])){
            $latitude = $_POST["latitude"];
        }
        if(isset($_POST["longitude"])){
            $longitude = $_POST["longitude"];
        }
        if(isset($_POST["distancia_capital_km"])){
            $distancia_capital_km = $_POST["distancia_capital_km"];
        }
        if(isset($_POST["qtd_Funcionarios"])){
            $qtd_Funcionarios = $_POST["qtd_Funcionarios"];
        }
        if(isset($_POST["qtd_funcionarios_deficiencia"])){
            $qtd_funcionarios_deficiencia = $_POST["qtd_funcionarios_deficiencia"];
        }
        if(isset($_POST["nome_prefeito"])){
            $nome_prefeito = $_POST["nome_prefeito"];
        }
        if(isset($_POST["aniversario_municipal"])){
            $aniversario_municipal = $_POST["aniversario_municipal"];
        }
        if(isset($_POST["santo_padroeiro"])){
            $santo_padroeiro = $_POST["santo_padroeiro"];
        }

        $verificar = verificarEntradasPrefeitura($nome_municipio, $uf, $regiao_turistica, $logradouro, $numero, $bairro, $email, $cnpj, $latitude, $longitude, $distancia_capital_km, $qtd_Funcionarios, $qtd_funcionarios_deficiencia, $nome_prefeito, $aniversario_municipal, $santo_padroeiro);

        $msg = cadastrarPrefeitura($nome_municipio, $uf, $regiao_turistica, $logradouro, $numero, $complemento, $bairro, $email, $site, $cnpj, $latitude, $longitude, $distancia_capital_km, $qtd_Funcionarios, $qtd_funcionarios_deficiencia, $nome_prefeito, $aniversario_municipal, $santo_padroeiro);

    }#Editar dados
    
    elseif(isset($_POST["btnEditarPrefeitura"])) {
        if(isset($_POST["id_municipios"])) {
            $id_municipios = $_POST["id_municipios"];
        }
        if(isset($_POST["nome_municipio"])) {
            $nome_municipio = $_POST["nome_municipio"];
        }
        if(isset($_POST["uf"])) {
            $uf = $_POST["uf"];
        }
        if(isset($_POST["regiao_turistica"])){
            $regiao_turistica = $_POST["regiao_turistica"];
        }
        if(isset($_POST["logradouro"])){
            $logradouro = $_POST["logradouro"];
        }
        if(isset($_POST["numero"])){
            $numero = $_POST["numero"];
        }
        if(isset($_POST["complemento"])){
            $complemento = $_POST["complemento"];
        }
        if(isset($_POST["bairro"])){
            $bairro = $_POST["bairro"];
        }
        if(isset($_POST["email"])){
            $email = $_POST["email"];
        }
        if(isset($_POST["site"])){
            $site = $_POST["site"];
        }
        if(isset($_POST["cnpj"])){
            $cnpj = $_POST["cnpj"];
        }
        if(isset($_POST["latitude"])){
            $latitude = $_POST["latitude"];
        }
        if(isset($_POST["longitude"])){
            $longitude = $_POST["longitude"];
        }
        if(isset($_POST["distancia_capital_km"])){
            $distancia_capital = $_POST["distancia_capital_km"];
        }
        if(isset($_POST["qtd_Funcionarios"])){
            $qtd_Funcionarios = $_POST["qtd_Funcionarios"];
        }
        if(isset($_POST["qtd_funcionarios_deficiencia"])){
            $qtd_funcionarios_deficiencia = $_POST["qtd_funcionarios_deficiencia"];
        }
        if(isset($_POST["nome_prefeito"])){
            $nome_prefeito = $_POST["nome_prefeito"];
        }
        if(isset($_POST["aniversario_municipal"])){
            $aniversario_municipal = $_POST["aniversario_municipal"];
        }
        if(isset($_POST["santo_padroeiro"])){
            $santo_padroeiro = $_POST["santo_padroeiro"];
        }

        $msg = editarPrefeitura($id_municipios, $nome_municipio, $uf, $regiao_turistica, $logradouro, $numero, $complemento, $bairro, $email, $site, $cnpj, $latitude, $longitude, $distancia_capital, $qtd_Funcionarios, $qtd_funcionarios_deficiencia, $nome_prefeito, $aniversario_municipal, $santo_padroeiro);
    }#Excluir dados
    elseif(isset($_POST["btnExcluirPrefeitura"])){
        if(isset($_POST["id_municipios"])){
            $id_municipios = $_POST["id_municipios"];
        }

        $result = excluirPrefeitura($id_municipios);

        die();
    }//FIM PREFEITURA

    //ORGAO OFC TURISMO!!!
    if(isset($_GET["fkid_municipios"])){
        $fkid_municipios = $_GET["fkid_municipios"];

        $result = pegarOrgaoOficialTur($fkid_municipios);
        $numRegistros = mysqli_num_rows($result);

        if($numRegistros > 0){
            while($row = mysqli_fetch_assoc($result)){
                $fkid_municipios = $row['fkid_municipios'];
                $nome_orgao_oficial_tur = $row['nome_orgao_oficial_tur'];
                $logradouro = $row['logradouro'];
                $bairro = $row['bairro'];
                $distrito = $row['distrito'];
                $cep = $row['cep'];
                $email = $row['email'];
                $site = $row['site'];
                $qtd_funcionarios = $row['qtd_funcionarios'];
                $qtd_funcionarios_superior_turismo = $row['qtd_funcionarios_superior_turismo'];
            }
        }
    }

    //Cadastro
    if(isset($_POST["btnCadastrarOrgaoOficialTur"])){
    
        if(isset($_POST["fkid_municipios"])){
            $fkid_municipios = $_POST["fkid_municipios"];
        }
        if(isset($_POST["nome_orgao_oficial_tur"])) {
            $nome_orgao_oficial_tur = $_POST["nome_orgao_oficial_tur"];
        }
        if(isset($_POST["logradouro"])) {
            $logradouro = $_POST["logradouro"];
        }
        if(isset($_POST["bairro"])){
            $bairro = $_POST["bairro"];
        }
        if(isset($_POST["distrito"])){
            $distrito = $_POST["distrito"];
        }
        if(isset($_POST["cep"])){
            $cep = $_POST["cep"];
        }
        if(isset($_POST["email"])){
            $email = $_POST["email"];
        }
        if(isset($_POST["site"])){
            $site = $_POST["site"];
        }
        if(isset($_POST["qtd_funcionarios"])){
            $qtd_funcionarios = $_POST["qtd_funcionarios"];
        }
        if(isset($_POST["qtd_funcionarios_superior_turismo"])){
            $qtd_funcionarios_superior_turismo = $_POST["qtd_funcionarios_superior_turismo"];
        }

        $verificar = verificarEntradasOrgaoOficialTur($nome_orgao_oficial_tur, $logradouro, $bairro, $distrito, $cep, $email, $qtd_funcionarios, $qtd_funcionarios_superior_turismo);

        $msg = cadastrarOrgaoOficialTur($fkid_municipios,$nome_orgao_oficial_tur, $logradouro, $bairro, $distrito, $cep, $email, $site, $qtd_funcionarios, $qtd_funcionarios_superior_turismo);

    }#Editar dados
    elseif(isset($_POST["btnEditarOrgaoOficialTur"])) {
        if(isset($_POST["fkid_municipios"])){
            $fkid_municipios = $_POST["fkid_municipios"];
        }
        if(isset($_POST["nome_orgao_oficial_tur"])) {
            $nome_orgao_oficial_tur = $_POST["nome_orgao_oficial_tur"];
        }
        if(isset($_POST["logradouro"])) {
            $logradouro = $_POST["logradouro"];
        }
        if(isset($_POST["bairro"])){
            $bairro = $_POST["bairro"];
        }
        if(isset($_POST["distrito"])){
            $distrito = $_POST["distrito"];
        }
        if(isset($_POST["cep"])){
            $cep = $_POST["cep"];
        }
        if(isset($_POST["email"])){
            $email = $_POST["email"];
        }
        if(isset($_POST["site"])){
            $site = $_POST["site"];
        }
        if(isset($_POST["qtd_funcionarios"])){
            $qtd_funcionarios = $_POST["qtd_funcionarios"];
        }
        if(isset($_POST["qtd_funcionarios_superior_turismo"])){
            $qtd_funcionarios_superior_turismo = $_POST["qtd_funcionarios_superior_turismo"];
        }

        $msg = editarOrgaoOficialTur($fkid_municipios, $nome_orgao_oficial_tur, $logradouro, $bairro, $distrito, $cep, $email, $site, $qtd_funcionarios, $qtd_funcionarios_superior_turismo);
    }#Excluir dados
    elseif(isset($_POST["btnExcluirOrgaoOficialTur"])){
        if(isset($_POST["fkid_municipios"])){
            $fkid_municipios = $_POST["fkid_municipios"];
        }

        $result = excluirOrgaoOficialTur($fkid_municipios);

        die();
    }
    //INSTANCIAS GOVERNAMENTAIS!!!
    if(isset($_GET["fkid_municipios"])){
        $fkid_municipios = $_GET["fkid_municipios"];

        $result = pegarInstancias($fkid_municipios);
        $numRegistros = mysqli_num_rows($result);

            if($numRegistros > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $municipal = $row['municipal'];
                    $estadual = $row['estadual'];
                    $regional = $row['regional'];
                    $nacional = $row['nacional'];
                    $internacional = $row['internacional'];
                    $fkid_municipios = $row['fkid_municipios']; 
                }
        }
    }

    #Cadastrar
    if(isset($_POST["btnCadastrarInstancias"])){
        if(isset($_POST["municipal"])){
            $municipal = $_POST["municipal"];
        }
        if(isset($_POST["estadual"])){
            $estadual = $_POST["estadual"];
        }
        if(isset($_POST["regional"])){
            $regional = $_POST["regional"];
        }
        if(isset($_POST["nacional"])){
            $nacional = $_POST["nacional"];
        }
        if(isset($_POST["internacional"])){
            $internacional = $_POST["internacional"];
        }
        if(isset($_POST["fkid_municipios"])){
            $fkid_municipios = $_POST["fkid_municipios"];
        }
        $verificar = verificarEntradasInstancias($municipal, $estadual, $regional, $nacional, $internacional, $fkid_municipios);
        $msg = cadastrarInstancias($municipal, $estadual, $regional, $nacional, $internacional, $fkid_municipios);
    }#Editar
    elseif(isset($_POST["btnEditarInstancias"])){
        if(isset($_POST["municipal"])){
            $municipal = $_POST["municipal"];
        }

        if(isset($_POST["estadual"])){
            $estadual = $_POST["estadual"];
        }

        if(isset($_POST["regional"])){
            $regional = $_POST["regional"];
        }

        if(isset($_POST["nacional"])){
            $nacional = $_POST["nacional"];
        }

        if(isset($_POST["internacional"])){
            $internacional = $_POST["internacional"];
        }
        if(isset($_POST["fkid_municipios"])){
            $fkid_municipios = $_POST["fkid_municipios"];
        }

        $msg = editarInstancias($municipal, $estadual, $regional, $nacional, $internacional, $fkid_municipios);
    }#Excluir
    elseif(isset($_POST["btnExcluirInstancias"])){
        if(isset($_POST["fkid_municipios"])){
            $fkid_municipios = $_POST["fkid_municipios"];
        }
        $result = excluirInstancias($fkid_municipios);
        die();
    }

    //HISTORICO MUNICIPAL!!!
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
        $verificar = verificarEntradasHistorico($fkid_municipios, $origem_nome, $data_fundacao, $data_emancipacao, $fundadores);
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
    //CARACTERISTICAS DO MUNICIPIO!!!
    if(isset($_GET["fkid_municipios"])){
        $fkid_municipios = $_GET["fkid_municipios"];

        $result = pegarCaracteristicas($fkid_municipios);
        $numRegistros = mysqli_num_rows($result);

        if($numRegistros > 0){
            while($row = mysqli_fetch_assoc($result)){
                $fkid_municipios = $row['fkid_municipios'];
            $area_total_km = $row['area_total_km']; 
            $area_urbana_km = $row['area_urbana_km'];
            $area_rural_km = $row['area_rural_km'];
            $ano_base_area = $row['ano_base_area'];
            $populacao_total = $row['populacao_total'];
            $populacao_urbana = $row['populacao_urbana'];
            $populacao_rural = $row['populacao_rural'];
            $ano_base_populacao = $row['ano_base_populacao'];
            $altitude_media = $row['altitude_media'];
            $media_temperatura = $row['media_temperatura'];
            $minima_temperatura = $row['minima_temperatura'];
            $maxima_temperatura = $row['maxima_temperatura'];
            $meses_mais_frios = $row['meses_mais_frios'];
            $meses_mais_quentes = $row['meses_mais_quentes'];
            $meses_mais_chuvosos = $row['meses_mais_chuvosos'];
            $meses_menos_chuvosos = $row['meses_menos_chuvosos'];
            $principais_atv_economicas = $row['principais_atv_economicas'];

            }
        }
    }

    #Cadastrar
    if(isset($_POST["btnCadastrarCaracteristicas"])){
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

        $verificar = verificarEntradasCaracteristicas($fkid_municipios, $area_total_km, $area_urbana_km, $area_rural_km, $ano_base_area, $populacao_total, $populacao_urbana, $populacao_rural, $ano_base_populacao, $altitude_media,$media_temperatura, $minima_temperatura, $maxima_temperatura, $meses_mais_frios, $meses_mais_quentes, $meses_mais_chuvosos, $meses_menos_chuvosos, $principais_atv_economicas);
        $msg = cadastrarCaracteristicas($fkid_municipios, $area_total_km, $area_urbana_km, $area_rural_km, $ano_base_area, $populacao_total, $populacao_urbana, $populacao_rural, $ano_base_populacao, $altitude_media,$media_temperatura, $minima_temperatura, $maxima_temperatura, $meses_mais_frios, $meses_mais_quentes, $meses_mais_chuvosos, $meses_menos_chuvosos, $principais_atv_economicas);
    }#Editar
    elseif(isset($_POST["btnEditarCaracteristicas"])) {
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
        $msg = editarCaracteristicas($fkid_municipios, $area_total_km, $area_urbana_km, $area_rural_km, $ano_base_area, $populacao_total, $populacao_urbana, $populacao_rural, $ano_base_populacao, $altitude_media,$media_temperatura, $minima_temperatura, $maxima_temperatura, $meses_mais_frios, $meses_mais_quentes, $meses_mais_chuvosos, $meses_menos_chuvosos, $principais_atv_economicas);
    }
    #Excluir
    elseif(isset($_POST["btnExcluirCaracteristicas"])){
        if(isset($_POST["fkid_municipios"])){
            $fkid_municipios = $_POST["fkid_municipios"];
        }

        $result = excluirCaracteristicas($fkid_municipios);

        die();
    }
    //ABASTECIMENTO DE AGUA!!!
    if(isset($_GET["fkid_municipios"])){
        $fkid_municipios = $_GET["fkid_municipios"];

        $result = pegarAbastecimentoAgua($fkid_municipios);
        $numRegistros = mysqli_num_rows($result);

        if($numRegistros > 0){
            while($row = mysqli_fetch_assoc($result)){
                $fkid_municipios = $row['fkid_municipios'];
                $tipo_abastecimento = $row['tipo_abastecimento'];
                $domicilios_atendidos = $row['domicilios_atendidos'];
                $empresa_responsavel = $row['empresa_responsavel'];
            }
        }
    }
    elseif(isset( $_POST["btnAtualizarAbastecimentoAgua"])){

        if(isset($_POST["fkid_municipios"])){
            $fkid_municipios = $_POST["fkid_municipios"];
        }
    
    
        if(isset($_POST["tipo_abastecimento"])){
            $tipo_abastecimento =  $_POST["tipo_abastecimento"];
        }
    
        if(isset($_POST["domicilios_atendidos"])){
            $domicilios_atendidos =  $_POST["domicilios_atendidos"];
        }
    
        if(isset($_POST["empresa_responsavel"])){
            $empresa_responsavel =  $_POST["empresa_responsavel"];
        }

    
    $msg = editarAbastecimentoAgua($fkid_municipios , $tipo_abastecimento, $domicilios_atendidos, $empresa_responsavel);
    }
    elseif(isset($_POST["btnCadastrarAbastecimentoAgua"])){
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
        $verificar = verificarEntradasAbastecimentoAgua($fkid_municipios, $tipo_abastecimento, $domicilios_atendidos, $empresa_responsavel);
        $msg = cadastrarAbastecimentoAgua($fkid_municipios, $tipo_abastecimento, $domicilios_atendidos, $empresa_responsavel);
    }
    elseif(isset($_POST["btnExcluirAbastecimentoAgua"])){
        if(isset($_POST["fkid_municipios"])){
            $fkid_municipios = $_POST["fkid_municipios"];
        }

        $result = excluirAbastecimentoAgua($fkid_municipios);

        die();
    }
    //COLETA E DEPOSICAO DE ESGOTO!!!
    if(isset($_GET["fkid_municipios"])){
        $fkid_municipios = $_GET["fkid_municipios"];

            $result = pegarColetaDeposicaoEsgoto($fkid_municipios);
            $numRegistros = mysqli_num_rows($result);

            if($numRegistros > 0) {
                while($row = mysqli_fetch_assoc($result)){
                    $fkid_municipios = $row["fkid_municipios"];
                    $rede_esgoto = $row["rede_esgoto"];
                    $total_atendido_rede_esgoto = $row["total_atendido_rede_esgoto"];
                    $domicilios_urbanos_atendidos_rede_esgoto = $row["domicilios_urbanos_atendidos_rede_esgoto"];
                    $domicilios_rurais_atendidos_rede_esgoto = $row["domicilios_rurais_atendidos_rede_esgoto"];
                    $entidade_responsavel_rede_esgoto = $row["entidade_responsavel_rede_esgoto"];
                    $fossa_septica = $row["fossa_septica"];
                    $total_atendido_fossa_septica = $row["total_atendido_fossa_septica"];
                    $domicilios_urbanos_atendidos_fossa_septica = $row["domicilios_urbanos_atendidos_fossa_septica"];
                    $domicilios_rurais_atendidos_fossa_septica = $row["domicilios_rurais_atendidos_fossa_septica"];
                    $entidade_responsavel_fossa_septica = $row["entidade_responsavel_fossa_septica"];
                    $fossa_rudimentar = $row["fossa_rudimentar"];
                    $total_atendido_fossa_rudimentar = $row["total_atendido_fossa_rudimentar"];
                    $domicilios_urbanos_atendidos_fossa_rudimentar = $row["domicilios_urbanos_atendidos_fossa_rudimentar"];
                    $domicilios_rurais_atendidos_fossa_rudimentar = $row["domicilios_rurais_atendidos_fossa_rudimentar"];
                    $entidade_responsavel_fossa_rudimentar = $row["entidade_responsavel_fossa_rudimentar"];
                    $vala = $row["vala"];
                    $total_atendido_vala = $row["total_atendido_vala"];
                    $domicilios_urbanos_atendidos_vala = $row["domicilios_urbanos_atendidos_vala"];
                    $domicilios_rurais_atendidos_vala = $row["domicilios_rurais_atendidos_vala"];
                    $entidade_responsavel_vala = $row["entidade_responsavel_vala"];
                    $estacao_tratamento = $row["estacao_tratamento"];
                    $total_atendido_estacao_tratamento = $row["total_atendido_estacao_tratamento"];
                    $domicilios_urbanos_atendidos_estacao = $row["domicilios_urbanos_atendidos_estacao"];
                    $domicilios_rurais_atendidos_estacao = $row["domicilios_rurais_atendidos_estacao"];
                    $entidade_responsavel_estacao_tratamento = $row["entidade_responsavel_estacao_tratamento"];
                    $esgoto_tratado = $row["esgoto_tratado"];
                    $total_atendido_esgoto_tratado = $row["total_atendido_esgoto_tratado"];
                    $domicilios_urbanos_atendidos_esgoto_tratado = $row["domicilios_urbanos_atendidos_esgoto_tratado"];
                    $domicilios_rurais_atendidos_esgoto_tratado = $row["domicilios_rurais_atendidos_esgoto_tratado"];
                    $entidade_responsavel_esgoto_tratado = $row["entidade_responsavel_esgoto_tratado"];
                    $outros = $row["outros"];
                    $total_atendido_outros = $row["total_atendido_outros"];
                    $domicilios_urbanos_atendidos_outros = $row["domicilios_urbanos_atendidos_outros"];
                    $domicilios_rurais_atendidos_outros = $row["domicilios_rurais_atendidos_outros"];
                    $entidade_responsavel_outros = $row["entidade_responsavel_outros"];
    
                }
            }
        }
    //Cadastro
    if(isset($_POST["btnCadastrarColetaDeposicaoEsgoto"])){
        if(isset($_POST["fkid_municipios"])){
            $fkid_municipios = $_POST["fkid_municipios"];
        }
        if(isset($_POST["rede_esgoto"])){
            $rede_esgoto = $_POST["rede_esgoto"];
        }
        if(isset($_POST["total_atendido_rede_esgoto"])){
            $total_atendido_rede_esgoto=$_POST["total_atendido_rede_esgoto"];
        }
        if(isset($_POST["domicilios_urbanos_atendidos_rede_esgoto"])){
            $domicilios_urbanos_atendidos_rede_esgoto=$_POST["domicilios_urbanos_atendidos_rede_esgoto"];
        }
        if(isset($_POST["domicilios_rurais_atendidos_rede_esgoto"])){
            $domicilios_rurais_atendidos_rede_esgoto =$_POST["domicilios_rurais_atendidos_rede_esgoto"];
        }
        if(isset($_POST["entidade_responsavel_rede_esgoto"])){
            $entidade_responsavel_rede_esgoto =$_POST["entidade_responsavel_rede_esgoto"];
        }
        if(isset($_POST["fossa_septica"])){
            $fossa_septica= $_POST["fossa_septica"];
        }
        if(isset($_POST["total_atendido_fossa_septica"])){
            $total_atendido_fossa_septica=$_POST["total_atendido_fossa_septica"];
        }
        if(isset($_POST["domicilios_urbanos_atendidos_fossa_septica"])){
            $domicilios_urbanos_atendidos_fossa_septica=$_POST["domicilios_urbanos_atendidos_fossa_septica"];
        }
        if(isset($_POST["domicilios_rurais_atendidos_fossa_septica"])){
            $domicilios_rurais_atendidos_fossa_septica =$_POST["domicilios_rurais_atendidos_fossa_septica"];
        }
        if(isset($_POST["entidade_responsavel_fossa_septica"])){
            $entidade_responsavel_fossa_septica =$_POST["entidade_responsavel_fossa_septica"];
        }
        if(isset($_POST["fossa_rudimentar"])){
            $fossa_rudimentar= $_POST["fossa_rudimentar"];
        }
        if(isset($_POST["total_atendido_fossa_rudimentar"])){
            $total_atendido_fossa_rudimentar=$_POST["total_atendido_fossa_rudimentar"];
        }
        if(isset($_POST["domicilios_urbanos_atendidos_fossa_rudimentar"])){
            $domicilios_urbanos_atendidos_fossa_rudimentar=$_POST["domicilios_urbanos_atendidos_fossa_rudimentar"];
        }
        if(isset($_POST["domicilios_rurais_atendidos_fossa_rudimentar"])){
            $domicilios_rurais_atendidos_fossa_rudimentar =$_POST["domicilios_rurais_atendidos_fossa_rudimentar"];
        }
        if(isset($_POST["entidade_responsavel_fossa_rudimentar"])){
            $entidade_responsavel_fossa_rudimentar =$_POST["entidade_responsavel_fossa_rudimentar"];
        }
        if(isset($_POST["vala"])){
            $vala= $_POST["vala"];
        }
        if(isset($_POST["total_atendido_vala"])){
            $total_atendido_vala=$_POST["total_atendido_vala"];
        }
        if(isset($_POST["domicilios_urbanos_atendidos_vala"])){
            $domicilios_urbanos_atendidos_vala=$_POST["domicilios_urbanos_atendidos_vala"];
        }
        if(isset($_POST["domicilios_rurais_atendidos_vala"])){
            $domicilios_rurais_atendidos_vala =$_POST["domicilios_rurais_atendidos_vala"];
        }
        if(isset($_POST["entidade_responsavel_vala"])){
            $entidade_responsavel_vala =$_POST["entidade_responsavel_vala"];
        }
        if(isset($_POST["estacao_tratamento"])){
            $estacao_tratamento=$_POST["estacao_tratamento"];
        }
        if(isset($_POST["total_atendido_estacao_tratamento"])){
            $total_atendido_estacao_tratamento=$_POST["total_atendido_estacao_tratamento"];
        }
        if(isset($_POST["domicilios_urbanos_atendidos_estacao_tratamento"])){
            $domicilios_urbanos_atendidos_estacao_tratamento=$_POST["domicilios_urbanos_atendidos_estacao_tratamento"];
        }
        if(isset($_POST["domicilios_rurais_atendidos_estacao_tratamento"])){
            $domicilios_rurais_atendidos_estacao_tratamento =$_POST["domicilios_rurais_atendidos_estacao_tratamento"];
        }
        if(isset($_POST["entidade_responsavel_estacao_tratamento"])){
            $entidade_responsavel_estacao_tratamento =$_POST["entidade_responsavel_estacao_tratamento"];
        }
        if(isset($_POST["esgoto_tratado"])){
            $esgoto_tratado =$_POST["esgoto_tratado"];
        }
        if(isset($_POST["total_atendido_esgoto_tratado"])){
            $total_atendido_esgoto_tratado=$_POST["total_atendido_esgoto_tratado"];
        }
        if(isset($_POST["domicilios_urbanos_atendidos_esgoto_tratado"])){
            $domicilios_urbanos_atendidos_esgoto_tratado=$_POST["domicilios_urbanos_atendidos_esgoto_tratado"];
        }
        if(isset($_POST["domicilios_rurais_atendidos_esgoto_tratado"])){
            $domicilios_rurais_atendidos_esgoto_tratado =$_POST["domicilios_rurais_atendidos_esgoto_tratado"];
        }
        if(isset($_POST["entidade_responsavel_esgoto_tratado"])){
            $entidade_responsavel_esgoto_tratado =$_POST["entidade_responsavel_esgoto_tratado"];
        }
        if(isset($_POST["outros"])){
            $outros= $_POST["outros"];
        }
        if(isset($_POST["total_atendido_outros"])){
            $total_atendido_outros=$_POST["total_atendido_outros"];
        }
        if(isset($_POST["domicilios_urbanos_atendidos_outros"])){
            $domicilios_urbanos_atendidos_outros=$_POST["domicilios_urbanos_atendidos_outros"];
        }
        if(isset($_POST["domicilios_rurais_atendidos_outros"])){
            $domicilios_rurais_atendidos_outros =$_POST["domicilios_rurais_atendidos_outros"];
        }
        if(isset($_POST["entidade_responsavel_outros"])){
            $entidade_responsavel_outros =$_POST["entidade_responsavel_outros"];
        }
    
         
        $verificar = verificarEntradasColetaDeposicaoEsgoto($fkid_municipios);

        $msg = cadastrarColetaDeposicaoEsgoto($fkid_municipios, $rede_esgoto, $total_atendido_rede_esgoto, $domicilios_urbanos_atendidos_rede_esgoto, $domicilios_rurais_atendidos_rede_esgoto, $entidade_responsavel_rede_esgoto, $fossa_septica, $total_atendido_fossa_septica, $domicilios_urbanos_atendidos_fossa_septica,
        $domicilios_rurais_atendidos_fossa_septica,$entidade_responsavel_fossa_septica, $fossa_rudimentar, $total_atendido_fossa_rudimentar, $domicilios_urbanos_atendidos_fossa_rudimentar, $domicilios_rurais_atendidos_fossa_rudimentar,
        $entidade_responsavel_fossa_rudimentar, $vala, $total_atendido_vala, $domicilios_urbanos_atendidos_vala, $domicilios_rurais_atendidos_vala, $entidade_responsavel_vala, $estacao_tratamento, $total_atendido_estacao_tratamento,
        $domicilios_urbanos_atendidos_estacao_tratamento, $domicilios_rurais_atendidos_estacao_tratamento, $entidade_responsavel_estacao_tratamento, $esgoto_tratado, $total_atendido_esgoto_tratado, $domicilios_urbanos_atendidos_esgoto_tratado,
        $domicilios_rurais_atendidos_esgoto_tratado, $entidade_responsavel_esgoto_tratado, $outros, $total_atendido_outros, $domicilios_urbanos_atendidos_outros, $domicilios_rurais_atendidos_outros, $entidade_responsavel_outros);
    }
     elseif(isset($_POST["btnAtualizarColetaDeposicaoEsgoto"])){
        if(isset($_POST["fkid_municipios"])){
            $fkid_municipios = $_POST["fkid_municipios"];
        }
        if(isset($_POST["rede_esgoto"])){
            $rede_esgoto = $_POST["rede_esgoto"];
        }
        if(isset($_POST["total_atendido_rede_esgoto"])){
            $total_atendido_rede_esgoto = $_POST["total_atendido_rede_esgoto"];
        }
        if(isset($_POST["domicilios_urbanos_atendidos_rede_esgoto"])){
            $domicilios_urbanos_atendidos_rede_esgoto = $_POST["domicilios_urbanos_atendidos_rede_esgoto"];
        }
        if(isset($_POST["domicilios_rurais_atendidos_rede_esgoto"])){
            $domicilios_rurais_atendidos_rede_esgoto = $_POST["domicilios_rurais_atendidos_rede_esgoto"];
        }
        if(isset($_POST["entidade_responsavel_rede_esgoto"])){
            $entidade_responsavel_rede_esgoto = $_POST["entidade_responsavel_rede_esgoto"];
        }
        if(isset($_POST["fossa_septica"])){
            $fossa_septica= $_POST["fossa_septica"];
        }
        if(isset($_POST["total_atendido_fossa_septica"])){
            $total_atendido_fossa_septica= $_POST["total_atendido_fossa_septica"];
        }
        if(isset($_POST["domicilios_urbanos_atendidos_fossa_septica"])){
            $domicilios_urbanos_atendidos_fossa_septica= $_POST["domicilios_urbanos_atendidos_fossa_septica"];
        }
        if(isset($_POST["domicilios_rurais_atendidos_fossa_septica"])){
            $domicilios_rurais_atendidos_fossa_septica= $_POST["domicilios_rurais_atendidos_fossa_septica"];
        }
        if(isset($_POST["entidade_responsavel_fossa_septica"])){
            $entidade_responsavel_fossa_septica= $_POST["entidade_responsavel_fossa_septica"];
        }
        if(isset($_POST["fossa_rudimentar"])){
            $fossa_rudimentar= $_POST["fossa_rudimentar"];
        }
        if(isset($_POST["total_atendido_fossa_rudimentar"])){
            $total_atendido_fossa_rudimentar= $_POST["total_atendido_fossa_rudimentar"];
        }
        if(isset($_POST["domicilios_urbanos_atendidos_fossa_rudimentar"])){
            $domicilios_urbanos_atendidos_fossa_rudimentar= $_POST["domicilios_urbanos_atendidos_fossa_rudimentar"];
        }
        if(isset($_POST["domicilios_rurais_atendidos_fossa_rudimentar"])){
            $domicilios_rurais_atendidos_fossa_rudimentar= $_POST["domicilios_rurais_atendidos_fossa_rudimentar"];
        }
        if(isset($_POST["entidade_responsavel_fossa_rudimentar"])){
            $entidade_responsavel_fossa_rudimentar= $_POST["entidade_responsavel_fossa_rudimentar"];
        }
        if(isset($_POST["vala"])){
            $vala= $_POST["vala"];
        }
        if(isset($_POST["total_atendido_vala"])){
            $total_atendido_vala= $_POST["total_atendido_vala"];
        }
        if(isset($_POST["domicilios_urbanos_atendidos_vala"])){
            $domicilios_urbanos_atendidos_vala= $_POST["domicilios_urbanos_atendidos_vala"];
        }
        if(isset($_POST["domicilios_rurais_atendidos_vala"])){
            $domicilios_rurais_atendidos_vala= $_POST["domicilios_rurais_atendidos_vala"];
        }
        if(isset($_POST["entidade_responsavel_vala"])){
            $entidade_responsavel_vala= $_POST["entidade_responsavel_vala"];
        }
        if(isset($_POST["estacao_tratamento"])){
            $estacao_tratamento=$_POST["estacao_tratamento"];
        }
        if(isset($_POST["total_atendido_estacao_tratamento"])){
            $total_atendido_estacao_tratamento=$_POST["total_atendido_estacao_tratamento"];
        }
        if(isset($_POST["domicilios_urbanos_atendidos_estacao"])){
            $domicilios_urbanos_atendidos_estacao=$_POST["domicilios_urbanos_atendidos_estacao"];
        }
        if(isset($_POST["domicilios_rurais_atendidos_estacao"])){
            $domicilios_rurais_atendidos_estacao=$_POST["domicilios_rurais_atendidos_estacao"];
        }
        if(isset($_POST["entidade_responsavel_estacao_tratamento"])){
            $entidade_responsavel_estacao_tratamento=$_POST["entidade_responsavel_estacao_tratamento"];
        }
        if(isset($_POST["esgoto_tratado"])){
            $esgoto_tratado =$_POST["esgoto_tratado"];
        }
        if(isset($_POST["total_atendido_esgoto_tratado"])){
            $total_atendido_esgoto_tratado =$_POST["total_atendido_esgoto_tratado"];
        }
        if(isset($_POST["domicilios_urbanos_atendidos_esgoto_tratado"])){
            $domicilios_urbanos_atendidos_esgoto_tratado =$_POST["domicilios_urbanos_atendidos_esgoto_tratado"];
        }
        if(isset($_POST["domicilios_rurais_atendidos_esgoto_tratado"])){
            $domicilios_rurais_atendidos_esgoto_tratado =$_POST["domicilios_rurais_atendidos_esgoto_tratado"];
        }
        if(isset($_POST["entidade_responsavel_esgoto_tratado"])){
            $entidade_responsavel_esgoto_tratado =$_POST["entidade_responsavel_esgoto_tratado"];
        }
        if(isset($_POST["outros"])){
            $outros= $_POST["outros"];
        }
        if(isset($_POST["total_atendido_outros"])){
            $total_atendido_outros=$_POST["total_atendido_outros"];
        }
        if(isset($_POST["domicilios_urbanos_atendidos_outros"])){
            $domicilios_urbanos_atendidos_outros=$_POST["domicilios_urbanos_atendidos_outros"];
        }
        if(isset($_POST["domicilios_rurais_atendidos_outros"])){
            $domicilios_rurais_atendidos_outros =$_POST["domicilios_rurais_atendidos_outros"];
        }
        if(isset($_POST["entidade_responsavel_outros"])){
            $entidade_responsavel_outros =$_POST["entidade_responsavel_outros"];
        }
         
        editarColetaDeposicaoEsgoto($fkid_municipios, $rede_esgoto, $total_atendido_rede_esgoto, $domicilios_urbanos_atendidos_rede_esgoto, $domicilios_rurais_atendidos_rede_esgoto, $entidade_responsavel_rede_esgoto, $fossa_septica, $total_atendido_fossa_septica, $domicilios_urbanos_atendidos_fossa_septica,
        $domicilios_rurais_atendidos_fossa_septica,$entidade_responsavel_fossa_septica, $fossa_rudimentar, $total_atendido_fossa_rudimentar, $domicilios_urbanos_atendidos_fossa_rudimentar, $domicilios_rurais_atendidos_fossa_rudimentar,
        $entidade_responsavel_fossa_rudimentar, $vala, $total_atendido_vala, $domicilios_urbanos_atendidos_vala, $domicilios_rurais_atendidos_vala, $entidade_responsavel_vala, $estacao_tratamento, $total_atendido_estacao_tratamento,
        $domicilios_urbanos_atendidos_estacao_tratamento, $domicilios_rurais_atendidos_estacao_tratamento, $entidade_responsavel_estacao_tratamento, $esgoto_tratado, $total_atendido_esgoto_tratado, $domicilios_urbanos_atendidos_esgoto_tratado,
        $domicilios_rurais_atendidos_esgoto_tratado, $entidade_responsavel_esgoto_tratado, $outros, $total_atendido_outros, $domicilios_urbanos_atendidos_outros, $domicilios_rurais_atendidos_outros, $entidade_responsavel_outros);
    }
    elseif(isset($_POST["btnExcluirColetaDeposicaoEsgoto"])){
        if(isset($_POST["fkid_municipios"])){
            $fkid_municipios = $_POST["fkid_municipios"];
        }

        $result = excluirColetaDeposicao($fkid_municipios);

        die();
    }
    //SERVIÇOS DE ENERGIA!!!
    if(isset($_GET["fkid_municipios"])){
        $fkid_municipios = $_GET["fkid_municipios"];

        $result = pegarServicosEnergia($fkid_municipios);
        $numRegistros = mysqli_num_rows($result);

        if($numRegistros > 0){
            while($row = mysqli_fetch_assoc($result)){
            $fkid_municipios = $row['fkid_municipios'];
            $energia_eletrica = $row['energia_eletrica']; 
            $capacidade_kva = $row['capacidade_kva'];
            $gerador_emergencia = $row['gerador_emergencia'];
            $capacidade_kva_gerador = $row['capacidade_kva_gerador'];
            $abastecimento_energia_urbana = $row['abastecimento_energia_urbana'];
            $total_abastecido_energia_urbana = $row['total_abastecido_energia_urbana'];
            $entidade_responsavel_energia_urbana = $row['entidade_responsavel_energia_urbana'];
            $abastecimento_energia_rural = $row['abastecimento_energia_rural'];
            $total_abastecido_energia_rural = $row['total_abastecido_energia_rural'];
            $entidade_responsavel_energia_rural = $row['entidade_responsavel_energia_rural'];
            $abastecimento_proprio_energia = $row['abastecimento_proprio_energia'];
            $total_abastecimento_energia_propria = $row['total_abastecimento_energia_propria'];
            $domicilios_urbanos_atendidos_energia_propria = $row['domicilios_urbanos_atendidos_energia_propria'];
            $domicilios_rurais_atendidos_energia_propria = $row['domicilios_rurais_atendidos_energia_propria'];
            $entidade_responsavel_energia_propria = $row['entidade_responsavel_energia_propria'];
            $outros_tipos_abastecimento = $row['outros_tipos_abastecimento'];
            $total_abastecido_outros_tipos = $row['total_abastecido_outros_tipos'];
            $domicilios_urbanos_atendidos_outros_tipos = $row['domicilios_urbanos_atendidos_outros_tipos'];
            $entidade_responsavel_outros_tipos = $row['entidade_responsavel_outros_tipos'];

            }
        }
    }
    if(isset($_POST["btnCadastrarServicosEnergia"])){
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
        $verificar = verificarEntradasServicosEnergia($fkid_municipios, $energia_eletrica, $capacidade_kva, $gerador_emergencia, $abastecimento_energia_urbana,
        $abastecimento_energia_rural, $abastecimento_proprio_energia);

        $msg = cadastrarServicosEnergia($fkid_municipios, $energia_eletrica, $capacidade_kva, $gerador_emergencia, $capacidade_kva_gerador,
        $abastecimento_energia_urbana, $total_abastecido_energia_urbana, $entidade_responsavel_energia_urbana, $abastecimento_energia_rural,
        $total_abastecido_energia_rural ,$entidade_responsavel_energia_rural ,$abastecimento_proprio_energia ,$total_abastecimento_energia_propria,
        $domicilios_urbanos_atendidos_energia_propria, $domicilios_rurais_atendidos_energia_propria ,$entidade_responsavel_energia_propria ,$outros_tipos_abastecimento,
        $total_abastecido_outros_tipos, $domicilios_urbanos_atendidos_outros_tipos, $entidade_responsavel_outros_tipos);
    }
    elseif(isset($_POST["btnAtualizarServicosEnergia"])) {
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
        $msg = editarServicosEnergia($fkid_municipios, $energia_eletrica, $capacidade_kva, $gerador_emergencia, $capacidade_kva_gerador,
        $abastecimento_energia_urbana, $total_abastecido_energia_urbana, $entidade_responsavel_energia_urbana, $abastecimento_energia_rural,
        $total_abastecido_energia_rural ,$entidade_responsavel_energia_rural ,$abastecimento_proprio_energia ,$total_abastecimento_energia_propria,
        $domicilios_urbanos_atendidos_energia_propria, $domicilios_rurais_atendidos_energia_propria ,$entidade_responsavel_energia_propria ,$outros_tipos_abastecimento,
        $total_abastecido_outros_tipos, $domicilios_urbanos_atendidos_outros_tipos, $entidade_responsavel_outros_tipos);
    }
    elseif(isset($_POST["btnExcluirServicosEnergia"])){
        if(isset($_POST["fkid_municipios"])){
            $fkid_municipios = $_POST["fkid_municipios"];
        }

        $result = excluirServicosEnergia($fkid_municipios);

        die();
    }
    //SERVIÇOS DE LIXO!!!

    if(isset($_POST["btnCadastrar"])){
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
        $verificar = verificarEntradas($fkid_municipios, $coleta_seletiva, $coleta_nao_seletiva, $sem_coleta);
        $msg = cadastrarServicosLixo($fkid_municipios, $coleta_seletiva, $total_atendido_coleta_seletiva, $domicilios_urbanos_atendidos_coleta_seletiva, 
        $domicilios_rurais_atendidos_coleta_seletiva, $entidade_responsavel_coleta_seletiva, $coleta_nao_seletiva, $total_atendido_coleta_nao_seletival, 
        $domicilios_urbanos_atendidos_coleta_nao_seletiva, $domicilios_rurais_atendidos_coleta_nao_seletiva, $entidade_responsavel_coleta_nao_seletiva, 
        $sem_coleta, $total_atendido_sem_coleta, $domicilios_urbanos_atendidos_sem_coleta, $domicilios_rurais_atendidos_sem_coleta);
    }
    elseif(isset($_POST["btnAtualizarServicosLixo"])) {
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
        $msg = editarServicosLixo($fkid_municipios, $coleta_seletiva, $total_atendido_coleta_seletiva, $domicilios_urbanos_atendidos_coleta_seletiva, 
        $domicilios_rurais_atendidos_coleta_seletiva, $entidade_responsavel_coleta_seletiva, $coleta_nao_seletiva, $total_atendido_coleta_nao_seletival, 
        $domicilios_urbanos_atendidos_coleta_nao_seletiva, $domicilios_rurais_atendidos_coleta_nao_seletiva, $entidade_responsavel_coleta_nao_seletiva, 
        $sem_coleta, $total_atendido_sem_coleta, $domicilios_urbanos_atendidos_sem_coleta, $domicilios_rurais_atendidos_sem_coleta);
    }
    elseif(isset($_POST["btnExcluirServicosLixo"])){
        if(isset($_POST["fkid_municipios"])){
            $fkid_municipios = $_POST["fkid_municipios"];
        }

        $result = excluirServicosLixo($fkid_municipios);

        die();
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario A1</title>
    <style>
        .prefeituras, .orgao_oficial_tur, .instancias, .historico, .caracteristicas, .abastecimentoAgua, .coletaDeposicaoEsgoto, .servicosEnergia{
            display:flex;
            justify-content:center;
        }

        hr {
            margin: 40px 0;
        }
    </style>

</head>
<body>
    <!--Informações gerais // Seçao 1-->
        <div class="form_a1">
        <div class="prefeituras">
            <form action="form_a1.php" name="form_a1.php" id="form_a1.php" method = "POST"> 
                <table>
                    <tr>
                        <td><a href="./pesquisar_prefeituras.php"> Voltar </a></td>
                    </tr>
                    <tr>
                        <td><h1>Informações Gerais</h1></td>
                    </tr>
                    <tr>
                        <td><h2>PREFEITURA</h2></td>
                        <td><button><a href="consultar_prefeituras.php">LISTAR</a></button></td>
                    </tr>
                    <tr>
                        <td> <?php echo "$verificar"; ?></td>
                        <input type="hidden" name="id_municipios" value="<?php echo $id_municipios; ?>" />
                    </tr>
                    <tr>
                        <td>Nome do município: </td>
                        <td><input type="text" name="nome_municipio" id="nome_municipio" value=<?php echo $nome_municipio;?>></td>
                    </tr>
                    <tr>
                        <td>Unidade Federativa: </td>
                        <td><select name="uf" id="uf" value=<?php echo $uf;?>>
                                <option value="AC">AC</option>
                                <option value="AL">AL</option>
                                <option value="AP">AP</option>
                                <option value="AM">AM</option>
                                <option value="BA">BA</option>
                                <option value="CE">CE</option>
                                <option value="DF">DF</option>
                                <option value="ES">ES</option>
                                <option value="GO">GO</option>
                                <option value="MA">MA</option>
                                <option value="MT">MT</option>
                                <option value="MS">MS</option>
                                <option value="MG">MG</option>
                                <option value="PA">PA</option>
                                <option value="PB">PB</option>
                                <option value="PR">PR</option>
                                <option value="PE">PE</option>
                                <option value="PI">PI</option>
                                <option value="RJ">RJ</option>
                                <option value="RN">RN</option>
                                <option value="RS">RS</option>
                                <option value="RO">RO</option>
                                <option value="RR">RR</option>
                                <option value="SC">SC</option>
                                <option value="SP">SP</option>
                                <option value="SE">SE</option>
                                <option value="TO">TO</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Região Turística: </td>
                        <td><input type="text" name = "regiao_turistica" id = "regiao_turistica" value=<?php echo $regiao_turistica;?>></td>
                    </tr>
                    <tr>
                        <td>Logradouro: </td>
                        <td><input type="text" name = "logradouro" id = "logradouro" value=<?php echo $logradouro;?>></td>
                    </tr>
                    <tr>
                        <td>Número: </td>
                        <td><input type="number" name = "numero" id = "numero" value=<?php echo $numero;?>></td>
                    </tr>

                    <tr>
                        <td>Complemento (opcional): </td>
                        <td><input type="text" name = "complemento" id = "complemento" value=<?php echo $complemento;?>></td>
                    </tr>
                    <tr>
                        <td>Bairro: </td>
                        <td><input type="text" name = "bairro" id = "bairro" value=<?php echo $bairro;?>></td>
                    </tr>
                    <tr>
                        <td>Email: </td>
                        <td><input type="email" name = "email" id = "email" value=<?php echo $email;?>></td>
                    </tr>
                    <tr>
                        <td>Site (opcional): </td>
                        <td><input type="text" name = "site" id = "site" value=<?php echo $site;?>></td>
                    </tr>
                    <tr>
                        <td>CNPJ: </td>
                        <td><input type="number" name = "cnpj" id = "cnpj" value=<?php echo $cnpj;?>></td>
                    </tr>
                    <tr>
                        <td>Latitude: </td>
                        <td><input type="number" name = "latitude" id = "latitude" value=<?php echo $latitude;?>></td>
                    </tr>
                    <tr>
                        <td>Longitude: </td>
                        <td><input type="number" name = "longitude" id = "longitude" value=<?php echo $longitude;?>></td>
                    </tr>
                    <tr>
                        <td>Distância da capital em km: </td>
                        <td><input type="number" name = "distancia_capital_km" id = "distancia_capital" value=<?php echo $distancia_capital;?>></td>
                    </tr>
                    <tr>
                        <td>Quantidade de funcionários: </td>
                        <td><input type="number" name = "qtd_Funcionarios" id = "qtd_Funcionarios" value=<?php echo $qtd_Funcionarios;?>></td>
                    </tr>
                    <tr>
                        <td>Quantidade de funcionários deficientes: </td>
                        <td><input type="number" name = "qtd_funcionarios_deficiencia" id = "qtd_funcionarios_deficiencia" value=<?php echo $qtd_funcionarios_deficiencia;?>></td>
                    </tr>
                    <tr>
                        <td>Nome do prefeito: </td>
                        <td><input type="text" name="nome_prefeito" id="nome_prefeito" value=<?php echo $nome_prefeito;?>></td>
                    </tr>
                    <tr>
                        <td>Aniversário do município: </td>
                        <td><input type="date" name = "aniversario_municipal" id = "aniversario_municipal" value=<?php echo $aniversario_municipal;?>></td>
                    </tr>
                    <tr>
                        <td>Santo(a) padroeiro(a):</td>
                        <td><input type="text" name = "santo_padroeiro" id = "santo_padroeiro" value=<?php echo $santo_padroeiro;?>></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name = "btnCadastrarPrefeitura" value = "Cadastrar"></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name = "btnEditarPrefeitura" value= "Editar"></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name = "btnExcluirPrefeitura" value= "Excluir"></td>
                    </tr>
                    <tr>
                        
                    </tr>
                </table>
            </form>
        </div>
        <hr>
        <!--Orgao Oficial Turismo-->
        <div class = "orgao_oficial_tur">
            <form action="form_a1.php" name="form_a1.php" id="form_a1.php" method="POST">
                <table>
                    <tr>
                        <td><h2>Orgao Oficial de Turismo</h2></td>
                        <td><button><a href="consultar_orgao_oficial_tur.php">Listar</a></button></td>
                    </tr>
                    <tr>
                        <td><input type="hidden" name="fkid_municipios" id="fkid_municipios" value=<?php echo $fkid_municipios?>></td>
                    </tr>
                    <tr>
                        <td>Nome do Orgao Oficial de Turismo:</td>
                        <td><input type="text" name="nome_orgao_oficial_tur" id="nome_orgao_oficial_tur" value=<?php echo $nome_orgao_oficial_tur;?>></td>
                    </tr>
                    <tr>
                        <td>Logradouro:</td>
                        <td><input type="text" name="logradouro" id="logradouro" value=<?php echo $logradouro;?>></td>
                    </tr>
                    <tr>
                        <td>Bairro:</td>
                        <td><input type="text" name="bairro" id="bairro" value=<?php echo $bairro;?>></td>
                    </tr>
                    <tr>
                        <td>Distrito:</td>
                        <td><input type="text" name="distrito" id="distrito" value=<?php echo $distrito;?>></td>
                    </tr>
                    <tr>
                        <td>CEP:</td>
                        <td><input type="number" name="cep" id="cep" value=<?php echo $cep;?>></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><input type="email" name="email" id="email" value=<?php echo $email;?>></td>
                    </tr>
                    <tr>
                        <td>Site:</td>
                        <td><input type="text" name="site" id="site" value=<?php echo $site;?>></td>
                    </tr>
                    <tr>
                        <td>Quantidade de funcionários:</td>
                        <td><input type="number" name="qtd_funcionarios" id="qtd_funcionarios" value=<?php echo $qtd_funcionarios;?>></td>
                    </tr>
                    <tr>
                        <td>Quantidade de funcionários com formação</td>
                        <td><input type="number" name="qtd_funcionarios_superior_turismo" id="qtd_funcionarios_superior_turismo" value=<?php echo $qtd_funcionarios_superior_turismo;?>></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name = "btnCadastrarOrgaoOficialTur" value = "Cadastrar"></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name = "btnEditarOrgaoOficialTur" value= "Editar"></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name = "btnExcluirOrgaoOficialTur" value= "Excluir"></td>
                    </tr>
                </table>
            </form>
        </div>
        <hr>
        <div class="instancias">
            <form action="form_a1.php" name = "form_a1.php" id = "form_a1.php" method = "POST">

                <table>
                    <tr>
                        <td> <h2>Instâncias de Governança</h2></td>
                        <td><button><a href="consultar_instancias.php">Listar</a></button></td>
                    </tr>
                    <tr>
                        <td colspan  = "2"> <?php echo "$verificar"?></td>
                    </tr>
                    <tr>
                        <td> <input type= "hidden" name = "fkid_municipios" id="fkid_municipios" value=<?php echo $fkid_municipios;?>></td>
                    </tr>
                    <tr>
                        <td>Instâncias Municipais:</td>
                        <td> <textarea name = "municipal" id="municipal" value = <?php echo "$municipal" ?>> </textarea></td>
                    </tr>
                    <tr>
                        <td>Instâncias Estaduais:</td>
                        <td> <textarea name = "estadual" id="estadual" value = <?php echo "$estadual" ?>> </textarea></td>
                    </tr>
                    <tr>
                        <td>Instâncias Regionais:</td>
                        <td> <textarea name = "regional" id="regional" value = <?php echo "$regional" ?>> </textarea></td>
                    </tr>
                    <tr>
                        <td>Instâncias Nacionais:</td>
                        <td> <textarea name = "nacional" id="nacional" value = <?php echo "$nacional" ?>> </textarea></td>
                    </tr>
                    <tr>
                        <td>Instâncias Internacionais:</td>
                        <td> <textarea name = "internacional" id="internacional" value = <?php echo "$internacional" ?>> </textarea></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="btnCadastrarInstancias" value="Cadastrar Instâncias"></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="btnEditarInstancias" value="Editar Instâncias"></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="btnExcluirInstancias" value="Excluir Instâncias"></td>
                    </tr>
                </table>
                </form>
        </div>
        <hr>
        <div class="historico">
            <form action="form_a1.php" name = "form_a1.php" id = "form_a1.php" method = "POST">
            <table>
                <tr>
                    <td><h2>Histórico do Municipio</h2></td>
                    <td><button><a href="consultar_historico.php">LISTAR</a></button></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="fkid_municipios" id="fkid_municipios" value=<?php echo "$fkid_municipios"?>></td>
                </tr>
                <tr>
                    <td>Origem do nome:</td>
                    <td><textarea name="origem_nome" id="" cols="30" rows="10" value=<?php echo "$origem_nome"?>></textarea></td>
                </tr>
                <tr>
                    <td>Data de fundação:</td>
                    <td><input type="date" name="data_fundacao" value=<?php echo "$data_fundacao"?>></td>
                </tr>
                <tr>
                    <td>Data de emancipação:</td>
                    <td><input type="date" name="data_emancipacao" value=<?php echo "$data_emancipacao"?>></td>
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
            </table>
        </div>
        <hr>
        <div class="caracteristicas">
            <form action="form_a1.php" name="form_a1.php" id="form_a1.php" method = "POST"> 
                <table>
                    <tr>
                        <td> <h2>Caracteristicas do Municipio</h2></td>
                        <td><button><a href="consultar_caracteristicas.php">LISTAR</a></button></td>
                    </tr>
                    <tr>
                        <td> <?php echo "$verificar"; ?></td>
                    </tr>
                    <tr>
                        <td><input type="hidden" name="fkid_municipios" id="fkid_municipios"value=<?php echo "$fkid_municipios"?>></td>
                    </tr>
                    <tr>
                        <td>Area total em km²: </td>
                        <td><input type="number" name = "area_total_km" id = "area_total_km" value=<?php echo "$area_total_km"?>></td>
                    </tr>
                    <tr>
                        <td>Area urbana em km²: </td>
                        <td><input type="number" name = "area_urbana_km" id = "area_urbana_km" value=<?php echo "$area_urbana_km"?>></td>
                    </tr>
                    <tr>
                        <td>Area rural em km²: </td>
                        <td><input type="number" name = "area_rural_km" id = "area_rural_km" value=<?php echo "$area_rural_km"?>></td>
                    </tr>
                    <tr>
                        <td>Ano base da coleta de dados para a area: </td>
                        <td><input type="number" name = "ano_base_area" id = "ano_base_area" value=<?php echo "$ano_base_area"?>></td>
                    </tr>

                    <tr>
                        <td>População total: </td>
                        <td><input type="number" name = "populacao_total" id = "populacao_total" value=<?php echo "$populacao_total"?>></td>
                    </tr>
                    <tr>
                        <td>População urbana: </td>
                        <td><input type="number" name = "populacao_urbana" id = "populacao_urbana" value=<?php echo "$populacao_urbana"?>></td>
                    </tr>
                    <tr>
                        <td>População rural: </td>
                        <td><input type="number" name = "populacao_rural" id = "populacao_rural" value=<?php echo "$populacao_rural"?>></td>
                    </tr>
                    <tr>
                        <td>Ano base da coleta de dados para a população: </td>
                        <td><input type="number" name = "ano_base_populacao" id = "ano_base_populacao" value=<?php echo "$ano_base_populacao"?>></td>
                    </tr>
                    <tr>
                        <td>Temperatura media °C: </td>
                        <td><input type="number" name = "media_temperatura" id = "media_temperatura" value=<?php echo "$media_temperatura"?>></td>
                    </tr>
                    <tr>
                        <td>Temperatura minima °C: </td>
                        <td><input type="number" name = "minima_temperatura" id = "minima_temperatura" value=<?php echo "$minima_temperatura"?>></td>
                    </tr>
                    <tr>
                        <td>Temperatura maxima °C: </td>
                        <td><input type="number" name = "maxima_temperatura" id = "maxima_temperatura" value=<?php echo "$maxima_temperatura"?>></td>
                    </tr>
                    <tr>
                        <td>Meses mais frios: </td>
                        <td><input type="text" name = "meses_mais_frios" id = "meses_mais_frios" value=<?php echo "$meses_mais_frios"?>></td>
                    </tr>
                    <tr>
                        <td>Meses mais quentes: </td>
                        <td><input type="text" name="meses_mais_quentes" id="meses_mais_quentes" value=<?php echo "$meses_mais_quentes"?>></td>
                    </tr>
                    <tr>
                        <td>Meses mais chuvosos: </td>
                        <td><input type="text" name = "meses_mais_chuvosos" id = "meses_mais_chuvosos" value=<?php echo "$meses_mais_chuvosos"?>></td>
                    </tr>
                    <tr>
                        <td>Meses menos chuvosos:</td>
                        <td><input type="text" name = "meses_menos_chuvosos" id = "meses_menos_chuvosos" value=<?php echo "$meses_menos_chuvosos"?>></td>
                    </tr>
                    <tr>
                        <td>Altitude media: </td>
                        <td><input type="number" name = "altitude_media" id = "altitude_media" value=<?php echo "$altitude_media"?>></td>
                    </tr>
                    <tr>
                        <td>Principais atividades economicas:</td>
                        <td><input type="text" name = "principais_atv_economicas" id = "meses_menos_chuvosos" value=<?php echo "$meses_menos_chuvosos"?>></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name = "btnCadastrarCaracteristicas" value = "Cadastrar"></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name = "btnEditarCaracteristicas" value = "Editar"></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name = "btnExcluirCaracteristicas" value = "Excluir"></td>
                    </tr>
                </table>
            </form>
        </div>
        <hr>
        <div class="abastecimentoAgua">
            <form action="form_a1.php" name="form_a1.php" id="form_a1.php" method = "POST"> 
                <table>
                    <tr>
                        <td><h2>Abastecimento de Água do Municipio</h2></td>
                        <td><button><a href="consultar_abastecimento_agua.php">Listar</a></button></td>
                    </tr>
                    <tr>
                        <td><?php echo "$verificar"; ?></td>
                    </tr>
                    <tr>
                        <td><input type="hidden" name="fkid_municipios" id="fkid_municipios" value=<?php echo $fkid_municipios; ?>></td>
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
                        <td><input type="number" name="domicilios_atendidos" id ="domicilios_atendidos" value=<?php echo $domicilios_atendidos?>></td>
                    </tr>
                    <tr>
                        <td>Informe a empresa responsavel pelo abastecimento</td>
                        <td><input type="text" name = "empresa_responsavel" id = "empresa_responsavel" value=<?php echo $empresa_responsavel?>></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name = "btnCadastrarAbastecimentoAgua" value = "Cadastrar"></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name = "btnEditarAbastecimentoAgua" value = "Editar"></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name = "btnExcluirAbastecimentoAgua" value = "Excluir"></td>
                    </tr>
                    
                </table>
            </form>
        </div>
        <hr>
        <div class="coletaDeposicaoEsgoto">
            <form action="form_a1.php" name="form_a1.php" id="form_a1.php" method="POST">
                <table>
                    <tr>
                        <td><h2>Serviços de Esgoto</h2></td>
                        <td><button><a href="consultar_coleta_deposicao_esgoto.php">LISTAR</a></button></td>
                    </tr>
                    <tr>
                    <td colspan = "2"> <?php echo "$verificar"; ?></td>
                    </tr>
                    <tr>
                        <td><input type="hidden" name="fkid_municipios" id="fkid_municipios" value=<?php echo $fkid_municipios;?>></td>
                    </tr>
                    <tr>
                        <td>Rede de Esgoto</td>
                        <td><input type="checkbox" name="rede_esgoto" id="rede_esgoto" value="Rede esgoto" value=<?php echo $rede_esgoto;?>></td>
                    </tr>
                    <tr>
                        <td>total Atendido (%)</td>
                        <td><input type="number" name="total_atendido_rede_esgoto" id="total_atendido_rede_esgoto" value=<?php echo $total_atendido_rede_esgoto;?>></td>
                    </tr>
                    <tr>
                        <td>domicilios urbanos atendidos (%)</td>
                        <td><input type="number" name="domicilios_urbanos_atendidos_rede_esgoto" id="domicilios_urbanos_atendidos_rede_esgoto" value=<?php echo $domicilios_urbanos_atendidos_rede_esgoto;?>></td>
                    </tr>
                    <tr>
                        <td>domicilios rurais atendidos (%)</td>
                        <td><input type="number" name="domicilios_rurais_atendidos_rede_esgoto" id="domicilios_rurais_atendidos_rede_esgoto" value=<?php echo $domicilios_rurais_atendidos_rede_esgoto;?>></td>
                    </tr>
                    <tr>
                        <td>Entidade Responsavel</td>
                        <td><input type="text" name="entidade_responsavel_rede_esgoto" id="entidade_responsavel_rede_esgoto" value=<?php echo $entidade_responsavel_rede_esgoto;?>></td>
                    </tr>
                    <tr>
                        <td>Fossa Septica</td>
                        <td><input type="checkbox" name="fossa_septica" id="fossa_septica" value="Fossa septica" value=<?php echo $fossa_septica;?>></td>
                    </tr>
                    <tr>
                        <td>total Atendido (%)</td>
                        <td><input type="number" name="total_atendido_fossa_septica" id="total_atendido_fossa_septica" value=<?php echo $total_atendido_fossa_septica;?>></td>
                    </tr>
                    <tr>
                        <td>domicilios urbanos atendidos (%)</td>
                        <td><input type="number" name="domicilios_urbanos_atendidos_fossa_septica" id="domicilios_urbanos_atendidos_fossa_septica" value=<?php echo $domicilios_urbanos_atendidos_fossa_septica;?>></td>
                    </tr>
                    <tr>
                        <td>domicilios rurais atendidos (%)</td>
                        <td><input type="number" name="domicilios_rurais_atendidos_fossa_septica" id="domicilios_rurais_atendidos_fossa_septica" value=<?php echo $domicilios_rurais_atendidos_fossa_septica;?>></td>
                    </tr>
                    <tr>
                        <td>Entidade Responsavel (%)</td>
                        <td><input type="text" name="entidade_responsavel_fossa_septica" id="entidade_responsavel_fossa_septica" value=<?php echo $entidade_responsavel_fossa_septica;?>></td>
                    </tr>
                    <tr>
                        <td>Fossa Rudimentar</td>
                        <td><input type="checkbox" name="fossa_rudimentar" id="fossa_rudimentar" value="fossa rudimentar" value=<?php echo $fossa_rudimentar;?>></td>
                    </tr>
                    <tr>
                        <td>total Atendido (%)</td>
                        <td><input type="number" name="total_atendidofossa_rudimentar" id="total_atendido_fossa_rudimentar" value=<?php echo $total_atendido_fossa_rudimentar;?>></td>
                    </tr>
                    <tr>
                        <td>domicilios urbanos atendidos (%)</td>
                        <td><input type="number" name="domicilios_urbanos_atendidos_fossa_rudimentar" id="domicilios_urbanos_atendidos_fossa_rudimentar" value=<?php echo $domicilios_urbanos_atendidos_fossa_rudimentar;?>></td>
                    </tr>
                    <tr>
                        <td>domicilios rurais atendidos (%)</td>
                        <td><input type="number" name="domicilios_rurais_atendidos_fossa_rudimentar" id="domicilios_rurais_atendidos_fossa_rudimentar" value=<?php echo $domicilios_rurais_atendidos_fossa_rudimentar;?>></td>
                    </tr>
                    <tr>
                        <td>Entidade Responsavel</td>
                        <td><input type="text" name="entidade_responsavel_fossa_rudimentar" id="entidade_responsavel_fossa_rudimentar" value=<?php echo $entidade_responsavel_fossa_rudimentar;?>></td>
                    </tr>
                    <tr>
                        <td>Vala</td>
                        <td><input type="checkbox" name="vala" id="vala" value="vala" value=<?php echo $vala;?>></td>
                    </tr>
                    <tr>
                        <td>total Atendido (%)</td>
                        <td><input type="number" name="total_atendido_vala" id="total_atendido_vala"  value=<?php echo $total_atendido_vala;?>></td>
                    </tr>
                    <tr>
                        <td>domicilios urbanos atendidos (%)</td>
                        <td><input type="number" name="domicilios_urbanos_atendidos_vala" id="domicilios_urbanos_atendidos_vala" value=<?php echo $domicilios_urbanos_atendidos_vala;?>></td>
                    </tr>
                    <tr>
                        <td>domicilios rurais atendidos (%)</td>
                        <td><input type="number" name="domicilios_rurais_atendidos_vala" id="domicilios_rurais_atendidos_vala" value=<?php echo $domicilios_rurais_atendidos_vala;?>></td>
                    </tr>
                    <tr>
                        <td>Entidade Responsavel</td>
                        <td><input type="text" name="entidade_responsavel_vala" id="entidade_responsavel_vala" value=<?php echo $entidade_responsavel_vala;?>></td>
                    </tr>
                    <tr>
                        <td>Estaçao de Tratamento</td>
                        <td><input type="checkbox" name="estacao_tratamento" id="estacao_tratamento" value="Estacao de tratamento" value=<?php echo $estacao_tratamento;?>></td>
                    </tr>
                    <tr>
                        <td>total Atendido (%)</td>
                        <td><input type="number" name="total_atendido_estacao_tratamento" id="total_atendido_estacao_tratamento" value=<?php echo $total_atendido_estacao_tratamento;?>></td>
                    </tr>
                    <tr>
                        <td>domicilios urbanos atendidos (%)</td>
                        <td><input type="number" name="domicilios_urbanos_atendidos_estacao_tratamento" id="domicilios_urbanos_atendidos_estacao_tratamento" value=<?php echo $domicilios_urbanos_atendidos_estacao_tratamento;?>></td>
                    </tr>
                    <tr>
                        <td>domicilios rurais atendidos (%)</td>
                        <td><input type="number" name="domicilios_rurais_atendidos_estacao_tratamento" id="domicilios_rurais_atendidos_estacao_tratamento" value=<?php echo $domicilios_rurais_atendidos_estacao_tratamento;?>></td>
                    </tr>
                    <tr>
                        <td>Entidade Responsavel</td>
                        <td><input type="text" name="entidade_responsavel_estacao_tratamento" id="entidade_responsavel_estacao_tratamento" value=<?php echo $entidade_responsavel_estacao_tratamento;?>></td>
                    </tr>
                    <tr>
                        <td>Esgoto Tratado</td>
                        <td><input type="checkbox" name="esgoto_tratado" id="esgoto_tratado" value="esgoto tratado" value=<?php echo $esgoto_tratado;?>></td>
                    </tr>
                    <tr>
                        <td>total Atendido (%)</td>
                        <td><input type="number" name="total_atendido_esgoto_tratado" id="total_atendido_esgoto_tratado" value=<?php echo $total_atendido_esgoto_tratado;?>></td>
                    </tr>
                    <tr>
                        <td>domicilios urbanos atendidos (%)</td>
                        <td><input type="number" name="domicilios_urbanos_atendidos_esgoto_tratado" id="domicilios_urbanos_atendidos_esgoto_tratado" value=<?php echo $domicilios_urbanos_atendidos_esgoto_tratado;?>></td>
                    </tr>
                    <tr>
                        <td>domicilios rurais atendidos (%)</td>
                        <td><input type="number" name="domicilios_rurais_atendidos_esgoto_tratado" id="domicilios_rurais_atendidos_esgoto_tratado" value=<?php echo $domicilios_rurais_atendidos_esgoto_tratado;?>></td>
                    </tr>
                    <tr>
                        <td>Entidade Responsavel</td>
                        <td><input type="text" name="entidadeResponsavel_esgoto_tratado" id="entidadeResponsavel_esgoto_tratado" value=<?php echo $entidade_responsavel_esgoto_tratado;?>></td>
                    </tr>
                    <tr>
                        <td>Outros</td>
                        <td><input type="checkbox" name="outros" id="outros" value="Outros" value=<?php echo $outros;?>></td>
                    </tr>
                    <tr>
                        <td>total Atendido (%)</td>
                        <td><input type="number" name="total_atendido_outros" id="total_atendido_outros" value=<?php echo $total_atendido_outros;?>></td>
                    </tr>
                    <tr>
                        <td>domicilios urbanos atendidos (%)</td>
                        <td><input type="number" name="domicilios_urbanos_atendidos_outros" id="domicilios_urbanos_atendidos_outros" value=<?php echo $domicilios_urbanos_atendidos_outros;?>></td>
                    </tr>
                    <tr>
                        <td>domicilios rurais atendidos (%)</td>
                        <td><input type="number" name="domicilios_rurais_atendidos_outros" id="domicilios_rurais_atendidos_outros" value=<?php echo $domicilios_rurais_atendidos_outros;?>></td>
                    </tr>
                    <tr>
                        <td>Entidade Responsavel</td>
                        <td><input type="text" name="entidade_responsavel_outros" id="entidade_responsavel_outros" value=<?php echo $entidade_responsavel_outros;?>></td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="btnCadastrarColetaDeposicaoEsgoto" value="Cadastrar">
                        </td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="btnEditarColetaDeposicaoEsgoto" value="Editar"></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="btnExcluirColetaDeposicaoEsgoto" value="Excluir"></td>
                    </tr>
                </table>    
            </form>
        </div>
        <hr>
        <div class="servicosEnergia">
        <form action="form_a1.php" name="form_a1.php" id="form_a1.php" method = "POST"> 
    
            <table>
                <tr>
                    <td><h2>Serviços de Energia</h2></td>
                </tr>
                <tr>
                    <td><input type="hidden" name = "fkid_municipios" id = "fkid_municipios" value = <?php echo $fkid_municipios;?>></td>
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
                    <td><input type="number" name = "capacidade_kva" id = "capacidade_kva" placeholder = "" value = <?php echo $capacidade_kva;?>></td>
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
                    <td><input type="number" name = "capacidade_kva_gerador" id = "capacidade_kva_gerador" placeholder = "" value = <?php echo $capacidade_kva_gerador;?>></td>
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
                    <td><input type="number" name = "total_abastecido_energia_urbana" id = "total_abastecido_energia_urbana" placeholder = "" value = <?php echo $total_abastecido_energia_urbana;?>></td>
                </tr>
                <tr>
                    <td>Entidade Responsável</td>
                    <td><input type="text" name = "entidade_responsavel_energia_urbana" id = "entidade_responsavel_energia_urbana" placeholder = "" value = <?php echo $entidade_responsavel_energia_urbana;?>></td>
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
                    <td><input type="number" name = "total_abastecido_energia_rural" id = "total_abastecido_energia_rural" placeholder = "" value = <?php echo $total_abastecido_energia_rural;?>></td>
                </tr>
                <tr>
                    <td>Entidade Responsável</td>
                    <td><input type="text" name = "entidade_responsavel_energia_rural" id = "entidade_responsavel_energia_rural" placeholder = "" value = <?php echo $entidade_responsavel_energia_rural;?>></td>
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
                    <td><input type="number" name = "total_abastecimento_energia_propria" id = "total_abastecimento_energia_propria" placeholder = "" value=<?php echo $total_abastecimento_energia_propria;?>></td>
                </tr>
                <tr>
                    <td>Domicilios urbanos atendidos(%)</td>
                    <td><input type="number" name="domicilios_urbanos_atendidos_energia_propria" id="" value=<?php echo $domicilios_urbanos_atendidos_energia_propria;?>></td>
                </tr>
                <tr>
                    <td>Domicilios rurais atendidos(%)</td>
                    <td><input type="number" name="domicilios_rurais_atendidos_energia_propria" id="" value=<?php echo $domicilios_rurais_atendidos_energia_propria;?>></td>
                </tr>
                <tr>
                    <td>Entidade Responsável</td>
                    <td><input type="text" name = "entidade_responsavel_energia_urbana" id = "entidade_responsavel_energia_urbana" placeholder = "" value=<?php echo $entidade_responsavel_energia_propria;?>></td>
                </tr>
                <tr>
                    <td style="font-weight:bold">Outros</td>
                    <td><input type="text" name = "outros_tipos_abastecimento" id = "outros_tipos_abastecimento" value=<?php echo $outros_tipos_abastecimento;?>></td>
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
                    <td><input type="submit" name = "btnCadastrarServicosEnergia" value = "Cadastrar"></td>
                </tr>
                <tr>
                    <td><input type="submit" name = "btnEditarServicosEnergia" value = "Editar"></td>
                </tr>
                <tr>
                    <td><input type="submit" name = "btnExcluirServicosEnergia" value = "Excluir"></td>
                </tr>
            </table>
        </div>
        <div class="servicosLixo">
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
        </div>
    </div>  
</body>
</html>