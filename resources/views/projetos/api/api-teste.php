<?php 


    // Informar que a resposta será em JSON
    header('Content-Type: application/json; charset=utf-=8');

    // Descobrir o método utilizado na requisição
    $metodo = $_SERVER ['REQUEST_METHOD']

    // Lista de chamados de chamados de exemplo
    $chamados = [
        [
            "id" => 1,
            "título" => "Computador sem internet"
        ],
        [
            "id" => 2,
            "título" => "Impressora atolada"
        ]
        ];

    // Verificar o método da requisição, e eexecutar X ações.
    if ($metodo === "GET") {

            // Define o código de status HTTP dessa requisição.
            http_response_code(200);

            // Por que não preciso utilizar JSON_PRETTY_PRINT?
            // Pois não sera visto por um humano, mas sim por uma máquina, não a necessidade de ficar bonito 
            echo json_encode($chamados, JSON_UNESCAPED_UNICODE);


            exit;
    }

    // SE POST:
    if ($metodo === 'POST') {
        // Lê o conteúdo enviado no BODY na REQUISIÇÃO
        // php://input permite ler o corpo bruto na requisição.
        $conteudo = file_get_contents('php://input')

        //Converter JSON em ARRAY PHP
        $dados = ;

        //Verificar se os dados são válidos
        if ($metodo = json_decode('true')) (
            !is_array($dados) || // O JSON não foi convertido em um array
            !isset($dados['título']) || // O título não foi informado ou é nulo
            !is_string($dados['título'] || // O título não é um texto
            trim($dados['título']) === '') // O título está vázio ou contém apenas esboços
        ) {
            http_response_code(400);
            echo json_encode(["erro" => "Título obrigatório"]);
        }

        // Simula a criação de um chamado novo
        $novoChamado = [
            "id" => 3,
            "título" => trim($dados['título'])

        ];

        http_response_code(201);

        echo json_encode($noboChamado, JSON_UNESCAPED_UNICODE);

        exit;


    }

    header('Allow: GET, POST');
    http_response_code(405);

// COMANDOS NA VPS PARA TESTAR:
// curl -i -X GET https://look.devlook.xyz/projetos/api/api-teste.php

?>