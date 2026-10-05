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
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <a href="projetos/idade.php">Verificador de idade</a>
    <a href="projetos/notas.php">Verificador de Notas</a>
    <a href="projetos/login.php">Login básico</a>
    <a href="projetos/jogos.php">Jogos cadastrados</a>
</body>
<body>
    <header>
        <nav class="navbar">

        <h2 class="logo">Meu Portifólio</h2>

        <ul class="menu">
            <li><a href="#inicio">Inicio</a></li>
            <li><a href="#sobre">Sobre</a></li>
            <li><a href="#habilidades">Habilidades</a></li>
            <li><a href="#projetos">Projetos</a></li>
            <li><a href="#contato"></a>Contato</li>
        </ul>

        </nav>

    </header>   
</body>
    <main>
<!--=======================
        INÍCIO
        ================-->

    <section id="inicio">
         <div class="inicio-conteudo">

            <p class="saudacao">Olá! Eu sou</p>

            <h1>Gustavo</h1>

            <h2>Aluno do Senai</h2>

            <p>
                Aluno cursando o terceiro ano do ensino médio 
                e terminando o curso do SENAI
            </p>

            <a href="#projetos" class="botao">
                Ver meus projetos
            </a>

            </div>

    </section>
<!--===========================
        SOBRE MIM
    =================-->



    </main>
    
</body>
</html>