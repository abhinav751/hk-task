<?php
include 'db.php'; 


$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Add Task</title>
</head>

<body>
    <h1>Add Task</h1>
    <form method="POST" action="save_task.php">
        <label for="user_id">Assign to User:</label>
        <select name="user_id" required>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
            <?php endwhile; ?>
        </select><br>
        Task Detail: <textarea name="task_detail" required></textarea><br>
        Task Type:
        <select name="task_type" required>
            <option value="Pending">Pending</option>
            <option value="Done">Done</option>
        </select><br>
        <input type="submit" value="Add Task">
    </form>
</body>

</html>