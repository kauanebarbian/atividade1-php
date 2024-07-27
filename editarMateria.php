<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar materia</title>
</head>
<body>
<?php
    require_once '../models/materiaModel.php';

    session_start();

    if($_SESSION['esta_logado'] !== true || $_SESSION['esta_logado'] != 1) {
        header('Location: login.php');
        exit();
    }

    $idMateria = intval($_GET['idMateria']);
    $materiaModel = new materiaModel();
    $materia = $materiaModel->buscarMateriaPorId($idMateria);
?>
</body>
<header>
        <?php require_once '../public/html/menuAdmin.html'; ?>
        <h1>Editar materia</h1>
    </header>
    <main>
        <form action="../routers/materiaRouter.php" method="post">
            <label for="descricao">Descrição</label>
            <br>
            <input type="text" name="descricao" id="descricao" value="<?= $materia->descricao; ?>">
            <br>
            <br>
            <input type="hidden" name="materia" id="materia" value="<?= $materia->idMateria; ?>">
            <input type="hidden" name="rota" id="rota" value="salvar">
            <input type="submit" value="Salvar">
            </form>
    </main>
</html>