<?php
require_once __DIR__.'/../config/conexao.php';

class Agendamento {
    public static function listarPorData($data) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM agendamentos WHERE DATE(horario) = ?");
        $stmt->execute([$data]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function criar($cliente, $horario, $telefone) {
        //$pdo = Conexao::getConnection();
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO agendamentos (cliente, horario, telefone) VALUES (?, ?, ?)");
        return $stmt->execute([$cliente, $horario, $telefone]);
    }

    public static function deletar($id) {
        //$pdo = Conexao::getConnection();
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM agendamentos WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public static function alterarStatus($id, $status) {
        //$pdo = Conexao::getConnection();
        global $pdo;
        $stmt = $pdo->prepare("UPDATE agendamentos SET status = ? WHERE id = ?");
        return $stmt->execute([$status, $id]);
    }
}
