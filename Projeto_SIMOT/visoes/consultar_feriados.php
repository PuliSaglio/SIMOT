<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feriados do município</title>
</head>
<body>

    <a href="acessar_prefeitura.php">Voltar</a>
    <table>
        <tr>
            <td>Feriados do município</td>
        </tr>
        <tr>
            <td>Identificador</td>
            <td>Nome do feriado </td>
            <td>Data do Feriado</td>
            <td>*</td>
            <td>*</td>
        </tr>

        <?php
        
            include "..\controler\controlar_feriados.php";

            $resultadoListagem = listarFeriados();

            while ($registro = mysqli_fetch_array($resultadoListagem)){
                $idFeriados = $registro["idFeriados"];
                $nome_feriado = $registro["nome_feriado"];
                $data_feriado = $registro["data_feriado"];

                echo "<tr>";
                echo "<td>" .$idFeriados. "</td>";
                echo "<td>" .$nome_feriado. "</td>";
                echo "<td>" .$data_feriado. "</td>";
                echo "<td> <a href = 'editar_feriados.php?idFeriados=".$registro["idFeriados"]."'>Editar</a> </td>";
                echo "<td> <a href = 'excluir_feriados.php?idFeriados=".$registro["idFeriados"]."'>Excluir</a> </td>";
            }
        
        ?>

        </tr>

    
    
    </table>
    
</body>
</html>