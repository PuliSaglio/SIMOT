<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abastecimentos de agua cadastrados</title>

    <style type = "text/css">
        h2{
            text-align: center;
        }

        table{
            border-collapse: collapse;
        }
    
    </style>
</head>
<body>

    <p><a href="../index.php">Voltar à página inicial</a></p>
    <p><a href="./form_a1.php">Voltar ao Formulario</a></p>
    
    <table border = "2">
        <tr>
            <td colspan = "24"> <h2>Abastecimentos de agua cadastrados</h2></td>
        </tr>
        <tr>
                <td><strong>Fkid</strong></td>
                <td><strong>Tipo De abastecimento</strong></td>  
                <td><strong>Qntd domicilios atendidos</strong></td>
                <td><strong>Empresa responsavel</strong></td>
        </tr>

        <?php

        include "../controles/controle.php";

        $result = listarAbastecimentoAgua();
        while($registro = mysqli_fetch_array($result)){
            $fkid_municipios = $registro["fkid_municipios"];
            $tipo_abastecimento = $registro["tipo_abastecimento"]; 
            $domicilios_atendidos = $registro["domicilios_atendidos"];
            $empresa_responsavel = $registro["empresa_responsavel"];

            echo "<tr>";
            echo "<td>" . $fkid_municipios. "</td>";
            echo "<td>" .$tipo_abastecimento ."</td>" ; 
            echo "<td>" .$domicilios_atendidos. "%" ."</td>";
            echo "<td>" .$empresa_responsavel. "</td>";
            echo "<td> <a href = 'form_a1.php?fkid_municipios=".$registro["fkid_municipios"]."'>Editar</a> </td>";
            echo "<td> <a href = 'form_a1.php?fkid_municipios=".$registro["fkid_municipios"]."'>Excluir</a> </td>";
        }

        ?>
        </tr>



    
    </table>
    
</body>
</html>