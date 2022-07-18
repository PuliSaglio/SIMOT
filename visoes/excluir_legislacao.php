<?php

    include "..\controles\controlar_legislacao.php";

    if(isset($_GET["fkid_municipios"])){
        $fkid_municipios = $_GET["fkid_municipios"];
    }

    $result = excluirLegislacao($fkid_municipios);

    header("location: consultar_legislacoes.php");
    die();

?>