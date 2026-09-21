<?php
$nome = "";
$idade = 0;
$media = 0;
$situação = "";

POST if ($_SERVER["REQUEST_METHOD"] === "POST") {

$nome = trim($_POST["nome"] ?? "");
$idade = (int) ($_POST["idade"] ?? 0);
$nota1 = (float) ($_POST["nota1"] ?? 0);
$nota2 = (float) ($_POST["nota2"] ?? 0);
$nota3 = (float) ($_POST["nota3"] ?? 0);
$nota4 = (float) ($_POST["nota4"] ?? 0);




}