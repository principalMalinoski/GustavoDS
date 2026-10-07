<?php
// 1. declarar o caminho do arquivo json
$caminho = __DIR__ . "/dados.json";

// 2. Abrir ler o arquivo json
$json = file_get_contents($caminho);

//3. transformar JSON em Array PHP
$alunos = json_decode($json, true);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$acao = $_POST["acao"];

if ($acao === "cadastrar") {
// 4. Criar um aluno

$novoAluno = [
    "nome" => $_POST["nome"],
    "idade" => $_POST["idade"],
    "curso" => $_POST["curso"],
];

// 5. Adicionar o aluno array
$alunos[]= $novoAluno;


if ($acao === "atualizar") {

 //PEGAR OS DADOS DO FORMULÁRIO
 $nome = $_POST["nome"];
 $idade = $_POST["idade"];
 $novoCurso = $_POST["curso"];


 //PERCORRER TODOS OS ALUNOS
 foreach($alunos as $posicao => $aluno) {
        if($aluno["nome"] == $nome) {
            $alunos[$posicao]["idade"] =$novaIdade;
            $alunos[$posicao]["curso"] =$novoCurso;

        }


}

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
    <form method="POST">
        
        <div>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" placeholder="Digite seu nome completo" required>
        </div>

        <br>

        <div>
            <label for="idade">Idade:</label>
            <input type="number" id="idade" name="idade" placeholder="Ex: 20" min="0" required>
        </div>

        <br>

        <div>
            <label for="curso">Curso:</label>
            <input type="text" id="curso" name="curso" placeholder="Digite o nome do curso" required>
        </div>

        <br>

        <button type="submit">Enviar Dados</button>

</form>

 <form method="POST">
        
        <div>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" placeholder="Digite seu nome completo" required>
        </div>

        <br>

        <div>
            <label for="idade">Idade:</label>
            <input type="number" id="idade" name="idade" placeholder="Ex: 20" min="0" required>
        </div>

        <br>

        <div>
            <label for="curso">Curso:</label>
            <input type="text" id="curso" name="curso" placeholder="Digite o nome do curso" required>
        </div>

        <br>

        <button type="submit" name="action" value="atualizar">Atualizar</button>

</form>


<h2>ALUNOS CADASTRADOS</h2>
<?php foreach($alunos as $aluno) { ?>
<h3><?=  $aluno["nome"] ?></h3>
<p>Idade: <?=  $aluno["idade"] ?></p>
<p>Curso <?=  $aluno["curso"] ?></p>

<?php } ?>

</body>
</html>