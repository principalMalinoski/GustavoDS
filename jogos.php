<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jogos</title>
</head>

<body>
<h2> NOMES DOS JOGOS</h2>

<form method="POST">

    <div>
        <label for="nome">King Kong:</label>
        <input 
            type="text" 
            id="nome" 
            name="nome" 
            placeholder="Digite seu nome"
        >

        <label for="genêro">Genêro:</label>
        <input 
            type="text" 
            id="genêro" 
            name="genêro"  
            placeholder="Digite seu genêro"
        >
        <label for="Nota">nota:</label>
        <input 
            type="text" 
            id="nota" 
            name="nota"  
            placeholder="Digite sua nota"
        >
        <label for="nome">Fifa 2023:</label>
        <input 
            type="text" 
            id="nome" 
            name="nome" 
            placeholder="Digite seu nome"
        >

        <label for="genêro">Genêro:</label>
        <input 
            type="text" 
            id="genêro" 
            name="genêro"  
            placeholder="Digite seu genêro"
        >
        <label for="Nota">nota:</label>
        <input 
            type="text" 
            id="nota" 
            name="nota"  
            placeholder="Digite sua nota">


        <label for="nome">Make a pizza</label>
        <input 
            type="text" 
            id="nome" 
            name="nome" 
            placeholder="Digite seu nome"
        >

        <label for="genêro">Genêro:</label>
        <input 
            type="text" 
            id="genêro" 
            name="genêro"  
            placeholder="Digite seu genêro"
        >
        <label for="Nota">nota:</label>
        <input 
            type="text" 
            id="nota" 
            name="nota"  
            placeholder="Digite sua nota">

        <button>Cadastrar</button>
        </div>
</form>

</body>
</html>

<?php 

try {
    $pdo = new PDO("mysql:host=$servidor;dbname=$banco;charset=utf8", $usuario, $senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$host = "localhost";
$banco = "gustavo315";
$usuario = "gustavo315";
$senha = "315!@#";
  
 echo "Meu sistema está Conectado";

 $sql = "CREATE TABLE IF NOT EXISTS teste (
 id INT AUTO_INCREMENT PRIMARY KEY,
 nome VARCHAR(100),
 genêro VARCHAR(50),
 nota INT)";

 $pdo->exec($sql);
 echo  "<br>Tabela criada com sucesso";
 
$nome = $_POST["nome"];
echo "Olá, " . htmlspecialchars($nome) . "!";

INSERT INTO clientes (nome , gênero, nota) 
VALUES ('King Kong', 'Aventura', '1993-06-01');


INSERT INTO clientes (nome , gênero, nota) 
VALUES ('King Kong', 'esportivo', '1993-06-01');

}
?>




