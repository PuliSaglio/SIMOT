<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banco de dados</title>
    <style>
    </style>
</head>
<body>
<a href="../index.php">Voltar à página inicial</a>
    <table border = "2" class="a">
        <tr>
            <td colspan = "24"> <h2>Prefeituras cadastradas</h2></td>
        </tr>
        <tr>
                <td><strong>Identificador</strong></td>
                <td><strong>Lei organica</strong></td>  
                <td><strong>Ocupação do Solo</strong></td>
                <td><strong>PDT</strong></td>
                <td><strong>Proteçao Ambiental</strong></td>
                <td><strong>Apio à Cultura</strong></td>
                <td><strong>Incentivos fiscais ao turismo</strong></td>
                <td><strong>Plano diretor</strong></td>
                <td><strong>FMT</strong></td>
                <td><strong>Outras</strong></td>

        </tr>
        
        <?php

        include "../controles/controlar_legislacao.php";

        $resultadoListagem = listarLegislacao();

        while($registro = mysqli_fetch_array($resultadoListagem)){

            $fkid_municipios = $registro["fkid_municipios"];
            $lei_organica = $registro["lei_organica"];
            $ocupacao_solo = $registro["ocupacao_solo"];
            $pdt = $registro["PDT"];
            $protecao_ambiental = $registro["protecao_ambiental"];
            $apoio_cultura = $registro["apoio_cultura"];
            $incentivos_fiscais_turismo = $registro["incentivos_fiscais_turismo"];
            $plano_diretor = $registro["plano_diretor"];
            $fmt = $registro["FMT"];
            $outras = $registro["outras"];

            echo "<tr>";
                echo "<td>".$fkid_municipios."</td>";
                echo "<td>".$lei_organica."</td>";
                echo "<td>".$ocupacao_solo."</td>";
                echo "<td>".$pdt."</td>";
                echo "<td>".$protecao_ambiental."</td>";
                echo "<td>".$apoio_cultura."</td>";
                echo "<td>".$incentivos_fiscais_turismo."</td>";
                echo "<td>".$plano_diretor."</td>";
                echo "<td>".$fmt."</td>";
                echo "<td>".$outras."</td>";
                echo "<td> <a href = 'editar_legislacao.php?fkid_municipios=".$registro["fkid_municipios"]."'>Editar</a> </td>";
                echo "<td> <a href = 'excluir_legislacao.php?fkid_municipios=".$registro["fkid_municipios"]."'>Excluir</a> </td>";

        }


        ?>


    
    </table>
</body>
</html>