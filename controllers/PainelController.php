<?php
require_once '../models/Agendamento.php';

$acao = $_GET['acao'] ?? $_POST['acao'] ?? null;

switch ($acao) {
    // case 'criar':
    //     $cliente = $_POST['cliente'] ?? '';
    //     $horario = $_POST['horario'] ?? '';
    //     if ($cliente && $horario) {
    //         Agendamento::criar($cliente, $horario);
    //     }
    //     break;
    case 'criar':
        $cliente = $_POST['cliente'] ?? '';
        $horario = $_POST['horario'] ?? ''; // já vem direto do input datetime-local
        $servico = $_POST['servico'] ?? null;
        $telefone = $_POST['telefone'] ?? '';

        if ($cliente && $horario) {
            Agendamento::criar($cliente, $horario, $telefone); // você pode depois adaptar pra gravar também o id_servico
            header("Location: ../views/public/agenda_publica.php?ok=1");
            exit;
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
