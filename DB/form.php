<?php
// Include the database connection
include 'db.php';

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form values
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];

    // SQL query to insert data into the `School` table
    $sql = "INSERT INTO School (name, email, age) VALUES ('$name', '$email', $age)";
    
    if ($conn->query($sql) === TRUE) {
        echo "Record added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
<br>
<a href="index.php">Go Back</a>
