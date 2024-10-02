<?php
include 'db.php'; 
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=users_tasks.xls");
header("Pragma: no-cache");
header("Expires: 0");

echo "Users\n";
$query_users = "SELECT * FROM users";
$result_users = mysqli_query($conn, $query_users);
echo "ID\tName\tEmail\tMobile\n";
while ($row = mysqli_fetch_assoc($result_users)) {
    echo $row['id'] . "\t" . $row['name'] . "\t" . $row['email'] . "\t" . $row['mobile'] . "\n";
}

echo "\nTasks\n";
$query_tasks = "SELECT tasks.*, users.name FROM tasks 
                JOIN users ON tasks.user_id = users.id";
$result_tasks = mysqli_query($conn, $query_tasks);
echo "ID\tUser Name\tTask Detail\tTask Type\n";
while ($row = mysqli_fetch_assoc($result_tasks)) {
    echo $row['id'] . "\t" . $row['name'] . "\t" . $row['task_detail'] . "\t" . $row['task_type'] . "\n";
}
?>