<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banco de dados</title>
</head>
<body>
    <a href="acessar_prefeitura.php">Voltar</a>
    <table border = "2">
        <tr>
        <td colspan = "24">
            <h2>Legislação Municipal</h2>
        </td> 
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
                echo "<td> Identificador </td>";
                echo "<td>".$fkid_municipios."</td>";
            echo "</tr>";
            
            echo "<tr>";
                echo "<td> Lei Orgânica </td>";
                echo "<td>".$lei_organica."</td>";
            echo "</tr>";

            echo "<tr>";
                echo "<td> Ocupação do solo </td>";
                echo "<td>".$ocupacao_solo."</td>";
            echo "</tr>";
            
            echo "<tr>";
                echo "<td> Plano de desenvolvimento do turismo </td>";
                echo "<td>".$pdt."</td>";
            echo "</tr>";
            
            echo "<tr>";
                echo "<td> Proteção ambietal </td>";
                echo "<td>".$protecao_ambiental."</td>";
            echo "</tr>";


            echo "<tr>";
                echo "<td> Apoio à cultura</td>";
                echo "<td>".$apoio_cultura."</td>";
            echo "</tr>";
            
            echo "<tr>";
                echo "<td> Incentivos Fiscais ao Turismo  </td>";
                echo "<td>".$incentivos_fiscais_turismo."</td>";
            echo "</tr>";
            
            echo "<tr>";
                echo "<td> Plano Diretor </td>";
                echo "<td>".$plano_diretor."</td>";
            echo "</tr>";
            
            echo "<tr>";
                echo "<td> Fundo Municipal de Turismo </td>";
                echo "<td>".$fmt."</td>";
            echo "</tr>";
            
            echo "<tr>";
                echo "<td> Outras </td>";
                echo "<td>".$outras."</td>";
            echo "</tr>";

            echo "<tr>";
                echo "<td> <a href = 'editar_legislacao.php?fkid_municipios=".$registro["fkid_municipios"]."'>Editar</a> </td>";
            echo "</tr>";

            echo "<td> <a href = 'excluir_legislacao.php?fkid_municipios=".$registro["fkid_municipios"]."'>Excluir</a> </td>";

        }


        ?>


    
    </table>
</body>
</html>