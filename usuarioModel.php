<?php
    require_once 'DAL/usuarioDAO.php';
    require_once 'tipoUsuarioModel.php';

    class usuarioModel {
        public ?int $idUsuario;
        public ?int $idTipoUsuario;
        public ?string $nome;
        public ?string $email;
        public ?string $senha;

        public function __construct(?int $idUsuario= null, ?int $idTipoUsuario = null, ?string $nome = null, ?string $email = null, ?string $senha = null) {
            $this->idUsuario = $idUsuario;
            $this->idTipoUsuario = $idTipoUsuario;
            $this->nome = $nome;
            $this->email = $email;
            $this->senha = $senha;
        }

        public function buscarUsuarioPorEmailESenha(usuarioModel $usuario) {
            $usuarioDAO = new usuarioDAO();
            $retorno = $usuarioDAO-> buscarUsuarioPorEmailESenha($usuario);
            
            return $retorno;
        }
        public function inserirUsuario(string $nome, string $email, string $senha) {
            $usuarioDAO = new usuarioDAO();
            $retorno = $usuarioDAO->inserirUsuario($nome, $email, $senha);

            return $retorno;
        }

        public function editarUsuario(usuarioModel $usuario) {
            $usuarioDAO = new usuarioDAO();
            $retorno = $usuarioDAO->editarUsuario($usuario);

            return $retorno;
        }

        public function buscarUsuarios() {
            $usuarioDAO = new usuarioDAO();
            $tipoUsuarioModel = new tipoUsuarioModel();
            $usuarios = $usuarioDAO->buscarUsuarios();

            foreach ($usuarios as $chave => $usuario) {
                $usuarios[$chave] = new usuarioModel(
                    $usuario['id_usuario'],
                    $usuario['id_tipo_usuario'],
                    $usuario['nome'],
                    $usuario['email'],
                    $usuario['senha'],
                    $tipoUsuarioModel->buscarTipoUsuarioPorId($usuario['id_tipo_usuario'])
                );
            }
            return $usuarios;
        }

        public function excluirUsuario(int $idUsuario) {
            $usuarioDAO = new usuarioDAO();
            
            return $usuarioDAO->excluirUsuario($idUsuario);
        }

        public function buscarUsuarioPorId(int $idUsuario) {
            $usuarioDAO = new usuarioDAO();

            $usuarios = $usuarioDAO->buscarUsuarioPorId($idUsuario);
        
          $usuario = new self ($usuarios['id_usuario'], $usuarios['id_tipo_usuario'], $usuarios['nome'], $usuarios['email'], $usuarios['senha']);
            return $usuario;
        }
    }
?>