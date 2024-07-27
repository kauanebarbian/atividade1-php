<?php
    require_once 'DAL/notaDAO.php';

    class notaModel {
        public ?int $idNota;
        public ?int $idUsuario;
        public ?int $idMateria;
        public ?float $valor;

        public function __construct(?int $idNota = null, ?int $idUsuario = null, ?int $idMateria = null,  ?float $valor = null) {
            $this->idNota = $idNota;
            $this->idUsuario = $idUsuario;
            $this->idMateria = $idMateria;
            $this->valor = $valor;
        }
    }
?>