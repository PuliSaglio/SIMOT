<?php 

    include "..\controles\controlar_instancias.php";
    
    if(isset($_GET["fkid_municipios"])){
        $fkid_municipios = $_GET["fkid_municipios"];
    }

    $result = excluirInstancias($fkid_municipios);
   
    

?>