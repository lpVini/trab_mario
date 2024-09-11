<?php
require 'conexao.php';

header('Content-Type: application/json');

try {
    $pdo = getConnection();  // Use a função getConnection()

    $stmt = $pdo->query("SELECT * FROM teste");
    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($items);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
