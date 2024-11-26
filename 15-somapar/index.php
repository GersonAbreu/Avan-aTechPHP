<?php
$resultado = null; // Armazena o resultado da soma
$numerosPares = []; // Armazena os números pares utilizados na soma
$mensagemErro = null; // Armazena mensagens de erro

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numero = isset($_POST['numero']) ? (int)$_POST['numero'] : null;

    if ($numero !== null && $numero > 0) {
        $soma = 0;
        $i = 1;

        do {
            if ($i % 2 === 0) {
                $soma += $i;
                $numerosPares[] = $i; // Adiciona o número par ao array
            }
            $i++;
        } while ($i <= $numero);

        $resultado = $soma;
    } else {
        $mensagemErro = "Por favor, insira um número inteiro positivo.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soma de Números Pares</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <h1>Soma de Números Pares</h1>
    <form method="POST" action="">
        <label for="numero">Digite um número inteiro positivo:</label>
        <input type="number" name="numero" id="numero" min="1" required>
        <button type="submit">Calcular Soma</button>
    </form>

    <?php if ($resultado !== null): ?>
        <div class="resultado">
            <h2>Resultado:</h2>
            <p><?php echo "A soma dos números pares de 1 até $numero é: " . htmlspecialchars($resultado); ?></p>
            <p>Números pares utilizados na soma:</p>
            <ul>
                <?php foreach ($numerosPares as $par): ?>
                    <li><?php echo htmlspecialchars($par); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php elseif ($mensagemErro): ?>
        <div class="erro">
            <h2>Erro:</h2>
            <p><?php echo htmlspecialchars($mensagemErro); ?></p>
        </div>
    <?php endif; ?>
</body>
</html>
