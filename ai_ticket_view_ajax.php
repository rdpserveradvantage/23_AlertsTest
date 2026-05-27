<?php
session_start();
include('db_connection.php');
// include('header.php');

$con = OpenCon();

$start = isset($_GET['start']) ? $_GET['start'] : '';
$end = isset($_GET['end']) ? $_GET['end'] : '';
$portal = isset($_GET['portal']) ? $_GET['portal'] : 'all';

$start = mysqli_real_escape_string($con, $start);
$end = mysqli_real_escape_string($con, $end);

$whereClause = "CAST(createtime AS DATE) >= '$start' AND CAST(createtime AS DATE) <= '$end'";
$orderBy = " ORDER BY id DESC";

switch ($portal) {
    case 'active':
        $query = "SELECT * FROM ai_alerts_diebold WHERE $whereClause AND status='O' AND alerttype NOT LIKE '%alive%' $orderBy";
        break;
    case 'closed':
        $query = "SELECT * FROM ai_alerts_diebold WHERE $whereClause AND status='C' AND alerttype NOT LIKE '%alive%' $orderBy";
        break;
    default:
        $query = "SELECT * FROM ai_alerts_diebold WHERE $whereClause $orderBy";
        break;
}

// echo $query;
// die;

$result = mysqli_query($con, $query);
?>

<div class="card-box mb-30">
    <div class="pb-20 table-responsive">
        <table id="healthTable" class="table table-striped hover nowrap">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Location</th>
                    <th>ATM Code</th>
                    <th>Alert Type</th>
                    <th>Create Time</th>
                    <th>DVR IP</th>
                    <th>Status</th>
                    <th>Comments</th>
                    <th>Edit Comments</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result && mysqli_num_rows($result) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($result)):
                        $atmCode = trim($row['ATMCode']);
                        $siteQuery = "SELECT ATMID, DVRIP, Location FROM ai_sites WHERE ATMID = '$atmCode'";
                        $siteResult = mysqli_query($con, $siteQuery);

                        $dvrip = "-";
                        $location = "-";

                        if ($siteResult && mysqli_num_rows($siteResult) > 0) {
                            $siteData = mysqli_fetch_assoc($siteResult);
                            $dvrip = $siteData['DVRIP'];
                            $location = $siteData['Location'];
                        }

                        $status = ($row['status'] == 'O') ? 'Active' : 'Closed';
                        $id = $row['id'];
                        ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td class='location-col'><?= htmlspecialchars($location) ?></td>
                    <td><?= htmlspecialchars($atmCode) ?></td>
                    <td><?= htmlspecialchars($row['alerttype']) ?></td>
                    <td><?= htmlspecialchars($row['createtime']) ?></td>
                    <td><?= htmlspecialchars($dvrip) ?></td>
                    <td><?= $status ?></td>
                    <td id='comment_<?= $id ?>'>
                        <?= htmlspecialchars($row['comment']) ?>
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary edit-btn" data-toggle="modal"
                            data-target="#myModal" data-id="<?php echo $id; ?>"
                            data-comment="<?php echo $row['comment'] ?>" name="edit_btn" id="edit_btn">Edit</button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm large-modal" data-id="<?= $row['id'] ?>"
                            data-toggle="modal" data-target="#largeModal">
                            View <i class="fa fa-eye ml-1"></i>
                        </button>
                    </td>
                </tr>
                <?php endwhile; ?>
                <?php else: ?>
                <tr>
                    <td colspan="10" style="text-align:center;">No data found</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit Name</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form id="editForm">
                    <div class="form-group">
                        <label for="editComment">Comment:</label>
                        <input type="text" class="form-control" id="editComment" name="editComment">
                    </div>
                    <input type="hidden" id="editId" name="editId">
                </form>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="saveChanges">Save Changes</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<script>
$(document).on("click", ".edit-btn", function() {
    var id = $(this).data('id');
    var comment = $(this).data('comment');
    // alert(comment)
    $('.modal-body #editId').val(id);
    $('.modal-body #editComment').val(comment);
});

$('#myModal').on('show.bs.modal', function(event) {
    // Clear the modal input field when the modal is shown
    $('#editComment').val('');
});


$('#saveChanges').on('click', function() {
    var id = $('#editId').val();
    var newComment = $('#editComment').val();
    console.log(newComment)
    $.ajax({
        url: 'update_comment.php',
        type: 'POST',
        dataType: 'json',
        data: {
            id: id,
            newComment: newComment
        },
        success: function(response) {
            if (response.success) {
                alert('Comment updated successfully!');
                $('#comment_' + id).text(response.comment);
                $('#myModal').modal('hide');
            } else {
                alert('Error: ' + response.message);
            }
        },
        error: function(xhr, status, error) {
            alert('Error: ' + error);
        }
    });
});
</script>
<?php CloseCon($con); ?>