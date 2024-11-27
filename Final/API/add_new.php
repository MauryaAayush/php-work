<?php
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json");


include("../confige.php");


$c1 = new Confige();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
 
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    $query = "INSERT INTO school (name, age, email, course) VALUES ('$name', '$age', '$email', '$course')";
    $res = $c1->conn->query($query);

    if ($res) {
        $arr['status'] = "Record inserted successfully!";
    } else {
        $arr['error'] = "Record insertion failed!";
    }
} else {
    $arr['error'] = "Only POST method is allowed!";
}

// Return the response as JSON
echo json_encode($arr);
?>
