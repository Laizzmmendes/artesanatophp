<?php
require_once '../config/database.php';
require_once '../controllers/ProdutoController.php';

$database = new Database();
$db = $database->getConnection();

$produtoController = new ProdutoController($db);

// Verifica se o ID do produto foi passado pela URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $produto = $produtoController->buscarProdutoPorId($id);

    if (!$produto) {
        echo "Produto não encontrado.";
        exit();
    }
} else {
    header("Location: listar.php");
    exit();
}

// Processa o formulário de edição
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $tipo_material = $_POST['tipo_material'];
    $preco = $_POST['preco'];

    if ($produtoController->atualizarProduto($id, $nome, $tipo_material, $preco)) {
        header("Location: listar.php");
        exit();
    } else {
        $error = "Erro ao atualizar o produto.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Editar Produto</title>
</head>
<body>
    <main>
        <section class="form-section">
            <h2>Editar Produto</h2>
            <?php if (isset($error)): ?>
                <p style="color: red;"><?= $error ?></p>
            <?php endif; ?>
            <form action="editar.php?id=<?= htmlspecialchars($id) ?>" method="post">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" value="<?= htmlspecialchars($produto['nome']) ?>" required>
                
                <label for="tipo_material">Tipo de Material:</label>
                <input type="text" name="tipo_material" id="tipo_material" value="<?= htmlspecialchars($produto['tipo_material']) ?>" required>
                
                <label for="preco">Preço:</label>
                <input type="number" name="preco" id="preco" value="<?= htmlspecialchars($produto['preco']) ?>" step="0.01" required>
                
                <button type="submit">Atualizar Produto</button>
            </form>
            <a href="listar.php">Cancelar</a>
        </section>
    </main>
</body>
</html>
