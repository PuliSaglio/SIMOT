<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feriados do município</title>

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

    <p><a href="../index.php">Voltar à Pagina inicial</a></p>
    <p><a href="view_feriados.php">Voltar aos Feriados</a></p>
    <table border = "2">
        <tr>
            <td>Feriados do município</td>
        </tr>
        <tr>
            <td>Identificador</td>
            <td>Nome do feriado </td>
            <td>Data do Feriado</td>
            <td>Fk Id municipio</td>
            <td>*</td>
        </tr>

        <?php
        
            include "..\controles\controlar_feriados.php";

            $result = listarFeriados();

            while ($registro = mysqli_fetch_array($result)){
                $idFeriados = $registro["id_feriados"];
                $nome_feriado = $registro["nome_feriado"];
                $data_feriado = $registro["data_feriado"];
                $fkid_municipios = $registro["fkid_municipios"];

                echo "<tr>";
                echo "<td>" .$idFeriados. "</td>";
                echo "<td>" .$nome_feriado. "</td>";
                echo "<td>" .$data_feriado. "</td>";
                echo "<td>" .$fkid_municipios. "</td>";
                echo "<td> <a href = 'view_feriados.php?id_feriados=".$registro["id_feriados"]."'>Editar</a> </td>";
                echo "<td> <a href = 'view_feriados.php?id_feriados=".$registro["id_feriados"]."'>Excluir</a> </td>";
            }
        
        ?>

        </tr>

    
    
    </table>
    
</body>
</html>