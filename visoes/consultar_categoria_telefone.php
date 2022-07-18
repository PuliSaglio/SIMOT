<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias de Telefone</title>

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

    <a href="../index.php">Voltar</a>
    <table border = "2">
        <tr>
            <td>Categorias Telefone</td>
        </tr>
        <tr>
            <td>Identificador</td>
            <td>Categoria Telefone </td>
        </tr>

        <?php
        
            include "..\controles\controlar_categoria_telefone.php";

            $result = listarCategoriaTelefone();

            while ($registro = mysqli_fetch_array($result)){
                $id_categoria_telefone = $registro["id_categoria_telefone"];
                $categoria = $registro["categoria"];

                echo "<tr>";
                echo "<td>" .$id_categoria_telefone. "</td>";
                echo "<td>" .$categoria. "</td>";
                echo "<td> <a href = 'editar_categoria_telefone.php?id_categoria_telefone=".$registro["id_categoria_telefone"]."'>Editar</a> </td>";
                echo "<td> <a href = 'excluir_categoria_telefone.php?id_categoria_telefone=".$registro["id_categoria_telefone"]."'>Excluir</a> </td>";
            }
        
        ?>

        </tr>

    
    
    </table>
    
</body>
</html>