<?php
require_once 'models/UsuarioModel.php';

class UsuarioController {
    private $usuarioModel;

    public function __construct($db) {
        $this->usuarioModel = new UsuarioModel($db);
    }

    public function login($email, $senha) {
        return $this->usuarioModel->autenticar($email, $senha);
    }

    public function registrar($nome, $email, $senha) {
        return $this->usuarioModel->cadastrar($nome, $email, $senha);
    }
}
?>
