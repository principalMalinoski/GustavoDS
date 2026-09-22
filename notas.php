<?php
$nome = "";
$idade = 0;
$media = 0;
$situacao = "";
$exibirResultado = false;
$mensagemErro = ""; 

 if ($idade<=0) {
    $mensagemErro = "Erro: A idade não pode ser menor ou igual a zero.";
 }
    elseif (
    
    $nota1 < 0 || $nota1 > 10 ||
    $nota2 < 0 || $nota2 > 10 ||
    $nota3 < 0 || $nota3 > 10 ||
    $nota4 < 0 || $nota4 > 10 ||
 ) {
    $mensagemErro = "Erro: Todas as notas devem estar entre 0 e 10. A média nao foi calculada.";
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

?>
<!DOCTYPE html>
<html lang="en">
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


    <form method="POST" action="notas.php">
    <label for="nome">Nome do Aluno</label>
    <input type="text" id="nome" name="nome" required>

    <label for="idade">Idade</label>
    <input type="number" id="idade" name="idade" min="0" required>

    <label for="nota1">Nota 1 (peso 2)</label>
     <input type="number" id="nota1" name="nota1" min="0" max="10" step="0.1" required>
 
     <label for="nota2">Nota 2 (peso 3)</label>
     <input type="number" id="nota2" name="nota2" min="0" max="10" step="0.1" required>
 
    <label for="nota3">Nota 3 (peso 1)</label>
    <input type="number" id="nota3" name="nota3" min="0" max="10" step="0.1" required>

     <label for="nota4">Nota 4 (peso 1)</label>
        <input type="number" id="nota4" name="nota4" min="0" max="10" step="0.1" required>
 
        <label for="nota5">Nota 5 (peso 3)</label>
        <input type="number" id="nota5" name="nota5" min="0" max="10" step="0.1" required>

             <button type="submit">Enviar</button>
    </form>
 
    <?php if ($exibirResultado): ?>
        <div class="resultado">
            <h2>Resultado</h2>
            <p><strong>Nome:</strong> <?= htmlspecialchars($nome) ?></p>
            <p><strong>Idade:</strong> <?= $idade ?> anos</p>
            <p><strong>Média:</strong> <?= number_format($media, 2, ",", ".") ?></p>
            <p><strong>Situação:</strong> <?= $situacao ?></p>
        </div>
    <?php endif; ?>


    </form>


</body>
</html>