<?php

    include "../controles/controlar_feriados.php";

    $verificar = "";
    $id_feriados = ""; 
    $nome_feriado = "";
    $data_feriado= "";
    $fkid_municipios = "";

    if(isset($_GET["id_feriados"])){
        $id_feriados = $_GET["id_feriados"];

        $result = pegarFeriado($id_feriados);
        $numRegistros = mysqli_num_rows($result);

        if($numRegistros > 0){
            while($row = mysqli_fetch_assoc($result)){
                $id_feriados = $row['id_feriados'];
                $nome_feriado = $row['nome_feriado'];
                $data_feriado = $row['data_feriado'];
                $fkid_municipios = $row['fkid_municipios'];
            }
        }
    }


    if(isset( $_POST["btnAtualizarFeriado"])){

        if(isset($_POST["id_feriados"])){
            $id_feriados = $_POST["id_feriados"];
        }
    
    
        if(isset($_POST["nome_feriado"])){
            $nome_feriado =  $_POST["nome_feriado"];
        }
    
        if(isset($_POST["data_feriado"])){
            $data_feriado =  $_POST["data_feriado"];
        }
    
        if(isset($_POST["fkid_municipios"])){
            $fkid_municipios =  $_POST["fkid_municipios"];
        }

    
    $msg = editarFeriado($id_feriados , $nome_feriado, $data_feriado, $fkid_municipios);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar feriados do município</title>
</head>
<body>

    <form action="editar_feriados.php" name = "editar_feriados.php" id = "editar_feriados.php" method = "POST">
        <table>
            <tr>
                <td><a href="../index.php">Voltar</a></td>
            </tr>
            <tr>
                <td><h2>Atualizar Feriados</h2></td>
            </tr>
            
            <tr>
                <td>ID Do Feriado</td>
                <td><input type="text" name="id_feriados" id="id_feriados" value=<?php echo $id_feriados;?>></td>
            </tr>
            <tr>
                <td>Nome do feriado</td>
                <td><input type="text" name="nome_feriado" id="nome_feriado" value=<?php echo $nome_feriado;?>></td>
            </tr>
            <tr>
                <td>Data</td>
                <td><input type="date" name="data" id="data_feriado" value=<?php echo $data_feriado;?>></td>
            </tr>
            <tr>
                <td>Fk Id municipio</td>
                <td><input type="text" name="fkid_municipios" id="fkid_municipios" value=<?php echo $fkid_municipios;?>></td>
            </tr>
            <tr><td><input type="submit" name="btnAtualizarFeriado" value="Atualizar"></td></tr>
            
        </table>

    

    </form>
    
</body>
</html>