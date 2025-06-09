<?php
require_once '../config/conexao.php';

$data = $_GET['data'] ?? null;

if ($data) {
    $stmt = $pdo->prepare("SELECT hora FROM agenda WHERE data = ? AND disponivel = 1 ORDER BY hora");
    $stmt->execute([$data]);
    $horarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($horarios);
}
