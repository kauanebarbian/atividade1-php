<?php
    require_once 'conexao.php';
    class materiaDAO {
        public function inserirMateria(materiaModel $materia) {
            $conexao = (new conexao())->getConexao();

            $sql = "INSERT INTO materia VALUES(null, :descricao);";

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':descricao', $materia->descricao);
            
            return $stmt->execute();
        }

        public function buscarMateria() {
            $conexao = (new conexao())->getConexao();

            $sql = "SELECT * FROM materia";

            $stmt = $conexao->prepare($sql);
            $stmt->execute();
            $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $retorno;
        }

        public function buscarMateriaPorId(int $idMateria) {
            $conexao = (new conexao ())->getConexao();
            $sql = "SELECT * FROM materia WHERE id_materia = :id_materia";

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':id_materia', $idMateria);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }
?>