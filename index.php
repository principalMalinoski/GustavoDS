<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AULAS DS</title>
</head>
<body>
<?php 

$nome = "Gustavo"; 
$idade = 16; 

if ($idade >= 18) { 
    $status = "Você é maior de idade"; 
} else { 
    $status = "Você é menor de idade"; 
} 
?>

<h1>Nome: <?= $nome ?></h1> 
<p>Idade: <?= $idade ?></p> 
<p>status: <?= $status ?></p>


</body>


</html>
