<?php
include 'db.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['user_id'];
    $task_detail = $_POST['task_detail'];
    $task_type = $_POST['task_type'];

    // Insert task into the database
    $query = "INSERT INTO tasks (user_id, task_detail, task_type) VALUES ('$user_id', '$task_detail', '$task_type')";
    if (mysqli_query($conn, $query)) {
        echo "Task added successfully.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>