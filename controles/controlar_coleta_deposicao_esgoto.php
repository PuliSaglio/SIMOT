<?php

    include "../controles/a_conexao.php";

    
    function verificarEntradas($fkid_municipios) {

        if($fkid_municipios == ""){
            return "Informe o fkid do municipio";
        }
        return "";

    }

    function cadastrarColetaDeposicaoEsgoto($fkid_municipios, $rede_esgoto, $total_atendido_rede_esgoto, $domicilios_urbanos_atendidos_rede_esgoto, $domicilios_rurais_atendidos_rede_esgoto, $entidade_responsavel_rede_esgoto, $fossa_septica, $total_atendido_fossa_septica, $domicilios_urbanos_atendidos_fossa_septica,
    $domicilios_rurais_atendidos_fossa_septica,$entidade_responsavel_fossa_septica, $fossa_rudimentar, $total_atendido_fossa_rudimentar, $domicilios_urbanos_atendidos_fossa_rudimentar, $domicilios_rurais_atendidos_fossa_rudimentar,
    $entidade_responsavel_fossa_rudimentar, $vala, $total_atendido_vala, $domicilios_urbanos_atendidos_vala, $domicilios_rurais_atendidos_vala, $entidade_responsavel_vala, $estacao_tratamento, $total_atendido_estacao_tratamento,
    $domicilios_urbanos_atendidos_estacao_tratamento, $domicilios_rurais_atendidos_estacao_tratamento, $entidade_responsavel_estacao_tratamento, $esgoto_tratado, $total_atendido_esgoto_tratado, $domicilios_urbanos_atendidos_esgoto_tratado,
    $domicilios_rurais_atendidos_esgoto_tratado, $entidade_responsavel_esgoto_tratado, $outros, $total_atendido_outros, $domicilios_urbanos_atendidos_outros, $domicilios_rurais_atendidos_outros, $entidade_responsavel_outros){

        $msg = verificarEntradas($fkid_municipios);

        if($msg == "") {
            $con = abrirConexao();
            $sql = "INSERT INTO servicos_esgoto_coleta_deposicao (fkid_municipios, rede_esgoto, total_atendido_rede_esgoto, domicilios_urbanos_atendidos_rede_esgoto, domicilios_rurais_atendidos_rede_esgoto, entidade_responsavel_rede_esgoto, fossa_septica, domicilios_urbanos_atendidos_fossa_septica, total_atendido_fossa_septica,
            domicilios_rurais_atendidos_fossa_septica, entidade_responsavel_fossa_septica, fossa_rudimentar, total_atendido_fossa_rudimentar, domicilios_urbanos_atendidos_fossa_rudimentar, domicilios_rurais_atendidos_fossa_rudimentar,
            entidade_responsavel_fossa_rudimentar, vala, total_atendido_vala, domicilios_urbanos_atendidos_vala, domicilios_rurais_atendidos_vala, entidade_responsavel_vala, estacao_tratamento, total_atendido_estacao_tratamento,
            domicilios_urbanos_atendidos_estacao_tratamento, domicilios_rurais_atendidos_estacao_tratamento, entidade_responsavel_estacao_tratamento, esgoto_tratado, total_atendido_esgoto_tratado, domicilios_urbanos_atendidos_esgoto_tratado,
            domicilios_rurais_atendidos_esgoto_tratado, entidade_responsavel_esgoto_tratado, outros, total_atendido_outros, domicilios_urbanos_atendidos_outros, domicilios_rurais_atendidos_outros, entidade_responsavel_outros) 
            VALUES ('$fkid_municipios','$rede_esgoto', '$total_atendido_rede_esgoto', '$domicilios_urbanos_atendidos_rede_esgoto', '$domicilios_rurais_atendidos_rede_esgoto', '$entidade_responsavel_rede_esgoto', '$fossa_septica','$total_atendido_fossa_septica' '$domicilios_urbanos_atendidos_fossa_septica',
        '$domicilios_rurais_atendidos_fossa_septica','$entidade_responsavel_fossa_septica', '$fossa_rudimentar', '$total_atendido_fossa_rudimentar', '$domicilios_urbanos_atendidos_fossa_rudimentar', '$domicilios_rurais_atendidos_fossa_rudimentar',
        '$entidade_responsavel_fossa_rudimentar', '$vala', '$total_atendido_vala', '$domicilios_urbanos_atendidos_vala', '$domicilios_rurais_atendidos_vala', '$entidade_responsavel_vala', '$estacao_tratamento', '$total_atendido_estacao_tratamento',
        '$domicilios_urbanos_atendidos_estacao_tratamento', '$domicilios_rurais_atendidos_estacao_tratamento', '$entidade_responsavel_estacao_tratamento', '$esgoto_tratado', '$total_atendido_esgoto_tratado', '$domicilios_urbanos_atendidos_esgoto_tratado',
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

    function pegarColeta_Deposicao_Esgoto($idColetaDeposicao){
        $con = abrirConexao();
        $sql = "SELECT * FROM servicos_esgoto_coleta_deposicao WHERE id_ColetaDeposicao = ".$idColetaDeposicao.";";

        $result = mysqli_query($con, $sql);
        mysqli_close($con);

        return $result;
    }

    function listarColeta_Deposicao_Esgoto(){
        $con = abrirConexao();
        $sql = "SELECT * FROM servicos_esgoto_coleta_deposicao;";

        $resultadoListagem = mysqli_query($con, $sql);
        mysqli_close($con);

        return $resultadoListagem;



    }

    /*function editarColeta_Deposicao_Esgoto($fkid_municipios, $rede_esgoto, $total_atendido_rede_esgoto, $domicilios_urbanos_atendidos_rede_esgoto, $domicilios_rurais_atendidos_rede_esgoto, $entidade_responsavel_rede_esgoto, $fossa_septica, $total_atendido_fossa_septica, $domicilios_urbanos_atendidos_fossa_septica,
    $domicilios_rurais_atendidos_fossa_septica,$entidade_responsavel_fossa_septica, $fossa_rudimentar, $total_atendido_fossa_rudimentar, $domicilios_urbanos_atendidos_fossa_rudimentar, $domicilios_rurais_atendidos_fossa_rudimentar,
    $entidade_responsavel_fossa_rudimentar, $vala, $total_atendido_vala, $domicilios_urbanos_atendidos_vala, $domicilios_rurais_atendidos_vala, $entidade_responsavel_vala, $estacao_tratamento, $total_atendido_estacao_tratamento,
    $domicilios_urbanos_atendidos_estacao_tratamento, $domicilios_rurais_atendidos_estacao_tratamento, $entidade_responsavel_estacao_tratamento, $esgoto_tratado, $total_atendido_esgoto_tratado, $domicilios_urbanos_atendidos_esgoto_tratado,
    $domicilios_rurais_atendidos_esgoto_tratado, $entidade_responsavel_esgoto_tratado, $outros, $total_atendido_outros, $domicilios_urbanos_atendidos_outros, $domicilios_rurais_atendidos_outros, $entidade_responsavel_outros){

        $msg = verificarEntradas($fkid_municipios);

        if($msg == ""){

            $con = abrirConexao();

            $sql = "UPDATE servicos_esgoto_coleta_deposicao SET 
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
                echo "Alteração realizada com sucesso! Verificar alteração no <a href='consultar_coleta_deposicao_esgoto.php'>banco de dados</a>";
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
        $sql = "DELETE FROM servicos_esgoto_coleta_deposicao WHERE idColetaDeposicao = ".$idColetaDeposicao.";";

        if(mysqli_query($con, $sql)){
            $msg =  "Coleta e Deposiçao de esgoto excluída.";
        } else {
            $msg =  "Coleta e deposicao de esgoto excluída.";
        }

        mysqli_close($con);
        return $msg;

    }
*/



?>