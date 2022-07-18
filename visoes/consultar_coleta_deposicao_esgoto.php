<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="../index.php">Voltar</a>
    <table border = "2">
        <tr>
            <td><h2>Coleta e Deposicao Esgoto</h2></td>
        </tr>
        <tr>
            <td>Identificador</td>
            <td>rede esgoto</td>
            <td>fossa septica</td>
            <td>fossa rudimentar</td>
            <td>vala</td>
            <td>estacao tratamento</td>
            <td>esgoto tratado</td>
            <td>outros</td>
            <td>total atendido</td>
            <td>domicilios urbanos atendidos</td>
            <td>domicilios Rurais Atendidos</td>
            <td>entidade responsavel</td>
        </tr>

        <?php
        
            include "..\controles\controlar_coleta_deposicao_esgoto.php";

            $resultadoListagem = listarInstancias();

            while($registro = mysqli_fetch_array($resultadoListagem)){
                $idColetaDeposicao = $registro["idColetaDeposicao"];
                $redeEsgoto = $registro["redeEsgoto"];
                $fossaSeptica = $registro["fossaSeptica"];
                $fossaRudimentar = $registro["fossaRudimentar"];
                $vala = $registro["vala"];
                $estacaoTratamento = $registro["estacaoTratamento"];
                $outros = $registro["outros"];
                $totalAtendido = $registro["totalAtendido"];
                $domiciliosUrbanosAtendidos = $registro["domiciliosUrbanosAtendidos"];
                $domiciliosRuraisAtendidos = $registro["domiciliosRuraisAtendidos"];
                $entidadeResponsavel = $registro["entidadeResponsavel"];

                echo "</tr>";         
                    echo "<td>".$idColetaDeposicao."</td>";      
                    echo "<td>".$redeEsgoto."</td>";
                    echo "<td>".$fossaSeptica."</td>";
                    echo "<td>".$fossaRudimentar."</td>";
                    echo "<td>".$vala."</td>";
                    echo "<td>".$estacaoTratamento."</td>";
                    echo "<td>".$esgotoTratado."</td>";
                    echo "<td>".$totalAtendido."</td>";
                    echo "<td>".$domiciliosUrbanosAtendidos."</td>";
                    echo "<td>".$domiciliosRuraisAtendidos."</td>";
                    echo "<td>".$entidadeResponsavel."</td>";
                    echo "<td> <a href='editar_coleta_deposicao_esgoto.php?fkid_municipios = ".$registro["idColetaDeposicao"]."'>Editar</a> </td>";
                    echo "<td> <a href='excluir_instancias.php?fkid_municipios = ".$registro["fkid_municipios"]."'>Excluir</a> </td>";


            }
        ?>
        </tr>
    
    </table>
</body>
</html>