<?php
// store.php
require 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uuid = $_POST['uuid'] ?? null;
    $matricula = $_POST['matricula'] ?? null;
    $nome = $_POST['nome'] ?? null;
    $email = $_POST['email'] ?? null;
    $data_nascimento = $_POST['data_nascimento'] ?? null;

    if ($uuid && $matricula && $nome && $email && $data_nascimento) {
        try {
            $pdo = getConnection();
            $sql = "INSERT INTO Aluno (uuid, matricula, nome, email, data_nascimento) VALUES (?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$uuid, $matricula, $nome, $email, $data_nascimento]);
            echo $nome . ' inserido com sucesso!';
        } catch (PDOException $e) {
            echo 'Erro: ' . $e->getMessage();
        }
    } else {
        echo 'Por favor, preencha todos os campos.';
    }
}
?>
