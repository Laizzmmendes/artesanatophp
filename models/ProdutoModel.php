<?php
class ProdutoModel
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function listar()
    {
        $query = "SELECT * FROM produtos";
        $stmt = $this->conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function cadastrar($nome, $tipo_material, $preco)
    {
        $query = "INSERT INTO produtos (nome, tipo_material, preco ) VALUES (:nome, :tipo_material, :preco)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':tipo_material', $tipo_material);
        $stmt->bindParam(':preco', $preco);

        return $stmt->execute();
    }

    public function deletar($id)
    {
        $query = "DELETE FROM produtos WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
    public function buscarProdutoPorId($id)
    {
        $query = "SELECT * FROM produtos WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function atualizarProduto($id, $nome, $tipo_material, $preco)
    {
        $query = "UPDATE produtos SET nome = :nome, tipo_material = :tipo_material, preco = :preco WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':tipo_material', $tipo_material);
        $stmt->bindParam(':preco', $preco);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }


}
?>