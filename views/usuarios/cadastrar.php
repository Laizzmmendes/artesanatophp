<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Usuário</title>
</head>
<body>
    <h1>Cadastrar Usuário</h1>
    <form action="index.php?action=cadastrar" method="post">
        <label>Nome: <input type="text" name="nome" required></label><br>
        <label>Email: <input type="email" name="email" required></label><br>
        <label>Senha: <input type="password" name="senha" required></label><br>
        <button type="submit">Cadastrar</button>
    </form>
    <p><a href="index.php?action=login">Já tem uma conta? Faça login</a></p>
</body>
</html>

