<?php
    function abrirConexao() {

        $servidor = "localhost";
        $usuario = "root";
        $senha = "";
        $bd = "simot";

        $con = mysqli_connect($servidor, $usuario, $senha, $bd);

        if(!$con) {
            echo "Erro ao tentar estabelecer conexão com o banco de dados: ";
            mysqli_connect_error();
        } else {
            echo "";
        }

        return $con;

    }


?>