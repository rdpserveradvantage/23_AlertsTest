<?php
include 'db_connection.php';
$con = OpenCon();

$datetime = date('Y-m-d H:i:s');


$ticketID = isset($_POST['ticketID']) ? intval($_POST['ticketID']) : 0;
$comment = isset($_POST['comment']) ? mysqli_real_escape_string($con, $_POST['comment']) : "";

if ($ticketID > 0 && $comment != '') {
    $sql = "UPDATE ai_alerts SET comment = '$comment',comment_status = '1',updated_at = '$datetime' WHERE id = $ticketID";
    if (mysqli_query($con, $sql)) {
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "error";
}
?>