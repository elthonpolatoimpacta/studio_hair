<?php
require_once '../../config/conexao.php';

$stmtServicos = $pdo->query("SELECT id, nome FROM servicos WHERE ativo = 1 ORDER BY nome");
$servicos = $stmtServicos->fetchAll(PDO::FETCH_ASSOC);

$stmtDatas = $pdo->query("
    SELECT DISTINCT data 
    FROM agenda 
    WHERE disponivel = 1 
    AND data >= CURDATE() 
    ORDER BY data
");
$datas = $stmtDatas->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Agende seu horário - Studio Hair</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="text-center mb-4">Agende seu horário</h2>

    <?php if (isset($_GET['ok'])): ?>
        <div class="alert alert-success text-center">Agendamento realizado com sucesso!</div>
    <?php endif; ?>

    <form action="../../controllers/PainelController.php" method="POST" class="card p-4 shadow-sm">
        <input type="hidden" name="acao" value="criar">

        <div class="mb-3">
            <label class="form-label">Nome completo:</label>
            <input type="text" name="cliente" class="form-control" required>
        </div>
<div class="mb-3">
    <label class="form-label">WhatsApp:</label>
    <input type="tel" name="telefone" id="telefone" class="form-control" required placeholder="(11) 91234-5678">
</div>


        <div class="mb-3">
            <label class="form-label">Serviço desejado:</label>
            <select name="servico" class="form-select" required>
                <option value="">Selecione...</option>
                <?php foreach ($servicos as $servico): ?>
                    <option value="<?= $servico['id'] ?>"><?= htmlspecialchars($servico['nome']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

<div class="mb-3">
    <label class="form-label">Data e horário desejados:</label>
    <input type="datetime-local" name="horario" class="form-control" required>
</div>


        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Confirmar Agendamento</button>
        </div>
    </form>
</div>

<script>
    async function buscarHorarios(data) {
        const res = await fetch(`../../controllers/HorarioController.php?data=${data}`);
        const horarios = await res.json();
        let select = document.getElementById('horario');
        select.innerHTML = '<option value="">Selecione...</option>';
        horarios.forEach(h => {
            select.innerHTML += `<option value="${data} ${h.hora}">${h.hora}</option>`;
        });
    }
</script>

<script>
document.getElementById('telefone').addEventListener('input', function (e) {
    let x = e.target.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,5})(\d{0,4})/);
    e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
});
</script>

</body>
</html>
