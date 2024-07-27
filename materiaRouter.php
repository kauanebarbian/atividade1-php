<?php
    require_once '../controllers/materiaController.php';

    $materiaController = new materiaController();

    $rota = $_POST['rota'];

    switch ($rota) {
        case "cadastrar":
            $descricao = $_POST['descricao'];
            

            $materiaController->inserirMateria($descricao);

            break;
    }

?>