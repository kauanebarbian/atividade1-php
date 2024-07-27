<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Materia</title>
</head>
<body>
<?php
    require_once '../models/materiaModel.php';

    session_start();

    if ($_SESSION['esta_logado'] !== true || $_SESSION['id_tipo_usuario'] != 1) {
        header('Location: login.php');
        exit();
    }

    $materiaModel = new materiaModel();

    $materia = $materiaModel->buscarMateria();
?>
</body>
<header>
        <?php require_once '../public/html/menuAdmin.html' ?>
        <h1>Listar materia</h1>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($materia as $materia) :?>
                    <tr>
                        <td><?= $materia->descricao; ?></td>
                        <td>
                            <a href="editarMateria.php?idMateria=<?= $materia->idMateria; ?>">Editar</a>
                            <form action="../routers/materiaRouter.php" method="post">
                                <input type="hidden" name="id_" id="idMateria" value="<?= $materia->idMateria; ?>">
                                <input type="hidden" name="rota" id="rota" value="editar">
                                <input type="submit" value="Excluir">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</html>