<?php
// Processamento dos dados
$idades = [];
$classificacoes = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idades'])) {
    $idades = $_POST['idades']; // Recebe as idades do formulário

    foreach ($idades as $idade) {
        if ($idade >= 0 && $idade <= 12) {
            $classificacoes[] = "Criança";
        } elseif ($idade >= 13 && $idade <= 17) {
            $classificacoes[] = "Adolescente";
        } elseif ($idade >= 18 && $idade <= 59) {
            $classificacoes[] = "Adulto";
        } elseif ($idade >= 60) {
            $classificacoes[] = "Idoso";
        } else {
            $classificacoes[] = "Idade inválida";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classificação de Idades</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <h1>Classificação de Idades</h1>
    <form method="POST" action="">
        <table>
            <tr>
                <th>Pessoa</th>
                <th>Idade</th>
            </tr>
            <?php for ($i = 1; $i <= 5; $i++): ?>
            <tr>
                <td>Pessoa <?php echo $i; ?>:</td>
                <td><input type="number" name="idades[]" required></td>
            </tr>
            <?php endfor; ?>
        </table>
        <button type="submit">Classificar</button>
    </form>

    <?php if (!empty($classificacoes)): ?>
    <h2>Resultados:</h2>
    <table>
        <tr>
            <th>Pessoa</th>
            <th>Idade</th>
            <th>Classificação</th>
        </tr>
        <?php foreach ($idades as $index => $idade): ?>
        <tr>
            <td>Pessoa <?php echo $index + 1; ?></td>
            <td><?php echo htmlspecialchars($idade); ?></td>
            <td><?php echo htmlspecialchars($classificacoes[$index]); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php endif; ?>
</body>
</html>
