<?php

header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json");

include("../confige.php");

$c1 = new Confige();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Retrieve data from x-www-form-urlencoded request
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['age']) && isset($_POST['course'])) {
        $name = $c1->conn->real_escape_string($_POST['name']);
        $email = $c1->conn->real_escape_string($_POST['email']);
        $password = password_hash($c1->conn->real_escape_string($_POST['password']), PASSWORD_BCRYPT);
        $age = intval($_POST['age']);
        $course = $c1->conn->real_escape_string($_POST['course']);

        $query = "INSERT INTO school (name, email, age, course, password) VALUES ('$name', '$email', $age, '$course', '$password')";
        if ($c1->conn->query($query)) {
            $arr = [
                'msg' => "User registered successfully."
            ];
        } else {
            $arr = [
                'error' => "Failed to register user."
            ];
        }
    } else {
        $arr = [
            'error' => "Invalid input data."
        ];
    }
} else {
    $arr = [
        'error' => "Only POST method is allowed!"
    ];
}

echo json_encode($arr);
