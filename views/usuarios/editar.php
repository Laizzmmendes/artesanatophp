<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuário</title>
</head>
<body>
    <h1>Editar Usuário</h1>
    <form action="index.php?action=editar&id=<?php echo $usuario['id']; ?>" method="post">
        <label>Nome: <input type="text" name="nome" value="<?php echo htmlspecialchars($usuario['nome']); ?>" required></label><br>
        <label>Email: <input type="email" name="email" value="<?php echo htmlspecialchars($usuario['email']); ?>" required></label><br>
        <label>Senha: <input type="password" name="senha" placeholder="Nova senha (opcional)"></label><br>
        <button type="submit">Salvar</button>
    </form>
    <a href="index.php?action=listar">Voltar à Lista de Usuários</a>
</body>
</html>