<?php
// list.php
require 'conexao.php';

echo '<h1>Listar Alunos</h1>';

try {
    $pdo = getConnection();
    $stmt = $pdo->query("SELECT * FROM Aluno");
    $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($alunos) {
        echo '<ul>';
        foreach ($alunos as $aluno) {
            echo '<li>';
            echo '<a href="edit.php?id=' . $aluno['id'] . '"> #' . $aluno['id'] . ' - ' . $aluno['nome'] . '</a>';
            echo ' | <a href="delete.php?id=' . $aluno['id'] . '" onclick="return confirm(\'Tem certeza que deseja excluir?\')">Excluir</a>';
            echo '</li>';
        }
        echo '</ul>';
    } else {
        echo '<p>Nenhum aluno encontrado.</p>';
    }
} catch (PDOException $e) {
    echo 'Erro: ' . $e->getMessage();
}
?>
