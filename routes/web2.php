<?php

require __DIR__ . '/../app/Http/Controllers/PortfolioController.php';
require __DIR__ . '/../app/Http/Controllers/JogosController.php';
require __DIR__ . '/../app/Http/Controllers/IdadeController.php';
require __DIR__ . '/../app/Http/Controllers/NotasController.php';
require __DIR__ . '/../app/Http/Controllers/HelpdeskController.php';
require __DIR__ . '/../app/Http/Controllers/LoginController.php';
require __DIR__ . '/../app/Http/Controllers/Poo2Controller.php';


// Rotas do sistema
return [
    'GET' => [
        'portfolio' => [new PortfolioController(), 'index'],
        'helpdesk' => [new HelpdeskController(), 'index'],
        'jogos' => [new JogosController(), 'index'],
        'idade' => [new IdadeController(), 'index'],
        'notas' => [new NotasController(), 'index'],
        'poo2' => [new Poo2Controller(), 'index']
    ],

    'POST' => [
        'helpdesk' => [new HelpdeskController(), 'index'],
        'jogos' => [new JogosController(), 'index'],
        'idade' => [new IdadeController(), 'index'],
        'notas' => [new NotasController(), 'index'],
        'poo2' => [new Poo2Controller(), 'index']
    ]
];


