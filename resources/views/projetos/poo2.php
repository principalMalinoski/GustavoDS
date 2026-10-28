<?php
//////////////////////////////////////////////
// SISTEMA DE CONTROLE DE PRODUÇÃO INDUSTRIAL//
///////////////////////////////////////////////

// 1. CLASSE ABSTRATA
abstract class Maquina {
    public $nome;
    private $produção;



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

class RodoSoldagem extends Maquina {
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
} elseif ($tipo === "rodoSoldagem") {
    $maquina = new RodoSoldagem($nome); 
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
</head>
<body>
<div class="Esteira">
        <h2 id="esteira">Esteira</h2>
         <h3>Funçaõ: Transportar peças</h3>
         <input type="text" id="esteira" name="esteira" required>
        <form action="" method="POST"></form>

        <div class="Prensa">
            <label for="esteira">Prensa</label>
            <input type="text" id="prensa" name="Prensa" required>
            <h3>Função: Prensar peças</h3>
        </div>

        <div class="rodoSoldagem">
                <label for="rodoSoldagem">Rodo de Soldage:</label>
                <h3>Função: Soldar peças</h3>
                <input type="text" id="rodoSoldagem" name="rodoSoldagem" required>
            </div>
            <button type="submit">Entrar</button>
        </form>
</body>
</html>

















?>