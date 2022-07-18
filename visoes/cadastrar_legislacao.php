<?php

    include "..\controles\controlar_legislacao.php";

     $verificar = "";
     $fkid_municipios = "";
     $lei_organica="";
     $ocupacao_solo="";
     $pdt="";
     $protecao_ambiental="";
     $apoio_cultural ="";
     $incentivos_fiscais_turismo="";
     $plano_diretor="";
     $fmt="";
     $outras ="";

    if(isset($_POST["fkid_municipios"])){
        $fkid_municipios = $_POST["fkid_municipios"];
    }
    if(isset($_POST["lei_organica"])){
        $lei_organica= $_POST["lei_organica"];
    }
    if(isset($_POST["ocupacao_solo"])){
        $ocupacao_solo= $_POST["ocupacao_solo"];
    }
    if(isset($_POST["PDT"])){
        $pdt= $_POST["PDT"];
    }
    if(isset($_POST["protecao_ambiental"])){
        $protecao_ambiental=$_POST["protecao_ambiental"];
    }
    if(isset($_POST["apoio_cultura"])){
        $apoio_cultural =$_POST["apoio_cultura"];
    }
    if(isset($_POST["incentivos_fiscais_turismo"])){
        $incentivos_fiscais_turismo= $_POST["incentivos_fiscais_turismo"];
    }
    if(isset($_POST["plano_diretor"])){
        $plano_diretor=$_POST["plano_diretor"];
    }

    if(isset($_POST["FMT"])){
        $fmt=$_POST["FMT"];
    }
    if(isset($_POST["outras"])){
        $outras =$_POST["outras"];
    }
    if(isset($_POST["btnCadastrarLegislacao"])){
         
        $verificar = verificarEntradas($fkid_municipios, $lei_organica, $ocupacao_solo, $pdt, $protecao_ambiental, $apoio_cultural, $incentivos_fiscais_turismo, $plano_diretor, $fmt);

        $msg = cadastrarLegislacao($fkid_municipios, $lei_organica, $ocupacao_solo, $pdt, $protecao_ambiental, $apoio_cultural, $incentivos_fiscais_turismo, $plano_diretor, $fmt, $outras);
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="cadastrar_legislacao.php" name="cadastrar_legislacao.php" id="cadastrarLegislacao.php" method="POST">

    <table>
    <tr>
        <td><a href="../index.php">Voltar</a></td>
    </tr>
    <tr>
        <td><h2>Cadastrar Legislação Municipal</h2></td>
    </tr>
    <tr>
    <td colspan = "2"> <?php echo "$verificar"; ?></td>
    </tr>
    <tr>
        <td>Identificador</td>
        <td><input type="number" name="fkid_municipios" id="fkid_municipios" value = <?php echo $fkid_municipios;?>></td>
    </tr>
    <tr>
        <td>Lei Orgânica</td>
        <td><textarea  name="lei_organica" id="lei_organica" rows="10" cols="30" placeholder="tipo-número-data"></textarea></td>
    </tr>
    <tr>
        <td>Ocupação do solo</td>
        <td><textarea name="ocupacao_solo" id="ocupacao_solo" rows="10" cols="30" placeholder="tipo-número-data"></textarea></td>
    </tr>
    <tr>
        <td>Plano de desenvolvimento do turismo</td>
        <td><textarea name="PDT" id="PDT" rows="10" cols="30" placeholder="tipo-número-data"></textarea></td>
    </tr>
    <tr>
        <td>Proteção ambiental</td>
        <td><textarea name="protecao_ambiental" id="protecao_ambiental" rows="10" cols="30" placeholder="tipo-número-data"></textarea></td>
    </tr>
    <tr>
        <td>Apoio à cultura</td>
        <td><textarea name="apoio_cultura" id="apoio_cultura" rows="10" cols="30" placeholder="tipo-número-data"></textarea></td>
    </tr>
    <tr>
        <td>Incentivos fiscais ao turismo</td>
        <td><textarea name="incentivos_fiscais_turismo" id="incentivos_fiscais_turismo" rows="10" cols="30" placeholder="tipo-número-data"></textarea></td>
    </tr>
    <tr>
        <td>Plano Diretor</td>
        <td><textarea name="plano_diretor" id="plano_diretor" rows="10" cols="30" placeholder="tipo-número-data"></textarea></td>
    </tr>
    <tr>
        <td>Fundo Municipal de Turismo</td>
        <td><textarea name="FMT" id="FMT" rows="10" cols="30" placeholder="tipo-número-data"></textarea></td>
    </tr>
    <tr>
        <td>Outras</td>
        <td><textarea name="outras" id="outras" rows="10" cols="30" placeholder="tipo-número-data"></textarea></td>
    </tr>
    <tr>
        <td>
            <input type="submit" name="btnCadastrarLegislacao" value="Cadastrar Legislação">
        </td>
    </tr>
    
    </table>    
    
    
    </form>
</body>
</html>