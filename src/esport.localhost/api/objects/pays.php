<?php

class Pays {
    private $conn;
    private $table_name = "dataleague_pays";

    public $id;
    public $libelle;
    public $drapeau;

    public function __construct($db) {
        $this->conn = $db;
    }

    function getAll() {
        $query = "SELECT p.id_pays as id, p.libelle, p.drapeau 
                    FROM " . $this->table_name . " p";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
}