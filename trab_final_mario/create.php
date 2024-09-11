<?php
// create.php
echo '<!DOCTYPE html>';
echo '<html lang="en">';

echo '<head>';
echo '    <meta charset="UTF-8">';
echo '    <meta http-equiv="X-UA-Compatible" content="IE=edge">';
echo '    <meta name="viewport" content="width=device-width, initial-scale=1.0">';
echo '    <title>Criar Aluno</title>';
echo '</head>';

echo '<body>';

echo '<h2>Criar Aluno</h2> <br>';

echo '<form action="store.php" method="POST">';
echo '  <label for="uuid">UUID:</label>';
echo '  <input type="text" id="uuid" name="uuid" required><br><br>';
echo '  <label for="matricula">Matrícula:</label>';
echo '  <input type="text" id="matricula" name="matricula" required><br><br>';
echo '  <label for="nome">Nome:</label>';
echo '  <input type="text" id="nome" name="nome" required><br><br>';
echo '  <label for="email">Email:</label>';
echo '  <input type="email" id="email" name="email" required><br><br>';
echo '  <label for="data_nascimento">Data de Nascimento:</label>';
echo '  <input type="date" id="data_nascimento" name="data_nascimento" required><br><br>';
echo '  <input type="submit" value="Salvar">';
echo '</form>';

echo '</body>';

echo '</html>';
?>
