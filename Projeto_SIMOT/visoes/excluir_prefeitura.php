<?php

    include "..\controles\controlar_prefeituras.php";
    
    if(isset($_GET["id_municipios"])){
        $id_municipios = $_GET["id_municipios"];
    }

    $result = excluirPrefeitura($id_municipios);

    header("location: consultar_prefeituras.php");
    die();

?>