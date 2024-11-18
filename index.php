<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'config/database.php';
require_once 'controllers/UsuarioController.php';
require_once 'controllers/ProdutoController.php';

$database = new Database();
$db = $database->getConnection();

$usuarioController = new UsuarioController($db);
$produtoController = new ProdutoController($db);

// Se o usuário estiver tentando fazer login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    if ($usuarioController->login($email, $senha)) {
        header("Location: index.php?action=painel");
        exit();
    } else {
        $error = "E-mail ou senha inválidos.";
    }
}

// Define a ação com base na URL (se for a ação "painel", exibe o painel do usuário)
$action = $_GET['action'] ?? 'login';
if ($action === 'cadastrarProduto'){
    $produtoController->cadastrarProduto($_POST['nome'], $_POST['tipo_material'], $_POST['preco']);
    header('location: views/listar.php');
} elseif ($action === 'painel') {
    header('location: views/listar.php');
} else {
    // Exibe o formulário de login se a ação for "login" ou se não estiver logado
    ?>
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Login</title>
    </head>
    <body>
        <main>
            <section class="form-section">
                <h2>Login</h2>
                <?php if (isset($error)): ?>
                    <p style="color: red;"><?= $error ?></p>
                <?php endif; ?>
                <form action="index.php" method="post">
                    <label for="email">E-mail:</label>
                    <input type="email" name="email" id="email" required>
                    
                    <label for="senha">Senha:</label>
                    <input type="password" name="senha" id="senha" required>
                    
                    <button type="submit" name="login">Entrar</button>
                </form>
            </section>
        </main>
    </body>
    </html>
    <?php
}
?>
