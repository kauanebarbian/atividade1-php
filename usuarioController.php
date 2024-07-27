<?php
require_once '../models/usuarioModel.php';

    class usuarioController {
        public function validarUsuario(string $email, string $senha) {
            $email = str_replace(' ', '', $email);
            $senha = md5(str_replace(' ', '', $senha));

            $usuarioModel = new usuarioModel();
            $usuario = new usuarioModel(null, null, null, $email, $senha);
            $retorno = $usuarioModel->buscarUsuarioPorEmailESenha($usuario);
            
            session_start();
            
            if ($retorno) {
                $_SESSION['esta_logado'] = true;
                $_SESSION['id_tipo_usuario'] = $retorno['id_tipo_usuario'];

                header('Location: ../views/principal.php');

            }
            else {
                header('Location: ../views/login.php');
            }
            
            exit();
        }

        public function cadastrarUsuario(string $nome, string $email, string $senha) {
            $nome = str_replace(' ', '', $nome);
            $email = str_replace(' ', '', $email);
            $senha = md5(str_replace(' ', '', $senha));

            $usuarioModel = new usuarioModel();
            $retorno = $usuarioModel->inserirUsuario($nome, $email, $senha);

            session_start();

            if ($retorno === true){
                header('Location: ../views/login.php');
            }
            else {
                header('Location: ../views/cadastro.php');
            }
            exit();
            }

        public function excluirUsuario(int $idUsuario) {
            $usuarioModel = new usuarioModel();
            $usuarioModel->excluirUsuario($idUsuario);

            header('Location: ../views/principal.php');
            exit();
            }

        public function editarUsuario(int $idUsuario, int $idTipoUsuario, string $nome, string $email, string $senha) {
            if ($senha == null) {
                $usuario = new usuarioModel($idUsuario, $idTipoUsuario, $nome, $email, null);
            }
            else {
                $usuario = new usuarioModel($idUsuario, $idTipoUsuario, $nome, $email, $senha);
            }

            $usuarioModel = new usuarioModel();
            $usuario = new usuarioModel($idUsuario, $idTipoUsuario, $nome, $email, $senha);

            $retorno = $usuarioModel->editarUsuario($usuario);

            if ($retorno) {
                header("Location: ../views/listarUsuario.php");
            }
            else {
                header("Location: ../views/editarUsuario.php?idUsuario=$idUsuario");
            }
            exit();
        }
    }
?>

