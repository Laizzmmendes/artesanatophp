<?php
require_once 'models/UsuarioModel.php';

class UsuarioController {
    private $model;

    public function __construct($db) {
        $this->model = new Usuario($db);
    }

    // Exibir todos os usuários
    public function listar() {
        $usuarios = $this->model->read();
        require 'views/usuarios/listar.php';
    }

    // Exibir formulário de cadastro de usuário
    public function formularioCadastro() {
        require 'views/usuarios/cadastrar.php';
    }

    // Cadastrar um novo usuário
    public function cadastrar($dados) {
        if (!empty($dados['nome']) && !empty($dados['email']) && !empty($dados['senha'])) {
            $nome = htmlspecialchars($dados['nome']);
            $email = htmlspecialchars($dados['email']);
            $senha = $dados['senha'];

            $this->model->create($nome, $email, $senha);
            header("Location: index.php?action=listarUsuarios");
        } else {
            echo "Preencha todos os campos obrigatórios!";
        }
    }

    // Exibir formulário de edição de usuário
    public function formularioEdicao($id) {
        $usuario = $this->model->find($id);
        if ($usuario) {
            require 'views/usuarios/editar.php';
        } else {
            echo "Usuário não encontrado!";
        }
    }

    // Editar um usuário existente
    public function editar($id, $dados) {
        if (!empty($dados['nome']) && !empty($dados['email'])) {
            $nome = htmlspecialchars($dados['nome']);
            $email = htmlspecialchars($dados['email']);
            $senha = !empty($dados['senha']) ? $dados['senha'] : null;

            $this->model->update($id, $nome, $email, $senha);
            header("Location: index.php?action=listarUsuarios");
        } else {
            echo "Preencha todos os campos obrigatórios!";
        }
    }

    // Excluir um usuário
    public function excluir($id) {
        $this->model->delete($id);
        header("Location: index.php?action=listarUsuarios");
    }

    // Autenticar o usuário (Login)
    public function autenticar($dados) {
        if (!empty($dados['email']) && !empty($dados['senha'])) {
            $email = htmlspecialchars($dados['email']);
            $senha = $dados['senha'];

            $usuario = $this->model->authenticate($email, $senha);
            if ($usuario) {
                // Login bem-sucedido, armazena os dados do usuário na sessão
                session_start();
                $_SESSION['usuario_id'] = $usuario['id'];
                $_SESSION['usuario_nome'] = $usuario['nome'];
                header("Location: index.php?action=painel"); // Redireciona ao painel
            } else {
                echo "Credenciais inválidas!";
            }
        } else {
            echo "Preencha todos os campos obrigatórios!";
        }
    }

    // Logout do usuário
    public function logout() {
        session_start();
        session_destroy();
        header("Location: index.php?action=login");
    }
}