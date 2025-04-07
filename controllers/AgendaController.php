<?php
require_once __DIR__.'/../models/Agenda.php';


$acao = $_GET['acao'] ?? $_POST['acao'] ?? '';

switch ($acao) {
  case 'buscar':
    $ano = $_GET['ano'] ?? date('Y');
    $mes = $_GET['mes'] ?? date('m');
    $dados = Agenda::buscarDias($ano, $mes);
    echo json_encode($dados);
    break;

  case 'salvar':
    $body = json_decode(file_get_contents('php://input'), true);
    Agenda::salvarAgenda($body, $pdo);
    echo json_encode(['status' => 'ok']);
    break;
}
