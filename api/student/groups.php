<?php
session_start();

header("Access-Control-Allow-Origin: *");
header("Content-Type:json");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header("Accept:application/x-www-form-urlencoded");
require_once('../../config/database.php');
//require_once('config/database.php');


try {

    $database = new Database();
    $conn = $database->getConnection();

    $query = "SELECT  * from groups where stageId = " . $_POST['stageId'];

    $stmt = $conn->prepare($query);

    // execute query
    $stmt->execute();

    //$num = $stmt->rowCount();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $json = json_encode($results);
    echo $json;
} catch (Exception $exception) {
    echo  $exception->getMessage();
}
