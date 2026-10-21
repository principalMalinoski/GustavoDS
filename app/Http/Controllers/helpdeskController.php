
<?php

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Sistema Help Desk</title>
</head>
<body>

<h1>Sistema de Gerenciamento de Chamados</h1>

<p>
    <?php echo htmlspecialchars($mensagem, ENT_QUOTES, "UTF-8"); ?>
</p>

<h2>Abrir novo chamado</h2>

<form method="POST">
    <label>Nome do funcionário:</label><br>
    <input type="text" name="nome" required><br><br>

    <label>Setor:</label><br>
    <select name="setor" required>
        <option value="Produção">Produção</option>
        <option value="Administrativo">Administrativo</option>
        <option value="Logística">Logística</option>
        <option value="Financeiro">Financeiro</option>
        <option value="TI">TI</option>
    </select><br><br>

    <label>Equipamento afetado:</label><br>
    <select name="equipamento" required>
        <option value="Computador">Computador</option>
        <option value="Impressora">Impressora</option>
        <option value="Rede">Rede</option>
        <option value="Sistema">Sistema</option>
        <option value="Outro">Outro</option>
    </select><br><br>

    <label>Descrição do problema:</label><br>
    <textarea name="descricao" required></textarea><br><br>

    <label>Prioridade:</label><br>
    <select name="prioridade" required>
        <option value="Baixa">Baixa</option>
        <option value="Média">Média</option>
        <option value="Alta">Alta</option>
    </select><br><br>

    <button type="submit" name="cadastrar">
        Cadastrar chamado
    </button>
</form>

<hr>

<h2>Relatório de atendimentos</h2>

<p>Total de chamados: <?php echo $relatorio["total"]; ?></p>
<p>Abertos: <?php echo $relatorio["abertos"]; ?></p>
<p>Em andamento: <?php echo $relatorio["andamento"]; ?></p>
<p>Resolvidos: <?php echo $relatorio["resolvidos"]; ?></p>

<hr>

<h2>Lista de chamados</h2>

<?php if (empty($chamados)) { ?>

    <p>Nenhum chamado cadastrado.</p>

<?php } else { ?>

    <?php foreach ($chamados as $posicao => $chamado) { ?>

        <h3>Chamado Nº <?php echo $posicao + 1; ?></h3>

        <p>
            <strong>Solicitante:</strong>
            <?php echo htmlspecialchars($chamado["nome"], ENT_QUOTES, "UTF-8"); ?>
        </p>

        <p>
            <strong>Setor:</strong>
            <?php echo htmlspecialchars($chamado["setor"], ENT_QUOTES, "UTF-8"); ?>
        </p>

        <p>
            <strong>Equipamento:</strong>
            <?php echo htmlspecialchars($chamado["equipamento"], ENT_QUOTES, "UTF-8"); ?>
        </p>

        <p>
            <strong>Descrição:</strong>
            <?php echo nl2br(htmlspecialchars($chamado["descricao"], ENT_QUOTES, "UTF-8")); ?>
        </p>

        <p>
            <strong>Prioridade:</strong>
            <?php echo htmlspecialchars($chamado["prioridade"], ENT_QUOTES, "UTF-8"); ?>
        </p>

        <p>
            <strong>Status:</strong>
            <?php echo htmlspecialchars($chamado["status"], ENT_QUOTES, "UTF-8"); ?>
        </p>

        <form method="POST">
            <input type="hidden" name="posicao"
                   value="<?php echo $posicao; ?>">

            <label>Novo status:</label>

            <select name="status" required>
                <option value="Aberto">Aberto</option>
                <option value="Em andamento">Em andamento</option>
                <option value="Resolvido">Resolvido</option>
            </select>

            <button type="submit" name="atualizar">
                Atualizar status
            </button>
        </form>

        <form method="POST">
            <input type="hidden" name="posicao"
                   value="<?php echo $posicao; ?>">

            <button type="submit" name="excluir">
                Excluir chamado
            </button>
        </form>

        <hr>

    <?php } ?>

<?php } ?>

</body>
</html>
