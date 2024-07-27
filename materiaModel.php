<?php
    require_once 'DAL/materiaDAO.php';

    class materiaModel {
        public ?int $idMateria;
        public ?string $descricao;

        public function __construct(?int $idMateria = null, ?string $descricao = null) {
            $this->idMateria = $idMateria;
            $this->descricao = $descricao;
        }

        public function buscarMateria() {
            $materiaDAO = new materiaDAO();

            $materias = $materiaDAO->buscarMateria();

            foreach ($materias as $chave => $materia) {
                $materias[$chave] = new materiaModel($materia['id_materia'], $materia['descricao']);
            }

            return $materias;
        }
        public function inserirMateria(materiaModel $materia) {
            $materiaDAO = new materiaDAO();

            return $materiaDAO->inserirMateria($materia);
        }

        public function buscarMateriaPorId(int $idMateria) {
            $materiaDAO = new materiaDAO();

            $materia = $materiaDAO->buscarMateriaPorId($idMateria);

            $materia = new self ($materia['id_materia'], $materia['descricao']);
            return $materia;
        }
    }