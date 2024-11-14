<?php
require_once 'config/database.php';

class Usuario {
    private $conn;
    private $table_name = "usuarios";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Criar usuário
    public function create($nome, $email, $senha) {
        $query = "INSERT INTO " . $this->table_name . " (nome, email, senha) VALUES (:nome, :email, :senha)";
        $stmt = $this->conn->prepare($query);
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":senha", $senha_hash);
        return $stmt->execute();
    }

    // Buscar usuário por email
    public function findByEmail($email) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Autenticar usuário
    public function authenticate($email, $senha) {
        $usuario = $this->findByEmail($email);
        return $usuario && password_verify($senha, $usuario['senha']) ? $usuario : false;
    }
}
