// function getTicketDetails() {
//     get_ai_ticket();
//     // get_ai_ticket();
// }
// function get_ai_ticket() {
//     // debugger;
//     var start = $("#start").val();
//     var end = $("#end").val();
//     // var portal = $("#portal").val();
//     var portal = 'all';

//     $('#ticketview_tbody').html('');

//     // $('#loadingmessage').show();
//     $.ajax({
//         url: "ai_ticket_view_ajax.php",
//         // url: "panel_health_data_copy.php",
//         type: "GET",
//         data: { start: start, end: end, portal: portal },
//         dataType: "html",
//         success: function (result) {
//             debugger;
//             console.log(result);

//             // Destroy existing DataTable instance if it exists
//             // if ($.fn.DataTable.isDataTable('#healthTable')) {
//             //     $('#healthTable').DataTable().destroy();
//             // }

//             // Inject new rows into tbody
//             $('#ticketview_tbody').html(result);

//             // Re-initialize DataTable
//             $('#healthTable').DataTable({
//                 scrollX: true,
//                 dom: 'Bfrtip',
//                 buttons: ['copy', 'csv', 'excel', 'pdf'],
//                 pageLength: 10
//             });
//         },
//         error: function (xhr, status, error) {
//             console.error("AJAX Error:", error);
//             alert("Something went wrong while loading data.");
//         },
//         complete: function () {
//             // Hide loader once done
//             $('#loadingmessage').hide();
//         }
//     });
// }

// function get_ai_ticket() {
//     var start = $("#start").val();
//     var end = $("#end").val();
//     var portal = "all";
//     $('#ticketview_tbody').html('');

//     // Show loader
//     $('#loadingmessage').show();

//     $.ajax({
//         url: 'ai_ticket_view_ajax.php',
//         type: 'GET',
//         data: {
//             start: start,
//             end: end,
//             portal: portal
//         },
//         dataType: "html",
//         success: function (result) {
//             debugger;
//             console.log(result);
//             // $('#loadingmessage').show();

//             // Destroy existing DataTable instance if it exists
//             // if ($.fn.DataTable.isDataTable('#healthTable')) {
//             //     $('#healthTable').DataTable().destroy();
//             // }

//             // Inject new rows into tbody
//             $('#ticketview_tbody').html(result);

//             // Re-initialize DataTable
//             $('#healthTable').DataTable({
//                 scrollX: true,
//                 dom: 'Bfrtip',
//                 buttons: ['copy', 'csv', 'excel', 'pdf'],
//                 pageLength: 10
//             });
//         },
//         error: function (xhr, status, error) {
//             console.error("AJAX Error:", error);
//             alert("Something went wrong while loading data.");
//         },
//         complete: function () {
//             // Hide loader once done
//             $('#loadingmessage').hide();
//         }
//     });
// }

function get_ai_ticket() {
    var start = $("#start").val();
    var end = $("#end").val();
    var portal = "all";

    $('#ticketview_tbody').html('');

    // Slight delay to allow loader to show
    setTimeout(function () {
        $.ajax({
            url: 'ai_ticket_view_ajax.php',
            type: 'GET',
            data: {
                start: start,
                end: end,
                portal: portal
            },
            dataType: "html",
            success: function (result) {
                $('#ticketview_tbody').html(result);

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
                $('#loadingmessage').hide(); // Hide loader once AJAX is complete
            }
        });
    }, 100); // <--- key to giving the loader time to appear
}
