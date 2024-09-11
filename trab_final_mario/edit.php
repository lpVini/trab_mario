<?php
// edit.php
require 'conexao.php';

$id = $_GET['id'] ?? null;

if ($id) {
    try {
        $pdo = getConnection();
        $stmt = $pdo->prepare("SELECT * FROM Aluno WHERE id = ?");
        $stmt->execute([$id]);
        $item = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$item) {
            echo 'Item não encontrado!';
            exit;
        }
    } catch (PDOException $e) {
        echo 'Erro: ' . $e->getMessage();
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
echo '    <title>Editar Aluno</title>';
echo '</head>';

echo '<body>';

echo '<h2>Editar Aluno</h2> <br>';

echo '<form action="update.php" method="POST">';
echo '  <input type="hidden" name="id" value="' . htmlspecialchars($id) . '">';
echo '  <label for="uuid">UUID:</label>';
echo '  <input type="text" id="uuid" name="uuid" value="' . htmlspecialchars($item['uuid']) . '" required><br><br>';
echo '  <label for="matricula">Matrícula:</label>';
echo '  <input type="text" id="matricula" name="matricula" value="' . htmlspecialchars($item['matricula']) . '" required><br><br>';
echo '  <label for="nome">Nome:</label>';
echo '  <input type="text" id="nome" name="nome" value="' . htmlspecialchars($item['nome']) . '" required><br><br>';
echo '  <label for="email">Email:</label>';
echo '  <input type="email" id="email" name="email" value="' . htmlspecialchars($item['email']) . '" required><br><br>';
echo '  <label for="data_nascimento">Data de Nascimento:</label>';
echo '  <input type="date" id="data_nascimento" name="data_nascimento" value="' . htmlspecialchars($item['data_nascimento']) . '" required><br><br>';
echo '  <input type="submit" value="Salvar">';
echo '</form>';

echo '</body>';

echo '</html>';
?>
