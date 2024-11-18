<?php
require_once 'C:\aluno2\xampp\htdocs\artesanato2\models\ProdutoModel.php';

class ProdutoController {
    private $produtoModel;

    public function __construct($db) {
        $this->produtoModel = new ProdutoModel($db);
    }

    public function listarProdutos() {
        return $this->produtoModel->listar();
    }

    public function cadastrarProduto($nome, $tipo_material, $preco, ) {
        return $this->produtoModel->cadastrar($nome, $tipo_material, $preco, );
    }

    public function deletarProduto($id) {
        return $this->produtoModel->deletar($id);
    }
    public function buscarProdutoPorId($id) {
        return $this->produtoModel->buscarProdutoPorId($id);
    }
    public function atualizarProduto($id, $nome, $tipo_material, $preco){
        return $this->produtoModel->atualizarProduto($id, $nome, $tipo_material, $preco);
    }
}
?>
