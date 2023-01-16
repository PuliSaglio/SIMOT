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

    <p><a href="../index.php">Voltar à página inicial</a></p>
    <p><a href="./form_a1.php">Voltar ao Formulario</a></p>
    <table border = "2">
        <tr>
            <td colspan = "24"> <h2>servicos de energia cadastrados</h2></td>
        </tr>
        <tr>
                <td><strong>Fkid municipio</strong></td>
                <td><strong>Divulgacao impressa</strong></td>  
                <td><strong>Folder</strong></td>
                <td><strong>Revista</strong></td>
                <td><strong>Jornal</strong></td>
                <td><strong>Outros</strong></td>
                <td><strong>Divulgaçao Televisiva</strong></td>
                <td><strong>Atendimento lingua estrangeira</strong></td>
                <td><strong>Informativos Impressos</strong></td>
                <td><strong>Visitantes por Ano</strong></td>
                <td><strong>Visitantes Alta</strong></td>
                <td><strong>Meses de Alta</strong></td>
                <td><strong>Origem Turistas</strong></td>
                <td><strong>Origem turistas nacionais</strong></td>
                <td><strong>Origem Tusistas Internacionais</strong></td>
                <td><strong>ano Base</strong></td>
                <td><strong>Atrativos Mais visitados</strong></td>

                
        </tr>

        <?php

        include "../controles/controle.php";

        $result = listarServicosTuristicos();

        while($registro = mysqli_fetch_array($result)){
            $fkid_municipios = $registro['fkid_municipios'];
            $divulgacao_impressa = $registro['divulgacao_impressa']; 
            $folder = $registro['folder'];
            $revista = $registro['revista'];
            $jornal = $registro['jornal'];
            $outros = $registro['outros'];
            $divulgacao_televisiva = $registro['divulgacao_televisiva'];
            $atendimento_lingua_estrangeira = $registro['atendimento_lingua_estrangeira'];
            $informativos_impressos = $registro['informativos_impressos'];
            $visitantes_ano = $registro['visitantes_ano'];
            $visitantes_alta = $registro['visitantes_alta'];
            $meses_alta = $registro['meses_alta'];
            $origem_turistas = $registro['origem_turistas'];
            $origem_turistas_nacionais = $registro['origem_turistas_nacionais'];
            $origem_turistas_internacionais = $registro['origem_turistas_internacionais'];
            $ano_base = $registro['ano_base'];
            $atrativos_mais_visitados = $registro['atrativos_mais_visitados'];
            
            

            echo "<tr>";
            echo "<td>" . $fkid_municipios. "</td>";
            echo "<td>" .$divulgacao_impressa ."</td>" ; 
            echo "<td>" .$folder. "</td>";
            echo "<td>" .$revista. "</td>";
            echo "<td>" .$jornal. "</td>";
            echo "<td>" .$outros. "</td>";
            echo "<td>" .$divulgacao_televisiva. "</td>";
            echo "<td>" .$atendimento_lingua_estrangeira. "</td>";
            echo "<td>" .$informativos_impressos. "</td>";
            echo "<td>" .$visitantes_ano. "</td>";
            echo "<td>" .$visitantes_alta. "</td>";
            echo "<td>" .$meses_alta. "</td>";
            echo "<td>" .$origem_turistas. "</td>";
            echo "<td>" .$origem_turistas_nacionais. "</td>";
            echo "<td>" .$origem_turistas_internacionais. "</td>";
            echo "<td>" .$ano_base. "</td>";
            echo "<td>" .$atrativos_mais_visitados. "</td>";
            echo "<td> <a href = 'form_a1.php?fkid_municipios=".$registro["fkid_municipios"]."'>Editar</a> </td>";
            echo "<td> <a href = 'form_a1.php?fkid_municipios=" . $registro["fkid_municipios"] . "'>Excluir</a> </td>";
        }
        ?>
        </tr>
    </table>
    
</body>
</html>