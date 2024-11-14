<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Perfil do Usuário</title>
</head>
<body>
    <h1>Perfil do Usuário</h1>
    <p><strong>Nome:</strong> <?php echo htmlspecialchars($usuario['nome']); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($usuario['email']); ?></p>
    <a href="index.php?action=logout">Sair</a>
</body>
</html>
