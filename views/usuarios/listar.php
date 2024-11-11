<?php 
    require_once 'C:\aluno2\xampp\htdocs\artesanatophp\models\Produto.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuários</title>
</head>
<body>
    <h1>Lista de Usuários</h1>
    <a href="index.php?action=formularioCadastro">Cadastrar Novo Usuário</a>
    <ul>
        <?php foreach ($usuarios as $usuario): ?>
            <li>
                <?php echo htmlspecialchars($usuario['nome']) . " - " . htmlspecialchars($usuario['email']); ?>
                <a href="index.php?action=formularioEdicao&id=<?php echo $usuario['id']; ?>">Editar</a>
                <a href="index.php?action=excluir&id=<?php echo $usuario['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir este usuário?');">Excluir</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>