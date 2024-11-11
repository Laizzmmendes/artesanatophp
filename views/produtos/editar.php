<!-- views/produtos/editar.php -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Editar Produto</h1>
        
        <form action="index.php?action=editar&id=<?php echo htmlspecialchars($produto['id']); ?>" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome do Produto</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo htmlspecialchars($produto['nome']); ?>" required>
            </div>
            
            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea class="form-control" id="descricao" name="descricao" rows="4" required><?php echo htmlspecialchars($produto['descricao']); ?></textarea>
            </div>
            
            <div class="mb-3">
                <label for="tipo_material" class="form-label">Tipo de Material</label>
                <input type="text" class="form-control" id="tipo_material" name="tipo_material" value="<?php echo htmlspecialchars($produto['tipo_material']); ?>" required>
            </div>
            
            <div class="mb-3">
                <label for="preco" class="form-label">Preço</label>
                <input type="number" step="0.01" class="form-control" id="preco" name="preco" value="<?php echo htmlspecialchars($produto['preco']); ?>" required>
            </div>
            
            <div class="mb-3">
                <label for="imagem" class="form-label">Imagem do Produto</label>
                <input type="file" class="form-control" id="imagem" name="imagem" accept="image/*">
                <?php if (!empty($produto['imagem'])): ?>
                    <p>Imagem atual: <img src="caminho/para/imagens/<?php echo htmlspecialchars($produto['imagem']); ?>" alt="Imagem do Produto" width="100"></p>
                <?php endif; ?>
            </div>
            
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            <a href="index.php?action=listar" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>