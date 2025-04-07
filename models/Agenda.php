<?php
require_once __DIR__.'/../config/conexao.php';


class Agenda {
    public static function buscarDias($ano, $mes) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM agenda WHERE YEAR(data) = ? AND MONTH(data) = ?");
        $stmt->execute([$ano, $mes]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }    


    public static function salvarAgenda($dados) {
        global $pdo;

        // Apaga dados existentes do mês/ano
        $stmt = $pdo->prepare("DELETE FROM agenda WHERE MONTH(data) = ? AND YEAR(data) = ?");
        $stmt->execute([$dados['mes'], $dados['ano']]);
    
        // Prepara novo insert
        $stmt = $pdo->prepare("
          INSERT INTO agenda (data, hora, disponivel, criado_em, atualizado_em)
          VALUES (?, ?, ?, NOW(), NOW())
        ");
    
        foreach ($dados['agenda'] as $item) {
          foreach ($item['horarios'] as $hora) {
            $stmt->execute([$item['data'], $hora, $item['disponivel']]);
          }
        }
    
        return true;
      }    

}
