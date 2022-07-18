<?php

    include "..\controles\controlar_caracteristicas.php";
    
    if(isset($_GET["fkid_municipios"])){
        $fkid_municipios = $_GET["fkid_municipios"];
    }

    $result = excluirCaracteristicas($fkid_municipios);

    header("location: consultar_caracteristicas.php");
    die();

?>