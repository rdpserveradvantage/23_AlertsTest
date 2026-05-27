<?php include 'header.php'; ?>
<?php include 'navbar.php'; ?>
<?php $con = OpenCon();

?>

<style>
/* your existing CSS here */
.grid-container {
    display: grid;
    grid-template-columns: repeat(6, 1fr);
    gap: 10px;
    padding: 10px;
}

.grid-item {
    text-align: center;
    padding: 5px;
    background: #f5f5f5;
    border-radius: 8px;
    border: 1px solid #ddd;
}

.grid-item img {
    width: 100px;
    height: 100px;
    object-fit: cover;
    border-radius: 6px;
    cursor: pointer;
}

.alert-text {
    font-size: 13px;
    color: #333;
    margin-top: 5px;
    font-weight: bold;
}

.alert-time {
    font-size: 11px;
    color: #666;
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

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <h3 class="page-title">AI Ticket Grid View</h3>
            </div>
            <?php include("filters/ticket_view_filter.php"); ?>


            <div class="card-box mb-30">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12" id="ticketview_tbody">
                            <div class="grid-container">
                                <!-- Grid items will be loaded here via AJAX -->
                            </div>
                            <div class="text-center my-3">
                                <button id="prevBtn" class="btn btn-warning mr-2" disabled>Previous</button>
                                <button id="nextBtn" class="btn btn-primary">Next</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Image Modal -->
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Image Preview</h5>
                <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body text-center" id="aiimage">
                <input type="hidden" id="modal_ticket_id">
                <input type="hidden" id="modal_atmid">

                <img id="img_src" src="" style="max-width: 100%; max-height: 80vh;" />
                <div class="mt-3">
                    <label for="comment_select"><strong>Select Comment:</strong></label>
                    <select id="comment_select" class="form-control mt-2" style="width: 50%; margin: 0 auto;">
                        <option value="">-- Select Comment --</option>
                    </select>
                </div>
                <div class="mt-3">
                    <button type="button" class="btn btn-primary" id="live_view" name="live_view"><i
                            class="icon-copy fa fa-video-camera" aria-hidden="true"> </i> Live View</button>
                    <button type="button" class="btn btn-secondary" id="incident_clip" name="incident_clip"><i
                            class="icon-copy fa fa-file-video-o" aria-hidden="true"> </i> Incident
                        Clip</button>
                </div>

            </div>
        </div>


    </div>
</div>

<!-- Incident Video Modal -->
<div class="modal fade" id="incidentVideoModal" tabindex="-1" role="dialog" aria-labelledby="incidentVideoModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header">

                <input type="hidden" id="modal_ticket_id">
                <input type="hidden" id="modal_atmid">
                <input type="hidden" id="modal_panelid">

                <h5 class="modal-title" id="incidentVideoModalLabel">Incident Clip</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body text-center" id="incidentVideoBody">
                <!-- Video player will be loaded here via AJAX -->
            </div>
        </div>
    </div>
</div>

<div id="loadingmessage">
    <div>
        <img src="https://i.gifer.com/VAyR.gif" alt="Loading...">
    </div>
</div>

<script src="vendors/scripts/core.js"></script>
<script src="vendors/scripts/script.min.js"></script>
<script src="vendors/scripts/process.js"></script>
<script src="vendors/scripts/layout-settings.js"></script>

<script>
let offset = 0;
const limit = 36;
let total = 0;

let currentTicketId = null;
let currentGridItem = null;


function loadGridData() {
    $("#loadingmessage").show();

    $.ajax({
        url: "load_more_tickets.php",
        type: "POST",
        dataType: "json",
        data: {
            offset: offset,
            limit: limit
        },
        success: function(response) {
            $(".grid-container").html(response.html);
            total = response.total;
            $("#loadingmessage").hide();

            $("#prevBtn").prop("disabled", offset === 0);
            const remaining = total - (offset + limit);
            $("#nextBtn").prop("disabled", remaining <= 0);
        },
        error: function() {
            alert("Failed to load data.");
            $("#loadingmessage").hide();
        }
    });
}

$("#nextBtn").on("click", function() {
    offset += limit;
    loadGridData();
});

$("#prevBtn").on("click", function() {
    if (offset >= limit) {
        offset -= limit;
        loadGridData();
    }
});

$(document).ready(function() {
    loadGridData();
});

$(document).on("click", ".large-modal", function() {
    const ticketId = $(this).data("id");
    const atmId = $(this).data("atmid");
    const panelid = $(this).data("panelid");

    currentTicketId = ticketId;
    currentGridItem = $(this).closest(".grid-item");

    $("#modal_ticket_id").val(ticketId);
    $("#modal_atmid").val(atmId);
    $("#modal_panelid").val(panelid);

    // Load image for modal
    $.post("getaiticketimage_in_modal_grid.php", {
        ticketID: ticketId
    }, function(imgUrl) {
        $("#img_src").attr("src", imgUrl);
        // $("#aiimage").html(msg);
        $("#largeModal").modal("show");
    });

    // Load dynamic comments for select box
    $.get("get_comments_list.php", function(options) {
        $("#comment_select").html(options);
    });
});

// On modal close, update comment in DB
$("#largeModal").on('hide.bs.modal', function() {
    const ticketId = $("#modal_ticket_id").val();
    const selectedComment = $("#comment_select").val();

    console.log(selectedComment);

    if (ticketId) {
        $.post("update_ticket_comment.php", {
            ticketID: ticketId,
            comment: selectedComment
        }, function(response) {
            if (response.trim() === "success") {
                console.log(ticketId);
                console.log("Comment updated successfully");
                currentGridItem.remove();
                loadNextImage();
            } else {
                console.error("Failed to update comment");
            }
        });
    }
});

// When Live View button is clicked
$(document).on("click", "#live_view", function() {
    const ticketId = $("#modal_ticket_id").val();
    const atmId = $("#modal_atmid").val();

    console.log(atmId);
    $("#loadingmessage").show();

    $.ajax({
        url: "get_live_video_url.php",
        type: "POST",
        data: {
            ticketID: ticketId,
            atmID: atmId
        },
        success: function(videoUrl) {
            console.log(videoUrl);

            var obj = JSON.parse(videoUrl);

            var dvrip = obj[0].dvrip;
            var dvr_model = obj[0].dvr_model;
            var uname = obj[0].uname;
            var pwd = obj[0].pwd;
            var port = obj[0].port;

            var cam_type = (dvr_model === 'uniview' || dvr_model === 'Hikvision_Nvr') ? "nvr" :
                "dvr";
            var url_link = "https://comfort.ifiber.in";

            var cam1 = url_link + ":5040/?name=" + uname + "-" + pwd + "-" + dvrip + "-" +
                port + "-" + dvr_model + "-" + cam_type + "-1";

            console.log("Opening URL: " + cam1);

            $("#loadingmessage").hide();

            // Open in new tab
            window.open(cam1, '_blank');
        },
        error: function() {
            $("#loadingmessage").hide();
            alert("Failed to load video.");
        }
    });
});



// Pause video when modal is closed
$('#videoModal').on('hide.bs.modal', function() {
    $("#liveIframe").attr("src", ""); // Clear iframe

    // const video = document.getElementById('liveVideo');
    // if (video) video.pause(); 
});

$(document).on("click", "#incident_clip", function() {
    const ticketId = $("#modal_ticket_id").val();
    const atmId = $("#modal_atmid").val();
    const panelid = $("#modal_panelid").val();

    console.log(ticketId);
    console.log(atmId);
    console.log(panelid);

    $("#loadingmessage").show();

    $.ajax({
        url: "incident_video_player_new.php",
        // url: "incident_video_player.php",
        type: "POST",
        data: {
            ticketID: ticketId,
            atmID: atmId,
            panelID: panelid
        },
        success: function(response) {
            // Unbind any previous handlers
            $('#largeModal').off('hidden.bs.modal');

            // Bind a new handler before hiding
            $('#largeModal').on('hidden.bs.modal', function() {
                $("#incidentVideoBody").html(response);
                $('#incidentVideoModal').modal('show');

                // Hide loader after all is done
                $("#loadingmessage").hide();

                // Clean up the handler
                $('#largeModal').off('hidden.bs.modal');
            });

            $('#largeModal').modal('hide');
        },
        error: function() {
            $("#loadingmessage").hide();
            alert("Failed to load incident video.");
        }
    });


});

$('#incidentVideoModal').on('hide.bs.modal', function() {
    $("#incidentVideoBody").html(""); // Clear content on close
});




function loadNextImage() {
    loadGridData();
}

loadGridData();
setInterval(loadGridData, 30000);
</script>

</body>

</html>