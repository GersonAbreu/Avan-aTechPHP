<?php
$resultado = null; // Armazena o resultado da operação
$mensagemErro = null; // Armazena mensagens de erro

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $num1 = isset($_POST['num1']) ? (float)$_POST['num1'] : null;
    $num2 = isset($_POST['num2']) ? (float)$_POST['num2'] : null;
    $operacao = isset($_POST['operacao']) ? $_POST['operacao'] : null;

    if ($operacao === 'sair') {
        // Encerrar a calculadora
        echo '<script>alert("Saindo da calculadora!");</script>';
        exit;
    }

    // Verificar operação escolhida e calcular
    if ($operacao && $num1 !== null && $num2 !== null) {
        switch ($operacao) {
            case 'soma':
                $resultado = $num1 + $num2;
                break;
            case 'subtracao':
                $resultado = $num1 - $num2;
                break;
            case 'multiplicacao':
                $resultado = $num1 * $num2;
                break;
            case 'divisao':
                if ($num2 != 0) {
                    $resultado = $num1 / $num2;
                } else {
                    $mensagemErro = "Erro: Divisão por zero não é permitida!";
                }
                break;
            default:
                $mensagemErro = "Operação inválida!";
        }
    } else {
        $mensagemErro = "Por favor, insira valores válidos para os números.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora com Loop</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <h1>Calculadora</h1>
    <form method="POST" action="">
        <table>
            <tr>
                <td><label for="num1">Número 1:</label></td>
                <td><input type="number" step="any" name="num1" id="num1" required></td>
            </tr>
            <tr>
                <td><label for="num2">Número 2:</label></td>
                <td><input type="number" step="any" name="num2" id="num2" required></td>
            </tr>
            <tr>
                <td><label for="operacao">Operação:</label></td>
                <td>
                    <select name="operacao" id="operacao" required>
                        <option value="soma">Soma</option>
                        <option value="subtracao">Subtração</option>
                        <option value="multiplicacao">Multiplicação</option>
                        <option value="divisao">Divisão</option>
                        <option value="sair">Sair</option>
                    </select>
                </td>
            </tr>
        </table>
        <button type="submit">Calcular</button>
    </form>

    <?php if ($resultado !== null): ?>
        <div class="resultado">
            <h2>Resultado:</h2>
            <p><?php echo "O resultado da operação é: " . htmlspecialchars($resultado); ?></p>
        </div>
    <?php elseif ($mensagemErro): ?>
        <div class="erro">
            <h2>Erro:</h2>
            <p><?php echo htmlspecialchars($mensagemErro); ?></p>
        </div>
    <?php endif; ?>
</body>
</html>
