
<?php

// Lê os chamados armazenados no arquivo JSON
function consultarChamados() {
    $arquivo = "chamados.json";

    if (!file_exists($arquivo)) {
        file_put_contents($arquivo, "[]");
    }

    $dados = file_get_contents($arquivo);
    $chamados = json_decode($dados, true);

    if (!is_array($chamados)) {
        return [];
    }

    return $chamados;
}

// Salva os chamados no arquivo JSON
function salvarChamados($chamados) {
    $json = json_encode(
        $chamados,
        JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
    );

    return file_put_contents("chamados.json", $json) !== false;
}

// Cadastra um novo chamado
function cadastrarChamado($nome, $setor, $equipamento, $descricao, $prioridade) {
    if (trim($nome) == "" || trim($descricao) == "") {
        return false;
    }

    $setores = [
        "Produção", "Administrativo", "Logística",
        "Financeiro", "TI"
    ];

    $equipamentos = [
        "Computador", "Impressora", "Rede", "Sistema", "Outro"
    ];

    $prioridades = ["Baixa", "Média", "Alta"];

    if (
        !in_array($setor, $setores, true) ||
        !in_array($equipamento, $equipamentos, true) ||
        !in_array($prioridade, $prioridades, true)
    ) {
        return false;
    }

    $chamados = consultarChamados();

    $novoChamado = [
        "nome" => trim($nome),
        "setor" => $setor,
        "equipamento" => $equipamento,
        "descricao" => trim($descricao),
        "prioridade" => $prioridade,
        "status" => "Aberto"
    ];

    $chamados[] = $novoChamado;

    return salvarChamados($chamados);
}

// Atualiza o status de um chamado
function atualizarChamado($posicao, $novoStatus) {
    $statusValidos = [
        "Aberto", "Em andamento", "Resolvido"
    ];

    $chamados = consultarChamados();

    if (
        !isset($chamados[$posicao]) ||
        !in_array($novoStatus, $statusValidos, true)
    ) {
        return false;
    }

    $chamados[$posicao]["status"] = $novoStatus;

    return salvarChamados($chamados);
}

// Exclui um chamado
function excluirChamado($posicao) {
    $chamados = consultarChamados();

    if (!isset($chamados[$posicao])) {
        return false;
    }

    unset($chamados[$posicao]);

    // Reorganiza os índices do array
    $chamados = array_values($chamados);

    return salvarChamados($chamados);
}

// Gera o relatório dos chamados
function contarChamados() {
    $chamados = consultarChamados();

    $relatorio = [
        "total" => count($chamados),
        "abertos" => 0,
        "andamento" => 0,
        "resolvidos" => 0
    ];

    foreach ($chamados as $chamado) {
        if ($chamado["status"] == "Aberto") {
            $relatorio["abertos"]++;
        } elseif ($chamado["status"] == "Em andamento") {
            $relatorio["andamento"]++;
        } elseif ($chamado["status"] == "Resolvido") {
            $relatorio["resolvidos"]++;
        }
    }

    return $relatorio;
}
