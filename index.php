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

?>

<h1>Nome: <?= $nome ?></h1>
<p>Idade: <?= $idade ?></p>

<?php

if ($idade >= 18) {
    echo "<p>Gustavo é maior de idade.</p>";
} else {
    echo "<p>Gustavo é menor de idade.</p>";
}

?>

</body>
</html>
