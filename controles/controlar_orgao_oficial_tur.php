<?php

    include "../controles/a_conexao.php";
     
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


    function cadastrarOrgaoOficialTur($nome_orgao_oficial_tur, $logradouro, $bairro, $distrito, $cep, $email, $site, $qtd_funcionarios, $qtd_funcionarios_superior_turismo){

        $msg = verificarEntradas($nome_orgao_oficial_tur, $logradouro, $bairro, $distrito, $cep, $email, $qtd_funcionarios, $qtd_funcionarios_superior_turismo);

        if($msg == "") {
            $con = abrirConexao();
                $sql = "INSERT INTO orgao_oficial_tur (nome_orgao_oficial_tur logradouro bairro distrito cep email site qtd_funcionarios qtd_funcionarios_superior_turismo) VALUES ('$nome_orgao_oficial_tur', '$logradouro', '$bairro', '$distrito', '$cep', '$email', '$site', '$qtd_funcionarios', '$qtd_funcionarios_superior_turismo')";

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

        $msg = verificarEntradas($nome_orgao_oficial_tur, $logradouro, $bairro, $distrito, $cep, $email, $qtd_funcionarios, $qtd_funcionarios_superior_turismo);

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

?>