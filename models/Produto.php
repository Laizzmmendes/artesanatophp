<?php
require_once 'C:\aluno2\xampp\htdocs\artesanatophp\config\database.php';
class Produto
{
    private $conn;
    private $table_name = "produtos";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Método para criar produto
    public function create($nome, $descricao, $tipo_material, $preco)
    {
        $query = "INSERT INTO " . $this->table_name . " (nome, descricao, tipo_material, preco) VALUES (:nome, :descricao, :tipo_material, :preco)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":descricao", $descricao);
        $stmt->bindParam(":tipo_material", $tipo_material);
        $stmt->bindParam(":preco", $preco);


        return $stmt->execute();
    }

    // Método para listar todos os produtos
    public function read()
    {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para buscar um produto por ID
    public function find($id)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Método para atualizar produto
    public function update($id, $nome, $descricao, $tipo_material, $preco)
    {
        $query = "UPDATE " . $this->table_name . " SET nome = :nome, descricao = :descricao, tipo_material = :tipo_material, preco = :preco,  id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":descricao", $descricao);
        $stmt->bindParam(":tipo_material", $tipo_material);
        $stmt->bindParam(":preco", $preco);


        return $stmt->execute();
    }

    // Método para excluir produto
    public function delete($id)
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}