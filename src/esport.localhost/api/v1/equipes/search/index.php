<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../../../config/database.php';
include_once '../../../config/config.php';
include_once '../../../objects/equipes.php';

$database = new Database();
$db = $database->getConnection();

$equipe = new Equipe($db);

$keywords = isset($_GET['s']) ? $_GET['s'] : '';

$stmt = $equipe->search($keywords);
$num = $stmt->rowCount();

if($num > 0) {
    $equipes_arr = array();
    $equipes_arr["records"] = array();

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $equipe_item = array(
            "id" => $id,
            "nom" => $nom,
            "logo" => $config['url_img'] . 'teams/' . $logo,
            "pays" => $pays,
            "drapeau" => $config['url_img'] . 'flag/' . $drapeau,
            "date_creation" => $date_creation,
            "link_fb" => $link_fb,
            "link_twitter" => $link_twitter,
            "link_insta" => $link_insta
        );

        array_push($equipes_arr["records"], $equipe_item);
    }

    http_response_code(200);
    echo json_encode($equipes_arr);
} else {
    http_response_code(404);
    echo json_encode(
        array("message" => "No products found.")
    );
}