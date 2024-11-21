<?php
include 'config.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $sexo = $_POST['sexo'];
    $bairro = $_POST['bairro'];

    $conn->query("INSERT INTO clientes (nome, email, sexo, bairro) VALUES ('$nome', '$email', '$sexo', '$bairro')");
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Seguidor</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="script.js"></script>
</head>
<body style="background-image: url('image1.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <h1>Adicionar Novo Seguidor</h1>
    <form method="post" onsubmit="return validarFormulario()">
        <label>Nome: <input type="text" name="nome"></label><br>
        <label>Email: <input type="email" name="email" required></label><br>
        <label>Sexo: 
            <select name="sexo" required>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
            </select>
        </label><br>
        <label>Bairro: <input type="text" name="bairro" required></label><br>
        <button type="submit">Salvar</button>
        <button type="button" onclick="window.location.href='index.php'">Início</button>
    </form>
    <script src="./js/script.js"></script>
</body>
</html>
