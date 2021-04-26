<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../../../config/database.php';
include_once '../../../config/config.php';
include_once '../../../objects/equipes.php';

$database = new Database();
$db = $database->getConnection();

$equipe = new Equipe($db);

$data = json_decode(file_get_contents("php://input"));

if(!empty($data->nom) && !empty($data->logo) && !empty($data->pays) && !empty($data->date_creation)
    && !empty($data->link_fb) && !empty($data->link_twitter) && !empty($data->link_insta)) {
    $equipe->nom = $data->nom;
    $equipe->logo = $data->logo;
    $equipe->pays = $data->pays;
    $equipe->date_creation = $data->date_creation;
    $equipe->link_fb = $data->link_fb;
    $equipe->link_twitter = $data->link_twitter;
    $equipe->link_insta = $data->link_insta;

    if($equipe->create()) {
        http_response_code(201);
        echo json_encode(array("message" => "Team was created."));
    } else {
        http_response_code(503);
        echo json_encode(array("message" => "Unable to create team."));
    }
} else {
    http_response_code(400);
    echo json_encode(array("message" => "Unable to create team. Data is incomplete."));
}