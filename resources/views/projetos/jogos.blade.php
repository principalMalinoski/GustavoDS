<?php
echo "debug 1";
require __DIR__ . "/../conexao.php";
echo "debug 1.5";

// Cria a tabela
$sql = "CREATE TABLE IF NOT EXISTS jogos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100),
    genero VARCHAR(50),
    nota INT
)";
    $senhac ="1909";

$pdo->exec($sql);
echo "debug 2";

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "debug 3";

    $nome = $_POST["nome"];
    $genero = $_POST["genero"];
    $nota = $_POST["nota"];
    $senha = $_POST["senha"];

    // Cadastrar jogo / INSERT INTO = INSERIR DENTRO
    if($_POST["senha"]==$senhac){

    $sql = "INSERT INTO jogos (nome, genero, nota) VALUES ('$nome', '$genero', $nota)";
    } else {
        echo "Senha Incorreta";
    }

    $pdo->exec($sql);
    echo "debug 4";

    echo "<p>Jogo cadastrado com sucesso!</p>";
}

// Buscar todos os jogos registrados no banco de dados
$buscar = "SELECT * FROM jogos";

// exec() = executa algo quando você NÃO precisa receber registros de volta
// query() = executa uma consulta quando você QUER receber dados de volta
$stat = $pdo->query($buscar);
echo "debug 5";

// fetchAll = buscar todos os registros
$jogos = $stat->fetchAll(PDO::FETCH_ASSOC);
echo "debug 6";

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Jogos</title>
</head>

<body>

    <h2>Jogos cadastrados</h2>

    <form method="POST">

        <div>
            <label for="nome">Nome do jogo:</label>
            <input
                type="text"
                id="nome"
                name="nome"
                placeholder="Digite o nome do jogo"
                required>
        </div>

        <br>

        <div>
            <label for="genero">Gênero:</label>
            <input
                type="text"
                id="genero"
                name="genero"
                placeholder="Digite o gênero"
                required>
        </div>

        <br>

        <div>
            <label for="nota">Nota:</label>
            <input
                type="number"
                id="nota"
                name="nota"
                min="0"
                max="10"
                placeholder="Digite a nota"
                required>
        </div>

        <br>

        <div>
            <label for="senha">Senha:</label>
            <input
                type="password"
                id="senha"
                name="senha"
                placeholder="Digite sua senha"
                required>
        </div>

        <br>

        <button type="submit">Cadastrar</button>

    </form>


    <h2>Jogos cadastrados</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>NOME</th>
            <th>GÊNERO</th>
            <th>NOTA</th>

        </tr>
        <!-- foreach() -> Para cada item da lista, faça alguma coisa com X fariável -->

        <?php foreach ($jogos as $jogo) { ?>
            <tr>
                <td><?= $jogo["id"] ?></td>
                <td><?= $jogo["nome"] ?></td>
                <td><?= $jogo["gênero"] ?></td>
                <td><?= $jogo["nota"] ?></td>
            <tr>
            <?php }  

            ?>
    </table>

</body>

</html>