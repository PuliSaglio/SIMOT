<?php
    include "../controles/a_conexao.php";

    function verificarEntradas($categoria){
        if($categoria == ""){
            return "Informe a categoria.";
        }
    }

    function cadastrarCategoriaTelefone($categoria){
        $msg = verificarEntradas($categoria);

        if($msg == ""){
            $con = abrirConexao();
                $sql = "INSERT INTO categoria_telefone (categoria) VALUES ('$categoria')";

                if(mysqli_query($con, $sql)){
                    echo"Cadastro realizado com sucesso! <a href='consultar_categoria_telefone.php'>Consultar categorias cadastradas</a>";
                }else{
                    echo"Erro ao cadastrar categoria de telefone";
                }
            mysqli_close($con);
        }
    }

    function pegarCategoriaTelefone($id_categoria_telefone){
        $con = abrirConexao();

            $sql = "SELECT * FROM categoria_telefone WHERE id_categoria_telefone = " . $id_categoria_telefone . ";";
            $result = mysqli_query($con, $sql);
        mysqli_close($con);

        return $result;
    }

    function listarCategoriaTelefone(){
        $con = abrirConexao();
            $sql = "SELECT * FROM categoria_telefone;";
            $resultadoListagem = mysqli_query($con, $sql);
        mysqli_close($con);

        return $resultadoListagem;
    }

    function editarCategoriaTelefone($id_categoria_telefone,$categoria){
        $msg = verificarEntradas($categoria);
        if($msg == ""){
            $con = abrirConexao();
            $sql = "UPDATE categoria_telefone SET
            categoria = '$categoria' WHERE id_categoria_telefone = '$id_categoria_telefone';";

            if(mysqli_query($con, $sql)) {
                echo "Alteração realizada com sucesso! Verificar atualização no <a href='consultar_categoria_telefone.php'>banco de dados</a>";
            } else {
                echo "Atualização não pode ser realizada.";
            }

            mysqli_close($con);
            return array($msg);
        }
    }

    function excluirCategoriaTelefone($id_categoria_telefone){
        $con = abrirConexao();
        $sql = "DELETE FROM categoria_telefone WHERE id_categoria_telefone = " . $id_categoria_telefone . ";";

        if(mysqli_query($con,$sql)){
            $msg= "Excluida";
        }else{
            $msg = "Nao pode ser Exluida";
        }

        mysqli_close($con);
        return $msg;

    }


?>