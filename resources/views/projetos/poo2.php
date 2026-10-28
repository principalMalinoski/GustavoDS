<?php
//////////////////////////////////////////////
// SISTEMA DE CONTROLE DE PRODUÇÃO INDUSTRIAL//
///////////////////////////////////////////////

// 1. CLASSE ABSTRATA
abstract class Maquina {
    public $nome;
    private $producao;

    public function __construct($nome)
    {
        $this->nome = $nome;
        $this->producao = 0;
        
    }

    // ENCAPSULAMENTO - GETTER
    public function getProducao() {
        return $this->producao;
    }

    //ENCAPSULAMENTO - ALTERAÇÃO CONTROLADA
    public function registrarproducao($quantidade) {
        if ($quantidade <= 0) {
            return false;
        }

        $this->producao += $quantidade;
        return true;
    }

// ABSTRAÇÃO
abstract public function operar();

}


//2. HERANÇA
class Esteira extends Maquina {
    public function operar() {
        return "Transportando peças..." ;      
    }
}

class Prensa extends Maquina {
    public function operar() {
    return "Prensando peças...";
    }
}

class RoboSoldagem extends Maquina {
    public function operar() {
        return "Soldando peças...";
    }


}

// 3. SESSÃO = ARMAZENAMENTO TEMPORÁRIO

if (isset($_SESSION["maquinas"])) {
    $_SESSION["maquinas"] = [];
}

$mensagem = "";

// 4. RECEBER FORMULÁRIO VIA POST

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST["nome"] ?? "";
    $tipo = $_POST["tipo"] ?? "";
    $quantidade = $_POST["quantidade"] ?? null;

if (
    $nome === "" ||
    $quantidade === false ||
    $quantidade <= 0
) {
    $mensagem = "Preencha os campos corretamente";
} else {
// CRIANDO OBJETOS COM BASE NO FORMULÁRIO
if ($tipo === "esteira") {
    $maquina = new Esteira($nome);
} elseif ($tipo === "prensa") {
    $maquina = new Prensa($nome);
} elseif ($tipo === "roboSoldagem") {
    $maquina = new RoboSoldagem($nome); 
}
 
// EXECUTANDO OS MÉTODOS DO OBJETO
$maquina->registrarProducao($quantidade);

// GUARDANDO O OBJETO NA SESSÃO 
$_SESSION["maquinas"] [] = $maquina;

$mensagem = "Máquina cadastrada com sucesso!";

    }

}

// EVITAR INTERPRETAR TEXTOS COMO HTML
function escapar($texto) {
    return htmlspecialchars(
        (string) $texto,
        ENT_QUOTES,
        "UTF-8");
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISTEMA DE CONTROLE DE PRODUÇÃO INDUSTRIAL</title>
    <style>
        span {
            display: inline-block;
            padding: 10px;
            margin: 5px;
            background-color: lightblue;
            border: 1px solid steelblue;
            border-radius: 5px;
        }
        h1 {
            color: blue;
        }
        h2 {
            color: MediumBlue;
        }

    </style>
</head>
<body>
<div class="Esteira">
        <h1>ESTEIRA</h1>
        <h2>Funçaõ: Transportar peças</h2>
        <br>
        <b>É um sistema mecânico contínuo usado para mover matérias-primas de um ponto a outro dentro de fábricas, armazéns e centros de logística.</b>
        <div class="tipos de Esteira">
        <br>
            <h3>TIPOS DE ESTEIRA</h3>
            <span>Esteira metálica</span>
            <span>Esteira de corrente</span>
            <span>Esteira modular plástica</span>
        </div>
<div class="Prensa">
        <h1>PRENSA</h1>
        <h2>Funçaõ: Prensar peças</h2>
        <br>
        <b>Aplicar e controlar uma força intensa e precisa para cortar, dobrar, estampar, moldar, compactar ou montar peças.</b>
        <div class="tipos de Esteira">
        <br>
            <h3>TIPOS DE PRENSA</h3>
            <span>Prensa Mecânica</span>
            <span>Prensa Excêntrica</span>
            <span>Prensa Hidráulica</span>
        </div>
<div class="roboSoldagem">
        <h1>ROBO DE SOLDAGEM</h1>
        <h2>Funçaõ: Soldar peças</h2>
        <br>
        <b>Automatizar o processo de união de peças metálicas em linhas de produção em massa</b>
        <div class="tipos de Solda">
        <br>
            <h3>TIPOS DE ROBO SOLDA</h3>
            <span>Robôs Articulados (6 eixos)</span>
            <span>Robôs Colaborativos (Cobots)</span>
            <span>Robôs SCARA</span>
        </div>
</body>
</html>

















