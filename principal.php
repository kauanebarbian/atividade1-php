<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
        <?php
            session_start();
            
            if ($_SESSION['esta_logado'] !== true || $_SESSION['id_tipo_usuario'] !== 1) {
                header('Location: login.php');
                exit();
            }
        ?>
<body>
    <header>
        <?php
            if ($_SESSION['id_tipo_usuario'] == 1) {
                require_once '../public/html/menuAdmin.html';
            }
            else {
                require_once '../public/html/menuAluno.html';
            }
        ?>
        <h1>Principal</h1>
    </header>
    <main>
        <tbody>
        </tbody>
        </table>
    </main>
</body>
</html>