<?php
    include "../controles/a_conexao.php";

    function verificarEntradas($fkid_municipios, $coleta_seletiva, $coleta_nao_seletiva, $sem_coleta){
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

        $msg = verificarEntradas($fkid_municipios, $coleta_seletiva, $coleta_nao_seletiva, $sem_coleta);

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

        $msg = verificarEntradas($fkid_municipios, $coleta_seletiva, $coleta_nao_seletiva, $sem_coleta);

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

        $sql = "DELETE FROM servicos_lixo WHERE fkid_municipios = ".$fkid_municipios.";";

        if(mysqli_query($con, $sql)){
            $msg = "Excluída.";
        } else {
            $msg = "Não excluída.";
        }

        mysqli_close($con);
        return $msg;
    }

?>