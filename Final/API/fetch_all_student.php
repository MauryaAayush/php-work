<?php
header("Access-Control-Allow-Methods: GET");
header("Content-Type: application/json");

include("../confige.php");


$c1 = new Confige();

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $query = "SELECT * FROM school";
    $result = $c1->conn->query($query);
    $arr = [];

    if ($result) {
        while ($data = $result->fetch_assoc()) {
            array_push($arr, $data);
        }
    } else {
        $arr['error'] = "No data found or query error.";
    }
} else {
    $arr['error'] = "Only GET method is allowed !!";
}

echo json_encode($arr);
?>
