<?php
// conexao.php
function getConnection() {
    $stringConnection = 'sqlite:' . __DIR__ . '/database.sqlite';

    try {
        $pdo = new PDO($stringConnection);
        return $pdo;
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
        die();
    }
}
?>
