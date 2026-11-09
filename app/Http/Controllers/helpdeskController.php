
<?php

namespace App\Http\Controllers;

use App\Http\Controllers\controller;
use App\Models\Chamados;
class HelpdeskController extends Controller

{

    public function index()

  {
          $model = new Chamados();
   
          $chamados = $model->listarChamados();
          $relatorio = $model->contarChamados();
   
          $mensagem = "";
          
          return views('projetos.helpdesk', compact('model', "chamados", 'relatorio', 'mensagem'));
   
      }
   
      // POST - Receber os formulários do Helpdesk
      public function salvar()
      {
          $model = new Chamados();
   
          $acao = $_POST["acao"] ?? "";
          $sucesso = false;
   
          if ($acao === "cadastrar") {
              $sucesso = $model->cadastrarChamados(
                  $_POST["nome"] ?? "",
                  $_POST["setor"] ?? "",
                  $_POST["equipamento"] ?? "",
                  $_POST["descricao"] ?? "",
                  $_POST["prioridade"] ?? ""
              );
          }
   
          elseif ($acao === "atualizar") {
              $sucesso = $model->atualizarChamados(
                  (int) ($_POST["posicao"] ?? -1),
                  $_POST["status"] ?? ""
              );
          }
   
          elseif ($acao === "excluir") {
              $sucesso = $model->excluirChamados(
                  (int) ($_POST["posicao"] ?? -1)
              );
          }
   
          // Mensagem de retorno para o usuário
          $mensagem = $sucesso
              ? "Operação realizada com sucesso!"
              : "Não foi possível realizar a operação.";
   
          // Atualizar os dados após a operação
          $chamados = $model->listarChamados();
          $relatorio = $model->contarChamados();
   
          return views('projetos.helpdesk', compact('model', "chamados", 'relatorio', 'mensagem'));
   
      }
 }

?>
