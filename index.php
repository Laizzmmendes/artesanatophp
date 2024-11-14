<?php
require_once 'config/database.php';
require_once 'controllers/ProdutoController.php';

$db = (new Database())->getConnection();
$produtoController = new ProdutoController($db);

// Roteamento baseado em ação
$action = $_GET['action'] ?? 'listar';
$id = $_GET['id'] ?? null;

if ($action === 'formularioCadastro') {
    require 'views/usuarios/cadastrar.php';
} elseif ($action === 'cadastrar') {
    $controller->cadastrar($_POST);
} elseif ($action === 'login') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $controller->login($_POST);
    } else {
        require 'views/usuarios/login.php';
    }
} elseif ($action === 'perfil') {
    $controller->perfil();
} elseif ($action === 'logout') {
    $controller->logout();
} else {
    // Redireciona para o login caso a ação não seja reconhecida
    header("Location: index.php?action=login");
}



