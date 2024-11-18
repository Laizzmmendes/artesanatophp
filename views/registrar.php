<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Usuário</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <main>
        <section class="register-section">
            <h2>Registrar Usuário</h2>
            <form action="index.php?action=registrar" method="post">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>

                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" required>

                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>

                <button type="submit">Registrar</button>
            </form>
            <p>Já possui uma conta? <a href="index.php?action=login">Faça login aqui</a>.</p>
        </section>
    </main>
</body>
</html>
