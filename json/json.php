<?php
// 1. declarar o caminho do arquivo json
$caminho = __DIR__ . "/dados.json";

// 2. Abrir ler o arquivo json
$json = file_get_contents($caminho);

//3. transformar JSON em Array PHP
$alunos = json_decode($json, true);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
// 4. Criar um aluno

$novoAluno = [
    "nome" => "Gustavo",
    "idade" => 23,
    "curso" => "Desenvolvimento de Sistemas"
];

// 5. Adicionar o aluno array
$alunos[]= $novoAluno;

// 6. Transformar a array php em Json
$jsonAtualizado  = json_encode($alunos,
    JSON_PRETTY_PRINT  |
    JSON_UNESCAPED_UNICODE
);

// 7. Salvar no arquivo
    file_put_contents($caminho,
$jsonAtualizado);

echo "DADOS REGISTRADOS EM dados.json";
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>json</title>
</head>
<body>
    <div class="Formulário">
        <h2 id="titulo">Formulário</h2>
    <form action="" method="POST"></form>

            <div class="nome">
                <label for="nome"> Nome:</label>
                <input type="text" id="name" name="nome" required>

            </div class="idade">
            <label for="idade">Idade</label>
            <input type="number" id="idade" name="idade" required>

            <div class="curso">
            <label for="curso">Curso</label>
            <input type="text" id="curso" name="curso" required>
            </div>
</body>
</html>