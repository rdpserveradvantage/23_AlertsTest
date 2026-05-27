function get_ai_ticket() {
    var start = $("#start").val();
    var end = $("#end").val();
    var portal = "all";

    $('#ticketview_tbody').html('');

    // Slight delay to allow loader to show
    setTimeout(function () {
        $.ajax({
            url: 'saraiticket_ajax.php',
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