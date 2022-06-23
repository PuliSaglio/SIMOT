<?php

    include "../controles/a_conexao.php";

    function verificarEntradas ($fkid_municipios, $origem_nome, $data_fundacao, $data_emancipacao, $fundadores) {

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

        $msg = verificarEntradas($fkid_municipios, $origem_nome, $data_fundacao, $data_emancipacao, $fundadores);
        
        if($msg == "") {
            $con = abrirConexao();
            $sql = "INSERT INTO bdsimot.Historico_Municipio (fkid_municipios, origem_nome, data_fundacao, data_emancipacao, fundadores, outros_fatos) VALUES ('$fkid_municipios', '$origem_nome', '$data_fundacao', '$data_emancipacao', '$fundadores', '$outros_fatos');";

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

        $msg = verificarEntradas($fkid_municipios, $origem_nome, $data_fundacao, $data_emancipacao, $fundadores);

        if($msg == ""){
            $con = abrirConexao();

            //nome da tabela, =, '', variavel, ",", eterno retorno.
            $sql = "UPDATE bdsimot.Historico_Municipio SET 
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
        $sql = "DELETE FROM bdsimot.Historico_Municipio WHERE fkid_municipios = " .$fkid_municipios.";";

        if(mysqli_query($con, $sql)){
            $msg = "Excluída.";
        } else {
            $msg = "Não excluída.";
        }

        mysqli_close($con);
        return $msg;
    }


?>