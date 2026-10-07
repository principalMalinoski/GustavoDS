<?php
// 1. declarar o caminho do arquivo json
$caminho = __DIR__ . "/dados.json";

// 2. Abrir ler o arquivo json
$json = file_get_contents($caminho);

//3. transformar JSON em Array PHP
$alunos = json_decode($json, true);

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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>