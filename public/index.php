<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Studio Hair - Início</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff0f5;
            padding: 40px;
            text-align: center;
        }

        h1 {
            color: #b22222;
            margin-bottom: 40px;
        }

        .menu {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 30px;
        }

        .menu a {
            display: inline-block;
            padding: 15px 30px;
            background-color: #b22222;
            color: white;
            border-radius: 8px;
            text-decoration: none;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .menu a:hover {
            background-color: #8b0000;
        }
    </style>
</head>
<body>
    <h1>Studio Hair</h1>

    <div class="menu">
        <a href="../views/public/agenda_publica.php">📅 Agendar um serviço</a>
        <a href="../views/painel.php">💇 Painel do cabeleireiro</a>
        <a href="../views/create.php">📝 Cadastro de serviços</a>
        <a href="../views/abrir_agenda.php">📆 Abrir agenda</a>
    </div>
</body>
</html>


