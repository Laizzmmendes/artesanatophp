 <!-- views/produtos/listar.php -->
 <h1>Lista de Produtos</h1>
<a href="index.php?action=cadastrar">Cadastrar Novo Produto</a>
<ul>
    <?php foreach ($produtos as $produto): ?>
        <li>
            <strong><?php echo $produto['nome']; ?></strong> - <?php echo $produto['preco']; ?>
            <a href="index.php?action=editar&id=<?php echo $produto['id']; ?>">Editar</a>
            <a href="index.php?action=excluir&id=<?php echo $produto['id']; ?>" onclick="return confirm('Tem certeza?')">Excluir</a>
        </li>
    <?php endforeach; ?>
</ul>