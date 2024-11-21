<?php
include 'config.php';


$result = $conn->query("SELECT * FROM clientes");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Seguidores ExplicaFabi</title>
    <link rel="stylesheet" href="./css/style.css">
    
</head>
<body>
<img src="image1.jpg" alt="foto explica" width="1400" height="200">
    <h1>❤️ Seguidores ExplicaFabi ❤️</h1>
    <a href="add.php">Adicionar Novo Seguidor</a>
    <table>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Sexo</th>
            <th>Bairro</th>
            <th>Ações</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($row['nome']); ?></td>
            <td><?= htmlspecialchars($row['email']); ?></td>
            <td><?= htmlspecialchars($row['sexo']); ?></td>
            <td><?= htmlspecialchars($row['bairro']); ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id']; ?>">Editar</a> |
                <a href="delete.php?id=<?= $row['id']; ?>" onclick="return confirm('Tem certeza?')">Deletar</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
     <!-- Botão para redirecionar para o site -->
<div class="redirect-button">
    <a href="https://youtube.com/@explicafabi?sinCSiBugRmLcVNpDI" target="_blank" class="button-link">Visite Explica Fabi no Youtube</a>
</div>

</body>
</html>
