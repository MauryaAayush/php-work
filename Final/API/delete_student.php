<?php

header("Access-Control-Allow-Methods: DELETE");
header("Content-Type: application/json");

include("../confige.php");

$c1 = new Confige();

if ($_SERVER['REQUEST_METHOD'] == "DELETE") {
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['id'])) {
        $id = intval($data['id']);
        $query = "DELETE FROM school WHERE id=$id";
        if ($c1->conn->query($query)) {
            $arr['msg'] = "Student deleted successfully.";
        } else {
            $arr['error'] = "Failed to delete student.";
        }
    } else {
        $arr['error'] = "Student ID is required.";
    }
} else {
    $arr['error'] = "Only DELETE method is allowed !!";
}

echo json_encode($arr);
?>
