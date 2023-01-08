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
            <td colspan = "24"> <h2>servicos de Comunicaçao cadastrados</h2></td>
        </tr>
        <tr>
                <td><strong>Fkid municipio</strong></td>
                <td><strong>A radio</strong></td>  
                <td><strong>A cabo</strong></td>
                <td><strong>Banda larga</strong></td>
                <td><strong>Discada</strong></td>
                <td><strong>Wireless</strong></td>
                <td><strong>3G</strong></td>
                <td><strong>Telefonia Movel</strong></td>
                <td><strong>Area de cobertura Telefonia movel</strong></td>
                <td><strong>Telefonia fixa</strong></td>
                <td><strong>Area de cobertura Telefonia fixa</strong></td>

                
        </tr>

        <?php

        include "../controles/controle.php";

        $result = listarServicosComunicacao();

        while($registro = mysqli_fetch_array($result)){
            $fkid_municipios = $registro["fkid_municipios"];
            $internet_radio = $registro["internet_radio"]; 
            $internet_cabo = $registro["internet_cabo"];
            $internet_banda_larga = $registro["internet_banda_larga"];
            $internet_discada = $registro["internet_discada"];
            $internet_wireless = $registro["internet_wireless"];
            $internet_3g = $registro["internet_3g"];
            $telefonia_movel = $registro["telefonia_movel"];
            $area_municipio_tmovel = $registro["area_municipio_tmovel"];
            $telefonia_fixa = $registro["telefonia_fixa"];
            $area_municipio_tfixa = $registro["area_municipio_tfixa"];

            echo "<tr>";
            echo "<td>" . $fkid_municipios. "</td>";
            echo "<td>" .$internet_radio ."</td>" ; 
            echo "<td>" .$internet_cabo. "</td>";
            echo "<td>" .$internet_banda_larga. "</td>";
            echo "<td>" .$internet_discada. "</td>";
            echo "<td>" .$internet_wireless. "</td>";
            echo "<td>" .$internet_3g. "</td>";
            echo "<td>" .$telefonia_movel. "</td>";
            echo "<td>" .$area_municipio_tmovel. "</td>";
            echo "<td>" .$telefonia_fixa. "</td>";
            echo "<td>" .$area_municipio_tfixa. "</td>";
            echo "<td> <a href = 'form_a1.php?fkid_municipios=".$registro["fkid_municipios"]."'>Editar</a> </td>";
            echo "<td> <a href = 'form_a1.php?fkid_municipios=" . $registro["fkid_municipios"] . "'>Excluir</a> </td>";
        }
        ?>
        </tr>
    </table>
    
</body>
</html>