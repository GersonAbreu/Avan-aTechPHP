<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jogo da Adivinhação</title>
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
            color: darkblue;
        }

        #tentativas {
            font-size: 1.2em;
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <h1>Jogo da Adivinhação</h1>

    <div class="container">
        <p>Eu escolhi um número entre 1 e 100. Tente adivinhar!</p>
        <input type="number" id="adivinhar" placeholder="Digite um número" />
        <button onclick="adivinharNumero()">Adivinhar</button>
        <div id="resultado"></div>
        <div id="tentativas"></div>
    </div>

    <script>
        // Número aleatório gerado pelo programa
        var numeroAleatorio = Math.floor(Math.random() * 100) + 1;
        var tentativas = 0; // Contador de tentativas

        // Função que verifica o palpite do usuário
        function adivinharNumero() {
            var palpite = document.getElementById("adivinhar").value;
            var resultado = document.getElementById("resultado");
            var tentativasTexto = document.getElementById("tentativas");

            // Verifica se o usuário não digitou nada
            if (palpite === "") {
                resultado.innerHTML = "Por favor, digite um número!";
                resultado.style.color = "red";
                return;
            }

            // Incrementa o contador de tentativas
            tentativas++;

            // Verifica se o palpite é igual ao número aleatório
            if (palpite == numeroAleatorio) {
                resultado.innerHTML = "Parabéns! Você acertou o número em " + tentativas + " tentativas!";
                resultado.style.color = "green";
                tentativasTexto.innerHTML = ""; // Esconde as tentativas após acertar
            } else if (palpite < numeroAleatorio) {
                resultado.innerHTML = "Muito baixo! Tente um número maior.";
                resultado.style.color = "orange";
            } else {
                resultado.innerHTML = "Muito alto! Tente um número menor.";
                resultado.style.color = "orange";
            }

            // Exibe o número de tentativas
            tentativasTexto.innerHTML = "Tentativas: " + tentativas;
        }
    </script>

</body>
</html>
