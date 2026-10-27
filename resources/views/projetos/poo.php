<?php
// POO = PROGRAMAÇÃO ORIENTADA A OBJETOS
//Exemplo SEM POO
$nome = "Gustavo";
$vida = 100;

function atacar($nome) {
    echo "$nome realizou um ataque!";
}

atacar($nome);

//ENCAPSULAMENTO
//Proteger informações para que não sejam alteradas de qualquer jeito
//HERANÇA
//Criar uma classe nova aproveitando caracteristicas de outra
//POLIMORFISMO
//Permitir que objetos diferentes respondam a mesma ação de maneiras diferentes
//ABSTRAÇÃO
//Mostrar o que é necessárioe esconnder detalhes complicados de funcionamento



//Exemplo COM POO
class Personagem {
    public $nome;
    public $vida = 100;
    public $dano = 10;

    public function __construct($nome, $vida, $dano) {
        $this->nome = $nome;
        $this->vida = $vida;
        $this->dano = $dano;
    }
    
        
    public function atacar() {
        echo "$this->nome realizou um ataque";
    }
}

$Gustavo = new Personagem("Gustavo", 100, 10);
$personagem->nome = "Gustavo";
$personagem->atacar();

$Andre = new Personagem("Andre", 100, 10);
$personagem2->nome = "Gustavo";

?>