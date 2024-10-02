<?php
include 'db.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];

    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }

    
    $query = "INSERT INTO users (name, email, mobile) VALUES ('$name', '$email', '$mobile')";
    if (mysqli_query($conn, $query)) {
        echo "User added successfully.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>