<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Média Escolar</title>
    <style>
        /* Formata margem */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Formata body */
        body {
            background-color: paleturquoise;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        /* Formata o título */
        h1 {
            text-align: center;
            color: gold;
            background-color: black;
            padding: 40px;
            margin: 10px;
            border-radius: 10px;
            font-size: 3em;
        }

        /* Estilo do formulário e inputs */
        .container {
            text-align: center;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        input[type="number"] {
            padding: 10px;
            font-size: 1.2em;
            margin: 10px;
            width: 200px;
            border-radius: 5px;
            border: 2px solid #ccc;
        }

        button {
            padding: 10px 20px;
            font-size: 1.2em;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }

        #resultado {
            font-size: 1.5em;
            margin-top: 20px;
            text-align: center;
        }

        #nota-media {
            font-size: 1.5em;
            margin-top: 10px;
            color: darkblue;
        }
    </style>
</head>
<body>

    <h1>Calculadora de Média Escolar</h1>

    <div class="container">
        <p>Digite as 3 notas do aluno para calcular a média e determinar a aprovação:</p>
        <input type="number" id="nota1" placeholder="Nota 1" step="0.01" />
        <input type="number" id="nota2" placeholder="Nota 2" step="0.01" />
        <input type="number" id="nota3" placeholder="Nota 3" step="0.01" />
        <button onclick="calcularMedia()">Calcular Média</button>
        <div id="resultado"></div>
        <div id="nota-media"></div>
    </div>

    <script>
        // Função para calcular a média e determinar a aprovação/reprovação
        function calcularMedia() {
            var nota1 = parseFloat(document.getElementById("nota1").value);
            var nota2 = parseFloat(document.getElementById("nota2").value);
            var nota3 = parseFloat(document.getElementById("nota3").value);
            var resultado = document.getElementById("resultado");
            var mediaDisplay = document.getElementById("nota-media");

            // Verifica se todas as notas foram preenchidas
            if (isNaN(nota1) || isNaN(nota2) || isNaN(nota3)) {
                resultado.innerHTML = "Por favor, preencha todas as notas!";
                resultado.style.color = "red";
                mediaDisplay.innerHTML = "";
                return;
            }

            // Calcula a média
            var media = (nota1 + nota2 + nota3) / 3;

            // Exibe a média
            mediaDisplay.innerHTML = "A média do aluno é: " + media.toFixed(2);

            // Verifica se o aluno foi aprovado ou reprovado
            if (media >= 7) {
                resultado.innerHTML = "Parabéns! O aluno está APROVADO!";
                resultado.style.color = "green";
            } else {
                resultado.innerHTML = "Infelizmente, o aluno está REPROVADO!";
                resultado.style.color = "red";
            }
        }
    </script>

</body>
</html>
