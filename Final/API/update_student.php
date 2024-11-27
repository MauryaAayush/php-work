<?php
header("Access-Control-Allow-Methods: PUT");
header("Content-Type: application/json");

include("../confige.php");

$c1 = new Confige();

if ($_SERVER['REQUEST_METHOD'] == "PUT") {
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['id']) && isset($data['name']) && isset($data['age']) && isset($data['email']) && isset($data['course'])) {
        $id = intval($data['id']);
        $name = $c1->conn->real_escape_string($data['name']);
        $age = intval($data['age']);
        $email = $c1->conn->real_escape_string($data['email']);
        $course = $c1->conn->real_escape_string($data['course']);

        $query = "UPDATE students SET name='$name', age=$age, email='$email', course='$course' WHERE id=$id";
        if ($c1->conn->query($query)) {
            $arr['msg'] = "Student updated successfully.";
        } else {
            $arr['error'] = "Failed to update student.";
        }
    } else {
        $arr['error'] = "Invalid input data.";
    }
} else {
    $arr['error'] = "Only PUT method is allowed !!";
}

echo json_encode($arr);
?>
