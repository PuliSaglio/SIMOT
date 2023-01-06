<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p><a href="../index.php">Voltar</a></p>
    <p><a href="./form_a1.php">Retornar ao Formulario</a></p>
    <table border = "2">
        <tr>
            <td><h2>Coleta e Deposicao Esgoto</h2></td>
        </tr>
        <tr>
            <td>Identificador</td>
            <td>rede esgoto</td>
            <td>rede esgoto total atendido</td>
            <td>rede esgoto domicilios urbanos atendidos</td>
            <td>rede esgoto domicilios rurais atendidos</td>
            <td>rede esgoto entidade responsavel</td>
            <td>fossa septica </td>
            <td>fossa septica total atendido</td>
            <td>fossa septica domicilios urbanos atendidos</td>
            <td>fossa septica domicilios rurais atendidos</td>
            <td>fossa septica entidade responsavel</td>
            <td>fossa rudimentar </td>
            <td>fossa rudimentar total atendido</td>
            <td>fossa rudimentar domicilios urbanos atendidos</td>
            <td>fossa rudimentar domicilios rurais atendidos</td>
            <td>fossa rudimentar entidade responsavel</td>
            <td>vala</td>
            <td>vala total atendido</td>
            <td>vala domicilios urbanos atendidos</td>
            <td>vala domicilios rurais atendidos</td>
            <td>vala entidade responsavel</td>
            <td>estacao tratamento</td>
            <td>estacao tratamento total atendido</td>
            <td>estacao tratamento domicilios urbanos atendidos</td>
            <td>estacao tratamento domicilios rurais atendidos</td>
            <td>estacao tratamento entidade responsavel</td>
            <td>esgoto tratado</td>
            <td>esgoto tratado total atendido</td>
            <td>esgoto tratado domicilios urbanos atendidos</td>
            <td>esgoto tratado domicilios rurais atendidos</td>
            <td>esgoto tratado entidade responsavel</td>
            <td>outros</td>
            <td>outros total atendido</td>
            <td>outros domicilios urbanos atendidos</td>
            <td>outros domicilios Rurais Atendidos</td>
            <td>outros entidade responsavel</td>
        </tr>

        <?php
        
            include "..\controles\controle.php";

            $resultadoListagem = listarColetaDeposicaoEsgoto();

            while($registro = mysqli_fetch_array($resultadoListagem)){
                $fkid_municipios = $registro["fkid_municipios"];
                $rede_esgoto = $registro["rede_esgoto"];
                $total_atendido_rede_esgoto = $registro["total_atendido_rede_esgoto"];
                $domicilios_urbanos_atendidos_rede_esgoto = $registro["domicilios_urbanos_atendidos_rede_esgoto"];
                $domicilios_rurais_atendidos_rede_esgoto = $registro["domicilios_rurais_atendidos_rede_esgoto"];
                $entidade_responsavel_rede_esgoto = $registro["entidade_responsavel_rede_esgoto"];
                $fossa_septica = $registro["fossa_septica"];
                $total_atendido_fossa_septica = $registro["total_atendido_fossa_septica"];
                $domicilios_urbanos_atendidos_fossa_septica = $registro["domicilios_urbanos_atendidos_fossa_septica"];
                $domicilios_rurais_atendidos_fossa_septica = $registro["domicilios_rurais_atendidos_fossa_septica"];
                $entidade_responsavel_fossa_septica = $registro["entidade_responsavel_fossa_septica"];
                $fossa_rudimentar = $registro["fossa_rudimentar"];
                $total_atendido_fossa_rudimentar = $registro["total_atendido_fossa_rudimentar"];
                $domicilios_urbanos_atendidos_fossa_rudimentar = $registro["domicilios_urbanos_atendidos_fossa_rudimentar"];
                $domicilios_rurais_atendidos_fossa_rudimentar = $registro["domicilios_rurais_atendidos_fossa_rudimentar"];
                $entidade_responsavel_fossa_rudimentar = $registro["entidade_responsavel_fossa_rudimentar"];
                $vala = $registro["vala"];
                $total_atendido_vala = $registro["total_atendido_vala"];
                $domicilios_urbanos_atendidos_vala = $registro["domicilios_urbanos_atendidos_vala"];
                $domicilios_rurais_atendidos_vala = $registro["domicilios_rurais_atendidos_vala"];
                $entidade_responsavel_vala = $registro["entidade_responsavel_vala"];
                $estacao_tratamento = $registro["estacao_tratamento"];
                $total_atendido_estacao_tratamento = $registro["total_atendido_estacao_tratamento"];
                $domicilios_urbanos_atendidos_estacao = $registro["domicilios_urbanos_atendidos_estacao"];
                $domicilios_rurais_atendidos_estacao = $registro["domicilios_rurais_atendidos_estacao"];
                $entidade_responsavel_estacao_tratamento = $registro["entidade_responsavel_estacao_tratamento"];
                $esgoto_tratado = $registro["esgoto_tratado"];
                $total_atendido_esgoto_tratado = $registro["total_atendido_esgoto_tratado"];
                $domicilios_urbanos_atendidos_esgoto_tratado = $registro["domicilios_urbanos_atendidos_esgoto_tratado"];
                $domicilios_rurais_atendidos_esgoto_tratado = $registro["domicilios_rurais_atendidos_esgoto_tratado"];
                $entidade_responsavel_esgoto_tratado = $registro["entidade_responsavel_esgoto_tratado"];
                $outros = $registro["outros"];
                $total_atendido_outros = $registro["total_atendido_outros"];
                $domicilios_urbanos_atendidos_outros = $registro["domicilios_urbanos_atendidos_outros"];
                $domicilios_rurais_atendidos_outros = $registro["domicilios_rurais_atendidos_outros"];
                $entidade_responsavel_outros = $registro["entidade_responsavel_outros"];

                echo "</tr>";         
                    echo "<td>".$fkid_municipios."</td>";      
                    echo "<td>".$rede_esgoto."</td>";
                    echo "<td>".$total_atendido_rede_esgoto."</td>";
                    echo "<td>".$domicilios_urbanos_atendidos_rede_esgoto."</td>";
                    echo "<td>".$domicilios_rurais_atendidos_rede_esgoto."</td>";
                    echo "<td>".$entidade_responsavel_rede_esgoto."</td>";
                    echo "<td>".$fossa_septica."</td>";
                    echo "<td>".$total_atendido_fossa_septica."</td>";
                    echo "<td>".$domicilios_urbanos_atendidos_fossa_septica."</td>";
                    echo "<td>".$domicilios_rurais_atendidos_fossa_septica."</td>";
                    echo "<td>".$entidade_responsavel_fossa_septica."</td>";
                    echo "<td>".$fossa_rudimentar."</td>";
                    echo "<td>".$total_atendido_fossa_rudimentar."</td>";
                    echo "<td>".$domicilios_urbanos_atendidos_fossa_rudimentar."</td>";
                    echo "<td>".$domicilios_rurais_atendidos_fossa_rudimentar."</td>";
                    echo "<td>".$entidade_responsavel_fossa_rudimentar."</td>";
                    echo "<td>".$vala."</td>";
                    echo "<td>".$total_atendido_vala."</td>";
                    echo "<td>".$domicilios_urbanos_atendidos_vala."</td>";
                    echo "<td>".$domicilios_rurais_atendidos_vala."</td>";
                    echo "<td>".$entidade_responsavel_vala."</td>";
                    echo "<td>".$estacao_tratamento."</td>";
                    echo "<td>".$total_atendido_estacao_tratamento."</td>";
                    echo "<td>".$domicilios_urbanos_atendidos_estacao."</td>";
                    echo "<td>".$domicilios_rurais_atendidos_estacao."</td>";
                    echo "<td>".$entidade_responsavel_estacao_tratamento."</td>";
                    echo "<td>".$esgoto_tratado."</td>";
                    echo "<td>".$total_atendido_esgoto_tratado."</td>";
                    echo "<td>".$domicilios_urbanos_atendidos_esgoto_tratado."</td>";
                    echo "<td>".$domicilios_rurais_atendidos_esgoto_tratado."</td>";
                    echo "<td>".$entidade_responsavel_esgoto_tratado."</td>";
                    echo "<td>".$outros."</td>";
                    echo "<td>".$total_atendido_outros."</td>";
                    echo "<td>".$domicilios_urbanos_atendidos_outros."</td>";
                    echo "<td>".$domicilios_rurais_atendidos_outros."</td>";
                    echo "<td>".$entidade_responsavel_outros."</td>";
                    echo "<td> <a href = 'form_a1.php?fkid_municipios=".$registro["fkid_municipios"]."'>Editar</a> </td>";
                    echo "<td> <a href = 'form_a1.php?fkid_municipios=".$registro["fkid_municipios"]."'>Excluir</a> </td>";


            }
        ?>
        </tr>
    
    </table>
</body>
</html>