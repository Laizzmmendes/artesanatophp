<?php
require_once 'config/database.php';

class Usuario {
    private $conn;
    private $table_name = "usuarios";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Método para criar um novo usuário
    public function create($nome, $email, $senha) {
        $query = "INSERT INTO " . $this->table_name . " (nome, email, senha) VALUES (:nome, :email, :senha)";
        $stmt = $this->conn->prepare($query);

        // Criptografar a senha antes de salvar
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":senha", $senha_hash);

        return $stmt->execute();
    }

    // Método para listar todos os usuários
    public function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para buscar um usuário por ID
    public function find($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Método para atualizar informações do usuário
    public function update($id, $nome, $email, $senha = null) {
        if ($senha) {
            // Se a senha foi fornecida, atualize também a senha
            $query = "UPDATE " . $this->table_name . " SET nome = :nome, email = :email, senha = :senha WHERE id = :id";
            $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
        } else {
            // Caso contrário, atualize apenas o nome e o email
            $query = "UPDATE " . $this->table_name . " SET nome = :nome, email = :email WHERE id = :id";
        }
        
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":email", $email);
        if ($senha) {
            $stmt->bindParam(":senha", $senha_hash);
        }

        return $stmt->execute();
    }

    // Método para excluir um usuário
    public function delete($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }

    // Método para autenticar usuário (para login)
    public function authenticate($email, $senha) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        // Verifica se a senha fornecida corresponde à senha armazenada
        if ($usuario && password_verify($senha, $usuario['senha'])) {
            return $usuario; // Login bem-sucedido, retorna os dados do usuário
        }

        return false; // Falha no login
    }
}