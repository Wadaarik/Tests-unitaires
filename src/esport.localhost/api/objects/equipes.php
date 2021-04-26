<?php

class Equipe {
    private $conn;
    private $table_name = "dataleague_equipe";
    private $table_pays = "dataleague_pays";

    public $id;
    public $nom;
    public $logo;
    public $pays;
    public $drapeau;
    public $date_creation;
    public $link_fb;
    public $link_twitter;
    public $link_insta;

    public function __construct($db) {
        $this->conn = $db;
    }

    function getAll() {
        $query = "SELECT e.id_equipe as id, e.nom, e.logo, p.libelle as pays, p.drapeau, e.date_creation, e.link_fb, e.link_twitter, e.link_insta
                  FROM " . $this->table_name . " e
                  LEFT JOIN " . $this->table_pays . " p ON p.id_pays = e.pays_id_pays"; //ORDER BY e.nom ASC

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    function readOne() {
        $query = "SELECT e.id_equipe as id, e.nom, e.logo, p.libelle as pays, p.drapeau, e.date_creation, e.link_fb, e.link_twitter, e.link_insta
                  FROM " . $this->table_name . " e
                  LEFT JOIN " . $this->table_pays . " p ON p.id_pays = e.pays_id_pays
                  WHERE e.id_equipe = ?
                  LIMIT 0,1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->id = $row['id'];
        $this->nom = $row['nom'];
        $this->logo = $row['logo'];
        $this->pays = $row['pays'];
        $this->drapeau = $row['drapeau'];
        $this->date_creation = $row['date_creation'];
        $this->link_fb = $row['link_fb'];
        $this->link_twitter = $row['link_twitter'];
        $this->link_insta = $row['link_insta'];
    }

    function create() {
        $query = "INSERT INTO " . $this->table_name . " (nom, logo, pays_id_pays, date_creation, link_fb, link_twitter, link_insta)
                    VALUES (:nom, :logo, :pays, :date_creation, :link_fb, :link_twitter, :link_insta)";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->nom=htmlspecialchars(strip_tags($this->nom));
        $this->logo=htmlspecialchars(strip_tags($this->logo));
        $this->pays=htmlspecialchars(strip_tags($this->pays));
        $this->date_creation=htmlspecialchars(strip_tags($this->date_creation));
        $this->link_fb=htmlspecialchars(strip_tags($this->link_fb));
        $this->link_twitter=htmlspecialchars(strip_tags($this->link_twitter));
        $this->link_insta=htmlspecialchars(strip_tags($this->link_insta));

        // bind values
        $stmt->bindParam(":nom", $this->nom);
        $stmt->bindParam(":logo", $this->logo);
        $stmt->bindParam(":pays", $this->pays);
        $stmt->bindParam(":date_creation", $this->date_creation);
        $stmt->bindParam(":link_fb", $this->link_fb);
        $stmt->bindParam(":link_twitter", $this->link_twitter);
        $stmt->bindParam(":link_insta", $this->link_insta);

        // execute query
        if($stmt->execute()){
            return true;
        }

        return false;
    }
}