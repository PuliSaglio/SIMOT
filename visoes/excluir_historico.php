<?php

    include "../controles/controlar_historicos.php";

    if(isset($_GET["fkid_municipios"])){
        $fkid_municipios= $_GET["fkid_municipios"];
    }

    $result = excluirHistorico($fkid_municipios);

    header("location: consultar_historico.php");
    die();


?>