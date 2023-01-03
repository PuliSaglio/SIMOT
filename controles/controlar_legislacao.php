<?php

    include "../controles/a_conexao.php";

    
    function verificarEntradas($fkid_municipios, $lei_organica, $ocupacao_solo, $pdt, $protecao_ambiental, $apoio_cultura, $incentivos_fiscais_turismo, $plano_diretor, $fmt) {

        if($fkid_municipios == ""){
            return "Informe o identificador.";
        }
        
        if($lei_organica == ""){
            return "Informe a Lei Orgânica.";
        }

        if($ocupacao_solo == ""){
            return "Informe a Ocupação do Solo.";

        }if($pdt == ""){
            return "Informe o Plano de Desenvolvimento do turismo.";
        }

        if($protecao_ambiental == ""){
            return "Informe a Proteção ambiental.";
        }

        if($apoio_cultura == ""){
            return "Informe o Apoio à cultura";
        }

        if($incentivos_fiscais_turismo == ""){
            return "Informe os Incentivos fiscais ao turismo.";
        }

        if($plano_diretor == ""){
            return "Informe o Plano Diretor.";
        }

        if($fmt == ""){
            return "Informe o Fundo Municipal de Turismo.";
        }

        return "";

    }

    function cadastrarLegislacao($fkid_municipios, $lei_organica, $ocupacao_solo, $pdt, $protecao_ambiental, $apoio_cultura, $incentivos_fiscais_turismo, $plano_diretor, $fmt, $outras){

        $msg = verificarEntradas($fkid_municipios, $lei_organica, $ocupacao_solo, $pdt, $protecao_ambiental, $apoio_cultura, $incentivos_fiscais_turismo, $plano_diretor, $fmt);

        if($msg == "") {
            $con = abrirConexao();
            $sql = "INSERT INTO Legislacao_Municipal (fkid_municipios, lei_organica, ocupacao_solo, pdt, protecao_ambiental, apoio_cultura, incentivos_fiscais_turismo, plano_diretor, fmt, outras) VALUES ('$fkid_municipios', '$lei_organica', '$ocupacao_solo', '$pdt', '$protecao_ambiental', '$apoio_cultura', '$incentivos_fiscais_turismo', '$plano_diretor', '$fmt', '$outras');";

            if(mysqli_query($con, $sql)){
                echo "Legislação cadastrada com sucesso! Verificar cadastro no <a href='consultar_legislacao.php'>banco de dados</a>";
            } else {
                echo "Cadastro não pode ser realizado.";
                echo "Error: " . $sql . "<br>" . mysqli_error($con);
            }

            mysqli_close($con);
        }
        
        return array($msg);
    }

    function pegarLegislacao($fkid_municipios){
        $con = abrirConexao();
        $sql = "SELECT * FROM legislacao_municipal WHERE fkid_municipios = ".$fkid_municipios.";";

        $result = mysqli_query($con, $sql);
        mysqli_close($con);

        return $result;
    }

    function listarLegislacao(){
        $con = abrirConexao();
        $sql = "SELECT * FROM legislacao_municipal;";

        $resultadoListagem = mysqli_query($con, $sql);
        mysqli_close($con);

        return $resultadoListagem;



    }

    function editarLegislacao($fkid_municipios, $lei_organica, $ocupacao_solo, $pdt, $protecao_ambiental, $apoio_cultura, $incentivos_fiscais_turismo, $plano_diretor, $fmt, $outras){

        $msg = verificarEntradas($fkid_municipios, $lei_organica, $ocupacao_solo, $pdt, $protecao_ambiental, $apoio_cultura, $incentivos_fiscais_turismo, $plano_diretor, $fmt);

        if($msg == ""){

            $con = abrirConexao();

            //nome da tabela, =, '', variavel, ",", eterno retorno
            $sql = "UPDATE legislacao_municipal SET 
            lei_organica = '$lei_organica',
            ocupacao_solo = '$ocupacao_solo',
            PDT = '$pdt',
            protecao_ambiental = '$protecao_ambiental',
            apoio_cultura = '$apoio_cultura',
            incentivos_fiscais_turismo = '$incentivos_fiscais_turismo',
            plano_diretor = '$plano_diretor',
            FMT = '$fmt',
            outras = '$outras' WHERE fkid_municipios = '$fkid_municipios';";

            if(mysqli_query($con, $sql)) {
                echo "Alteração realizada com sucesso! Verificar alteração no <a href='consultar_legislacao.php'>banco de dados</a>";
            } else {
                echo "Erro ao tentar atualizar.";
                echo "Error: " . $sql . "<br>" . mysqli_error($con);
            }

            mysqli_close($con);
            return array($msg);
        }


    }

    function excluirLegislacao($fkid_municipios){

        $con = abrirConexao();
        $sql = "DELETE FROM legislacao_municipal WHERE fkid_municipios = '$fkid_municipios'";

        if(mysqli_query($con, $sql)){
            echo "Excluido com sucesso! Verificar no <a href='consultar_legislacao.php'>banco de dados</a>";
        } else {
            echo "Erro, não pode ser excluida :(";
        }

        mysqli_close($con);

    }




?>