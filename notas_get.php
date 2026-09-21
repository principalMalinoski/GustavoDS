<?php
$nome = "";
$idade = 0;
$media = 0;
$situação = "";

 if ($_SERVER["REQUEST_METHOD"] === "GET") {

$nome = trim($_GET["nome"] ?? "");
$idade = (int) ($_GET["idade"] ?? 0);
$nota1 = (float) ($_GET["nota1"] ?? 0);
$nota2 = (float) ($_GET["nota2"] ?? 0);
$nota3 = (float) ($_GET["nota3"] ?? 0);
$nota4 = (float) ($_GET["nota4"] ?? 0);
$nota5 = (float) ($_GET["nota5"] ?? 0);

