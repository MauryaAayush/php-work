<?php
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json");

include("../confige.php");

$c1 = new Confige();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $c1->conn->real_escape_string($_POST['email']);
        $password = $c1->conn->real_escape_string($_POST['password']);

        $query = "SELECT password FROM school WHERE email='$email'";
        $result = $c1->conn->query($query);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();

            if (password_verify($password, $row['password'])) {
                $arr['msg'] = "Login successful.";
            } else {
                error_log("Password verification failed for email: $email");
                $arr['error'] = "Invalid credentials.";
            }
        } else {
            error_log("User not found for email: $email");
            $arr['error'] = "User not found.";
        }
    } else {
        error_log("Invalid input: missing email or password.");
        $arr['error'] = "Invalid input data.";
    }
} else {
    error_log("Invalid method: " . $_SERVER['REQUEST_METHOD']);
    $arr['error'] = "Only POST method is allowed !!";
}

echo json_encode($arr);
?>
