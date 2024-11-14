<?php
require_once 'models/UsuarioModel.php';

class UsuarioController {
    private $model;

    public function __construct($db) {
        $this->model = new Usuario($db);
    }

    public function cadastrar($dados) {
        if (!empty($dados['nome']) && !empty($dados['email']) && !empty($dados['senha'])) {
            $this->model->create($dados['nome'], $dados['email'], $dados['senha']);
            header("Location: index.php?action=login");
        }
    }

    public function login($dados) {
        session_start();
        if (!empty($dados['email']) && !empty($dados['senha'])) {
            $usuario = $this->model->authenticate($dados['email'], $dados['senha']);
            if ($usuario) {
                $_SESSION['usuario'] = $usuario;
                header("Location: index.php?action=perfil");
            } else {
                echo "Login ou senha inválidos.";
            }
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: index.php?action=login");
    }

    public function perfil() {
        session_start();
        if (isset($_SESSION['usuario'])) {
            $usuario = $_SESSION['usuario'];
            require 'views/usuarios/perfil.php';
        } else {
            header("Location: index.php?action=login");
        }
    }
}
