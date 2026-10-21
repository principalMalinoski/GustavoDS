<?php

    require_once __DIR__ . '/../app/Http/Controllers/helpdesk.php';

    return [
      'GET' =>  [
            'portfolio' => [new PortfolioController(), 'index'],
            'helpdesk' => [new HelpdeskController(), 'index'],
            //outras atividades
        ],
        'POST' => [
            'helpdesk' => [new HelpdeskController(), '']
        ]
    ];

