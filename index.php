<?php 

$nome = ""; 
$idade = 0; 
$resultado="";

    if ($_SERVER["REQUEST_METHOD"]== "POST") {
        $nome = $_POST["nome"];
        $idade = $_POST["idade"];
     
    
        if ($idade >= 18) { 
            $resultado = "Você é maior de idade"; 
        } else { 
            $resultado = "Você é menor de idade"; 
        } 


     } // O IF ESTÁ PERGUNTANDO SE O FORMULÁRIO TEM METODO DE POST //
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>AULAS DS</title>
        <link rel="stylesheet" href="css/style.css">
    
    </head>
    <body>

        <h2>ATUALIZAR CADASTRO</h2>

        <form method="POST">

            <div>
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" min="0" placeholder="Digite sua idade"> 
                <label for="idade">Idade:</label>
                <input type="number" id="idade" name="idade" min="0" placeholder="Digite sua idade"> 
                <button type="button" onclick="verificarMaioridade()">Enviar</button>
            
            </div>

        </form>

        <?php if ($resultado != "") { ?>
            
        <?php } ?>

    </body>
</html>
