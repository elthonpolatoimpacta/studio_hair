<?php
require_once __DIR__.'/../models/Servico.php';

$acao = $_GET['acao'] ?? 'listar';

switch ($acao) {
    case 'listar':
        $servicos = Servico::listar();
        include __DIR__.'/../views/index.php';
        break;

    case 'novo':
        include __DIR__.'/../views/create.php';
        break;

    case 'salvar':
        Servico::inserir($_POST['nome'], $_POST['descricao'], $_POST['tempo'], $_POST['preco']);
        header('Location: ?acao=listar');
        break;

    case 'editar':
        $servico = Servico::buscarPorId($_GET['id']);
        include __DIR__.'/../views/edit.php';
        break;

    case 'atualizar':
        Servico::atualizar($_POST['id'], $_POST['nome'], $_POST['descricao'], $_POST['tempo'], $_POST['preco'], isset($_POST['ativo']));
        header('Location: ?acao=listar');
        break;

    case 'deletar':
        Servico::deletar($_GET['id']);
        header('Location: ?acao=listar');
        break;

    default:
        echo "Ação não encontrada";
        break;
}
