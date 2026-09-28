<?php
$usuarioCorreto = "admin";
$senhaCorreta = "12345";

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    if ($usuario == $usuarioCorreto && $senha == $senhaCorreta) {
        $mensagem = "Login realizado com sucesso"
    } else {
        $mensagem = "Usuario ou senha incorretos";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="login">
        <h2 id="titulo">Login</h2>

        <form action="" method="post"></form>

        <div class="campo">
            <label for="usuario">Usuario</label>
            <input type="text" id="usuario" name="usuario" required>
        </div>

        <div class="campo">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>
            </div>
            
    </div>
</body>
</html>