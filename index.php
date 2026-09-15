<?php

$nome = "Gustavo";


if (isset($_GET['idade']) && $_GET['idade'] !== '') {
    $idade = intval($_GET['idade']);
} else {
    $idade = 16; 
}


if ($idade >= 18) {
    $status = "Você é maior de idade";
} else {
    $status = "Você é menor de idade";
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AULAS DS</title>
</head>
<body>

   
    <h1>Nome: <?= htmlspecialchars($nome) ?></h1>
    <p>Idade: <?= $idade ?></p>
    <p>Status: <?= $status ?></p>

   
    <form action="" method="get">
        <label for="idade">Idade:</label>
        <input type="number" id="idade" name="idade" min="0" required>
        <button type="submit">Enviar</button>
    </form>

</body>
</html>
