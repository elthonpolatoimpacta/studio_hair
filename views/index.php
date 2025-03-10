<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista de Serviços</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>    
<body>
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="display-5">Cadastro de Serviços</h1>
        </div>

        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Tempo</th>
                    <th scope="col">Preço (R$)</th>
                    <th scope="col" class="text-center">Ações</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($servicos as $s): ?>
                <tr>
                    <th scope="row"><?= $s->id ?></th>
                    <td><?= htmlspecialchars($s->nome) ?></td>
                    <td><?= htmlspecialchars($s->tempo) ?></td>
                    <td><?= number_format($s->preco, 2, ',', '.') ?></td>
                    <td class="text-center">
                        <a href="?acao=editar&id=<?= $s->id ?>" class="btn btn-sm btn-warning">Editar</a>
                        <a href="?acao=deletar&id=<?= $s->id ?>" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir?');">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <div class="d-flex flex-row-reverse">
            <a href="?acao=novo" class="btn btn-primary">Novo Serviço</a>
        </div>        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
