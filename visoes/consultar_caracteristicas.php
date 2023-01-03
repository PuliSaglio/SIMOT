<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caracteristicas cadastradas</title>

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
    <p><a href="view_caracteristicas.php">Voltar às Caracteristicas</a></p>
    <table border = "2">
        <tr>
            <td colspan = "24"> <h2>Prefeituras cadastradas</h2></td>
        </tr>
        <tr>
                <td><strong>Fkid</strong></td>
                <td><strong>Area total em KM</strong></td>  
                <td><strong>Area urbana em KM</strong></td>
                <td><strong>Area rural em KM</strong></td>
                <td><strong>Ano base Area</strong></td>
                <td><strong>Populaçao total</strong></td>
                <td><strong>Populaçao urbana</strong></td>
                <td><strong>Populaçao rural</strong></td>
                <td><strong>Ano base populaçao</strong></td>
                <td><strong>Altitude media</strong></td>
                <td><strong>Temperatura media</strong></td>
                <td><strong>Temperatura minima</strong></td>
                <td><strong>Temperatura maxima</strong></td>
                <td><strong>Meses mais frios</strong></td>
                <td><strong>Meses mais quentes</strong></td>
                <td><strong>Meses mais chuvosos</strong></td>
                <td><strong>Meses menos chuvosos</strong></td>
                <td><strong>Principais atividades economical</strong></td>
                <td><strong>*</strong></td>
                <td><strong>*</strong></td>
                <td><strong>*</strong></td>

                
        </tr>

        <?php

        include "../controles/controlar_caracteristicas.php";

        $result = listarCaracteristicas();

        while($registro = mysqli_fetch_array($result)){
            $fkid_municipios = $registro["fkid_municipios"];
            $area_total_km = $registro["area_total_km"]; 
            $area_urbana_km = $registro["area_urbana_km"];
            $area_rural_km = $registro["area_rural_km"];
            $ano_base_area = $registro["ano_base_area"];
            $populacao_total = $registro["populacao_total"];
            $populacao_urbana = $registro["populacao_urbana"];
            $populacao_rural = $registro["populacao_rural"];
            $ano_base_populacao = $registro["ano_base_populacao"];
            $altitude_media = $registro["altitude_media"];
            $media_temperatura = $registro["media_temperatura"];
            $minima_temperatura = $registro["minima_temperatura"];
            $maxima_temperatura = $registro["maxima_temperatura"];
            $meses_mais_frios = $registro["meses_mais_frios"];
            $meses_mais_quentes = $registro["meses_mais_quentes"];
            $meses_mais_chuvosos = $registro["meses_mais_chuvosos"];
            $meses_menos_chuvosos = $registro["meses_menos_chuvosos"];
            $principais_atv_economicas = $registro["principais_atv_economicas"];

            echo "<tr>";
            echo "<td>" . $fkid_municipios. "</td>";
            echo "<td>" .$area_total_km ."</td>" ; 
            echo "<td>" .$area_urbana_km. "</td>";
            echo "<td>" .$area_rural_km. "</td>";
            echo "<td>" .$ano_base_area. "</td>";
            echo "<td>" .$populacao_total. "</td>";
            echo "<td>" .$populacao_urbana. "</td>";
            echo "<td>" .$populacao_rural. "</td>";
            echo "<td>" .$ano_base_populacao. "</td>";
            echo "<td>" .$altitude_media. "</td>";
            echo "<td>" .$media_temperatura. "</td>";
            echo "<td>" .$minima_temperatura. "</td>";
            echo "<td>" .$maxima_temperatura. "</td>";
            echo "<td>" .$meses_mais_frios. "</td>";
            echo "<td>" .$meses_mais_quentes. "</td>";
            echo "<td>" .$meses_mais_chuvosos. "</td>";
            echo "<td>" .$meses_menos_chuvosos. "</td>";
            echo "<td>" .$principais_atv_economicas. "</td>";
            echo "<td> <a href = 'view_caracteristicas.php?fkid_municipios=".$registro["fkid_municipios"]."'>Editar</a> </td>";
            echo "<td> <a href = 'view_caracteristicas.php?fkid_municipios=".$registro["fkid_municipios"]."'>Excluir</a> </td>";
        }
        ?>
        </tr>
    </table>
    
</body>
</html>