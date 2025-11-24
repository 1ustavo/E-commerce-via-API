<?php
$host = "localhost";
$port = "5432";
$dbname = "precodeplus";
$user = "postgres";
$password = "1040";

try {
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname;", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    // echo "Conectado com sucesso!";
} catch (PDOException $e) {
    echo "Erro ao conectar: " . $e->getMessage();
}

