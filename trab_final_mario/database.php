<?php
require 'conexao.php';


try {
    $pdo = getConnection();


    $pdo->exec("CREATE TABLE Aluno (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        uuid VARCHAR(36) UNIQUE,
        matricula VARCHAR(20) UNIQUE NOT NULL,
        nome VARCHAR(100) NOT NULL,
        email VARCHAR(100) UNIQUE NOT NULL,
        data_nascimento DATE NOT NULL
        )");
   


    echo "Database created";
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>
