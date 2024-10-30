<?php
// Configurações do banco de dados
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = 'lorenzo';
$dbName = 'usuario';

// Criar uma nova conexão MySQLi
$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Verificar se a conexão foi bem-sucedida
if ($conexao->connect_errno) {
    // Exibe a mensagem de erro detalhada
    echo "Falha na conexão: " . $conexao->connect_error;
    exit(); // Para garantir que o script pare aqui
}

// O restante do seu código...
?>
