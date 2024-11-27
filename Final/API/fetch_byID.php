<?php
header("Access-Control-Allow-Methods: GET");
header("Content-Type: application/json");

include("../confige.php");

$c1 = new Confige();

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $query = "SELECT * FROM school WHERE id=$id";
        $result = $c1->conn->query($query);

        if ($data = $result->fetch_assoc()) {
            $arr = $data;
        } else {
            $arr['error'] = "Student not found.";
        }
    } else {
        $arr['error'] = "Student ID is required.";
    }
} else {
    $arr['error'] = "Only GET method is allowed !!";
}

echo json_encode($arr);
?>
    