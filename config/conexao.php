<?php
$host = 'localhost';
$dbname = 'db_studio_hair';
$user = 'salao';
$password = 'P@ssw0rd#2025';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die('Erro ao conectar: ' . $e->getMessage());
}
