<?php
include 'config.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM clientes WHERE id=$id");
$cliente = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $sexo = $_POST['sexo'];
    $bairro = $_POST['bairro'];

    $conn->query("UPDATE clientes SET nome='$nome', email='$email', sexo='$sexo', bairro='$bairro' WHERE id=$id");
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Seguidor</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body style="background-image: url('image1.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <h1>Editar Seguidor</h1>
    <form method="post">
        <label>Nome: <input type="text" name="nome" value="<?= htmlspecialchars($cliente['nome']); ?>" required></label><br>
        <label>Email: <input type="email" name="email" value="<?= htmlspecialchars($cliente['email']); ?>" required></label><br>
        <label>Sexo: 
            <select name="sexo" required>
                <option value="Masculino" <?= $cliente['sexo'] == 'Masculino' ? 'selected' : ''; ?>>Masculino</option>
                <option value="Feminino" <?= $cliente['sexo'] == 'Feminino' ? 'selected' : ''; ?>>Feminino</option>
            </select>
        </label><br>
        <label>Bairro: <input type="text" name="bairro" value="<?= htmlspecialchars($cliente['bairro']); ?>" required></label><br>
        <button type="submit">Atualizar</button>
        <button type="submit"; href="index.php">Inicio</button>
    </form>
    
 
</body>
</html>

