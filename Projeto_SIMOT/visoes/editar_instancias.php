<?php

    include "..\controles\controlar_instancias.php";

    $fkid_municipios = "";
    $municipal = "";
    $estadual = "";
    $regional = "";
    $nacional = "";
    $internacional = "";

    if(isset($_GET["fkid_municipios"])){
        $fkid_municipios = $_GET["fkid_municipios"];

        $result = pegarInstancias($fkid_municipios);
        $numRegistros = mysqli_num_rows($result);

            if($numRegistros > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $municipal = $row["municipal"];
                    $estadual = $row["estadual"];
                    $regional = $row["regional"];
                    $nacional = $row["nacional"];
                    $internacional = $row["internacinonal"];
                    $fkid_municipios = $row["fkid_municipios"]; 
                }
        }
    }

        if(isset($_POST["btnAtualiarInstancias"])){
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

            $msg = editarInstancias($municipal, $estadual, $regional, $nacional, $internacional, $fkid_municipios);
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
    <form action="editar_instancias.php" name = "editar_instancias" id = "editar_instancias" method = "POST">

        <table>
            <tr>
                <td> <a href="consultar_instancias.php">Voltar</a></td>
            </tr>
            <tr>
                <td> <h2>Atualizar Instâncias de Governança</h2></td>
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
                <td>Identificador:</td>
                <td> <input name = "fkid_municipios" id="fkid_municipios" value=<?php echo "$fkid_municipios"?>></td>
            </tr>
                <td><input type="submit" name="btnAtualizarInstancias" value="Atualizar Instâncias"></td>
            <tr>
        </tr>
        </table>
    
    </form>
</body>
</html>