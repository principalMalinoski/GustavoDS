
<?php

require_once "helpdesk-func.php";

$mensagem = "";

// Identifica a operação enviada pelo formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Cadastro de chamado
    if (isset($_POST["cadastrar"])) {
        $nome = $_POST["nome"] ?? "";
        $setor = $_POST["setor"] ?? "";
        $equipamento = $_POST["equipamento"] ?? "";
        $descricao = $_POST["descricao"] ?? "";
        $prioridade = $_POST["prioridade"] ?? "";

        if (cadastrarChamado(
            $nome,
            $setor,
            $equipamento,
            $descricao,
            $prioridade
        )) {
            $mensagem = "Chamado cadastrado com sucesso!";
        } else {
            $mensagem = "Erro: confira o nome, a descrição e os demais campos.";
        }
    }

    // Atualização de status
    elseif (isset($_POST["atualizar"])) {
        $posicao = filter_var(
            $_POST["posicao"] ?? null,
            FILTER_VALIDATE_INT
        );
        $status = $_POST["status"] ?? "";

        if (
            $posicao !== false &&
            $posicao !== null &&
            $posicao >= 0 &&
            atualizarChamado($posicao, $status)
        ) {
            $mensagem = "Status atualizado com sucesso!";
        } else {
            $mensagem = "Erro: chamado inexistente ou status inválido.";
        }
    }

    // Exclusão de chamado
    elseif (isset($_POST["excluir"])) {
        $posicao = filter_var(
            $_POST["posicao"] ?? null,
            FILTER_VALIDATE_INT
        );

        if (
            $posicao !== false &&
            $posicao !== null &&
            $posicao >= 0 &&
            excluirChamado($posicao)
        ) {
            $mensagem = "Chamado excluído com sucesso!";
        } else {
            $mensagem = "Erro: chamado inexistente.";
        }
    }
}

// Consulta os chamados e calcula o relatório
$chamados = consultarChamados();
$relatorio = contarChamados();

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
    <p>Chamados abertos: <?php echo $relatorio["abertos"]; ?></p>
    <p>Chamados em andamento: <?php echo $relatorio["andamento"]; ?></p>
    <p>Chamados resolvidos: <?php echo $relatorio["resolvidos"]; ?></p>

    <hr>

    <h2>Chamados registrados</h2>

    <?php if (count($chamados) == 0) { ?>

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
                <strong>Status atual:</strong>
                <?php echo htmlspecialchars($chamado["status"], ENT_QUOTES, "UTF-8"); ?>
            </p>

            <form method="POST">
                <input
                    type="hidden"
                    name="posicao"
                    value="<?php echo $posicao; ?>"
                >

                <label>Atualizar status:</label>

                <select name="status" required>
                    <option value="Aberto">Aberto</option>
                    <option value="Em andamento">Em andamento</option>
                    <option value="Resolvido">Resolvido</option>
                </select>

                <button type="submit" name="atualizar">
                    Atualizar
                </button>
            </form>

            <form method="POST">
                <input
                    type="hidden"
                    name="posicao"
                    value="<?php echo $posicao; ?>"
                >

                <button type="submit" name="excluir">
                    Excluir chamado
                </button>
            </form>

            <hr>

        <?php } ?>

    <?php } ?>

</body>
</html>
