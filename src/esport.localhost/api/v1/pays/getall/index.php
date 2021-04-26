<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../../../config/database.php';
include_once '../../../objects/pays.php';

$database = new Database();
$db = $database->getConnection();

$pays = new Pays($db);
$stmt = $pays->getAll();
$num = $stmt->rowCount();

if($num > 0) {
    $pays_arr = array();
    $pays_arr["records"] = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $pays_item = array(
            "id" => $id,
            "libelle" => $libelle,
            "drapeau" => $drapeau
        );

        array_push($pays_arr["records"], $pays_item);
    }

    http_response_code(200);

    echo json_encode($pays_arr);
} else {
    http_response_code(404);

    echo json_encode(
        array("message" => "No country found.")
    );
}
