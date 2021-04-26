<?php

class Joueurs {
    private $conn;
    private $table_name = "dataleague_joueur";
    private $table_pays = "dataleague_pays";
    private $table_jeux = "dataleague_jeux";
    private $table_equipe = "dataleague_equipe";
    private $table_poste = "dataleague_poste";

    public $id;
    public $nom;
    public $prenom;
    public $pseudo;
    public $jeux;
    public $poste;
    public $equipe;
    public $pays;
    public $drapeau;
    public $photo;

    public function __construct($db) {
        $this->conn = $db;
    }

    function getAll() {
        $query = "SELECT joueur.id_joueur as id, joueur.nom, joueur.prenom, joueur.pseudo, jeux.nom as jeux, poste.nom as poste, e.nom as equipe, p.libelle as pays, p.drapeau, joueur.photo
                    FROM " . $this->table_name . " joueur
                    LEFT JOIN " . $this->table_pays . " p ON p.id_pays = joueur.pays_id_pays
                    LEFT JOIN " . $this->table_jeux . " jeux ON jeux.id_jeux = joueur.jeux_id_jeux
                    LEFT JOIN " . $this->table_equipe . " e ON e.id_equipe = joueur.equipe_id_equipe
                    LEFT JOIN " . $this->table_poste . " poste ON poste.id_poste = joueur.poste_id_poste";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    function readOne() {
        $query = "SELECT joueur.id_joueur as id, joueur.nom, joueur.prenom, joueur.pseudo, jeux.nom as jeux, poste.nom as poste, e.nom as equipe, p.libelle as pays, p.drapeau, joueur.photo
                    FROM dataleague_joueur joueur
                    LEFT JOIN dataleague_pays p ON p.id_pays = joueur.pays_id_pays
                    LEFT JOIN dataleague_jeux jeux ON jeux.id_jeux = joueur.jeux_id_jeux
                    LEFT JOIN dataleague_equipe e ON e.id_equipe = joueur.equipe_id_equipe
                    LEFT JOIN dataleague_poste poste ON poste.id_poste = joueur.poste_id_poste
                    WHERE joueur.id_joueur = ?
                    LIMIT 0,1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->id = $row['id'];
        $this->nom = $row['nom'];
        $this->prenom = $row['prenom'];
        $this->pseudo = $row['pseudo'];
        $this->jeux = $row['jeux'];
        $this->poste = $row['poste'];
        $this->equipe = $row['equipe'];
        $this->pays = $row['pays'];
        $this->drapeau = $row['drapeau'];
        $this->photo = $row['photo'];
    }
}