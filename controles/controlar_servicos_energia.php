<?php
    include "../controles/a_conexao.php";

    function verificarEntradas($fkid_municipios, $energia_eletrica, $capacidade_kva, $gerador_emergencia, $abastecimento_energia_urbana,
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

        $msg = verificarEntradas($fkid_municipios, $energia_eletrica, $capacidade_kva, $gerador_emergencia, $abastecimento_energia_urbana,
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

        $msg = verificarEntradas($fkid_municipios, $energia_eletrica, $capacidade_kva, $gerador_emergencia, $abastecimento_energia_urbana,
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

?>