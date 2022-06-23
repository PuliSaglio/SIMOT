<?php

    include "../controles/a_conexao.php";
     
    function verificarEntradas($nome_municipio, $uf, $regiao_turistica, $logradouro, $numero, $bairro, $email, $cnpj, $latitude, $longitude, $distancia_capital, $qtd_Funcionarios, $qtd_funcionarios_deficiencia, $nome_prefeito, $aniversario_municipal, $santo_padroeiro){

        if($nome_municipio == ""){
            return "Informe o nome do municipio.x";
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
        if($distancia_capital == ""){
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


    function cadastrarPrefeitura($nome_municipio, $uf, $regiao_turistica, $logradouro, $numero, $complemento, $bairro, $email, $site, $cnpj, $latitude, $longitude, $distancia_capital, $qtd_Funcionarios, $qtd_funcionarios_deficiencia, $nome_prefeito, $aniversario_municipal, $santo_padroeiro){

        $msg = verificarEntradas($nome_municipio, $uf, $regiao_turistica, $logradouro, $numero, $bairro,   $email, $cnpj, $latitude, $longitude, $distancia_capital, $qtd_Funcionarios, $qtd_funcionarios_deficiencia, $nome_prefeito, $aniversario_municipal, $santo_padroeiro);

        if($msg == "") {
            $con = abrirConexao();
                $sql = "INSERT INTO Infobas_Municipios (nome_municipio, uf, regiao_turistica, logradouro, numero, complemento, bairro, email, site, cnpj, latitude, longitude, distancia_capital_km, qtd_Funcionarios, qtd_funcionarios_deficiencia, nome_prefeito, aniversario_municipal, santo_padroeiro) VALUES ('$nome_municipio', '$uf', '$regiao_turistica', '$logradouro', '$numero', '$complemento', '$bairro', '$email', '$site', '$cnpj', '$latitude', '$longitude', '$distancia_capital', '$qtd_Funcionarios', '$qtd_funcionarios_deficiencia', '$nome_prefeito', '$aniversario_municipal', '$santo_padroeiro')";

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

    function editarPrefeitura($id_municipios, $nome_municipio, $uf, $regiao_turistica, $logradouro, $numero, $complemento, $bairro, $email, $site, $cnpj, $latitude, $longitude, $distancia_capital, $qtd_Funcionarios, $qtd_funcionarios_deficiencia, $nome_prefeito, $aniversario_municipal, $santo_padroeiro){

        $msg = verificarEntradas($nome_municipio, $uf, $regiao_turistica, $logradouro, $numero, $bairro, $email, $cnpj, $latitude, $longitude, $distancia_capital, $qtd_Funcionarios, $qtd_funcionarios_deficiencia, $nome_prefeito, $aniversario_municipal, $santo_padroeiro);

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

        $sql = "DELETE FROM bdsimot.Infobas_Municipios WHERE id_municipios = ".$id_municipios.";";

        if(mysqli_query($con, $sql)){
            $msg = "Excluída.";
        } else {
            $msg = "Não excluída.";
        }

        mysqli_close($con);
        return $msg;
    }

  


?>