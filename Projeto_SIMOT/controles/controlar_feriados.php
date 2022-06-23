<?php
    include "../controles/a_conexao.php";

    function verificarEntradas ($nome_feriado, $data_feriado, $fkid_municipios) {
        if($nome_feriado == ""){
            return "Informe o nome do feriado.";
        }

        if($data_feriado == ""){
            return "Informe a data do feriado.";
        }

        if($fkid_municipios == ""){
            return "Informe o identificador.";
        }

        return "";
        
    }

    function cadastrarFeriado($nome_feriado, $data_feriado, $fkid_municipios){
        $msg = verificarEntradas($nome_feriado, $data_feriado, $fkid_municipios);

        if($msg == ""){
            $con = abrirConexao();
            $sql = "INSERT INTO Feriados (nome_feriado, data_feriado, fkid_municipios) VALUES ('$nome_feriado', '$data_feriado', '$fkid_municipios');";

            if(mysqli_query($con, $sql)){
                echo "Cadastro realizado com sucesso! Verificar cadastro no <a href='consultar_feriados.php'>banco de dados</a>.";
            } else {
                echo "Cadastro não pôde ser realizado.";
                echo "ERRO: " .$sql. "</br>" . mysqli_error($con);

                mysqli_close($con); 
            }

            return array($msg);

        }
    }

    function pegarFeriado($idFeriados){

        $con = abrirConexao();

            $sql = "SELECT * FROM Feriados WHERE idFeriados = " . $idFeriados . ";";
            $result = mysqli_query($con, $sql);
            mysqli_close($con);

            return $result;
        
    }

    function listarFeriados(){

        $con = abrirConexao();
        $sql = "SELECT * FROM Feriados;";
        $resultadoListagem = mysqli_query($con, $sql);
        mysqli_close($con);

        return $resultadoListagem;
    }

    function editarFeriado($idFeriados , $nome_feriado, $data_feriado, $fkid_municipios){

        $msg = verificarEntradas($nome_feriado, $data_feriado, $fkid_municipios);

        if($msg == ""){
            $con = abrirConexao();

            //nome da tabela, =, '', variavel, ",", eterno retorno.
            $sql = "UPDATE Feriados SET 
            nome_feriado = '$nome_feriado',
            data_feriado = '$data_feriado', 
            fkid_municipios = '$fkid_municipios'
            WHERE idFeriados = '$idFeriados';";

            if(mysqli_query($con, $sql)){
                echo "Alteração realizada com sucesso! Verificar <a href='consultar_feriados.php'>atualização</a>";
            } else {
                echo "Alteração não pôde ser realizada.";
                echo "ERROR: " . $sql . "</br>" . mysqli_error($con);
            }

            mysqli_close($con);
            return array($msg);
        }
    }    
    function excluirFeriado($idFeriados){
        $con = abrirConexao();

        $sql = "DELETE FROM bdsimot.Feriados WHERE idFeriados = ".$idFeriados.";";

        if(mysqli_query($con, $sql)){
            $msg = "Excluída.";
        } else {
            $msg = "Não excluída.";
        }

        mysqli_close($con);
        return $msg;
    }    


?>