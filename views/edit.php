<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Serviço</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>    
<body>
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="display-5">Alterar Serviços</h1>
        </div>
        <form method="POST" action="?acao=atualizar">
            <input type="hidden" name="id" value="<?= $servico->id ?>">
            Nome:<br>
            <input type="text" name="nome" value="<?= $servico->nome ?>" class="form-control" required><br>
            Descrição:<br>
            <textarea name="descricao" class="form-control"><?= $servico->descricao ?></textarea><br>
            Tempo:<br>
            <input type="text" name="tempo" value="<?= $servico->tempo ?>" class="form-control" required><br>
            Preço:<br>
            <input type="number" step="0.01" name="preco" value="<?= $servico->preco ?>" class="form-control" required><br>
            Ativo: <input  class="form-check-input" type="checkbox" name="ativo" <?= $servico->ativo ? 'checked' : '' ?> ><br><br>
            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="?acao=listar" class="btn btn-warning">Cancelar</a>
        </form>
    </div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
