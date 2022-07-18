<?php

    include "../controles/controlar_feriados.php";

    if(isset($_GET["id_feriados"])){
        $id_feriados = $_GET["id_feriados"];
    }

    $result = excluirFeriado($id_feriados);

    header("location: consultar_feriados.php");
    die();


?>