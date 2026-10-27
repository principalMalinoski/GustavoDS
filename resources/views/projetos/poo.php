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
    private $vida = 100;
    public $dano = 10;

    public function __construct($nome, $vida, $dano) {
        $this->nome = $nome;
        $this->vida = $vida;
        $this->dano = $dano;
    }
    
    //GETTER
    public function getVida(){
        return $this->vida;
    }

    //SETTER
    public function setVida($vida) {
        if ($vida < 0) {
            echo "a vida não pode ser negativa!\n";
            
            return;

        }
        $this->vida = $vida;
    }
        
    public function atacar() {
        echo "$this->nome realizou um ataque";
    }
}
$Gustavo->setVida(50);

$Gustavo = new Personagem("Gustavo", 100, 10);
$personagem->nome = "Gustavo";
$personagem->atacar();

$Andre = new Personagem("Andre", 100, 10);
$personagem2->nome = "Gustavo";

$Gustavo->atacar(); // método herdado

class Guerreiro extends Personagem {
    public function atacar()
    {
        echo "$this->nome atacou com uma espada!";
    }


    public function defender() {
        echo "$this->nome levantou o escudo!";
    }
}

$Guerreiro = new Guerreiro("Gustavo", 100, 10);

$Guerreiro->atacar(); //Método Herdado 
$Guerreiro->defender(); //Método Próprio

class Mago extends Personagem {
    public function atacar(){
        echo "$this->nome lançou uma bola de fogo!\n";
    }
    public function lancaMagia(){
        echo "$this->nome lançou uma bola de fogo!\n";
    }
}

$Guerreiro = new Guerreiro("Gustavo", 100, 10);
$mago = new Mago("Aurora", 50, 10);
$personagem = new Personagem("Charles", 30, 3);

$personagens = [$guerreiros, $mago, $personagem];

foreach($personagens as $p) {
    $p->atacar();

}
 
// https:look.devlook.xyz/resources/views/projetos/pop.php

//1. O que é uma classe?
//Um molde para criar objetos

//2. O que significa new Personagem()
//Criar um objeto da classe Personagem

//3. Para que serve $this->nome?
//Acessar o nome do objeto atual

//4. O que significa extends?
//Herdar características e métodos de outra classe




?>

