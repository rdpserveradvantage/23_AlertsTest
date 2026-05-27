<?php include 'header.php'; ?>
<!-- <?php include 'top-navbar.php'; ?> -->
<?php include 'navbar.php';
$con = OpenCon();
?>

<style>
.location-col {
    width: 180px;
    max-width: 180px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

#loadingmessage {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    text-align: center;
    z-index: 9999;
}

#loadingmessage div {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

#loadingmessage img {
    width: 100px;
}
</style>
<style>
.menu-icon {
    width: 33px;
    margin-right: 7%;
}

.videoplay_msg {
    display: none;
}

#camera1 {
    width: 100% !important;
    padding-left: 0px !important;
    padding-right: 0px !important;
}

#camera2 {
    width: 100% !important;
    padding-left: 0px !important;
    padding-right: 0px !important;
}

#camera3 {
    width: 100% !important;
    padding-left: 0px !important;
    padding-right: 0px !important;
}

#camera4 {
    width: 100% !important;
    padding-left: 0px !important;
    padding-right: 0px !important;
}

#camera1 iframe {
    width: 446px;
    padding-left: 0px !important;
    padding-right: 0px !important;
}

#camera2 iframe {
    width: 446px;
    padding-left: 0px !important;
    padding-right: 0px !important;
}

#camera3 iframe {
    width: 446px;
    padding-left: 0px !important;
    padding-right: 0px !important;
}

#camera4 iframe {
    width: 446px;
    padding-left: 0px !important;
    padding-right: 0px !important;
}

#camera1 iframe img {
    width: 428px !important;
    height: 265px !important;
}

#camera2 iframe img {
    width: 428px !important;
    height: 265px !important;
}

#camera3 iframe img {
    width: 428px !important;
    height: 265px !important;
}

#camera4 iframe img {
    width: 428px !important;
    height: 265px !important;
}


@media (min-width: 768px) {
    .col-md-5 {
        flex: 0 0 41.66667%;
        max-width: 35.66667%;
         !important;
    }
}


@media only screen and (max-width: 768px) {
    #camera1 iframe {
        height: 220px !important;
        width: 285px !important;

    }

    #camera1 {
        height: 220px !important;

    }

    #camera2 iframe {
        height: 220px !important;
        width: 285px !important;

    }

    #camera2 {
        height: 220px !important;

    }

    #camera3 iframe {
        height: 220px !important;
        width: 285px !important;

    }

    #camera3 {
        height: 220px !important;

    }

    #camera4 iframe {
        height: 220px !important;
        width: 285px !important;

    }

    #camera4 {
        height: 220px !important;

    }
}

@media screen and (max-width:900px) {
    .card-body {
        height: auto OR 0px !important;
        padding-bottom: 0px;
    }

    #camera1 iframe {
        height: 250px !important;
        width: 320px !important;
    }

    #stopCamera1 {
        padding-right: 0px;
    }

    #camera2 iframe {
        height: 250px !important;
        width: 320px !important;
    }

    #stopCamera2 {
        padding-right: 0px;
    }

    #camera3 iframe {
        height: 250px !important;
        width: 320px !important;
    }

    #stopCamera3 {
        padding-right: 0px;
    }

    #camera4 iframe {
        height: 250px !important;
        width: 320px !important;
    }

    #stopCamera4 {
        padding-right: 0px;
    }
}

@media only screen and (max-width: 480px) {
    #camera1 iframe {
        height: 220px !important;
        width: 285px !important;

    }

    #camera1 {
        height: 220px !important;

    }

    #camera2 iframe {
        height: 220px !important;
        width: 285px !important;

    }

    #camera2 {
        height: 220px !important;

    }

    #camera3 iframe {
        height: 220px !important;
        width: 285px !important;

    }

    #camera3 {
        height: 220px !important;

    }

    #camera4 iframe {
        height: 220px !important;
        width: 285px !important;

    }

    #camera4 {
        height: 220px !important;

    }
}
</style>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <h3 class="page-title">Live View</h3>
            </div>

            <?php include("filters/liveview_filter.php"); ?>

            <div class="card-box mb-30">
                <div class="card-body">

                    <!-- <input type="hidden" id="url_link" value="<?php echo $url; ?>"> -->

                    <h6 style="color:red;">
                        Please note: Click Refresh Button manually after watching any site live view
                        <button class="btn btn-primary" id="show_detail">
                            <a href="live_view_new.php" style="color:white;">Refresh</a>
                        </button>
                    </h6>

                    <button type="button" class="btn btn-primary" id="live_view" name="live_view"
                        onclick="set_Camera()"><i class="icon-copy fa fa-video-camera" aria-hidden="true"> </i> Live
                        View</button>

                    <div class="row">
                        <!-- Camera 1 -->
                        <div class="sortblock col-md-6 form-group">
                            <h6 class="videoplay_msg" id="stop_camera1">Video will stop automatically after <span
                                    id="progressBar1"></span> seconds</h6>
                            <input type="hidden" id="camurl_1">
                            <div class="card-box">
                                <div class="card-header" id="cameraheading-1" role="tab">
                                    Lobby Camera
                                    <span class="videoplay_msg" alt="Play ON"
                                        style="cursor:pointer;color:#0099CC;float:right;" id="startCamera1"
                                        onclick="startCamera(1)"></span>
                                    <span id="stopCamera1" class="videoplay_msg" alt="Play STOP"
                                        style="cursor:pointer;color:red;float:right;padding-right:10px;"
                                        onclick="stopCamera(1)"></span>
                                </div>
                                <div class="card-body" id="camera1" style="height: 327px;padding-top:0px;">
                                    <div class="video-container" id="video-container1"
                                        style="height: 265px;padding-top:0px;background-color:#27367f;display:none;">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Camera 2 -->
                        <div class="sortblock col-md-6 form-group">
                            <h6 class="videoplay_msg" id="stop_camera2">Video will stop automatically after <span
                                    id="progressBar2"></span> seconds</h6>
                            <input type="hidden" id="camurl_2">
                            <div class="card-box">
                                <div class="card-header" id="cameraheading-2" role="tab">
                                    Backroom Camera
                                    <span class="videoplay_msg" alt="Play ON"
                                        style="cursor:pointer;color:#0099CC;float:right;" id="startCamera2"
                                        onclick="startCamera(2)"></span>
                                    <span id="stopCamera2" class="videoplay_msg" alt="Play STOP"
                                        style="cursor:pointer;color:red;float:right;padding-right:10px;"
                                        onclick="stopCamera(2)"></span>
                                </div>
                                <div class="card-body" id="camera2" style="height:327px;padding-top:0px;"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Camera 3 -->
                        <div class="sortblock col-md-6 form-group">
                            <h6 class="videoplay_msg" id="stop_camera3">Video will stop automatically after <span
                                    id="progressBar3"></span> seconds</h6>
                            <input type="hidden" id="camurl_3">
                            <div class="card-box">
                                <div class="card-header" id="cameraheading-3" role="tab">
                                    Outdoor Camera
                                    <span class="videoplay_msg" alt="Play ON"
                                        style="cursor:pointer;color:#0099CC;float:right;" id="startCamera3"
                                        onclick="startCamera(3)"></span>
                                    <span id="stopCamera3" class="videoplay_msg" alt="Play STOP"
                                        style="cursor:pointer;color:red;float:right;padding-right:10px;"
                                        onclick="stopCamera(3)"></span>
                                </div>
                                <div class="card-body" id="camera3" style="height:327px;padding-top:0px;"></div>
                            </div>
                        </div>

                        <!-- Camera 4 -->
                        <div class="sortblock col-md-6 form-group">
                            <h6 class="videoplay_msg" id="stop_camera4">Video will stop automatically after <span
                                    id="progressBar4"></span> seconds</h6>
                            <input type="hidden" id="camurl_4">
                            <div class="card-box">
                                <div class="card-header" id="cameraheading-4" role="tab">
                                    Pinhole Camera
                                    <span class="videoplay_msg" alt="Play ON"
                                        style="cursor:pointer;color:#0099CC;float:right;" id="startCamera4"
                                        onclick="startCamera(4)"></span>
                                    <span id="stopCamera4" class="videoplay_msg" alt="Play STOP"
                                        style="cursor:pointer;color:red;float:right;padding-right:10px;"
                                        onclick="stopCamera(4)"></span>
                                </div>
                                <div class="card-body" id="camera4" style="height:327px;padding-top:0px;"></div>
                            </div>
                        </div>
                    </div>

                </div> <!-- /.card-body -->
            </div> <!-- /.card-box -->
        </div>
    </div>
</div>



<div id="loadingmessage">
    <div>
        <img src="https://i.gifer.com/VAyR.gif" alt="Loading...">
    </div>
</div>

<!-- Scripts -->
<script src="vendors/scripts/core.js"></script>
<script src="vendors/scripts/script.min.js"></script>
<script src="vendors/scripts/process.js"></script>
<script src="vendors/scripts/layout-settings.js"></script>
<!-- <script src="vendors/js/liveview.js"></script> -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>
$('#iframe1').on('load', function() {
    alert('hi');
    document.getElementById("camera1").html = "";
});

function startCamera(id) {
    var cam = $('#camurl_' + id).val();
    $("#camera" + id).html('');
    $("#camera" + id).html('<iframe src="' + cam +
        '" title="description" style="height: 265px;width: 428px;display:block;" scrolling="no"></iframe>');
    setStopInterval(id);
    $("#stop_camera" + id).css("display", "block");
    $("#stopCamera" + id).css("display", "block");
    $("#stop_camera" + id).css("display", "block");
}

function stopCamera(id) {
    $("#camera" + id).html('');
    $("#stop_camera" + id).css("display", "none");
    if (id == 1) {
        timeleft_1 = 0;
        clearInterval(downloadTimer_1);
        $("#progressBar" + id).html(timeleft_1);
    }
    if (id == 2) {
        timeleft_2 = 0;
        clearInterval(downloadTimer_2);
        $("#progressBar" + id).html(timeleft_2);
    }
    if (id == 3) {
        timeleft_3 = 0;
        clearInterval(downloadTimer_3);
        $("#progressBar" + id).html(timeleft_3);
    }
    if (id == 4) {
        timeleft_4 = 0;
        clearInterval(downloadTimer_4);
        $("#progressBar" + id).html(timeleft_4);
    }
}
var timeleft_1 = 120;
var downloadTimer_1 = "";
var timeleft_2 = 120;
var downloadTimer_2 = "";
var timeleft_3 = 120;
var downloadTimer_3 = "";
var timeleft_4 = 120;
var downloadTimer_4 = "";

function set_StopInterval(id) {
    debugger;
    if (id == 1) {
        if (timeleft_1 > 0) {
            clearInterval(downloadTimer_1);
            timeleft_1 = 120;

        }
        downloadTimer_1 = setInterval(function() {
            if (timeleft_1 <= 0) {
                clearInterval(downloadTimer_1);
            }

            timeleft_1 -= 1;
            if (timeleft_1 == 0) {
                stopCamera(id);
            }
            if (timeleft_1 >= 0) {
                $("#progressBar" + id).html(timeleft_1);
            }
            console.log(timeleft_1);
        }, 1000);
    }

}
//sub-frame-error-details
function setStopInterval(id) {
    if (id == 1) {
        timeleft_1 = 120;
        downloadTimer_1 = setInterval(function() {
            if (timeleft_1 <= 0) {
                clearInterval(downloadTimer_1);
            }

            timeleft_1 -= 1;

            if (timeleft_1 == 0) {
                stopCamera(id);
            }
            if (timeleft_1 >= 0) {
                $("#progressBar" + id).html(timeleft_1);
            }
            console.log(timeleft_1);
        }, 1000);
    }
    if (id == 2) {
        timeleft_2 = 120;
        downloadTimer_2 = setInterval(function() {
            if (timeleft_2 <= 0) {
                clearInterval(downloadTimer_2);
            }

            timeleft_2 -= 1;

            if (timeleft_2 == 0) {
                stopCamera(id);
            }
            if (timeleft_2 >= 0) {
                $("#progressBar" + id).html(timeleft_2);
            }
            console.log(timeleft_2);
        }, 1000);
    }
    if (id == 3) {
        timeleft_3 = 120;
        downloadTimer_3 = setInterval(function() {
            if (timeleft_3 <= 0) {
                clearInterval(downloadTimer_3);
            }

            timeleft_3 -= 1;

            if (timeleft_3 == 0) {
                stopCamera(id);
            }
            if (timeleft_3 >= 0) {
                $("#progressBar" + id).html(timeleft_3);
            }
            console.log(timeleft_3);
        }, 1000);
    }
    if (id == 4) {
        timeleft_4 = 120;
        downloadTimer_4 = setInterval(function() {
            if (timeleft_4 <= 0) {
                clearInterval(downloadTimer_4);
            }

            timeleft_4 -= 1;

            if (timeleft_4 == 0) {
                stopCamera(id);
            }
            if (timeleft_4 >= 0) {
                $("#progressBar" + id).html(timeleft_4);
            }
            console.log(timeleft_4);
        }, 1000);
    }
}
$("#show_detail").click(function() {
    var atmid = $('#AtmID').val();
    if (atmid == '') {
        swal("Oops!", "AtmID Must Required !", "error");
        return false;
    }
    //setcamera(atmid);
    set_Camera(atmid);
});

function set_Camera(atmid) {
    // var Client = $("#Client").val();
    // var Bank = $("#Bank").val();
    var AtmID = $("#AtmID").val();
    // if (Bank == '') {
    //     swal("Oops!", "Bank Must Required !", "error");
    //     return false;
    // }
    if (AtmID == '') {
        swal("Oops!", "AtmID Must Required !", "error");
        return false;
    }
    var url_link = $('#url_link').val();
    $.ajax({
        url: "live_view_new_ajax.php",
        type: "POST",
        data: {
            // bank: Bank,
            atmID: AtmID,
            // client: Client
        },
        success: (function(result) {
            debugger;
            console.log(result);
            var obj = JSON.parse(result);

            var dvrip = obj[0].dvrip;

            var dvr_model = obj[0].dvr_model;
            var dvr_model_1 = obj[0].cam1;
            var dvr_model_2 = obj[0].cam2;
            var dvr_model_3 = obj[0].cam3;
            var dvr_model_4 = obj[0].cam4;

            var uname = obj[0].uname;
            var pwd = obj[0].pwd;
            var username_1 = obj[0].username1;
            var username_2 = obj[0].username2;
            var username_3 = obj[0].username3;
            var username_4 = obj[0].username4;

            var password_1 = obj[0].password1;
            var password_2 = obj[0].password2;
            var password_3 = obj[0].password3;
            var password_4 = obj[0].password4;

            var port = obj[0].port;
            var port_1 = obj[0].port1;
            var port_2 = obj[0].port2;
            var port_3 = obj[0].port3;
            var port_4 = obj[0].port4;

            //var routerip = obj[0].RouterIP;
            //var current_status = obj.live;
            var port = "554";
            var cam_type = ""
            if (dvr_model == 'uniview') {
                cam_type = "nvr";
            } else if (dvr_model == 'Hikvision_Nvr') {
                cam_type = "nvr";
            } else {
                cam_type = "dvr";
            }
            var cam_type_1 = "";
            var cam_type_2 = "";
            var cam_type_3 = "";
            var cam_type_4 = "";

            if (dvr_model_1 == 'uniview') {
                cam_type_1 = "nvr";
            } else if (dvr_model_1 == 'Hikvision_Nvr') {
                cam_type_1 = "nvr";
            } else {
                cam_type_1 = "dvr";
            }
            if (dvr_model_2 == 'uniview') {
                cam_type_2 = "nvr";
            } else if (dvr_model_2 == 'Hikvision_Nvr') {
                cam_type_2 = "nvr";
            } else {
                cam_type_2 = "dvr";
            }
            if (dvr_model_3 == 'uniview') {
                cam_type_3 = "nvr";
            } else if (dvr_model_3 == 'Hikvision_Nvr') {
                cam_type_3 = "nvr";
            } else {
                cam_type_3 = "dvr";
            }
            if (dvr_model_4 == 'uniview') {
                cam_type_4 = "nvr";
            } else if (dvr_model_4 == 'Hikvision_Nvr') {
                cam_type_4 = "nvr";
            } else {
                cam_type_4 = "dvr";
            }


            var url_link = "https://comfort.ifiber.in";
            //    var cam1 = url_link + ":5001/?name=" + uname + "-" + pwd + "-" + dvrip + "-" +
            //         port + "-" + dvr_model + "-Y";


            var is_rtsp_1 = 0;
            var is_rtsp_2 = 0;
            var is_rtsp_3 = 0;
            var is_rtsp_4 = 0;

            if (dvr_model_1 == 'CPPLUS_INDIGO' || dvr_model_1 == 'CPPLUS') {
                is_rtsp_1 = 1;
            }
            if (dvr_model_2 == 'CPPLUS_INDIGO' || dvr_model_2 == 'CPPLUS') {
                is_rtsp_2 = 1;
            }
            if (dvr_model_3 == 'CPPLUS_INDIGO' || dvr_model_3 == 'CPPLUS') {
                is_rtsp_3 = 1;
            }
            if (dvr_model_4 == 'CPPLUS_INDIGO' || dvr_model_4 == 'CPPLUS') {
                is_rtsp_4 = 1;
            }

            if (is_rtsp_1 == 1) {
                var cam1 = url_link + ":5040/?name=" + username_1 + "-" + password_1 + "-" + dvrip +
                    "-" + port_1 + "-" + dvr_model_1 + "-" + cam_type_1 + "-1";

            } else {

                var cam1 = url_link + ":5040/?name=" + username_1 + "-" + password_1 + "-" + dvrip +
                    "-" + port_1 + "-" + dvr_model_1 + "-" + cam_type_1 + "-1";

            }

            if (is_rtsp_2 == 1) {
                var cam2 = url_link + ":5041/?name=" + username_2 + "-" + password_2 + "-" + dvrip +
                    "-" + port_2 + "-" + dvr_model_2 + "-" + cam_type_2 + "-2";

            } else {

                var cam2 = url_link + ":5041/?name=" + username_2 + "-" + password_2 + "-" + dvrip +
                    "-" + port_2 + "-" + dvr_model_2 + "-" + cam_type_2 + "-2";

            }

            if (is_rtsp_3 == 1) {
                var cam3 = url_link + ":5042/?name=" + username_3 + "-" + password_3 + "-" + dvrip +
                    "-" + port_3 + "-" + dvr_model_3 + "-" + cam_type_3 + "-3";

            } else {
                var cam3 = url_link + ":5042/?name=" + username_3 + "-" + password_3 + "-" + dvrip +
                    "-" + port_3 + "-" + dvr_model_3 + "-" + cam_type_3 + "-3";

            }

            // if (is_rtsp_4 == 1) {
            //     var cam4 = url_link + ":5043/?name=" + username_4 + "-" + password_4 + "-" + dvrip +
            //         "-" + port_4 + "-" + dvr_model_4 + "-" + cam_type_3=4 + "-4";

            // } else {
            //     var cam4 = url_link + ":5043/?name=" + username_4 + "-" + password_4 + "-" + dvrip +
            //         "-" + port_4 + "-" + dvr_model_4 + "-" + cam_type_4 + "-3";

            // }



            console.log("cam1 :" + cam1);
            console.log("cam2 :" + cam2);
            console.log("cam3 :" + cam3);
            console.log("cam4 :" + cam4);

             $("#camera1").attr('src',cam1);
            $("#camera1").html('<iframe id="iframe1" src="' + cam1 +
                '" title="description" style="height: 327px;width: 430px;" scrolling="no"></iframe>'
            );
            $("#camera2").html('<iframe id="iframe2" src="' + cam2 +
                '" title="description" style="height: 327px;width: 430px;" scrolling="no"></iframe>'
            );
            $("#camera3").html('<iframe id="iframe3" src="' + cam3 +
                '" title="description" style="height: 327px;width: 430px;" scrolling="no"></iframe>'
            );
            $("#camera4").html('<iframe id="iframe4" src="' + cam4 +
                '" title="description" style="height: 327px;width: 430px;" scrolling="no"></iframe>'
            );



            $("#camurl_1").val(cam1);
            $("#camurl_2").val(cam2);
            $("#camurl_3").val(cam3);
            $("#camurl_4").val(cam4);

            // window.open(cam1, '_blank');


            $("#video-container1").css("display", "block");


        })
    });
}

function setcamera(atmid) {
    if (atmid == 'P3ENMM09') {
        var cam1 = "http://103.141.218.26:5020/?name=1";
        $("#camera1").html('<iframe src="' + cam1 +
            '" title="description" style="height: 350px;width: 100%;"></iframe>');

        $("#camera").html(
            '<option value="">Select Camera</option><option value="http://103.141.218.26:5020/?name=2">Camera 2</option><option value="http://103.141.218.26:5020/?name=3">Camera 3</option><option value="http://103.141.218.26:5020/?name=4">Camera 4</option>'
        );
        $("#camurl_1").val("http://103.141.218.26:5020/?name=1");
        $("#camurl_2").val("http://103.141.218.26:5020/?name=2");
        $("#camurl_3").val("http://103.141.218.26:5020/?name=3");
        $("#camurl_4").val("http://103.141.218.26:5020/?name=4");
        setStopInterval(1);
        $("#stop_camera1").css('display', 'block');
        $('#startCamera1').css('display', 'block');
        $('#stopCamera1').css('display', 'block');
        $('#startCamera2').css('display', 'block');
        $('#stopCamera2').css('display', 'block');
        $('#startCamera3').css('display', 'block');
        $('#stopCamera3').css('display', 'block');
        $('#startCamera4').css('display', 'block');
        $('#stopCamera4').css('display', 'block');
    }
}

function setextracamera(id, cam) {
    $("#camera" + id).html('');
    $("#camera" + id).html('<iframe src="' + cam +
        '" title="description" style="height: 350px;width: 100%;"></iframe>');
}
$("#camera").change(function() {
    var cam = $("#camera").val();

    var cam_heading = $("#camera option:selected").text();

    var arr = cam_heading.split(' ');
    var id = arr[1];
    $('#cameraheading-' + id).html('');
    $('#cameraheading-' + id).html(cam_heading);
    $("#camera" + id).html('');
    $("#camera" + id).html('<iframe src="' + cam +
        '" title="description" style="height: 350px;width: 100%;"></iframe>');

});


function chngeSort(Value) {

    if (Value == 4) {

        $(".sortblock").addClass('col-md-' + Value);
        $('.sortblock').removeClass('col-md-6');
        $('.sortblock').removeClass('col-md-12');

        $("#sort" + Value).addClass('text-muted');
        $("#sort" + Value).removeClass('text-white');

        $('#sort6').removeClass('text-muted');
        $("#sort6").addClass('text-white');
        $('#sort12').removeClass('text-muted');
        $("#sort12").addClass('text-white');



    }

    if (Value == 6) {
        $(".sortblock").addClass('col-md-' + Value);
        $('.sortblock').removeClass('col-md-4');
        $('.sortblock').removeClass('col-md-12');

        $("#sort" + Value).addClass('text-muted');
        $("#sort" + Value).removeClass('text-white');

        $('#sort4').removeClass('text-muted');
        $("#sort4").addClass('text-white');
        $('#sort12').removeClass('text-muted');
        $("#sort12").addClass('text-white');

    }

    if (Value == 12) {
        $(".sortblock").addClass('col-md-' + Value);
        $('.sortblock').removeClass('col-md-4');
        $('.sortblock').removeClass('col-md-6');

        $("#sort" + Value).addClass('text-muted');
        $("#sort" + Value).removeClass('text-white');

        $('#sort4').removeClass('text-muted');
        $("#sort4").addClass('text-white');
        $('#sort6').removeClass('text-muted');
        $("#sort6").addClass('text-white');
    }


}
</script>

</body>

</html>