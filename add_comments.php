<?php
// Start output buffering to avoid headers already sent issue
ob_start();
include 'header.php';
include 'navbar.php';

$con = OpenCon();
$datetime = date('Y-m-d H:i:s');

// Handle Delete Request
if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    $deleteQuery = "DELETE FROM comments WHERE id = $delete_id";
    mysqli_query($con, $deleteQuery);

    // Redirect to same page without query string
    header("Location: add_comments.php");
    exit;
}

// Handle Insert Request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['comment_text'])) {
    $comment = mysqli_real_escape_string($con, trim($_POST['comment_text']));
    if (!empty($comment)) {
        $insert = "INSERT INTO comments (comments, created_at) VALUES ('$comment', '$datetime')";
        mysqli_query($con, $insert);
    }
}
?>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <h3 class="page-title">Ticket Comments</h3>
            </div>

            <div class="card-box mb-30">
                <div class="card-body">

                    <!-- Add Comment -->
                    <form method="POST" class="mb-4">
                        <div class="input-group">
                            <input type="text" name="comment_text" class="form-control" placeholder="Add a comment..."
                                required>
                            <button type="submit" class="btn btn-primary">Add Comment</button>
                        </div>
                    </form>

                    <hr>

                    <!-- Load Comments -->
                    <div id="commentsSection">
                        <h5>All Comments:</h5>
                    </div>
                    <br>
                    <?php
                    $query = "SELECT id, comments, created_at FROM comments ORDER BY created_at DESC";
                    $result = mysqli_query($con, $query);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="border p-2 mb-2 rounded bg-light d-flex justify-content-between align-items-center">';
                            echo '<div>';
                            echo '<strong>' . date("d M Y, h:i A", strtotime($row['created_at'])) . '</strong><br>';
                            echo '<span>' . htmlspecialchars($row['comments']) . '</span>';
                            echo '</div>';
                            echo '<form method="GET" onsubmit="return confirm(\'Delete this comment?\');">';
                            echo '<input type="hidden" name="delete_id" value="' . $row['id'] . '">';
                            echo '<button type="submit" class="btn btn-danger btn-sm">Delete</button>';
                            echo '</form>';
                            echo '</div>';
                        }
                    } else {
                        echo '<div class="text-muted">No comments yet.</div>';
                    }
                    ?>
                </div>

            </div>
        </div>
    </div>
</div>
</div>

<?php include 'footer.php'; ?>
<?php ob_end_flush(); ?>