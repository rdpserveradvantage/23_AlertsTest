<?php include('db_connection.php'); ?>
<?php
// $ticketID = $_POST['ticketID'];
$atmid = $_POST['atmID'];
$con = OpenCon();


$port1 = 0;
$port2 = 0;
$port3 = 0;
$port4 = 0;

$sql = mysqli_query($con, "select * from sites_diebold where ATMID='" . $atmid . "' ");
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
    if ($port2 == 0) {
        $username2 = $UserName;
        $password2 = $Password;
        $cam2 = $dvr_model;
        $port2 = "554";
    }
    if ($port3 == 0) {
        $username3 = $UserName;
        $password3 = $Password;
        $cam3 = $dvr_model;
        $port3 = "554";
    }
    if ($port4 == 0) {
        $username4 = $UserName;
        $password4 = $Password;
        $cam4 = $dvr_model;
        $port4 = "554";
    }

}
CloseCon($con);
$array = array(
    [
        'username1' => $username1,
        'password1' => $password1,
        'cam1' => $cam1,
        'port1' => $port1,
        'username2' => $username2,
        'password2' => $password2,
        'cam2' => $cam2,
        'port2' => $port2,
        'username3' => $username3,
        'password3' => $password3,
        'cam3' => $cam3,
        'port3' => $port3,
        'username4' => $username4,
        'password4' => $password4,
        'cam4' => $cam4,
        'port4' => $port4,
        'dvrip' => $dvrip,
        'uname' => $UserName,
        'pwd' => $Password,
        'dvr_model' => $dvr_model,
        'port' => $port
    ]
);
echo json_encode($array);
?>