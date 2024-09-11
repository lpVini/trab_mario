<?php
// update.php
require 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    $uuid = $_POST['uuid'] ?? null;
    $matricula = $_POST['matricula'] ?? null;
    $nome = $_POST['nome'] ?? null;
    $email = $_POST['email'] ?? null;
    $data_nascimento = $_POST['data_nascimento'] ?? null;

    if ($id && $uuid && $matricula && $nome && $email && $data_nascimento) {
        try {
            $pdo = getConnection();
            $sql = "UPDATE Aluno SET uuid = ?, matricula = ?, nome = ?, email = ?, data_nascimento = ? WHERE id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$uuid, $matricula, $nome, $email, $data_nascimento, $id]);
            echo 'Aluno atualizado com sucesso!';
        } catch (PDOException $e) {
            echo 'Erro ao atualizar aluno: ' . $e->getMessage();
        }
    }
}
?>
