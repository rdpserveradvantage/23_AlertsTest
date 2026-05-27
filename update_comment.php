<?php
include('db_connection.php');
$con = OpenCon();

$id = $_POST['id'];
$newComment = $_POST['newComment'];

// if ($newValue == '') {
//     $newValue = '';
// }
$sql = mysqli_query($con, "UPDATE ai_alerts SET comment = '" . $newComment . "' WHERE id = '" . $id . "' ");

if ($sql) {
    echo json_encode(array('success' => true, 'comment' => $newComment));
} else {
    echo json_encode(array('success' => false, 'message' => 'Error updating comment.'));
}


// Return a response (optional)
CloseCon($con);
?>