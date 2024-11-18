<?php
require_once 'C:\aluno2\xampp\htdocs\artesanato2\config\database.php';
require_once 'C:\aluno2\xampp\htdocs\artesanato2\controllers\ProdutoController.php';

$database = new Database();
$db = $database->getConnection();

$produtoController = new ProdutoController($db);
$produtos = $produtoController->listarProdutos();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Lista de Produtos</title>
</head>
<body>
    <main>
        <section class="produtos-section">
            <h2>Lista de Produtos</h2>
            <?php if (empty($produtos)): ?>
                <p>Nenhum produto cadastrado.</p>
            <?php else: ?>
                <table>
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Tipo de Material</th>
                            <th>Preço</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($produtos as $produto): ?>
                        <tr>
                            <td><?= htmlspecialchars($produto['nome']) ?></td>
                            <td><?= htmlspecialchars($produto['tipo_material']) ?></td>
                            <td>R$ <?= htmlspecialchars(number_format($produto['preco'], 2, ',', '.')) ?></td>
                            <td>
                                <a href="editar.php?id=<?= $produto['id'] ?>">Editar</a>
                                <a href="deletar.php?id=<?= $produto['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir este produto?')">Excluir</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
            <a href="cadastrar_produto.php">Cadastrar um produto</a>
        </section>
    </main>
</body>
</html>
