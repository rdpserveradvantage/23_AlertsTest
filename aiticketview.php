<?php include 'header.php'; ?>
<!-- <?php include 'top-navbar.php'; ?> -->
<?php include 'navbar.php'; ?>


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

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <h3 class="page-title">AI Ticket View</h3>
            </div>

            <?php include("filters/ticket_view_filter.php"); ?>

            <div class="card-box mb-30">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12" id="ticketview_tbody">
                            <!-- AJAX or PHP data here -->
                        </div>
                    </div>
                </div>

                <!-- <div class="row">
                    <div class="col-12">
                     
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Image
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        ×
                    </span>
                </button>
            </div>


            <div class="modal-body" id="aiimage">
                <img id="img_src" src="" width="100%" />
            </div>
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
<scriptcript src="vendors/scripts/layout-settings.js"></scriptcript>
<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>

<!-- Buttons for Export datatable -->
<script src="src/plugins/datatables/js/dataTables.buttons.min.js"></script>
<script src="src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
<script src="src/plugins/datatables/js/buttons.print.min.js"></script>
<script src="src/plugins/datatables/js/buttons.html5.min.js"></script>
<script src="src/plugins/datatables/js/buttons.flash.min.js"></script>
<script src="src/plugins/datatables/js/pdfmake.min.js"></script>
<script src="src/plugins/datatables/js/vfs_fonts.js"></script>
<script src="vendors/scripts/datatable-setting.js"></script>
<script src="vendors/scripts/dashboard.js"></script>
<script src="vendors/js/aiticketview.js"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<script type="text/javascript">
$(function() {
    var start = moment();
    var end = moment();

    function cb(start, end) {
        $('#reportrange span').html(start.format('MMM DD,YYYY') + ' - ' + end.format('MMM DD,YYYY'));
        $("#start").val(start.format('YYYY-MM-DD'));
        $("#end").val(end.format('YYYY-MM-DD'));
        get_ai_ticket();
    }

    $('#reportrange').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],

        }
    }, cb);

    cb(start, end);

    $('#showTickets').on('click', function() {
        $('#loadingmessage').show(); // show loader
        get_ai_ticket();
    });

    $('#reportrange').change(function() {
        debugger;

    });

});
</script>

<script>
$(document).on("click", ".large-modal", function() {
    debugger;
    $("#aiimage").html('');
    var getImageDate = $(this).data('id');
    // alert(getImageDate);
    // $(".modal-body #getImageDate2").val( getImageDate );

    $.ajax({

        type: "POST",
        url: 'getaiticketimage_in_modal.php',
        data: 'date=' + getImageDate,
        success: function(msg) {

            $("#aiimage").html(msg);


        }
    });


});
</script>

</body>

</html>