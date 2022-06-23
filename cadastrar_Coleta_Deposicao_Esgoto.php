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
    if(isset($_POST["btnCadastrar"])){
         
        $verificar = verificarEntradas($redeEsgoto, $fossaSeptica, $fossaRudimentar, $vala, $estacaoTratamento, $esgotoTratado, $outros, $totalAtendido,$domiciliosUrbanosAtendidos, $domiciliosRuraisAtendidos, $entidadeResponsavel);

        $msg = cadastrarColetaDeposicaoEsgoto($redeEsgoto, $fossaSeptica, $fossaRudimentar, $vala, $estacaoTratamento, $esgotoTratado, $outros, $totalAtendido,$domiciliosUrbanosAtendidos, $domiciliosRuraisAtendidos, $entidadeResponsavel);
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
    <form action="cadastrar_Coleta_Deposicao_Esgoto.php" name="cadastrar_Coleta_Deposicao_Esgoto.php" id="cadastrar_Coleta_Deposicao_Esgoto.php" method="POST">

    <table>
    <tr>
        <td><a href="index.php">Voltar</a></td>
    </tr>
    <tr>
        <td><h2>Cadastrar Legislação Municipal</h2></td>
    </tr>
    <tr>
    <td colspan = "2"> <?php echo "$verificar"; ?></td>
    </tr>
    $redeEsgoto, $fossaSeptica, $fossaRudimentar, $vala, $estacaoTratamento, $esgotoTratado, $outros, $totalAtendido,$domiciliosUrbanosAtendidos, $domiciliosRuraisAtendidos, $entidadeResponsavel
    <tr>
        <td>Rede de Esgoto</td>
        <td><input type="radio" name="redeEsgoto" id="redeEsgoto"></td>
    </tr>
    <tr>
        <td>fossaSeptica</td>
        <td><input type="radio" name="fossaSeptica" id="fossaSeptica"></td>
    </tr>
    <tr>
        <td>fossaRudimentar</td>
        <td><input type="radio" name="fossaRudimentar" id="fossaRudimentar"></td>
    </tr>
    <tr>
        <td>vala</td>
        <td><input type="radio" name="vala" id="vala"></td>
    </tr>
    <tr>
        <td>Estaçao de Tratamento</td>
        <td><input type="radio" name="estracaoTratamento" id="estacaoTratamento"></td>
    </tr>
    <tr>
        <td>Esgoto Tratado</td>
        <td><input type="radio" name="esgotoTratado" id="outros"></td>
    </tr>
    <tr>
        <td>Outros</td>
        <td><input type="radio" name="outros" id="outros"></td>
    </tr>
    <tr>
        <td>total Atendido</td>
        <td><input type="number" name="totalAtendido" id="totalAtendido"></td>
    </tr>
    <tr>
        <td>domicilios urbanos atendidos</td>
        <td><input type="number" name="domiciliosUrbanosAtendidos" id="domiciliosRuraisAtendidos"></td>
    </tr>
    <tr>
        <td>Entidade Responsavel</td>
        <td><input type="number" name="entidadeResponsavel" id="entidadeResponsavel"></td>
    </tr>
    <tr>
        <td>
            <input type="submit" name="btnCadastrar" value="Cadastrar">
        </td>
    </tr>
    
    </table>    
    
    
    </form>
</body>
</html>