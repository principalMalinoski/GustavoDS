<?php 

// dados para conectar o mySQL
$host = "localhost";
$banco = "gustavo315";
$usuario = "gustavo315";
$senha = "315!@#";


//PDO - php data objects - ferramenta do php para conversar com o banco de dados
try {

// -> Serve para puxar algo que pertence aquele objeto
// PDO::ATTR_ERRMODE é para configurar o modo de erros do PDO
// PDO:ERRMODE_EXPECTION é para quando acontecer algum erro, transformar em execução

    $pdo = new PDO("mysql:host=$host;dbnane:$banco;charsert=utf8mb4",$usuario, $senha);
    $pdo->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

    echo"Conectado com Sucesso";

} catch (PDOException $erro) {
    echo "Erro ao Conectar:",$erro->getMessage();
}