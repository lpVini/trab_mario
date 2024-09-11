<?php
// remove.php
require 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;

    if ($id) {
        try {
            $pdo = getConnection();
            $stmt = $pdo->prepare("DELETE FROM Aluno WHERE id = ?");
            $stmt->execute([$id]);
            header('Location: list.php');
            exit;
        } catch (PDOException $e) {
            echo 'Erro ao excluir o aluno: ' . $e->getMessage();
        }
    } else {
        echo 'ID não fornecido!';
    }
} else {
    echo 'Método não permitido!';
}
?>
