<?php

    include "../controles/a_conexao.php";

    
    function verificarEntradas($redeEsgoto, $fossaSeptica, $fossaRudimentar, $vala, $estacaoTratamento, $esgotoTratado, $outros, $totalAtendido,$domiciliosUrbanosAtendidos, $domiciliosRuraisAtendidos, $entidadeResponsavel) {

        if($totalAtendido == ""){
            return "Informe o total atendido";
        }

        if($domiciliosUrbanosAtendidos == ""){
            return "Informe o total de domicilios urbanos atendidos.";
        }

        if($domiciliosRuraisAtendidos == ""){
            return "Informe o total de domicilios rurais atendidos.";
        }

        if($entidadeResponsavel == ""){
            return "Informe a entidade responsavel";
        }

        return "";

    }

    function cadastrarColetaDeposicaoEsgoto($redeEsgoto, $fossaSeptica, $fossaRudimentar, $vala, $estacaoTratamento, $esgotoTratado, $outros, $totalAtendido,$domiciliosUrbanosAtendidos, $domiciliosRuraisAtendidos, $entidadeResponsavel){

        $msg = verificarEntradas($redeEsgoto, $fossaSeptica, $fossaRudimentar, $vala, $estacaoTratamento, $esgotoTratado, $outros, $totalAtendido,$domiciliosUrbanosAtendidos, $domiciliosRuraisAtendidos, $entidadeResponsavel);

        if($msg == "") {
            $con = abrirConexao();
            $sql = "INSERT INTO Coleta_Deposicao_Esgoto (redeEsgoto, fossaSeptica, fossaRudimentar, vala, estacaoTratamento,  esgotoTratado, outros, totalAtendido, domiciliosUrbanosAtendidos, domiciliosRuraisAtendidos, entidadeResponsavel) VALUES ('$redeEsgoto', '$fossaSeptica', '$fossaRudimentar', '$vala', '$estacaoTratamento', '$esgotoTratado', '$outros', '$totalAtendido','$domiciliosUrbanosAtendidos', '$domiciliosRuraisAtendidos', '$entidadeResponsavel');";

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

    function pegarColeta_Deposicao_Esgoto($idColetaDeposicao){
        $con = abrirConexao();
        $sql = "SELECT * FROM Coleta_Deposicao_Esgoto WHERE id_ColetaDeposicao = ".$idColetaDeposicao.";";

        $result = mysqli_query($con, $sql);
        mysqli_close($con);

        return $result;
    }

    function listarColeta_Deposicao_Esgoto(){
        $con = abrirConexao();
        $sql = "SELECT * FROM Coleta_Deposicao_Esgoto;";

        $resultadoListagem = mysqli_query($con, $sql);
        mysqli_close($con);

        return $resultadoListagem;



    }

    function editarColeta_Deposicao_Esgoto($redeEsgoto, $fossaSeptica, $fossaRudimentar, $vala, $estacaoTratamento, $esgotoTratado, $outros, $totalAtendido,$domiciliosUrbanosAtendidos, $domiciliosRuraisAtendidos, $entidadeResponsavel){

        $msg = verificarEntradas($redeEsgoto, $fossaSeptica, $fossaRudimentar, $vala, $estacaoTratamento, $esgotoTratado, $outros, $totalAtendido,$domiciliosUrbanosAtendidos, $domiciliosRuraisAtendidos, $entidadeResponsavel);

        if($msg == ""){

            $con = abrirConexao();

            $sql = "UPDATE Legislacao_Municipal SET 
            redeEsgoto = '$redeEsgoto',
            fossaSeptica = '$fossaSeptica',
            fossaRudimentar = '$fossaRudimentar',
            vala = '$vala',
            estacaoTratamento = '$estacaoTratamento',
            esgotoTratado = '$esgotoTratado',
            outros = '$outros',
            totalAtendido = '$totalAtendido',
            domiciliosUrbanosAtendidos = '$domiciliosUrbanosAtendidos'
            domiciliosRuraisAtendidos = '$domiciliosRuraisAtendidos'
            entidadeResponsavel = '$entidadeResponsavel'
            WHERE idColetaDeposicao = '$idColetaDeposicao';";

            if(mysqli_query($con, $sql)) {
                echo "Alteração realizada com sucesso! Verificar alteração no <a href='consultar_Coleta_Deposicao_Esgoto.php'>banco de dados</a>";
            } else {
                echo "Erro ao tentar atualizar.";
                echo "Error: " . $sql . "<br>" . mysqli_error($con);
            }

            mysqli_close($con);
            return array($msg);
        }


    }

    function excluirColeta_Deposicao($idColetaDeposicao){

        $con = abrirConexao();
        $sql = "DELETE FROM Coleta_Deposicao_Esgoto WHERE idColetaDeposicao = ".$idColetaDeposicao.";";

        if(mysqli_query($con, $sql)){
            $msg =  "Coleta e Deposiçao de esgoto excluída.";
        } else {
            $msg =  "Coleta e deposicao de esgoto excluída.";
        }

        mysqli_close($con);
        return $msg;

    }




?>