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

//////////Exemplo COM POO////////////
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

$Gustavo->atacar(); // método herdado

class Guerreiro extends Personagem {
    public function defender() {
        echo "$this->nome levantou o escudo!";
    }
}

$Guerreiro = new Guerreiro("Gustavo", 100, 10);

$Guerreiro->atacar(); //Método Herdado 
$Guerreiro->defender(); //Método Próprio

//1. O que é uma classe?
//Um molde para criar objetos

//2. O que significa new Personagem()
//Criar um objeto da classe Personagem

//3. Para que serve $this->nome?
//Acessar o nome do objeto atual

//4. O que significa extends?
//Herdar características e métodos de outra classe




?>

