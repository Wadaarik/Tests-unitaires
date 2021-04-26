<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../../../config/database.php';
include_once '../../../objects/jeux.php';

$database = new Database();
$db = $database->getConnection();

$jeux = new Jeux($db);
$stmt = $jeux->getAll();
$num = $stmt->rowCount();

if($num > 0) {
    $jeux_arr = array();
    $jeux_arr["records"] = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $jeux_item = array(
            "id" => $id,
            "nom" => $nom,
            "accronyme" => $accronyme,
            "logo" => $logo
        );

        array_push($jeux_arr["records"], $jeux_item);
    }

    http_response_code(200);

    echo json_encode($jeux_arr);
} else {
    http_response_code(404);

    echo json_encode(
        array("message" => "No country found.")
    );
}
