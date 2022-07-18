<?php
    include "../controles/controlar_categoria_telefone.php";

    $verificar = "";
    $categoria = "";

    if(isset($_POST["categoria"])){
        $categoria =  $_POST["categoria"];
    }

    if(isset( $_POST["btnCadastrarCategoriaTelefone"])){

        $verificar = verificarEntradas($categoria);

        $msg = cadastrarCategoriaTelefone($categoria);
        

    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Categoria de Telefone</title>
</head>
<body>

    <form action="cadastrar_categoria_telefone.php" name = "cadastrar_categoria_telefone" id = "cadastrarCategoriaTelefone" method = "POST">
        <table>
            <tr>
                <td><a href="../index.php">Voltar</a></td>
            </tr>
            <tr>
                <td><h2>Cadastrar Categoria Telefone</h2></td>
            </tr>
            <tr>
                <td colspan = "2"> <?php echo "$verificar"; ?></td>
            </tr>
            <tr>
                <td>Categoria Telefone</td>
                <td><input type="text" name="categoria"></td>
            </tr>
            <tr><td><input type="submit" name="btnCadastrarCategoriaTelefone" value="Cadastrar Categoria Telefone"></td></tr>
            
        </table>

    

    </form>
    
</body>
