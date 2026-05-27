<?php
include 'db_conection.php';
$con = OpenCon();

$ticket_id = $_POST['ticket_id'] ?? 0;
$comment_text = trim($_POST['comment_text'] ?? '');

if ($ticket_id && $comment_text !== '') {
    $stmt = $con->prepare("INSERT INTO comments (ticket_id, comment_text) VALUES (?, ?)");
    $stmt->bind_param("is", $ticket_id, $comment_text);
    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "invalid";
}
?>