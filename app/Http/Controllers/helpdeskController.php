
<?php

namespace App\Http\Controllers;

use App\Http\Controllers\controller;
use App\Models\Chamado;
class HelpdeskController extends Controller
{

    public function index()

  {
          $model = new Chamado();
   
          $chamados = $model->listarChamados();
          $relatorio = $model->contarChamados();
   
          $mensagem = "";
          
          return view('projetos.helpdesk', compact('model', "chamados", 'relatorio', 'mensagem'));
   
      }
   
      // POST - Receber os formulários do Helpdesk
      public function salvar()
      {
          $model = new Chamado();
   
          $acao = $_POST["acao"] ?? "";
          $sucesso = false;
   
          if ($acao === "cadastrar") {
              $sucesso = $model->cadastrarChamado(
                  $_POST["nome"] ?? "",
                  $_POST["setor"] ?? "",
                  $_POST["equipamento"] ?? "",
                  $_POST["descricao"] ?? "",
                  $_POST["prioridade"] ?? ""
              );
          }
   
          elseif ($acao === "atualizar") {
              $sucesso = $model->atualizarChamado(
                  (int) ($_POST["posicao"] ?? -1),
                  $_POST["status"] ?? ""
              );
          }
   
          elseif ($acao === "excluir") {
              $sucesso = $model->excluirChamado(
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
   
          return view('projetos.helpdesk', compact('model', "chamados", 'relatorio', 'mensagem'));
   
      }
  

?>
