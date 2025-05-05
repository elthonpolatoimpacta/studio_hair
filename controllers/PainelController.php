<?php
require_once '../models/Agendamento.php';

$acao = $_GET['acao'] ?? $_POST['acao'] ?? null;

switch ($acao) {
    case 'criar':
        $cliente = $_POST['cliente'] ?? '';
        $horario = $_POST['horario'] ?? '';
        if ($cliente && $horario) {
            Agendamento::criar($cliente, $horario);
        }
        break;

    case 'deletar':
        $id = $_GET['id'] ?? null;
        if ($id) {
            Agendamento::deletar($id);
        }
        break;

    case 'status':
        $id = $_GET['id'] ?? null;
        $status = $_GET['status'] ?? null;
        if ($id && $status) {
            Agendamento::alterarStatus($id, $status);
        }
        break;
}

// Redirecionar de volta para o painel
$data = $_GET['data'] ?? date('Y-m-d');
header("Location: ../views/painel.php?data={$data}");
exit;
