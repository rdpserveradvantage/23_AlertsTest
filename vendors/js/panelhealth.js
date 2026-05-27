function onload() {
    //  get_ticketview();
}
$("#portal").change(function () {
    debugger;
    get_ticketview();
});
$("#show_detail").click(function () {

    get_ticketview();
});

function setHooter(macid, current_status) {

    $("#load").show();
    //$('#ticketview_tbody').html('');
    $.ajax({
        url: "http://103.141.218.26:8080/Hitachi/api/set_hooter_on_off.php",
        type: "POST",
        data: { mac_id: macid, current_status: current_status },
        success: (function (result) {
            console.log(result);
            $("#load").hide();
            if (current_status == '0') {
                $('#hooter_' + macid).removeClass('btn-danger');
                $('#hooter_' + macid).addClass('btn-success');
                $('#hooter_' + macid).html('');
                $('#hooter_' + macid).html('Hooter ON');
            } else {
                $('#hooter_' + macid).removeClass('btn-success');
                $('#hooter_' + macid).addClass('btn-danger');
                $('#hooter_' + macid).html('');
                $('#hooter_' + macid).html('Hooter OFF');
            }
            //window.location.href = "panel_health.php";
        })
    });

}

function setSiren(macid, current_status) {

    $("#load").show();
    //$('#ticketview_tbody').html('');
    $.ajax({
        url: "http://103.141.218.26:8080/Hitachi/api/set_siren_on_off.php",
        type: "POST",
        data: { mac_id: macid, current_status: current_status },
        success: (function (result) {
            debugger;
            console.log(result);
            var obj = JSON.parse(result);
            var status_code = obj[0].res_data.statusCode;
            var status_msg = obj[0].res_data.statusMessage;
            $("#load").hide();
            if (status_code == 200) {
                if (current_status == '0') {
                    $('#siren_' + macid).removeClass('btn-danger');
                    $('#siren_' + macid).addClass('btn-success');
                    $('#siren_' + macid).html('');
                    $('#siren_' + macid).html('Siren ON');
                } else {
                    $('#siren_' + macid).removeClass('btn-success');
                    $('#siren_' + macid).addClass('btn-danger');
                    $('#siren_' + macid).html('');
                    $('#siren_' + macid).html('Siren OFF');
                }
            } else {
                alert(status_msg);
            }
            //window.location.href = "panel_health.php";
        })
    });

}

function get_ticketview() {
    debugger;
    var Atmid = $("#AtmID").val();
    var Client = $("#Client").val();
    var Bank = $("#Bank").val();
    $('#ticketview_tbody').html('');

    // Show loader
    $('#loadingmessage').show();

    $.ajax({
        url: "panel_health_data_new.php",
        // url: "panel_health_data_copy.php",
        type: "GET",
        data: { atmid: Atmid, bank: Bank, client: Client },
        dataType: "html",
        success: function (result) {
            debugger;
            console.log(result);

            // Destroy existing DataTable instance if it exists
            if ($.fn.DataTable.isDataTable('#healthTable')) {
                $('#healthTable').DataTable().destroy();
            }

            // Inject new rows into tbody
            $('#ticketview_tbody').html(result);

            // Re-initialize DataTable
            $('#healthTable').DataTable({
                scrollX: true,
                dom: 'Bfrtip',
                buttons: ['copy', 'csv', 'excel', 'pdf'],
                pageLength: 10
            });
        },
        error: function (xhr, status, error) {
            console.error("AJAX Error:", error);
            alert("Something went wrong while loading data.");
        },
        complete: function () {
            // Hide loader once done
            $('#loadingmessage').hide();
        }
    });
}


