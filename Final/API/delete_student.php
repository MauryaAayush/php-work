<?php

header("Access-Control-Allow-Methods: DELETE");
header("Content-Type: application/json");

include("../confige.php");

$c1 = new Confige();

if ($_SERVER['REQUEST_METHOD'] == "DELETE") {

    $res = file_get_contents('php://input');
    parse_str($res,$data);

    if (isset($data['id'])) {
        $id = intval($data['id']);
        $status = $c1->removeStudent($id);
        if ($status) {
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
