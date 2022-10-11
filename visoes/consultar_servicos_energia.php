<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>servicos de energia cadastrados</title>

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

    <a href="../index.php">Voltar à página inicial</a>
    <table border = "2">
        <tr>
            <td colspan = "24"> <h2>servicos de energia cadastrados</h2></td>
        </tr>
        <tr>
                <td><strong>Fkid municipio</strong></td>
                <td><strong>energia eletrica</strong></td>  
                <td><strong>Capacidade kva</strong></td>
                <td><strong>Gerador de emergencia</strong></td>
                <td><strong>Capacidade kva gerador</strong></td>
                <td><strong>Abastecimento energia urbana</strong></td>
                <td><strong>Total abastecido energia urbana</strong></td>
                <td><strong>Entidade responsavel energia urbana</strong></td>
                <td><strong>Abastecimento energia rural</strong></td>
                <td><strong>Total abastecido energia rural</strong></td>
                <td><strong>Entidade responsavel energia rural</strong></td>
                <td><strong>Abastecimento proprio energia</strong></td>
                <td><strong>Total abastecimento energia propria</strong></td>
                <td><strong>Domicilios urbanos atendidos energia propria</strong></td>
                <td><strong>Domicilios rurais atendidos energia propria</strong></td>
                <td><strong>Entidade responsavel energia propria</strong></td>
                <td><strong>Outros tipos abastecimento</strong></td>
                <td><strong>Total abastecido outros tipos</strong></td>
                <td><strong>Domicilios urbanos atendidos outros tipos</strong></td>
                <td><strong>Entidade responsavel outros tipos</strong></td>

                
        </tr>

        <?php

        include "../controles/controlar_servicos_energia.php";

        $result = listarServicosEnergia();

        while($registro = mysqli_fetch_array($result)){
            $fkid_municipios = $registro["fkid_municipios"];
            $energia_eletrica = $registro["energia_eletrica"]; 
            $capacidade_kva = $registro["capacidade_kva"];
            $gerador_emergencia = $registro["gerador_emergencia"];
            $capacidade_kva_gerador = $registro["capacidade_kva_gerador"];
            $abastecimento_energia_urbana = $registro["abastecimento_energia_urbana"];
            $total_abastecido_energia_urbana = $registro["total_abastecido_energia_urbana"];
            $entidade_responsavel_energia_urbana = $registro["entidade_responsavel_energia_urbana"];
            $abastecimento_energia_rural = $registro["abastecimento_energia_rural"];
            $total_abastecido_energia_rural = $registro["total_abastecido_energia_rural"];
            $entidade_responsavel_energia_rural = $registro["entidade_responsavel_energia_rural"];
            $abastecimento_proprio_energia = $registro["abastecimento_proprio_energia"];
            $total_abastecimento_energia_propria = $registro["total_abastecimento_energia_propria"];
            $domicilios_urbanos_atendidos_energia_propria = $registro["domicilios_urbanos_atendidos_energia_propria"];
            $domicilios_rurais_atendidos_energia_propria = $registro["domicilios_rurais_atendidos_energia_propria"];
            $entidade_responsavel_energia_propria = $registro["entidade_responsavel_energia_propria"];
            $outros_tipos_abastecimento = $registro["outros_tipos_abastecimento"];
            $total_abastecido_outros_tipos = $registro["total_abastecido_outros_tipos"];
            $domicilios_urbanos_atendidos_outros_tipos = $registro["domicilios_urbanos_atendidos_outros_tipos"];
            $entidade_responsavel_outros_tipos = $registro["entidade_responsavel_outros_tipos"];


            echo "<tr>";
            echo "<td>" . $fkid_municipios. "</td>";
            echo "<td>" .$energia_eletrica ."</td>" ; 
            echo "<td>" .$capacidade_kva. "</td>";
            echo "<td>" .$gerador_emergencia. "</td>";
            echo "<td>" .$capacidade_kva_gerador. "</td>";
            echo "<td>" .$abastecimento_energia_urbana. "</td>";
            echo "<td>" .$total_abastecido_energia_urbana. "</td>";
            echo "<td>" .$entidade_responsavel_energia_urbana. "</td>";
            echo "<td>" .$abastecimento_energia_rural. "</td>";
            echo "<td>" .$total_abastecido_energia_rural. "</td>";
            echo "<td>" .$entidade_responsavel_energia_rural. "</td>";
            echo "<td>" .$abastecimento_proprio_energia. "</td>";
            echo "<td>" .$total_abastecimento_energia_propria. "</td>";
            echo "<td>" .$domicilios_urbanos_atendidos_energia_propria. "</td>";
            echo "<td>" .$domicilios_rurais_atendidos_energia_propria. "</td>";
            echo "<td>" .$entidade_responsavel_energia_propria. "</td>";
            echo "<td>" .$outros_tipos_abastecimento. "</td>";
            echo "<td>" .$total_abastecido_outros_tipos. "</td>";
            echo "<td>" .$domicilios_urbanos_atendidos_outros_tipos. "</td>";
            echo "<td>" .$entidade_responsavel_outros_tipos. "</td>";
            echo "<td> <a href = 'editar_servicos_energia.php?fkid_municipios=".$registro["fkid_municipios"]."'>Editar</a> </td>";
            //echo "<td> <a href = 'excluir_caracteristicas.php?fkid_municipios=".$registro["fkid_municipios"]."'>Excluir</a> </td>";
        }
        ?>
        </tr>
    </table>
    
</body>
</html>