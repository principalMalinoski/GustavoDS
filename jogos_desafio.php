<?php

require "conexao.php";


$sql = "CREATE TABLE IF NOT EXISTS jogos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100),
    genero VARCHAR(50),
    nota INT
    ano de lancamento VARCHAR(50),
)";

$pdo->exec($sql);


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST["nome"];
    $genero = $_POST["genero"];
    $nota = $_POST["nota"];
    $ano_de_lancamento = $_POST["ano_de_lancamento"];

    
    $sql = "INSERT INTO jogos (nome, genero, nota,)
            VALUES ('$nome', '$genero', '$nota', '$ano_de_lancamento')";

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

        <div>
            <label for="ano_de_lancamento">Ano de Lançamento:</label>
            <input
                type="text"
                id="ano_de_lancamento"
                name="ano_de_lancamento"
                placeholder="Digite o Ano de Lançamento"
                required
            >
        </div>

        <button type="submit">Cadastrar</button>

    </form>

</body>

</html>