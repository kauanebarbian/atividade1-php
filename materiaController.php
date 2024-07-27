<?php 
    require_once '../models/materiaModel.php';

    class materiaController {
        public function inserirMateria(string $descricao) {
            $materiaModel = new materiaModel();
            $materia = new materiaModel(null, $descricao);

            $retorno = $materiaModel->inserirMateria($materia);

            if ($retorno) {
             header('Location: ../views/principal.php');
            }
            else {
                header('Location: ../views/cadastrarMateria.php');
            }

            exit();
    }
}
?>