<?php

require "conexao.php";

// Criar tabela
$sql = "CREATE TABLE IF NOT EXISTS jogos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100),
    genero VARCHAR(50),
    nota INT
)";

$pdo->exec($sql);

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST["nome"];
    $genero = $_POST["genero"];
    $nota = $_POST["nota"];

    // Cadastrar jogo
    $sql = "INSERT INTO jogos (nome, genero, nota)
            VALUES ('$nome', '$genero', '$nota')";

    $pdo->exec($sql);

    echo "Jogo cadastrado com sucesso!";
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Jogos</title>
</head>

<body>

    <h2>Cadastro de Jogos</h2>

    <form method="POST">

        <div>
            <label for="nome">Nome do jogo:</label>
            <input
                type="text"
                id="nome"
                name="nome"
                placeholder="Digite o nome do jogo"
                required
            >
        </div>

        <br>

        <div>
            <label for="genero">Gênero:</label>
            <input
                type="text"
                id="genero"
                name="genero"
                placeholder="Digite o gênero"
                required
            >
        </div>

        <br>

        <div>
            <label for="nota">Nota:</label>
            <input
                type="number"
                id="nota"
                name="nota"
                placeholder="Digite a nota"
                required
            >
        </div>

        <br>

        <button type="submit">Cadastrar</button>

    </form>

</body>

</html>