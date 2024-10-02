<?php
include 'db.php'; 

$limit = 10; 
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$offset = ($page-1) * $limit;


$query = "SELECT * FROM users LIMIT $offset, $limit";
$result = mysqli_query($conn, $query);

echo "<table border='1'>
<tr>
<th>S.No</th>
<th>Name</th>
<th>Email</th>
<th>Mobile</th>
</tr>";

$sno = $offset + 1;
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
        <td>" . $sno++ . "</td>
        <td>" . $row['name'] . "</td>
        <td>" . $row['email'] . "</td>
        <td>" . $row['mobile'] . "</td>
        </tr>";
}
echo "</table>";


$query_total = "SELECT COUNT(*) FROM users";
$total_result = mysqli_query($conn, $query_total);
$total_rows = mysqli_fetch_array($total_result)[0];
$total_pages = ceil($total_rows / $limit);

for ($i=1; $i<=$total_pages; $i++) {
    echo "<a href='list_users.php?page=".$i."'>".$i."</a> ";
}
?>