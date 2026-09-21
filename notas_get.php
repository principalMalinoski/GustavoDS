<?php
$nome = "";
$idade = 0;
$media = 0;
$situação = "";

 if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["nome"])) {

$nome = trim($_GET["nome"] ?? "");
$idade = (int) ($_GET["idade"] ?? 0);
$nota1 = (float) ($_GET["nota1"] ?? 0);
$nota2 = (float) ($_GET["nota2"] ?? 0);
$nota3 = (float) ($_GET["nota3"] ?? 0);
$nota4 = (float) ($_GET["nota4"] ?? 0);
$nota5 = (float) ($_GET["nota5"] ?? 0);

$media = ($nota1 * 2 + $nota2 * 3 + $nota3 * 1 + $nota4 * 1 + $nota5 * 3) / 10;

if ($media >= 7) {
        $situacao = "APROVADO";
    } elseif ($media >= 5) {
        $situacao = "RECUPERAÇÃO";
    } else {
        $situacao = "REPROVADO";
    }
 
    $exibirResultado = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Situação Final do Aluno (GET)</title>
</head>
<body>
    <h1>Cadastro de Aluno</h1>

    