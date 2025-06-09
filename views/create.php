<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Novo Serviço</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>    
<body>
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="display-5">Cadastrar um novo Serviços</h1>
        </div>
        <form method="POST" action="?acao=salvar">
            Nome:<br>
            <input type="text" name="nome" required class="form-control"><br>
            Descrição:<br>
            <textarea name="descricao" class="form-control"></textarea><br>
            Tempo:<br>
            <input type="text" name="tempo" required class="form-control"><br>
            Preço:<br>
            <input type="number" step="0.01" name="preco" required class="form-control"><br><br>
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="?acao=listar" class="btn btn-warning">Cancelar</a>
        </form>
    <div class="mt-4">
        <a href="../public/index.php" class="btn btn-custom">← Voltar para o início</a>
    </div>
    </div>
        

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
