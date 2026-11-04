
<?php

class Chamado {

    // Consultar todos os chamados
    public function consultarChamados() {
        $arquivo = __DIR__ . "/chamados.json";

        if (!file_exists($arquivo)) {
            file_put_contents($arquivo, "[]", LOCK_EX);
        }

        $dados = file_get_contents($arquivo);
        $chamados = json_decode($dados, true);

        return is_array($chamados) ? $chamados : [];
    }

    // Salvar os chamados no arquivo JSON
    public function salvarChamados($chamados) {
        $arquivo = __DIR__ . "/chamados.json";

        $dados = json_encode(
            array_values($chamados),
            JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
        );

        if ($dados === false) {
            return false;
        }

        return file_put_contents($arquivo, $dados, LOCK_EX) !== false;
    }

    // Cadastrar um chamado
    public function cadastrarChamado(
        $nome,
        $setor,
        $equipamento,
        $descricao,
        $prioridade
    ) {
        if (trim($nome) === "" || trim($descricao) === "") {
            return false;
        }

        $chamados = $this->consultarChamados();

        $chamados[] = [
            "nome" => trim($nome),
            "setor" => $setor,
            "equipamento" => $equipamento,
            "descricao" => trim($descricao),
            "prioridade" => $prioridade,
            "status" => "Aberto"
        ];

        return $this->salvarChamados($chamados);
    }

    // Atualizar o status de um chamado
    public function atualizarChamado($posicao, $status) {
        $statusValidos = [
            "Aberto",
            "Em andamento",
            "Resolvido"
        ];

        $chamados = $this->consultarChamados();

        if (
            !isset($chamados[$posicao]) ||
            !in_array($status, $statusValidos, true)
        ) {
            return false;
        }

        $chamados[$posicao]["status"] = $status;

        return $this->salvarChamados($chamados);
    }

    // Excluir um chamado
    public function excluirChamado($posicao) {
        $chamados = $this->consultarChamados();

        if (!isset($chamados[$posicao])) {
            return false;
        }

        unset($chamados[$posicao]);

        $chamados = array_values($chamados);

        return $this->salvarChamados($chamados);
    }

    // Gerar relatório dos chamados
    public function contarChamados() {
        $chamados = $this->consultarChamados();

        $relatorio = [
            "total" => count($chamados),
            "abertos" => 0,
            "andamento" => 0,
            "resolvidos" => 0
        ];

        foreach ($chamados as $chamado) {
            if ($chamado["status"] === "Aberto") {
                $relatorio["abertos"]++;
            } elseif ($chamado["status"] === "Em andamento") {
                $relatorio["andamento"]++;
            } elseif ($chamado["status"] === "Resolvido") {
                $relatorio["resolvidos"]++;
            }
        }

        return $relatorio;
    }
}

// ======================================
// PROCESSAMENTO DO SISTEMA
// ======================================

$chamado = new Chamado();
$mensagem = "";

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // CADASTRAR
    if (isset($_POST["cadastrar"])) {

        $nome = $_POST["nome"] ?? "";
        $setor = $_POST["setor"] ?? "";
        $equipamento = $_POST["equipamento"] ?? "";
        $descricao = $_POST["descricao"] ?? "";
        $prioridade = $_POST["prioridade"] ?? "";

        $setoresValidos = [
            "Produção",
            "Administrativo",
            "Logística",
            "Financeiro",
            "TI"
        ];

        $equipamentosValidos = [
            "Computador",
            "Impressora",
            "Rede",
            "Sistema",
            "Outro"
        ];

        $prioridadesValidas = [
            "Baixa",
            "Média",
            "Alta"
        ];

        if (
            !in_array($setor, $setoresValidos, true) ||
            !in_array($equipamento, $equipamentosValidos, true) ||
            !in_array($prioridade, $prioridadesValidas, true)
        ) {
            $mensagem = "Erro: selecione opções válidas.";

        } elseif (
            $chamado->cadastrarChamado(
                $nome,
                $setor,
                $equipamento,
                $descricao,
                $prioridade
            )
        ) {
            $mensagem = "Chamado cadastrado com sucesso!";

        } else {
            $mensagem = "Erro: informe o nome e a descrição do problema.";
        }
    }

    // ATUALIZAR STATUS
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
            $chamado->atualizarChamado($posicao, $status)
        ) {
            $mensagem = "Status atualizado com sucesso!";
        } else {
            $mensagem = "Erro: chamado inexistente ou status inválido.";
        }
    }

    // EXCLUIR CHAMADO
    elseif (isset($_POST["excluir"])) {

        $posicao = filter_var(
            $_POST["posicao"] ?? null,
            FILTER_VALIDATE_INT
        );

        if (
            $posicao !== false &&
            $posicao !== null &&
            $posicao >= 0 &&
            $chamado->excluirChamado($posicao)
        ) {
            $mensagem = "Chamado excluído com sucesso!";
        } else {
            $mensagem = "Erro: chamado inexistente.";
        }
    }
}

// Consultar chamados e gerar relatório
$chamados = $chamado->consultarChamados();
$relatorio = $chamado->contarChamados();

?>
