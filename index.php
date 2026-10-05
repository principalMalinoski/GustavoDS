<?php   
    require "conexao.php";

    echo "Meu sistema está Conectado";

    $sql = "CREATE TABLE IF NOT EXISTS teste (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    idade INT)";

    $pdo->exec($sql);
    echo  "<br>Tabela criada com sucesso";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="projetos/idade.php">Verificador de idade</a>
    <a href="projetos/notas.php">Verificador de Notas</a>
    <a href="projetos/login.php">Login básico</a>
    <a href="projetos/jogos.php">Jogos cadastrados</a>
</body>
</html>