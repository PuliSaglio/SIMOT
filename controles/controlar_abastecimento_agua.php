<?php

    include "../controles/a_conexao.php";

    function verificarEntradas ($fkid_municipios, $tipo_abastecimento, $domicilios_atendidos, $empresa_responsavel) {

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

        $msg = verificarEntradas($fkid_municipios, $tipo_abastecimento, $domicilios_atendidos, $empresa_responsavel);
        
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

        $msg = verificarEntradas($fkid_municipios, $tipo_abastecimento, $domicilios_atendidos, $empresa_responsavel);

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

    /*function excluirHistorico($fkid_municipios){

        $con = abrirConexao();
        $sql = "DELETE FROM bdsimot.Historico_Municipio WHERE fkid_municipios = " .$fkid_municipios.";";

        if(mysqli_query($con, $sql)){
            $msg = "Excluída.";
        } else {
            $msg = "Não excluída.";
        }

        mysqli_close($con);
        return $msg;
    }
    */

?>