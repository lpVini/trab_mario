<?php
// delete.php
require 'conexao.php';

$id = $_GET['id'] ?? null;

if ($id) {
    $pdo = getConnection();
    $stmt = $pdo->prepare("SELECT * FROM Aluno WHERE id = ?");
    $stmt->execute([$id]);
    $item = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$item) {
        echo 'Item não encontrado!';
        exit;
    }
} else {
    echo 'ID não fornecido!';
    exit;
}

echo '<!DOCTYPE html>';
echo '<html lang="en">';

echo '<head>';
echo '    <meta charset="UTF-8">';
echo '    <meta http-equiv="X-UA-Compatible" content="IE=edge">';
echo '    <meta name="viewport" content="width=device-width, initial-scale=1.0">';
echo '    <title>Excluir</title>';
echo '</head>';

echo '<body>';

echo '<h2>Excluir</h2> <br>';

echo '<form action="remove.php" method="POST">';
echo '  <input type="hidden" name="id" value="' . $id . '">';
echo '  <p>Você realmente deseja excluir o aluno #' . htmlspecialchars($id) . ' - ' . htmlspecialchars($item['nome']) . '?</p>';
echo '  <input type="submit" value="Excluir">';
echo '  <a href="list.php">Cancelar</a>';
echo '</form>';

echo '</body>';

echo '</html>';
?>
