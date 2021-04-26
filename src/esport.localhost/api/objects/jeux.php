<?php

class Jeux {
    private $conn;
    private $table_name = "dataleague_jeux";

    public $id;
    public $nom;
    public $accronyme;
    public $logo;

    public function __construct($db) {
        $this->conn = $db;
    }

    function getAll() {
        $query = "SELECT j.id_jeux as id, j.nom, j.accronyme, j.logo 
                    FROM " . $this->table_name . " j";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
}