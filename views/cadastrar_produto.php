<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Cadastrar Produto</title>
</head>
<body>
    <main>
        <section class="form-section">
            <h2>Cadastrar Produto</h2>
            <form action="../index.php?action=cadastrarProduto" method="post">
                <label for="nome">Nome do Produto:</label>
                <input type="text" name="nome" id="nome" required>
                
                <label for="tipo_material">Tipo de Material:</label>
                <input type="text" name="tipo_material" id="tipo_material" required>
                
                <label for="preco">Preço (R$):</label>
                <input type="number" step="0.01" name="preco" id="preco" required>
                
                <button type="submit">Cadastrar</button>
            </form>
            <p><a href="../index.php">Voltar para a página inicial</a></p>
        </section>
    </main>
</body>
</html>
