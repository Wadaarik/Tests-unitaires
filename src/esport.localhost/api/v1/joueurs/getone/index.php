<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

include_once '../../../config/database.php';
include_once '../../../config/config.php';
include_once '../../../objects/joueurs.php';

$database = new Database();
$db = $database->getConnection();

$joueur = new Joueurs($db);
$joueur->id = isset($_GET['id']) ? $_GET['id'] : die();
$joueur->readOne();

if($joueur->nom !== null) {
    $joueurs_arr = array(
        "id" => $joueur->id,
        "nom" => $joueur->nom,
        "prenom" => $joueur->prenom,
        "pseudo" => $joueur->pseudo,
        "jeux" => $joueur->jeux,
        "poste" => $joueur->poste,
        "equipe" => $joueur->equipe,
        "pays" => $joueur->pays,
        "drapeau" => $config['url_img'] . 'flag/' . $joueur->drapeau,
        "photo" => $joueur->photo
    );

    http_response_code(200);

    echo json_encode($joueurs_arr);
} else {
    http_response_code(404);

    echo json_encode(
        array("message" => "Player does not exist.")
    );
}
