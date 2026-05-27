<?php include('db_connection.php'); ?>
<?php
$ticketID = $_POST['ticketID'];
$atmid = $_POST['atmID'];
$con = OpenCon();


$port1 = 0;

$sql = mysqli_query($con, "select * from sites where ATMID='" . $atmid . "' ");
if (mysqli_num_rows($sql) > 0) {
    $sql_result = mysqli_fetch_assoc($sql);
    $dvrip = $sql_result['DVRIP'];
    $dvr_model = $sql_result['DVRName'];
    $UserName = $sql_result['UserName'];
    $Password = $sql_result['Password'];
    $port = "554";
    if ($port1 == 0) {
        $username1 = $UserName;
        $password1 = $Password;
        $cam1 = $dvr_model;
        $port1 = "554";
    }

}
CloseCon($con);
$array = array(
    [
        'username1' => $username1,
        'password1' => $password1,
        'cam1' => $cam1,
        'port1' => $port1,
        'dvrip' => $dvrip,
        'uname' => $UserName,
        'pwd' => $Password,
        'dvr_model' => $dvr_model,
        'port' => $port
    ]
);
echo json_encode($array);
?>