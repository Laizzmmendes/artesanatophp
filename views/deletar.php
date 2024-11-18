<?php
require_once '../config/database.php';
require_once '../controllers/ProdutoController.php';

$database = new Database();
$db = $database->getConnection();

$produtoController = new ProdutoController($db);

// Verifica se o ID do produto foi passado pela URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Tenta excluir o produto com o ID fornecido
    if ($produtoController->deletarProduto($id)) {
        // Redireciona para a página de listagem de produtos após a exclusão bem-sucedida
        header("Location: listar.php");
        exit();
    } else {
        $error = "Erro ao tentar excluir o produto.";
    }
} else {
    // Redireciona para a listagem se o ID não for especificado
    header("Location: listar.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Excluir Produto</title>
</head>
<body>
    <main>
        <section class="message-section">
            <?php if (isset($error)): ?>
                <p style="color: red;"><?= $error ?></p>
            <?php else: ?>
                <p>Produto excluído com sucesso.</p>
            <?php endif; ?>
            <a href="listar.php">Voltar para a Lista de Produtos</a>
        </section>
    </main>
</body>
</html>
