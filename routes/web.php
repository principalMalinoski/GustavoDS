<?php
    require_once __DIR__ . '/../app/Http/Controllers/PortfolioController.php';
    //require_once __DIR__ . '/../app/Http/Controllers/HelpdeskController.php';
    // require_once __DIR__ . '/../app/Http/Controllers/LoginkController.php';
    // require_once __DIR__ . '/../app/Http/Controllers/IdadekController.php';
     //require_once __DIR__ . '/../app/Http/Controllers/NotasController.php';
    // require_once __DIR__ . '/../app/Http/Controllers/JsonController.php';
    // require_once __DIR__ . '/../app/Http/Controllers/JogosController.php';
    




    return [
      'GET' =>  [
            'portfolio' => [new PortfolioController(), 'index'],
            //'helpdesk' => [new HelpdeskController(), 'index'], 
            
          
            // 'jogos' => [new JogosController(), 'index'],
            // 'json' => [new JsonController(), 'index'],
            // 'notas' => [new NotasController(), 'index'],
            // 'login' => [new LoginController(), 'index'],
            // 'idade' => [new IdadeController(), 'index'],

            //outras atividades
        ],
        //'POST' => [
          //  'helpdesk' => [new HelpdeskController(), '']
    //]
    ];

