<?php

    include "../controler/controlar_feriados.php";

    if(isset($_GET["idFeriados"])){
        $idFeriados= $_GET["idFeriados"];
    }

    $result = excluirFeriado($idFeriados);

    header("location: consultar_feriados.php");
    die();


?>