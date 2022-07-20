<?php

    include "..\controles\controlar_coleta_deposicao_esgoto.php";

    $verificar = "";
    $fkid_municipios = "";
    $rede_esgoto = "";
    $total_atendido_rede_esgoto = "";
    $domicilios_urbanos_atendidos_rede_esgoto = "";
    $domicilios_rurais_atendidos_rede_esgoto = "";
    $entidade_responsavel_rede_esgoto = "";
    $fossa_septica = "";
    $total_atendido_fossa_septica = "";
    $domicilios_urbanos_atendidos_fossa_septica = "";
    $domicilios_rurais_atendidos_fossa_septica = "";
    $entidade_responsavel_fossa_septica = ""; 
    $fossa_rudimentar = "";
    $total_atendido_fossa_rudimentar = "";
    $domicilios_urbanos_atendidos_fossa_rudimentar = "";
    $domicilios_rurais_atendidos_fossa_rudimentar = "";
    $entidade_responsavel_fossa_rudimentar = ""; 
    $vala = ""; 
    $total_atendido_vala = ""; 
    $domicilios_urbanos_atendidos_vala = ""; 
    $domicilios_rurais_atendidos_vala = ""; 
    $entidade_responsavel_vala = "";
    $estacao_tratamento = ""; 
    $total_atendido_estacao_tratamento = "";
    $domicilios_urbanos_atendidos_estacao_tratamento = "";
    $domicilios_rurais_atendidos_estacao_tratamento = ""; 
    $entidade_responsavel_estacao_tratamento = ""; 
    $esgoto_tratado = ""; 
    $total_atendido_esgoto_tratado = ""; 
    $domicilios_urbanos_atendidos_esgoto_tratado = "";
    $domicilios_rurais_atendidos_esgoto_tratado = ""; 
    $entidade_responsavel_esgoto_tratado = ""; 
    $outros = ""; 
    $total_atendido_outros = ""; 
    $domicilios_urbanos_atendidos_outros = ""; 
    $domicilios_rurais_atendidos_outros = ""; 
    $entidade_responsavel_outros = "";

    if(isset($_POST["fkid_municipios"])){
        $fkid_municipios = $_POST["fkid_municipios"];
    }
    if(isset($_POST["rede_esgoto"])){
        $rede_esgoto = $_POST["rede_esgoto"];
    }
    if(isset($_POST["total_atendido_rede_esgoto"])){
        $total_atendido_rede_esgoto=$_POST["total_atendido_rede_esgoto"];
    }
    if(isset($_POST["domicilios_urbanos_atendidos_rede_esgoto"])){
        $domicilios_urbanos_atendidos_rede_esgoto=$_POST["domicilios_urbanos_atendidos_rede_esgoto"];
    }
    if(isset($_POST["domicilios_rurais_atendidos_rede_esgoto"])){
        $domicilios_rurais_atendidos_rede_esgoto =$_POST["domicilios_rurais_atendidos_rede_esgoto"];
    }
    if(isset($_POST["entidade_responsavel_rede_esgoto"])){
        $entidade_responsavel_rede_esgoto =$_POST["entidade_responsavel_rede_esgoto"];
    }
    if(isset($_POST["fossa_septica"])){
        $fossa_septica= $_POST["fossa_septica"];
    }
    if(isset($_POST["total_atendido_fossa_septica"])){
        $total_atendido_fossa_septica=$_POST["total_atendido_fossa_septica"];
    }
    if(isset($_POST["domicilios_urbanos_atendidos_fossa_septica"])){
        $domicilios_urbanos_atendidos_fossa_septica=$_POST["domicilios_urbanos_atendidos_fossa_septica"];
    }
    if(isset($_POST["domicilios_rurais_atendidos_fossa_septica"])){
        $domicilios_rurais_atendidos_fossa_septica =$_POST["domicilios_rurais_atendidos_fossa_septica"];
    }
    if(isset($_POST["entidade_responsavel_fossa_septica"])){
        $entidade_responsavel_fossa_septica =$_POST["entidade_responsavel_fossa_septica"];
    }
    if(isset($_POST["fossa_rudimentar"])){
        $fossa_rudimentar= $_POST["fossa_rudimentar"];
    }
    if(isset($_POST["total_atendido_fossa_rudimentar"])){
        $total_atendido_fossa_rudimentar=$_POST["total_atendido_fossa_rudimentar"];
    }
    if(isset($_POST["domicilios_urbanos_atendidos_fossa_rudimentar"])){
        $domicilios_urbanos_atendidos_fossa_rudimentar=$_POST["domicilios_urbanos_atendidos_fossa_rudimentar"];
    }
    if(isset($_POST["domicilios_rurais_atendidos_fossa_rudimentar"])){
        $domicilios_rurais_atendidos_fossa_rudimentar =$_POST["domicilios_rurais_atendidos_fossa_rudimentar"];
    }
    if(isset($_POST["entidade_responsavel_fossa_rudimentar"])){
        $entidade_responsavel_fossa_rudimentar =$_POST["entidade_responsavel_fossa_rudimentar"];
    }
    if(isset($_POST["vala"])){
        $vala= $_POST["vala"];
    }
    if(isset($_POST["total_atendido_vala"])){
        $total_atendido_vala=$_POST["total_atendido_vala"];
    }
    if(isset($_POST["domicilios_urbanos_atendidos_vala"])){
        $domicilios_urbanos_atendidos_vala=$_POST["domicilios_urbanos_atendidos_vala"];
    }
    if(isset($_POST["domicilios_rurais_atendidos_vala"])){
        $domicilios_rurais_atendidos_vala =$_POST["domicilios_rurais_atendidos_vala"];
    }
    if(isset($_POST["entidade_responsavel_vala"])){
        $entidade_responsavel_vala =$_POST["entidade_responsavel_vala"];
    }
    if(isset($_POST["estacao_tratamento"])){
        $estacao_tratamento=$_POST["estacao_tratamento"];
    }
    if(isset($_POST["total_atendido_estacao_tratamento"])){
        $total_atendido_estacao_tratamento=$_POST["total_atendido_estacao_tratamento"];
    }
    if(isset($_POST["domicilios_urbanos_atendidos_estacao_tratamento"])){
        $domicilios_urbanos_atendidos_estacao_tratamento=$_POST["domicilios_urbanos_atendidos_estacao_tratamento"];
    }
    if(isset($_POST["domicilios_rurais_atendidos_estacao_tratamento"])){
        $domicilios_rurais_atendidos_estacao_tratamento =$_POST["domicilios_rurais_atendidos_estacao_tratamento"];
    }
    if(isset($_POST["entidade_responsavel_estacao_tratamento"])){
        $entidade_responsavel_estacao_tratamento =$_POST["entidade_responsavel_estacao_tratamento"];
    }
    if(isset($_POST["esgoto_tratado"])){
        $esgoto_tratado =$_POST["esgoto_tratado"];
    }
    if(isset($_POST["total_atendido_esgoto_tratado"])){
        $total_atendido_esgoto_tratado=$_POST["total_atendido_esgoto_tratado"];
    }
    if(isset($_POST["domicilios_urbanos_atendidos_esgoto_tratado"])){
        $domicilios_urbanos_atendidos_esgoto_tratado=$_POST["domicilios_urbanos_atendidos_esgoto_tratado"];
    }
    if(isset($_POST["domicilios_rurais_atendidos_esgoto_tratado"])){
        $domicilios_rurais_atendidos_esgoto_tratado =$_POST["domicilios_rurais_atendidos_esgoto_tratado"];
    }
    if(isset($_POST["entidade_responsavel_esgoto_tratado"])){
        $entidade_responsavel_esgoto_tratado =$_POST["entidade_responsavel_esgoto_tratado"];
    }
    if(isset($_POST["outros"])){
        $outros= $_POST["outros"];
    }
    if(isset($_POST["total_atendido_outros"])){
        $total_atendido_outros=$_POST["total_atendido_outros"];
    }
    if(isset($_POST["domicilios_urbanos_atendidos_outros"])){
        $domicilios_urbanos_atendidos_outros=$_POST["domicilios_urbanos_atendidos_outros"];
    }
    if(isset($_POST["domicilios_rurais_atendidos_outros"])){
        $domicilios_rurais_atendidos_outros =$_POST["domicilios_rurais_atendidos_outros"];
    }
    if(isset($_POST["entidade_responsavel_outros"])){
        $entidade_responsavel_outros =$_POST["entidade_responsavel_outros"];
    }
    if(isset($_POST["btnCadastrar"])){
         
        $verificar = verificarEntradas($fkid_municipios, $rede_esgoto, $total_atendido_rede_esgoto, $domicilios_urbanos_atendidos_rede_esgoto, $domicilios_rurais_atendidos_rede_esgoto, $entidade_responsavel_rede_esgoto, $fossa_septica, $total_atendido_fossa_septica, $domicilios_urbanos_atendidos_fossa_septica,
        $domicilios_rurais_atendidos_fossa_septica,$entidade_responsavel_fossa_septica, $fossa_rudimentar, $total_atendido_fossa_rudimentar, $domicilios_urbanos_atendidos_fossa_rudimentar, $domicilios_rurais_atendidos_fossa_rudimentar,
        $entidade_responsavel_fossa_rudimentar, $vala, $total_atendido_vala, $domicilios_urbanos_atendidos_vala, $domicilios_rurais_atendidos_vala, $entidade_responsavel_vala, $estacao_tratamento, $total_atendido_estacao_tratamento,
        $domicilios_urbanos_atendidos_estacao_tratamento, $domicilios_rurais_atendidos_estacao_tratamento, $entidade_responsavel_estacao_tratamento, $esgoto_tratado, $total_atendido_esgoto_tratado, $domicilios_urbanos_atendidos_esgoto_tratado,
        $domicilios_rurais_atendidos_esgoto_tratado, $entidade_responsavel_esgoto_tratado, $outros, $total_atendido_outros, $domicilios_urbanos_atendidos_outros, $domicilios_rurais_atendidos_outros, $entidade_responsavel_outros);

        $msg = cadastrarColetaDeposicaoEsgoto($fkid_municipios, $rede_esgoto, $total_atendido_rede_esgoto, $domicilios_urbanos_atendidos_rede_esgoto, $domicilios_rurais_atendidos_rede_esgoto, $entidade_responsavel_rede_esgoto, $fossa_septica, $total_atendido_fossa_septica, $domicilios_urbanos_atendidos_fossa_septica,
        $domicilios_rurais_atendidos_fossa_septica,$entidade_responsavel_fossa_septica, $fossa_rudimentar, $total_atendido_fossa_rudimentar, $domicilios_urbanos_atendidos_fossa_rudimentar, $domicilios_rurais_atendidos_fossa_rudimentar,
        $entidade_responsavel_fossa_rudimentar, $vala, $total_atendido_vala, $domicilios_urbanos_atendidos_vala, $domicilios_rurais_atendidos_vala, $entidade_responsavel_vala, $estacao_tratamento, $total_atendido_estacao_tratamento,
        $domicilios_urbanos_atendidos_estacao_tratamento, $domicilios_rurais_atendidos_estacao_tratamento, $entidade_responsavel_estacao_tratamento, $esgoto_tratado, $total_atendido_esgoto_tratado, $domicilios_urbanos_atendidos_esgoto_tratado,
        $domicilios_rurais_atendidos_esgoto_tratado, $entidade_responsavel_esgoto_tratado, $outros, $total_atendido_outros, $domicilios_urbanos_atendidos_outros, $domicilios_rurais_atendidos_outros, $entidade_responsavel_outros);
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
    <form action="cadastrar_coleta_deposicao_esgoto.php" name="cadastrar_coleta_deposicao_esgoto.php" id="cadastrar_coleta_deposicao_esgoto.php" method="POST">

    <table>
    <tr>
        <td><a href="../index.php">Voltar</a></td>
    </tr>
    <tr>
        <td><h2>Cadastrar Coleta e Deposicao Esgoto</h2></td>
    </tr>
    <tr>
    <td colspan = "2"> <?php echo "$verificar"; ?></td>
    </tr>
    <tr>
        <td>Fkid municipio</td>
        <td><input type="number" name="fkid_municipios" id="fkid_municipios" ></td>
    </tr>
    <tr>
        <td>Rede de Esgoto</td>
        <td><input type="checkbox" name="rede_esgoto" id="rede_esgoto" value="Rede esgoto"></td>
    </tr>
    <tr>
        <td>total Atendido (%)</td>
        <td><input type="number" name="total_atendido_rede_esgoto" id="total_atendido_rede_esgoto"></td>
    </tr>
    <tr>
        <td>domicilios urbanos atendidos (%)</td>
        <td><input type="number" name="domicilios_urbanos_atendidos_rede_esgoto" id="domicilios_urbanos_atendidos_rede_esgoto"></td>
    </tr>
    <tr>
        <td>domicilios rurais atendidos (%)</td>
        <td><input type="number" name="domicilios_rurais_atendidos_rede_esgoto" id="domicilios_rurais_atendidos_rede_esgoto"></td>
    </tr>
    <tr>
        <td>Entidade Responsavel</td>
        <td><input type="text" name="entidade_responsavel_rede_esgoto" id="entidade_responsavel_rede_esgoto"></td>
    </tr>
    <tr>
        <td>Fossa Septica</td>
        <td><input type="checkbox" name="fossa_septica" id="fossa_septica" value="Fossa septica"></td>
    </tr>
    <tr>
        <td>total Atendido (%)</td>
        <td><input type="number" name="total_atendido_fossa_septica" id="total_atendido_fossa_septica"></td>
    </tr>
    <tr>
        <td>domicilios urbanos atendidos (%)</td>
        <td><input type="number" name="domicilios_urbanos_atendidos_fossa_septica" id="domicilios_urbanos_atendidos_fossa_septica"></td>
    </tr>
    <tr>
        <td>domicilios rurais atendidos (%)</td>
        <td><input type="number" name="domicilios_rurais_atendidos_fossa_septica" id="domicilios_rurais_atendidos_fossa_septica"></td>
    </tr>
    <tr>
        <td>Entidade Responsavel (%)</td>
        <td><input type="text" name="entidade_responsavel_fossa_septica" id="entidade_responsavel_fossa_septica"></td>
    </tr>
    <tr>
        <td>Fossa Rudimentar</td>
        <td><input type="checkbox" name="fossa_rudimentar" id="fossa_rudimentar" value="fossa rudimentar"></td>
    </tr>
    <tr>
        <td>total Atendido (%)</td>
        <td><input type="number" name="total_atendidofossa_rudimentar" id="total_atendido_fossa_rudimentar"></td>
    </tr>
    <tr>
        <td>domicilios urbanos atendidos (%)</td>
        <td><input type="number" name="domicilios_urbanos_atendidos_fossa_rudimentar" id="domicilios_urbanos_atendidos_fossa_rudimentar"></td>
    </tr>
    <tr>
        <td>domicilios rurais atendidos (%)</td>
        <td><input type="number" name="domicilios_rurais_atendidos_fossa_rudimentar" id="domicilios_rurais_atendidos_fossa_rudimentar"></td>
    </tr>
    <tr>
        <td>Entidade Responsavel</td>
        <td><input type="text" name="entidade_responsavel_fossa_rudimentar" id="entidade_responsavel_fossa_rudimentar"></td>
    </tr>
    <tr>
        <td>Vala</td>
        <td><input type="checkbox" name="vala" id="vala" value="vala"></td>
    </tr>
    <tr>
        <td>total Atendido (%)</td>
        <td><input type="number" name="total_atendido_vala" id="total_atendido_vala" ></td>
    </tr>
    <tr>
        <td>domicilios urbanos atendidos (%)</td>
        <td><input type="number" name="domicilios_urbanos_atendidos_vala" id="domicilios_urbanos_atendidos_vala"></td>
    </tr>
    <tr>
        <td>domicilios rurais atendidos (%)</td>
        <td><input type="number" name="domicilios_rurais_atendidos_vala" id="domicilios_rurais_atendidos_vala"></td>
    </tr>
    <tr>
        <td>Entidade Responsavel</td>
        <td><input type="text" name="entidade_responsavel_vala" id="entidade_responsavel_vala"></td>
    </tr>
    <tr>
        <td>Estaçao de Tratamento</td>
        <td><input type="checkbox" name="estacao_tratamento" id="estacao_tratamento" value="Estacao de tratamento"></td>
    </tr>
    <tr>
        <td>total Atendido (%)</td>
        <td><input type="number" name="total_atendido_estacao_tratamento" id="total_atendido_estacao_tratamento"></td>
    </tr>
    <tr>
        <td>domicilios urbanos atendidos (%)</td>
        <td><input type="number" name="domicilios_urbanos_atendidos_estacao_tratamento" id="domicilios_urbanos_atendidos_estacao_tratamento"></td>
    </tr>
    <tr>
        <td>domicilios rurais atendidos (%)</td>
        <td><input type="number" name="domicilios_rurais_atendidos_estacao_tratamento" id="domicilios_rurais_atendidos_estacao_tratamento"></td>
    </tr>
    <tr>
        <td>Entidade Responsavel</td>
        <td><input type="text" name="entidade_responsavel_estacao_tratamento" id="entidade_responsavel_estacao_tratamento"></td>
    </tr>
    <tr>
        <td>Esgoto Tratado</td>
        <td><input type="checkbox" name="esgoto_tratado" id="esgoto_tratado" value="esgoto tratado"></td>
    </tr>
    <tr>
        <td>total Atendido (%)</td>
        <td><input type="number" name="total_atendido_esgoto_tratado" id="total_atendido_esgoto_tratado"></td>
    </tr>
    <tr>
        <td>domicilios urbanos atendidos (%)</td>
        <td><input type="number" name="domicilios_urbanos_atendidos_esgoto_tratado" id="domicilios_urbanos_atendidos_esgoto_tratado"></td>
    </tr>
    <tr>
        <td>domicilios rurais atendidos (%)</td>
        <td><input type="number" name="domicilios_rurais_atendidos_esgoto_tratado" id="domicilios_rurais_atendidos_esgoto_tratado"></td>
    </tr>
    <tr>
        <td>Entidade Responsavel</td>
        <td><input type="text" name="entidadeResponsavel_esgoto_tratado" id="entidadeResponsavel_esgoto_tratado"></td>
    </tr>
    <tr>
        <td>Outros</td>
        <td><input type="checkbox" name="outros" id="outros" value="Outros"></td>
    </tr>
    <tr>
        <td>total Atendido (%)</td>
        <td><input type="number" name="total_atendido_outros" id="total_atendido_outros"></td>
    </tr>
    <tr>
        <td>domicilios urbanos atendidos (%)</td>
        <td><input type="number" name="domicilios_urbanos_atendidos_outros" id="domicilios_urbanos_atendidos_outros"></td>
    </tr>
    <tr>
        <td>domicilios rurais atendidos (%)</td>
        <td><input type="number" name="domicilios_rurais_atendidos_outros" id="domicilios_rurais_atendidos_outros"></td>
    </tr>
    <tr>
        <td>Entidade Responsavel</td>
        <td><input type="text" name="entidade_responsavel_outros" id="entidade_responsavel_outros"></td>
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