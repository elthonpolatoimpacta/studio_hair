<?php
require_once __DIR__.'/../config/conexao.php';

class Servico {
    public static function listar() {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM servicos");
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function buscarPorId($id) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM servicos WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public static function inserir($nome, $descricao, $tempo, $preco) {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO servicos (nome, descricao, tempo, preco) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$nome, $descricao, $tempo, $preco]);
    }

    public static function atualizar($id, $nome, $descricao, $tempo, $preco, $ativo) {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE servicos SET nome=?, descricao=?, tempo=?, preco=?, ativo=? WHERE id=?");
        return $stmt->execute([$nome, $descricao, $tempo, $preco, $ativo, $id]);
    }

    public static function deletar($id) {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM servicos WHERE id = ?");
        return $stmt->execute([$id]);
    }
    
}
