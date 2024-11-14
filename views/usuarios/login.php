<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login de Usuário</title>
</head>
<body>
    <h1>Login de Usuário</h1>
    <form action="index.php?action=login" method="post">
        <label>Email: <input type="email" name="email" required></label><br>
        <label>Senha: <input type="password" name="senha" required></label><br>
        <button type="submit">Entrar</button>
    </form>
    <p><a href="index.php?action=formularioCadastro">Não tem uma conta? Cadastre-se</a></p>
</body>
</html>
