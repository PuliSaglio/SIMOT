<?php

    include "..\controles\controlar_coleta_deposicao_esgoto.php";

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
                    $redeEsgoto = $row['redeEsgoto'];
                    $fossaSeptica= $row['fossaSeptica'];
                    $fossaRudimentar= $row['fossaRudimentar'];
                    $vala= $row['vala'];
                    $estacaoTratamento= $row['estacaoTratamento'];
                    $esgotoTratado = $row['esgotoTratado'];
                    $outros= $row['outros'];
                    $totalAtendido = $row['totalAtendido'];
                    $domiciliosUrbanosAtendidos= $row['domiciliosUrbanosAtendidos'];
                    $domiciliosRuraisAtendidos = $row['domiciliosRuraisAtendidos'];
                    $entidadeResponsavel = $row['entidadeResponsavel'];
                }
            }
        }


     if(isset($_POST["btnAtualizar"])){
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
         
    editarLegislacao($redeEsgoto, $fossaSeptica, $fossaRudimentar, $vala, $estacaoTratamento, $esgotoTratado, $outros, $totalAtendido,$domiciliosUrbanosAtendidos, $domiciliosRuraisAtendidos, $entidadeResponsavel);
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
    <form action="editar_coleta_deposicao_esgoto.php" name="editar_coleta_deposicao_esgoto.php" id="editar_coleta_deposicao_esgoto.php" method="POST">

    <table>
    <tr>
        <td><a href="consultar_coleta_deposicao_esgoto.php">Voltar</a></td>
    </tr>
    <tr>
        <td><h2>Atualizar Coleta e deposiçao do Esgoto</h2></td>
    </tr>
    <tr>
        <td>redeEsgoto</td>
        <td><input type="radio" name="tipoColeta" id="redeEsgoto" value=<?php echo $redeEsgoto;?>></td>
    </tr>
    <tr>
        <td>Lei fossaSeptica</td>
        <td><input type="radio" name="tipoColeta" id="fossaSeptica" value=<?php echo $fossaSeptica;?>></td>
    </tr>
    <tr>
        <td>fossaRudimentar</td>
        <td><input type="radio" name="tipoColeta" id="fossaRudimentar" value=<?php echo $fossaRudimentar;?>></td>
    </tr>
    <tr>
        <td>vala</td>
        <td><input type="radio" name="tipoColeta" id="vala" value=<?php echo $vala;?>></td>
    </tr>
    <tr>
        <td>estacao Tratamento</td>
        <td><input type="radio" name="tipoColeta" id="estacaoTratamento" value=<?php echo $estacaoTratamento;?>></td>
    </tr>
    <tr>
        <td>esgoto Tratado</td>
        <td><input type="radio" name="tipoColeta" id="esgotoTratado" value=<?php echo $esgotoTratado;?>></td>
    </tr>
    <tr>
        <td>outros</td>
        <td><input type="radio" name="tipoColeta" id="outros" value=<?php echo $outros;?>></td>
    </tr>
    <tr>
        <td> totalAtendido</td>
        <td><input type="number" name="totalAtendido" id="totalAtendido" value=<?php echo $totalAtendido;?>></td>
    </tr>
    <tr>
        <td>domiciliosUrbanosAtendidos</td>
        <td><input type="number" name="domiciliosUrbanosAtendidos" id="domiciliosUrbanosAtendidos" value=<?php echo $domiciliosUrbanosAtendidos;?>></td>
    </tr>
    <tr>
        <td>domiciliosRuraisAtendidos</td>
        <td><input type="number" name="domiciliosRuraisAtendidos" id="domiciliosRuraisAtendidos" value=<?php echo $domiciliosRuraisAtendidos;?>></td>
    </tr>
    <tr>
        <td>entidadeResponsavel</td>
        <td><input type="text" name="entidadeResponsavel" id="entidadeResponsavel" value=<?php echo $entidadeResponsavel;?>></td>
    </tr>
    <tr>
        <td>
            <input type="submit" name="btnAtualizar" value="Atualizar">
        </td>
    </tr>
    
    </table>    
    
    
    </form>
</body>
</html>