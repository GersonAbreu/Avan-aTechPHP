<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data e Hora Atual</title>
    <style>
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: linear-gradient( 135deg, #1e3c72, #2a5298);
            font-family: Arial, sans-serif;
            color: #ffffff;
        }
        .container{
            text-align: center;
            background: rgba(0,0,0,0.3);
            padding: 20px 40px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.5);
        }
        .time{
            font-size: 3em;
            font-weight: bold;
            margin: 10px 0;
        }
        .date{
            font-size: 1.5em;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="date" id = "current-date"></div>
        <div class="time" id = "current-time"></div>
    </div>
    
    <script>
        //função para atualizar a data e hora dinamicamente
        function updateDataTime(){
            const now = new Date();
            const optionsDate = {weekday:'long', year:'numeric', month: 'long', day:'numeric'};
            const optionsTime = {hour:'2-digit', minute: '2-digit', second: '2-digit'};
        //formatando data e hora
        document.getElementById('current-date').textContent = now.toLocaleDateString('pt-Br', optionsDate);
        document.getElementById('current-time').textContent = now.toLocaleTimeString('pt-Br', optionsTime);      
        
        }
        //Atualiza a cada segundo
        setInterval(updateDataTime, 1000);
        //chamada inicial
        updateDataTime();
    </script>
</body>
</html>