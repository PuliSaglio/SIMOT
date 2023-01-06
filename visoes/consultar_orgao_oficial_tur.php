<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orgaos Municipais cadastrados</title>

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
    <p><a href="form_a1.php">Voltar ao Formulario</a></p>
    <table border = "2">
        <tr>
            <td colspan = "24"> <h2>Orgaos Municipais cadastrados</h2></td>
        </tr>
        <tr>
                <td><strong>FK Identificador</strong></td>
                <td><strong>Nome do Orgao Oficial de Turismo</strong></td>  
                <td><strong>Logradouro</strong></td>
                <td><strong>Bairro</strong></td>
                <td><strong>Distrito</strong></td>
                <td><strong>CEP</strong></td>
                <td><strong>Email</strong></td>
                <td><strong>Site</strong></td>
                <td><strong>Quantidade de funcionários</strong></td>
                <td><strong>Quantidade de funcionários com formação</strong></td>
        </tr>

        <?php

        include "../controles/controle.php";

        $result = listarOrgaoOficialTur();

        while($registro = mysqli_fetch_array($result)){
            $fkid_municipios = $registro['fkid_municipios'];
            $nome_orgao_oficial_tur = $registro['nome_orgao_oficial_tur'];
            $logradouro = $registro['logradouro'];
            $bairro = $registro['bairro'];
            $distrito = $registro['distrito'];
            $cep = $registro['cep'];
            $email = $registro['email'];
            $site = $registro['site'];
            $qtd_funcionarios = $registro['qtd_funcionarios'];
            $qtd_funcionarios_superior_turismo = $registro['qtd_funcionarios_superior_turismo'];

            echo "<tr>";
            echo "<td>" . $fkid_municipios. "</td>";
            echo "<td>" .$nome_orgao_oficial_tur ."</td>" ; 
            echo "<td>" .$logradouro. "</td>";
            echo "<td>" .$bairro. "</td>";
            echo "<td>" .$distrito. "</td>";
            echo "<td>" .$cep. "</td>";
            echo "<td>" .$email. "</td>";
            echo "<td>" .$site. "</td>";
            echo "<td>" .$qtd_funcionarios. "</td>";
            echo "<td>" .$qtd_funcionarios_superior_turismo. "</td>";
            echo "<td> <a href = 'form_a1.php?fkid_municipios=".$registro["fkid_municipios"]."'>Editar</a> </td>";
            echo "<td> <a href = 'form_a1.php?fkid_municipios=".$registro["fkid_municipios"]."'>Excluir</a> </td>";
        }
        ?>
        </tr>    
    </table>
    
</body>
</html>