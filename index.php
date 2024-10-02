<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>Task </h1>
    <br>
    <a href="add_user.php">Add User</a>
    &nbsp;
    &nbsp;
    &nbsp;
    <a href="add_task.php">Add Task</a>
    &nbsp;
    &nbsp;
    &nbsp;
    <a href="export_excel.php">Export</a>
    <br>
    <br>

    <?php
include 'db.php'; 

$limit = 10; 
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$offset = ($page-1) * $limit;


$query = "SELECT tasks.*, users.name, users.email FROM tasks 
          JOIN users ON tasks.user_id = users.id 
          LIMIT $offset, $limit";
$result = mysqli_query($conn, $query);

echo "<table border='1'>
<tr>
<th>S.No</th>
<th>Username</th>
<th>User Email</th>
<th>Task Detail</th>
<th>Task Status</th>
</tr>";

$sno = $offset + 1;
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
        <td>" . $sno++ . "</td>
        <td>" . $row['name'] . "</td>
        <td>" . $row['email'] . "</td>
        <td>" . $row['task_detail'] . "</td>
        <td>" . $row['task_type'] . "</td>
        </tr>";
}
echo "</table>";

// Pagination logic
$query_total = "SELECT COUNT(*) FROM tasks";
$total_result = mysqli_query($conn, $query_total);
$total_rows = mysqli_fetch_array($total_result)[0];
$total_pages = ceil($total_rows / $limit);

for ($i=1; $i<=$total_pages; $i++) {
    echo "<a href='index.php?page=".$i."'>".$i."</a> ";
}
?>

</body>

</html>