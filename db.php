<?php
// Lê as credenciais das variáveis de ambiente (definidas no Render ou no .env local)
$host = getenv('DB_HOST') ?: 'localhost';
$user = getenv('DB_USER') ?: 'root';
$pass = getenv('DB_PASS') ?: '';
$db   = getenv('DB_NAME') ?: 'renthub';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    // Em produção, não exibe detalhes do erro para o usuário
    error_log("Erro de conexão: " . $conn->connect_error);
    die("Erro ao conectar ao banco de dados. Tente novamente mais tarde.");
}

$conn->set_charset('utf8mb4');
