<?php
include('db_connection.php');
$con = OpenCon();

header('Content-Type: application/json');

// Get offset and limit
$offset = isset($_POST['offset']) ? intval($_POST['offset']) : 0;
$limit = isset($_POST['limit']) ? intval($_POST['limit']) : 36;

$response = [
    'html' => '',
    'total' => 0
];

// Get total records
$totalQuery = "SELECT COUNT(*) as total FROM ai_alerts";
$totalResult = mysqli_query($con, $totalQuery);
if ($totalResult) {
    $totalRow = mysqli_fetch_assoc($totalResult);
    $response['total'] = $totalRow['total'];
}

// Get paginated records
$query = "SELECT id, ATMCode, File_loc, alerttype, createtime , panelid
          FROM ai_alerts 
          WHERE comment_status != 1
          ORDER BY createtime ASC 
          LIMIT $limit OFFSET $offset";

$result = mysqli_query($con, $query);
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $img = htmlspecialchars($row['File_loc']);
        $alert = htmlspecialchars($row['alerttype']);
        $atmcode = htmlspecialchars($row['ATMCode']);
        $time = date('d M Y, h:i A', strtotime($row['createtime']));
        $panelid = htmlspecialchars($row['panelid']);

        // Check if File_loc is base64 or a path (simple heuristic)
        // if (preg_match('/^\/|^https?:|\.jpg$|\.png$/i', $img)) {
        //     $src = $img; 
        // } else {
        //     $src = 'data:image/jpeg;base64,' . $img; 
        // }

        $src = 'data:image/jpeg;base64,' . $img;

        $response['html'] .= '
        <div class="grid-item">
            <img src="' . $src . '" class="img-thumbnail large-modal" data-id="' . $row['id'] . '" data-atmid="' . $atmcode . '" . data-panelid="' . $panelid . '"  />
            <div class="alert-text">' . $time . '</div>
            <div class="alert-time">' . $atmcode . '</div>
            <div class="alert-text">' . $alert . '</div>
        </div>';

    }
} else {
    // Log query error (optional)
    $response['html'] = '<div class="text-danger">Error loading data</div>';
}

// Output JSON
echo json_encode($response);
?>