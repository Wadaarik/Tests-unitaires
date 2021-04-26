<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

include_once '../../../config/database.php';
include_once '../../../config/config.php';
include_once '../../../objects/equipes.php';

$database = new Database();
$db = $database->getConnection();

$equipe = new Equipe($db);
$equipe->id = isset($_GET['id']) ? $_GET['id'] : die();
$equipe->readOne();

if($equipe->nom !== null) {
    $equipes_arr = array(
        "id" => $equipe->id,
        "nom" => $equipe->nom,
        "logo" => $config['url_img'] . 'teams/' . $equipe->logo,
        "pays" => $equipe->pays,
        "drapeau" => $config['url_img'] . 'flag/' . $equipe->drapeau,
        "date_creation" => $equipe->date_creation,
        "link_fb" => $equipe->link_fb,
        "link_twitter" => $equipe->link_twitter,
        "link_insta" => $equipe->link_insta
    );

    http_response_code(200);

    echo json_encode($equipes_arr);
} else {
    http_response_code(404);

    echo json_encode(
        array("message" => "Teams does not exist.")
    );
}
