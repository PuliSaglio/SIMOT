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
            $sql = "INSERT INTO feriados (nome_feriado, data_feriado, fkid_municipios) VALUES ('$nome_feriado', '$data_feriado', '$fkid_municipios');";

            if(mysqli_query($con, $sql)){
                echo "Cadastro realizado com sucesso! Verificar cadastro no <a href='consultar_feriados.php'>Consultar feriados cadastrados</a>.";
            } else {
                echo "Erro ao tentar cadastrar feriado: "; 
            }

            mysqli_close($con);

        }
        return array($msg);
    }

    function pegarFeriado($id_feriados){

        $con = abrirConexao();

            $sql = "SELECT * FROM Feriados WHERE id_feriados = " . $id_feriados . ";";
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

    function editarFeriado($id_feriados , $nome_feriado, $data_feriado, $fkid_municipios){

        $msg = verificarEntradas($nome_feriado, $data_feriado, $fkid_municipios);

        if($msg == ""){
            $con = abrirConexao();

            //nome da tabela, =, '', variavel, ",", eterno retorno.
            $sql = "UPDATE feriados SET 
            nome_feriado = '$nome_feriado',
            data_feriado = '$data_feriado', 
            fkid_municipios = '$fkid_municipios' WHERE id_feriados = '$id_feriados';";

            if(mysqli_query($con, $sql)){
                echo "Alteração realizada com sucesso! Verificar <a href='consultar_feriados.php'>atualização</a>";
            } else {
                echo "Alteração não pôde ser realizada.";
            }

            mysqli_close($con);
            return array($msg);
        }
    }    
    function excluirFeriado($id_feriados){
        $con = abrirConexao();

        $sql = "DELETE FROM feriados WHERE id_feriados = '$id_feriados'";

        if(mysqli_query($con, $sql)){
            $msg = "Excluída.";
        } else {
            $msg = "Não excluída.";
        }

        mysqli_close($con);
        return $msg;
    }    


?>