<?php

//Exemplo SEM POO
$nome = "Gustavo";
$vida = 100;

function atacar($nome) {
    echo "$nome realizou um ataque!";
}

atacar($nome);

//Exemplo COM POO
class Personagem {
    public $nome;
    public $vida = 100;

    public function atacar() {
        echo "$this->nome realizpu um ataque";
    }
}

$personagem = new Personagem();
$personagem->nome = "Lucas";
$personagem->atacar();



?>