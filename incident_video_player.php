<?php
include('db_connection.php');
$con = OpenCon();

if (!isset($_POST['ticketID']) || !isset($_POST['atmID']) || !isset($_POST['panelID'])) {
    echo "<p>Missing parameters</p>";
    exit;
}

$ticketID = $_POST['ticketID'];
$atmID = $_POST['atmID'];
$panelID = $_POST['panelID'];

// Get create time of alert
$query = mysqli_query($con, "SELECT createtime FROM ai_alerts WHERE id = '$ticketID'");
if (!$query || mysqli_num_rows($query) === 0) {
    echo "<p>Alert not found</p>";
    exit;
}

$row = mysqli_fetch_assoc($query);
$createTime = $row['createtime'];
$videoFolder = 'AI2/vid_cp/';
$targetTime = strtotime($createTime) - 30;
$alertTimeFormatted = date('Y-m-d_H_i_s', $targetTime);
$videoPrefix = "{$alertTimeFormatted}_{$atmID}_{$panelID}";

// Try exact match
$exactMatches = glob($videoFolder . $videoPrefix . '*.mp4');
$selectedVideo = '';

if (!empty($exactMatches)) {
    $selectedVideo = $exactMatches[0];
} else {
    // Search closest earlier match
    $videos = glob($videoFolder . "*.mp4");
    $closestDiff = PHP_INT_MAX;

    foreach ($videos as $video) {
        $basename = basename($video, ".mp4");
        $parts = explode('_', $basename);

        if (count($parts) < 6)
            continue;

        $fileDatetimeStr = implode('_', array_slice($parts, 0, 3));
        $fileATMID = $parts[3];
        $filePanelID = $parts[4];

        if ($fileATMID != $atmID || $filePanelID != $panelID)
            continue;

        $fileTime = strtotime(str_replace('_', ' ', $fileDatetimeStr));
        $diff = strtotime($createTime) - $fileTime;

        if ($diff >= 0 && $diff < $closestDiff) {
            $closestDiff = $diff;
            $selectedVideo = $video;
        }
    }
}

// Automatically re-encode if needed
function reencodeVideoIfNeeded($originalPath)
{
    $ffmpeg = "C:\\ffmpeg\\bin\\ffmpeg.exe"; // Adjust path if needed
    $pathInfo = pathinfo($originalPath);
    $reencodedPath = $pathInfo['dirname'] . "/fixed_" . $pathInfo['basename'];

    // Check if already reencoded
    if (!file_exists($reencodedPath)) {
        $cmd = "\"$ffmpeg\" -i \"$originalPath\" -vcodec libx264 -acodec aac \"$reencodedPath\"";
        shell_exec($cmd . " 2>&1");
    }

    return $reencodedPath;
}

if ($selectedVideo != '') {
    $reencodedVideoPath = reencodeVideoIfNeeded($selectedVideo);

    // Generate URL from path
    $videoPath = str_replace('\\', '/', str_replace(realpath($_SERVER['DOCUMENT_ROOT']), '', realpath($reencodedVideoPath)));
    $videoURL = 'http://localhost:8081' . $videoPath;
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Incident Video Player</title>
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />
    <style>
    body {
        background-color: #000;
        margin: 0;
        padding: 20px;
        color: white;
        text-align: center;
    }

    video {
        max-width: 90%;
        height: auto;
        margin-top: 20px;
    }
    </style>
</head>

<body>
    <h2>Incident Video</h2>
    <video id="player" controls crossorigin playsinline>
        <source src="<?= htmlspecialchars($videoURL) ?>" type="video/mp4" />
        Your browser does not support the video tag.
    </video>

    <script src="https://cdn.plyr.io/3.7.8/plyr.polyfilled.js"></script>
    <script>
    const player = new Plyr('#player');
    </script>
</body>

</html>

<?php
} else {
    echo "<p style='color:white;text-align:center;'>No video found for this incident.</p>";
}
?>