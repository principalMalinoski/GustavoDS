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
<section id="sobre" class="secao">
        <h2 class="titulo-secao">Sobre mim</h2>
    <div class="sobre-conteudo">
            <div class="foto">
                JS
            </div>
        <div class="sobre-texto">
            <h3>Quem sou eu?</h3>
        <p>
            Meu nome é Gustavo e sou aluno do curso do Desenvolvimento de Sistemas
        </p>
        <p>
            Atualmente estou aprendendo aulas de desenvolvimento web, programação e criação de Sistemas
            Este portfólio reúne alguns dos projetos desenvolvidos durante o curso junto dos alunos.
        </p>
        <p>
            Meu objetivo é continuar evoluindo como desenvolvedor e aprender novas tecnologias.
        </p>
        </div>    
    </div>
</section>
        <section id="habilidades" class="secao secao-destaque">
            <h2 class="titulo-secao">Minhas habilidades</h2>
            <p class="substitulo-secao">
              Algumas tecnologias que estou aprendendo          
             </p>
             <div class="lista-habilidades">
                <div class="habilidade">
                    HTML
                </div>
            <div class="habilidade">
                    CSS
            </div>
            <div class="habilidade">
                    PHP
            </div>
        </div>
    </section>
    <section id="projetos" class="secao">
        <h2 class="titulo-secao">Meus projetos</h2>
        <p class="subtitulo-secao">
            Alguns projetos desenvolvidos durante o curso
        </p>
        <div class="projetos-container">
        <!-- PROJETO 1 -->
        <div class="projeto-idade">
                01
        </div>
        <h3>Verificação de idade</h3>
        <p>
            Sistema desenvolvido para praticar formulários e manipulação de dados.
        </p>
        <div class="tecnologias">
            <span>HTML</span>
            <span>CSS</span>
            <span>PHP</span>
        </div>
        <a href="projetos/idade.php" class="link-projeto">
            ver projeto ->
        </a>
    </div>
     <!-- PROJETO 2 -->
     <div class="projeto-login">
                02
        </div>
        <h3>Verificação de Login</h3>
        <p>
            Sistema desenvolvido para praticar formulários e manipulação de dados.
        </p>
        <div class="tecnologias">
            <span>HTML</span>
            <span>CSS</span>
            <span>PHP</span>
        </div>
        <a href="projetos/login.php" class="link-projeto">
            ver projeto ->
        </a>
    </div>
     <!-- PROJETO 3 -->
     <div class="projeto-jogos">
                03
        </div>
        <h3>Verificar os jogos</h3>
        <p>
            Sistema desenvolvido para praticar formulários e manipulação de dados.
        </p>
        <div class="tecnologias">
            <span>HTML</span>
            <span>CSS</span>
            <span>PHP</span>
        </div>
        <a href="projetos/jogos.php" class="link-projeto">
            ver projeto ->
        </a>
    </div>
     <!-- PROJETO 4 -->
     <div class="projeto-notas">
                04
        </div>
        <h3>Verificação de notas</h3>
        <p>
            Sistema desenvolvido para praticar formulários e manipulação de dados.
        </p>
        <div class="tecnologias">
            <span>HTML</span>
            <span>CSS</span>
            <span>PHP</span>
        </div>
        <a href="projetos/notas.php" class="link-projeto">
            ver projeto ->
        </a>
    </div>
    </section>
    <section id="contato" class="secao secao-destaque">
        <h2 class="titulo-secao">Contato</h2>
        <p class="substitulo-secao">
            Quer entar em contato comigo?
        </p>
        <div class="contato-container">
            <div class="contato-item">
                <h3>Whatsapp</h3>
                <p>+55 41 99232-3500</p>
            </div>
            <div class="contato-item">
                <h3>GitHub</h3>
                <p>github.com/lookdev-GustavoDS</p>
            </div>
            <div class="contato-item">
                <h3>Linkedin</h3>
                <p>linkedin.com/in/GustavoDS</p>
            </div>
        </div>
    </section>
</main>
    <!-- =============================
        RODAPÉ
        ==================== -->
    <footer>
    <p>
        Desenvolvido por <a href="https://gustavo315">Gustavo Malinoski</a> * 2026
    </p>
    </footer>
</body>
</html>