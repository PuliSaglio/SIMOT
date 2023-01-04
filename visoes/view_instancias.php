<?php

    include "..\controles\controlar_instancias.php";

    $verificar = "";
    $municipal = "";
    $estadual = "";
    $regional = "";
    $nacional = "";
    $internacional = "";
    $fkid_municipios = "";

    if(isset($_GET["fkid_municipios"])){
        $fkid_municipios = $_GET["fkid_municipios"];

        $result = pegarInstancias($fkid_municipios);
        $numRegistros = mysqli_num_rows($result);

            if($numRegistros > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $municipal = $row['municipal'];
                    $estadual = $row['estadual'];
                    $regional = $row['regional'];
                    $nacional = $row['nacional'];
                    $internacional = $row['internacinonal'];
                    $fkid_municipios = $row['fkid_municipios']; 
                }
        }
    }

    #Cadastrar
    if(isset($_POST["btnCadastrarInstancias"])){
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
        $verificar = verificarEntradas($municipal, $estadual, $regional, $nacional, $internacional, $fkid_municipios);
        $msg = cadastrarInstancias($municipal, $estadual, $regional, $nacional, $internacional, $fkid_municipios);
    }#Editar
    elseif(isset($_POST["btnEditarInstancias"])){
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

        $msg = editarInstancias($municipal, $estadual, $regional, $nacional, $internacional, $fkid_municipios);
    }#Excluir
    elseif(isset($_POST["btnExcluirInstancias"])){
        if(isset($_POST["fkid_municipios"])){
            $fkid_municipios = $_POST["fkid_municipios"];
        }
        $result = excluirInstancias($fkid_municipios);
        die();
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
    <form action="view_instancias.php" name = "view_instancias" id = "view_instancias" method = "POST">

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
                <td>Identificador do Municipio:</td>
                <td> <input name = "fkid_municipios" id="fkid_municipios" value=<?php echo "$fkid_municipios"?>></td>
            </tr>
            <tr>
                <td>Instâncias Municipais:</td>
                <td> <textarea name = "municipal" id="municipal" value = <?php echo "$municipal" ?>> </textarea></td>
            </tr>
            <tr>
                <td>Instâncias Estaduais:</td>
                <td> <textarea name = "estadual" id="estadual" value = <?php echo "$estadual" ?>> </textarea></td>
            </tr>
            <tr>
                <td>Instâncias Regionais:</td>
                <td> <textarea name = "regional" id="regional" value = <?php echo "$regional" ?>> </textarea></td>
            </tr>
            <tr>
                <td>Instâncias Nacionais:</td>
                <td> <textarea name = "nacional" id="nacional" value = <?php echo "$nacional" ?>> </textarea></td>
            </tr>
            <tr>
                <td>Instâncias Internacionais:</td>
                <td> <textarea name = "internacional" id="internacional" value = <?php echo "$internacional" ?>> </textarea></td>
            </tr>
            <tr>
                <td><input type="submit" name="btnCadastrarInstancias" value="Cadastrar Instâncias"></td>
            </tr>
            <tr>
                <td><input type="submit" name="btnEditarInstancias" value="Editar Instâncias"></td>
            </tr>
            <tr>
                <td><input type="submit" name="btnExcluirInstancias" value="Excluir Instâncias"></td>
            </tr>
            <tr>
                <td><button><a href="consultar_instancias.php">Listar</a></button></td>
            </tr>
        </table>
    
    </form>
</body>
</html>