<?php
require_once '../models/Agendamento.php';

$data = $_GET['data'] ?? date('Y-m-d');
$agendamentos = Agendamento::listarPorData($data);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel de Atendimento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <h2 class="mb-4">Painel de Atendimento - <?= date("d/m/Y", strtotime($data)) ?></h2>

    <form class="mb-4" method="get">
        <label for="data" class="form-label">Selecionar Data:</label>
        <input type="date" id="data" name="data" value="<?= $data ?>" class="form-control w-25 d-inline" onchange="this.form.submit()">
    </form>

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>Cliente</th>
                <th>Horário</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($agendamentos as $a): ?>
            <tr>
                <td><?= htmlspecialchars($a['cliente']) ?></td>
                <td><?= date('H:i', strtotime($a['horario'])) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <div class="mt-4">
        <a href="../public/index.php" class="btn btn-custom">← Voltar para o início</a>
    </div>
</div>
</body>
</html>
