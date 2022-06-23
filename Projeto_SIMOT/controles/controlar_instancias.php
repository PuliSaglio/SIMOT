<?php

    include "..\controles\a_conexao.php";

    function verificarEntradas($municipal, $estadual, $regional, $nacional, $internacional, $fkid_municipios){

        if($municipal == ""){
            return "Informe a Instância Municipal";
        }

        if($estadual == ""){
            return "Informe a Instância Estadual";
        }

        if($regional == ""){
            return "Informe a Instância Regional";
        }

        if($nacional == ""){
            return "Informe a Instância Nacional";
        }

        if($internacional == "") {
            return "Informe a Instância Internacional";
        }

        if($fkid_municipios == "") {
            return "Informe o identificador";
        }

        return "";

    }

    function cadastrarInstancias($municipal, $estadual, $regional, $nacional, $internacional, $fkid_municipios){

        $msg = verificarEntradas($municipal, $estadual, $regional, $nacional, $internacional, $fkid_municipios);
        if($msg == "") {
            $con = abrirConexao();

            $sql = "INSERT INTO Instancias_Governanca (municipal, estadual, regional, nacional, internacional, fkid_municipios) VALUES ('$municipal', '$estadual', '$regional', '$nacional', '$internacional', '$fkid_municipios');";

            if(mysqli_query($con, $sql)){
                echo "Cadastro realizado com sucesso! Verificar no <a href='consultar_instancias.php'>banco de dados</a>.";
            } else {
                echo "Cadastro não pode ser realizado.";
                echo "Error: " . $sql . "<br>" . mysqli_error($con);
            }

            mysqli_close($con);
            return array($msg);
        }
    }

        
    function pegarInstancias($fkid_municipios){
        $con = abrirConexao();
        $sql = "SELECT * FROM Instancias_Governanca WHERE fkid_municipios = ".$fkid_municipios.";";

        $result = mysqli_query($con, $sql);
        mysqli_close($con);

        return $result;
    }

    function listarInstancias(){
        $con = abrirConexao();
        $sql = "SELECT * FROM Instancias_Governanca;";

        $resultadoListagem = mysqli_query($con, $sql);
        mysqli_close($con);

        return $resultadoListagem;

    }

    function editarInstancias($municipal, $estadual, $regional, $nacional, $internacional, $fkid_municipios) {

        $msg = verificarEntradas($municipal, $estadual, $regional, $nacional, $internacional, $fkid_municipios);

        if($msg == "") {
            $con = abrirConexao();

             //nome da tabela, =, '', variavel, ",", eterno retorno
            $sql = "UPDATE bdsimot.Instancias_Governanca SET 
            municipal = '$municipal', 
            estadual = '$estadual', 
            regional = '$regional', 
            nacional = '$nacional', 
            internacional = '$internacional' 
            WHERE fkid_municipios = '$fkid_municipios';";

            if(mysqli_query($con, $sql)){
                echo "Alteração realizada com sucesso! Verificar <a href='consultar_instancias.php'>alteração</a>.";
            } else {
                echo "Alteração não pode ser realizada.";
                echo "Error: " . $sql . "</br>" . mysqli_error($con);
            }

            mysqli_close($con);
            return array($msg);
        }
    } 
    
    function excluirInstancias($fkid_municipios){
        $con = abrirConexao();
        $sql = "DELETE FROM bdsimot.Instancias_Governanca WHERE fkid_municipios = " .$fkid_municipios. ";";

        if(mysqli_query($con, $sql)){
            $msg =  "Prefeitura excluída.";
        } else {
            $msg =  "Prefeitura não pode ser  excluída.";
        }

        mysqli_close($con);
        return $msg;

    }
    

?>