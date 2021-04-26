<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../../../config/database.php';
include_once '../../../config/config.php';
include_once '../../../objects/joueurs.php';

$database = new Database();
$db = $database->getConnection();

$joueurs = new Joueurs($db);
$stmt = $joueurs->getAll();
$num = $stmt->rowCount();

if($num > 0) {
    $joueurs_arr = array();
    $joueurs_arr["records"] = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $joueur_item = array(
            "id" => $id,
            "nom" => $nom,
            "prenom" => $prenom,
            "pseudo" => $pseudo,
            "jeux" => $jeux,
            "poste" => $poste,
            "equipe" => $equipe,
            "pays" => $pays,
            "drapeau" => $config['url_img'] . 'flag/' . $drapeau,
            "photo" => $config['url_img'] . 'players/' . $photo
        );

        array_push($joueurs_arr["records"], $joueur_item);
    }

    http_response_code(200);

    echo json_encode($joueurs_arr);
} else {
    http_response_code(404);

    echo json_encode(
        array("message" => "No players found.")
    );
}
