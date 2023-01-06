<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histórico do município</title>
</head>
<body>

    <p><a href="../index.php">Voltar</a></p>
    <p><a href="form_a1.php">Voltar ao Formulário</a></p>
    <table border = "2">
        <tr>
            <td>Histórico do município</td>
        </tr>
        <tr>
            <td>Identificador</td>
            <td>Origem do nome </td>
            <td>Data de fundação</td>
            <td>Data de emancipação</td>
            <td>Fundadores</td>
            <td>Outros fatos de importância histórica</td>
            <td>*</td>
            <td>*</td>
        </tr>

        <?php
        
            include "..\controles\controlar_historicos.php";

            $resultadoListagem = listarHistorico();

            while ($registro = mysqli_fetch_array($resultadoListagem)){
                $fkid_municipios = $registro["fkid_municipios"];
                $origem_nome = $registro["origem_nome"];
                $data_fundacao = $registro["data_fundacao"];
                $data_emancipacao = $registro["data_emancipacao"];
                $fundadores = $registro["fundadores"];
                $outros_fatos = $registro["outros_fatos"];

                echo "<tr>";
                echo "<td>" .$fkid_municipios. "</td>";
                echo "<td>" .$origem_nome. "</td>";
                echo "<td>" .$data_fundacao. "</td>";
                echo "<td>" .$data_emancipacao. "</td>";
                echo "<td>" .$fundadores. "</td>";
                echo "<td>" .$outros_fatos. "</td>";
                echo "<td> <a href = 'form_a1.php?fkid_municipios=".$registro["fkid_municipios"]."'>Editar</a> </td>";
                echo "<td> <a href = 'form_a1.php?fkid_municipios=".$registro["fkid_municipios"]."'>Excluir</a> </td>";
            }
        
        ?>

        </tr>

    
    
    </table>
    
</body>
</html>




