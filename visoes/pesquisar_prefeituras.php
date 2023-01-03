
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisar Prefeituras</title>
</head>
<body>
    <h1>Listagem de Prefeituras</h1>
    <p><input type="text" name="prefeituras" id="prefeituras"> <input type="submit" value="Pesquisar"></p>
    
    <?php
        include "../controles/controlar_prefeituras.php";

        $result = listarPrefeituras();

        while($registro = mysqli_fetch_array($result)){
            $nome_municipio = $registro["nome_municipio"]; 

            echo "<p><a href = 'form_a1.php?id_municipios=".$registro["id_municipios"]."'>" . $nome_municipio. "</a></p>";
        }
    ?>
    <p><button><a href="form_a1.php">Cadastrar Nova Prefeitura</a></button></p>
</body>
</html>