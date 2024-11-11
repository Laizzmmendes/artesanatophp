<?php
require_once 'config/database.php';
require_once 'controllers/ProdutoController.php';

$db = (new Database())->getConnection();
$produtoController = new ProdutoController($db);

// Roteamento baseado em ação
$action = $_GET['action'] ?? 'listar';
$id = $_GET['id'] ?? null;

if ($action === 'cadastrar') {
    $produtoController->cadastrar($_POST);
} elseif ($action === 'editar' && $id !== null) {
    $produtoController->editar($id, $_POST);
} elseif ($action === 'excluir' && $id !== null) {
    $produtoController->excluir($id);
} else {
    // Caso padrão: Listar produtos
    $produtoController->listar();
}