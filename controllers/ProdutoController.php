<?php
require_once 'models/Produto.php';

class ProdutoController {
    private $produto;

    public function __construct($db) {
        $this->produto = new Produto($db);
    }

    // Listar produtos
    public function listar() {
        $produtos = $this->produto->read();
        include 'views/produtos/listar.php';
    }

    // Cadastrar produto
    public function cadastrar($dados) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->produto->create($dados['nome'], $dados['descricao'], $dados['tipo_material'], $dados['preco']);
            header("Location: index.php?action=listar");
        }
        include 'views/produtos/cadastrar.php';
    }

    // Editar produto
    public function editar($id, $dados) {
        $produto = $this->produto->find($id);
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->produto->update($id, $dados['nome'], $dados['descricao'], $dados['tipo_material'], $dados['preco']);
            header("Location: index.php?action=listar");
        }
        include 'views/produtos/editar.php';
    }

    // Excluir produto
    public function excluir($id) {
        $this->produto->delete($id);
        header("Location: index.php?action=listar");
    }
}