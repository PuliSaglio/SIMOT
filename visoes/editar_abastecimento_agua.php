<?php

    include "../controles/controlar_abastecimento_agua.php";

    $verificar = '';
    $fkid_municipios = '';
    $tipo_abastecimento = '';
    $domicilios_atendidos = '';
    $empresa_responsavel = '';

    if(isset($_GET["fkid_municipios"])){
        $fkid_municipios = $_GET["fkid_municipios"];

        $result = pegarAbastecimentoAgua($fkid_municipios);
        $numRegistros = mysqli_num_rows($result);

        if($numRegistros > 0){
            while($row = mysqli_fetch_assoc($result)){
                $fkid_municipios = $row['fkid_municipios'];
                $tipo_abastecimento = $row['tipo_abastecimento'];
                $domicilios_atendidos = $row['domicilios_atendidos'];
                $empresa_responsavel = $row['empresa_responsavel'];
            }
        }
    }


    if(isset( $_POST["btnAtualizarAbastecimento"])){

        if(isset($_POST["fkid_municipios"])){
            $fkid_municipios = $_POST["fkid_municipios"];
        }
    
    
        if(isset($_POST["tipo_abastecimento"])){
            $tipo_abastecimento =  $_POST["tipo_abastecimento"];
        }
    
        if(isset($_POST["domicilios_atendidos"])){
            $domicilios_atendidos =  $_POST["domicilios_atendidos"];
        }
    
        if(isset($_POST["empresa_responsavel"])){
            $empresa_responsavel =  $_POST["empresa_responsavel"];
        }

    
    $msg = editarAbastecimentoAgua($fkid_municipios , $tipo_abastecimento, $domicilios_atendidos, $empresa_responsavel);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar abastecimento de agua do município</title>
</head>
<body>

    <form action="editar_abastecimento_agua.php" name = "editar_abastecimento_agua.php" id = "editar_abastecimento_agua.php" method = "POST">
        <table>
            <tr>
                <td><a href="../index.php">Voltar</a></td>
            </tr>
            <tr>
                <td><h2>Atualizar abastecimento de agua do município</h2></td>
            </tr>
            
            <tr>
                <td>Fkid municipio</td>
                <td><input type="number" name="fkid_municipios" id="fkid_municipios" value=<?php echo $fkid_municipios;?>></td>
            </tr>
            <tr>
                <td>Tipo do abastecimento</td>
                <td><input type="text" name="tipo_abastecimento" id="tipo_abastecimento" value=<?php echo $tipo_abastecimento;?>></td>
            </tr>
            <tr>
                <td>Total de domicilios atendidos</td>
                <td><input type="number" name="domicilios_atendidos" id="domicilios_atendidos" value=<?php echo $domicilios_atendidos;?>></td>
            </tr>
            <tr>
                <td>Nome da empresa responsavel</td>
                <td><input type="text" name="empresa_responsavel" id="empresa_responsavel" value=<?php echo $empresa_responsavel;?>></td>
            </tr>
            <tr><td><input type="submit" name="btnAtualizarAbastecimento" value="Atualizar"></td></tr>
            
        </table>

    

    </form>
    
</body>
</html>