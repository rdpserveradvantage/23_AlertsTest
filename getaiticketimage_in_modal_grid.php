<?php
include('db_connection.php');
$con = OpenCon();

$ticket_id = $_REQUEST['ticketID'];

$sql = mysqli_query($con, "SELECT File_loc FROM ai_alerts WHERE id='" . $ticket_id . "' and comment_status != '1'  ");

if (mysqli_num_rows($sql) > 0) {
    $sql_result = mysqli_fetch_assoc($sql);
    $file = $sql_result['File_loc'];
    $src = 'data:image/jpeg;base64,' . $file;
    echo $src;
} else {
    echo 'error';
}

CloseCon($con);
?>