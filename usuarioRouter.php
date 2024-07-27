<?php
    require_once "../controllers/usuarioController.php";

    $usuarioController = new usuarioController();

    $rota = $_POST['rota'];

    switch($rota) {
        case "entrar":
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            $usuarioController->validarUsuario($email, $senha);
            break;

        case "cadastrar":
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            $usuarioController->cadastrarUsuario($nome, $email, $senha);

            $usuarioController->cadastrarUsuario($idTipoUsuario, $nome, $email, $senha);
            break;
        case "excluir":
            $idUsuario = $_POST['idUsuario'];
    
            $usuarioController->excluirUsuario($idUsuario);
    
            break;
        
            case "salvar":
            $idUsuario = $_POST['idUsuario'];
            $idTipoUsuario = $_POST['idTipoUsuario'];
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            $usuarioController->editarUsuario($idUsuario, $idTipoUsuario, $nome, $email, $senha);
    
            break;
    }
?>