<?php

    include "..\controles\controlar_instancias.php";

    $verificar = "";
    $municipal = "";
    $estadual = "";
    $regional = "";
    $nacional = "";
    $internacional = "";
    $fkid_municipios = "";

    if(isset($_POST["municipal"])){
        $municipal = $_POST["municipal"];
    }

    if(isset($_POST["estadual"])){
        $estadual = $_POST["estadual"];
    }

    if(isset($_POST["regional"])){
        $regional = $_POST["regional"];
    }

    if(isset($_POST["nacional"])){
        $nacional = $_POST["nacional"];
    }

    if(isset($_POST["internacional"])){
        $internacional = $_POST["internacional"];
    }

    if(isset($_POST["fkid_municipios"])){
        $fkid_municipios = $_POST["fkid_municipios"];
    }

    if(isset($_POST["btnCadastrarInstancias"])){
        $verificar = verificarEntradas($municipal, $estadual, $regional, $nacional, $internacional, $fkid_municipios);
        $msg = cadastrarInstancias($municipal, $estadual, $regional, $nacional, $internacional, $fkid_municipios);

    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="cadastrar_instancias.php" name = "cadastrar_instancias" id = "cadastrar_instancias" method = "POST">

        <table>
            <tr>
                <td> <a href="../index.php">Voltar</a></td>
            </tr>
            <tr>
                <td> <h2>Cadastrar Instâncias de Governança</h2></td>
            </tr>
            <tr>
                <td colspan  = "2"> <?php echo "$verificar"?></td>
            </tr>
            <tr>
                <td>Instâncias Municipais:</td>
                <td> <textarea name = "municipal" id="municipal"> </textarea></td>
            </tr>
            <tr>
                <td>Instâncias Estaduais:</td>
                <td> <textarea name = "estadual" id="estadual"> </textarea></td>
            </tr>
            <tr>
                <td>Instâncias Regionais:</td>
                <td> <textarea name = "regional" id="regional"> </textarea></td>
            </tr>
            <tr>
                <td>Instâncias Nacionais:</td>
                <td> <textarea name = "nacional" id="nacional"> </textarea></td>
            </tr>
            <tr>
                <td>Instâncias Internacionais:</td>
                <td> <textarea name = "internacional" id="internacional"> </textarea></td>
            </tr>
            <tr>
                <td>Identificador:</td>
                <td> <input name = "fkid_municipios" id="fkid_municipios"/></td>
            </tr>
                <td><input type="submit" name="btnCadastrarInstancias" value="Cadastrar Instâncias"></td>
            <tr>
        </tr>
        </table>
    
    </form>
</body>
</html>