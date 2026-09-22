<?php

$nome = "";
$idade = 0;
$media = 0;
$situacao = "";
$exibirResultado = false;
$mensagemErro = ""; 


if ($_SERVER["REQUEST_METHOD"] === "POST") {

   
    $nome = trim($_POST["nome"] ?? "");
    $idade = (int)   ($_POST["idade"] ?? 0);
    $nota1 = (float) ($_POST["nota1"] ?? 0);
    $nota2 = (float) ($_POST["nota2"] ?? 0);
    $nota3 = (float) ($_POST["nota3"] ?? 0);
    $nota4 = (float) ($_POST["nota4"] ?? 0);
    $nota5 = (float) ($_POST["nota5"] ?? 0);

  
    if ($idade <= 0) {
        $mensagemErro = "Erro: A idade não pode ser menor ou igual a zero.";
    }
    
    elseif (
        $nota1 < 0 || $nota1 > 10 ||
        $nota2 < 0 || $nota2 > 10 ||
        $nota3 < 0 || $nota3 > 10 ||
        $nota4 < 0 || $nota4 > 10 ||
        $nota5 < 0 || $nota5 > 10
    ) {
        $mensagemErro = "Erro: Todas as notas devem estar entre 0 e 10. A média não foi calculada.";
    } 
   
    else {
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
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Situação Final do Aluno (POST)</title>
</head>
<body>
    <h1>Cadastro de Aluno</h1>

    
    <?php if (!empty($mensagemErro)): ?>
        <div style="color: red; font-weight: bold; margin-bottom: 20px;">
            <?= $mensagemErro ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="">

        <label for="nome">Nome do Aluno</label><br>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="idade">Idade</label><br>
        <input type="number" id="idade" name="idade" min="0" required><br><br>

        <label for="nota1">Nota 1 (peso 2)</label><br>
        <input type="number" id="nota1" name="nota1" min="0" max="10" step="0.1" required><br><br>
     
        <label for="nota2">Nota 2 (peso 3)</label><br>
        <input type="number" id="nota2" name="nota2" min="0" max="10" step="0.1" required><br><br>
     
        <label for="nota3">Nota 3 (peso 1)</label><br>
        <input type="number" id="nota3" name="nota3" min="0" max="10" step="0.1" required><br><br>

        <label for="nota4">Nota 4 (peso 1)</label><br>
        <input type="number" id="nota4" name="nota4" min="0" max="10" step="0.1" required><br><br>
     
        <label for="nota5">Nota 5 (peso 3)</label><br>
        <input type="number" id="nota5" name="nota5" min="0" max="10" step="0.1" required><br><br>

        <button type="submit">Enviar</button>
    </form>
 
    <?php if ($exibirResultado): ?>
        
            <h2>Resultado</h2>
            <p><strong>Nome:</strong> <?= htmlspecialchars($nome) ?></p>
            <p><strong>Idade:</strong> <?= $idade ?> anos</p>
            <p><strong>Média:</strong> <?= number_format($media, 2, ",", ".") ?></p>
            <p><strong>Situação:</strong> <?= $situacao ?></p>
        
    <?php endif; ?>
</body>
</html>
