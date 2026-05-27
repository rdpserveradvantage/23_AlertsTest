<?php
include 'db_connection.php';
$con = OpenCon();

$sql = "SELECT id, comments FROM comments ORDER BY id ASC";
$result = mysqli_query($con, $sql);

echo '<option value="">-- Select Comment --</option>';
while ($row = mysqli_fetch_assoc($result)) {
    echo '<option value="' . htmlspecialchars($row['comments']) . '">' . htmlspecialchars($row['comments']) . '</option>';
}
?>