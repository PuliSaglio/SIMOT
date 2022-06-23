<?php

    include "..\controles\controlar_Coleta_Deposicao_Esgoto.php";

    $verificar = "";
    $redeEsgoto = "";
    $fossaSeptica = "";
    $fossaRudimentar = "";
    $vala = "";
    $estacaoTratamento = "";
    $esgotoTratado = "";
    $outros = "";
    $totalAtendido = "";
    $domiciliosUrbanosAtendidos = "";
    $domiciliosRuraisAtendidos = "";
    $entidadeResponsavel = "";

     if(isset($_GET["idColetaDeposicao"])){
        $idColetaDeposicao = $_GET["idColetaDeposicao"];

            $result = pegarColeta_Deposicao_Esgoto($idColetaDeposicao);
            $numRegistros = mysqli_num_rows($result);

            if($numRegistros > 0) {
                while($row = mysqli_fetch_assoc($result)){
                    $redeEsgoto = $row["redeEsgoto"];
                    $fossaSeptica= $row["fossaSeptica"];
                    $fossaRudimentar= $row["fossaRudimentar"];
                    $vala= $row["vala"];
                    $estacaoTratamento= $row["estacaoTratamento"];
                    $esgotoTratado = $row["esgotoTratado"];
                    $outros= $row["outros"];
                    $totalAtendido = $row["totalAtendido"];
                    $domiciliosUrbanosAtendidos= $row["domiciliosUrbanosAtendidos"];
                    $domiciliosRuraisAtendidos = $row["domiciliosRuraisAtendidos"];
                    $entidadeResponsavel = $row["entidadeResponsavel"];
                }
            }
        }


     if(isset($_POST["btnAtualizarLegislacao"])){
     if(isset($_POST["redeEsgoto"])){
         $redeEsgoto = $_POST["redeEsgoto"];
     }

    if(isset($_POST["fossaSeptica"])){
        $fossaSeptica= $_POST["fossaSeptica"];
    }
    if(isset($_POST["fossaRudimentar"])){
        $fossaRudimentar= $_POST["fossaRudimentar"];
    }
    if(isset($_POST["vala"])){
        $vala= $_POST["vala"];
    }
    if(isset($_POST["estacaoTratamento"])){
        $estacaoTratamento=$_POST["estacaoTratamento"];
    }
    if(isset($_POST["esgotoTratado"])){
        $esgotoTratado =$_POST["esgotoTratado"];
    }
    if(isset($_POST["outros"])){
        $outros= $_POST["outros"];
    }
    if(isset($_POST["totalAtendido"])){
        $totalAtendido=$_POST["totalAtendido"];
    }

    if(isset($_POST["domiciliosUrbanosAtendidos"])){
        $domiciliosUrbanosAtendidos=$_POST["domiciliosUrbanosAtendidos"];
    }
    if(isset($_POST["domiciliosRuraisAtendidos"])){
        $domiciliosRuraisAtendidos =$_POST["domiciliosRuraisAtendidos"];
    }
    if(isset($_POST["entidadeResponsavel"])){
        $entidadeResponsavel =$_POST["entidadeResponsavel"];
    }
         
    editarLegislacao($fkid_municipios, $lei_organica, $ocupacao_solo, $pdt, $protecao_ambiental, $apoio_cultural, $incentivos_fiscais_turismo, $plano_diretor, $fmt, $outras);
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
    <form action="editar_legislacao.php" name="editar_legislacao.php" id="editarLegislacao.php" method="POST">

    <table>
    <tr>
        <td><a href="consultar_legislacoes.php">Voltar</a></td>
    </tr>
    <tr>
        <td><h2>Atualizar Legislação Municipal</h2></td>
    </tr>
    <tr>
        <td>Identificador</td>
        <td><input type="text" name="fkid_municipios" id="fkid_municipios" value=<?php echo $fkid_municipios;?>></td>
    </tr>
    <tr>
        <td>Lei Orgânica</td>
        <td><input type="text" name="lei_organica" id="lei_organica" value=<?php echo $lei_organica;?>></td>
    </tr>
    <tr>
        <td>Ocupação do solo</td>
        <td><input type="text" name="ocupacao_solo" id="ocupacao_solo" value=<?php echo $ocupacao_solo;?>></td>
    </tr>
    <tr>
        <td>Plano de dedsenvolvimento do turismo</td>
        <td><input type="text" name="PDT" id="PDT" value=<?php echo $pdt;?>></td>
    </tr>
    <tr>
        <td>Proteção ambiental</td>
        <td><input type="text" name="protecao_ambiental" id="protecao_ambiental" value=<?php echo $protecao_ambiental;?>></td>
    </tr>
    <tr>
        <td>Apoio à cultura</td>
        <td><input type="text" name="apoio_cultura" id="apoio_cultura" value=<?php echo $apoio_cultural;?>></td>
    </tr>
    <tr>
        <td>Incentivos fiscais ao turismo</td>
        <td><input type="text" name="incentivos_fiscais_turismo" id="incentivos_fiscais_turismo" value=<?php echo $incentivos_fiscais_turismo;?>></td>
    </tr>
    <tr>
        <td>Plano Diretor</td>
        <td><input type="text" name="plano_diretor" id="plano_diretor" value=<?php echo $plano_diretor;?>></td>
    </tr>
    <tr>
        <td>Fundo Municipal de Turismo</td>
        <td><input type="text" name="FMT" id="FMT" value=<?php echo $fmt;?>></td>
    </tr>
    <tr>
        <td>Outras</td>
        <td><input type="text" name="outras" id="outras" value=<?php echo $outras;?>></td>
    </tr>
    <tr>
        <td>
            <input type="submit" name="btnAtualizarLegislacao" value="Atualizar Legislação">
        </td>
    </tr>
    
    </table>    
    
    
    </form>
</body>
</html>