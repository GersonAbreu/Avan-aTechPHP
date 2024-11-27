<?php
// Função para calcular a Progressão Aritmética (PA)
function calcularPA($primeiroTermo, $razão, $numTermos) {
    $pa = [];
    for ($n = 1; $n <= $numTermos; $n++) {
        $termo = $primeiroTermo + ($n - 1) * $razão;
        $pa[] = $termo;
    }
    return $pa;
}

// Função para calcular a Progressão Geométrica (PG)
function calcularPG($primeiroTermo, $razão, $numTermos) {
    $pg = [];
    for ($n = 1; $n <= $numTermos; $n++) {
        $termo = $primeiroTermo * pow($razão, $n - 1);
        $pg[] = $termo;
    }
    return $pg;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numero = isset($_POST['numero']) ? (int)$_POST['numero'] : null;
    $razão = isset($_POST['razão']) ? (float)$_POST['razão'] : null;
    $numTermos = isset($_POST['numTermos']) ? (int)$_POST['numTermos'] : null;

    if ($numero !== null && $razão !== null && $numTermos !== null && $numTermos > 0) {
        $pa = calcularPA($numero, $razão, $numTermos);
        $pg = calcularPG($numero, $razão, $numTermos);
    } else {
        $erro = "Por favor, insira todos os valores corretamente.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Progressões</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #333, #555);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            position: relative; /* Para posicionar elementos dentro do container */
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
            font-size: 24px;
        }

        label {
            font-size: 16px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #28a745;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }

        .resultado {
            margin-top: 20px;
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .erro {
            color: red;
            text-align: center;
            margin-top: 20px;
        }

        .resultado h2 {
            text-align: center;
            color: #333;
        }

        .resultado p {
            text-align: center;
            font-size: 16px;
            color: #555;
        }

        .explicacao {
            background-color: #f1f1f1;
            padding: 20px;
            margin-top: 30px;
            border-radius: 5px;
            font-size: 16px;
            color: #333;
            position: absolute; /* Fixa a explicação no canto */
            top: 10px;
            right: 10px;
            width: 300px; /* Define um tamanho fixo para a explicação */
            max-height: 300px;
            overflow-y: auto;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Sombra para destacar */
        }

        /* Media queries para tornar a página responsiva */
        @media (max-width: 768px) {
            .container {
                max-width: 90%;
            }

            h1 {
                font-size: 22px;
            }

            .explicacao {
                width: 250px; /* Ajusta o tamanho da explicação em telas menores */
                font-size: 14px;
            }

            label, input, button {
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 15px;
            }

            h1 {
                font-size: 20px;
            }

            label, input, button {
                font-size: 12px;
            }

            .explicacao {
                width: 200px; /* Ajusta ainda mais em telas muito pequenas */
                font-size: 12px;
                padding: 10px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Calculadora de Progressões</h1>

    <form method="POST">
        <label for="numero">Primeiro termo:</label>
        <input type="number" name="numero" id="numero" required>

        <label for="razão">Razão:</label>
        <input type="number" name="razão" id="razão" required step="any">

        <label for="numTermos">Número de termos:</label>
        <input type="number" name="numTermos" id="numTermos" required>

        <button type="submit">Calcular</button>
    </form>

    <?php if (isset($pa) && isset($pg)): ?>
        <div class="resultado">
            <h2>Resultados</h2>
            <p><strong>Progressão Aritmética (PA):</strong> <?php echo implode(", ", $pa); ?></p>
            <p><strong>Progressão Geométrica (PG):</strong> <?php echo implode(", ", $pg); ?></p>
        </div>
    <?php elseif (isset($erro)): ?>
        <div class="erro">
            <p><?php echo $erro; ?></p>
        </div>
    <?php endif; ?>
</div>

<div class="explicacao">
    <h2>O que são Progressões?</h2>
    <p><strong>Progressão Aritmética (PA):</strong> Na PA, a diferença entre dois números consecutivos é sempre a mesma. Por exemplo, começando com o número 2 e somando 3 a cada termo, temos a sequência: 2, 5, 8, 11, 14...</p>
    <p>A fórmula para calcular qualquer número da sequência é: <strong>𝑎<sub>𝑛</sub> = 𝑎<sub>1</sub> + (𝑛 - 1) * 𝑟</strong></p>
    <ul>
        <li><strong>𝑎<sub>𝑛</sub></strong>: o número que queremos calcular na sequência.</li>
        <li><strong>𝑎<sub>1</sub></strong>: o primeiro número da sequência.</li>
        <li><strong>𝑛</strong>: a posição do número (por exemplo, 1º, 2º, 3º, etc.).</li>
        <li><strong>𝑟</strong>: a razão, ou seja, quanto somamos a cada passo.</li>
    </ul>

    <p><strong>Progressão Geométrica (PG):</strong> Na PG, cada número é obtido multiplicando o número anterior por uma constante chamada razão. Por exemplo, começando com o número 3 e multiplicando por 2 a cada passo, temos a sequência: 3, 6, 12, 24, 48...</p>
    <p>A fórmula para calcular qualquer número da sequência é: <strong>𝑎<sub>𝑛</sub> = 𝑎<sub>1</sub> * 𝑟^(𝑛 - 1)</strong></p>
    <ul>
        <li><strong>𝑎<sub>𝑛</sub></strong>: o número que queremos calcular na sequência.</li>
        <li><strong>𝑎<sub>1</sub></strong>: o primeiro número da sequência.</li>
        <li><strong>𝑛</strong>: a posição do número na sequência.</li>
        <li><strong>𝑟</strong>: a razão, ou seja, quanto multiplicamos a cada passo.</li>
    </ul>
</div>

</body>
</html>
