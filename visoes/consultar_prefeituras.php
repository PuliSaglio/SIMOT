<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prefeituras cadastradas</title>

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
            <td colspan = "24"> <h2>Prefeituras cadastradas</h2></td>
        </tr>
        <tr>
                <td><strong>Identificador</strong></td>
                <td><strong>Nome do municipio</strong></td>  
                <td><strong>UF</strong></td>
                <td><strong>Região turística</strong></td>
                <td><strong>Logradouro</strong></td>
                <td><strong>Número</strong></td>
                <td><strong>Complemento</strong></td>
                <td><strong>Bairro</strong></td>
                <td><strong>Email</strong></td>
                <td><strong>Site</strong></td>
                <td><strong>CNPJ</strong></td>
                <td><strong>Latitude</strong></td>
                <td><strong>Longitude</strong></td>
                <td><strong>Distância da capital em km</strong></td>
                <td><strong>Quantidade de funcionários</strong></td>
                <td><strong>Funcionários com deficiência</strong></td>
                <td><strong>Nome do prefeito</strong></td>
                <td><strong>Aniversário municipal</strong></td>
                <td><strong>Santo padroeiro</strong></td>
                <td><strong>*</strong></td>
                <td><strong>*</strong></td>
                <td><strong>*</strong></td>

                
        </tr>

        <?php

        include "../controles/controlar_prefeituras.php";

        $result = listarPrefeituras();

        while($registro = mysqli_fetch_array($result)){
            $id_municipios = $registro["id_municipios"];
            $nome_municipio = $registro["nome_municipio"]; 
            $uf = $registro["uf"];
            $regiao_turistica = $registro["regiao_turistica"];
            $logradouro = $registro["logradouro"];
            $numero = $registro["numero"];
            $complemento = $registro["complemento"];
            $bairro = $registro["bairro"];
            $email = $registro["email"];
            $site = $registro["site"];
            $cnpj = $registro["cnpj"];
            $latitude = $registro["latitude"];
            $longitude = $registro["longitude"];
            $distancia_capital = $registro["distancia_capital_km"];
            $qtd_Funcionarios = $registro["qtd_Funcionarios"];
            $qtd_funcionarios_deficiencia = $registro["qtd_funcionarios_deficiencia"];
            $nome_prefeito = $registro["nome_prefeito"];
            $aniversario_municipal = $registro["aniversario_municipal"];
            $santo_padroeiro = $registro["santo_padroeiro"];

            echo "<tr>";
            echo "<td>" . $id_municipios. "</td>";
            echo "<td>" .$nome_municipio ."</td>" ; 
            echo "<td>" .$uf. "</td>";
            echo "<td>" .$regiao_turistica. "</td>";
            echo "<td>" .$logradouro. "</td>";
            echo "<td>" .$numero. "</td>";
            echo "<td>" .$complemento. "</td>";
            echo "<td>" .$bairro. "</td>";
            echo "<td>" .$email. "</td>";
            echo "<td>" .$site. "</td>";
            echo "<td>" .$cnpj. "</td>";
            echo "<td>" .$latitude. "</td>";
            echo "<td>" .$longitude. "</td>";
            echo "<td>" .$distancia_capital. "</td>";
            echo "<td>" .$qtd_Funcionarios. "</td>";
            echo "<td>" .$qtd_funcionarios_deficiencia. "</td>";
            echo "<td>" .$nome_prefeito. "</td>";
            echo "<td>" .$aniversario_municipal. "</td>";
            echo "<td>" .$santo_padroeiro. "</td>";
            echo "<td> <a href = 'editar_prefeitura.php?id_municipios=".$registro["id_municipios"]."'>Editar</a> </td>";
            echo "<td> <a href = 'excluir_prefeitura.php?id_municipios=".$registro["id_municipios"]."'>Excluir</a> </td>";
           

            
            
            
            
            
            
            
            
            




        }

        ?>
        </tr>



    
    </table>
    
</body>
</html>