<script src="vendors/scripts/core.js"></script>
<script src="vendors/scripts/script.min.js"></script>
<script src="vendors/scripts/process.js"></script>
<script src="vendors/scripts/layout-settings.js"></script>
<script src="src/plugins/apexcharts/apexcharts.min.js"></script>
<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>

<!-- buttons for Export datatable -->
<script src="src/plugins/datatables/js/dataTables.buttons.min.js"></script>
<script src="src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
<script src="src/plugins/datatables/js/buttons.print.min.js"></script>
<script src="src/plugins/datatables/js/buttons.html5.min.js"></script>
<script src="src/plugins/datatables/js/buttons.flash.min.js"></script>
<script src="src/plugins/datatables/js/pdfmake.min.js"></script>
<script src="src/plugins/datatables/js/vfs_fonts.js"></script>
<!-- Datatable Setting js -->
<script src="vendors/scripts/datatable-setting.js"></script>

<script src="vendors/scripts/dashboard.js"></script>

<script src="src/plugins/apexcharts/apexcharts.min.js"></script>
<script src="vendors/scripts/apexcharts-setting.js"></script>

<script src="src/plugins/highcharts-6.0.7/code/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="src/plugins/highcharts-6.0.7/code/highcharts-more.js"></script>
<script src="vendors/scripts/highchart-setting.js"></script>

<script src="https://code.highcharts.com/highcharts.js"></script>

<script src="src/plugins/jQuery-Knob-master/jquery.knob.min.js"></script>
<script src="vendors/scripts/knob-chart-setting.js"></script>

<script src="vendors/js/panelhealth.js"></script>



<script>
// Alert type Status starts

var AlertTypeHelmet = <?php echo $AlertTypeHelmet; ?>;
var AlerttypecameraTemper = <?php echo $AlerttypecameraTemper; ?>;
var AlerttypeMask = <?php echo $AlerttypeMask; ?>;
var AlerttypeMulti = <?php echo $AlerttypeMulti; ?>;
var AlertTypeOverstay = <?php echo $AlertTypeOverstay; ?>;


function loadAlertTypeChart(AlertTypeHelmet, AlerttypecameraTemper, AlerttypeMask, AlerttypeMulti, AlertTypeOverstay) {
    console.log('Alert type Status:', AlertTypeHelmet, AlerttypecameraTemper, AlerttypeMask,
        AlerttypeMulti, AlertTypeOverstay);

    Highcharts.chart('AlerttypePie', {
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Alert Type Status'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.y}'
                }
            }
        },
        series: [{
            name: 'Status',
            colorByPoint: true,
            data: [{
                    name: 'Helmet',
                    y: AlertTypeHelmet,
                    sliced: true,
                    selected: true
                },
                {
                    name: 'Camera-Temper',
                    y: AlerttypecameraTemper
                },
                {
                    name: 'Mask',
                    y: AlerttypeMask
                },
                {
                    name: 'Multi',
                    y: AlerttypeMulti
                }, {
                    name: 'Overstay',
                    y: AlertTypeOverstay
                }
            ]
        }]
    });
}

// Initialize the chart
loadAlertTypeChart(AlertTypeHelmet, AlerttypecameraTemper, AlerttypeMask, AlerttypeMulti, AlertTypeOverstay);



/* Comfort data starts */

var comfortConnected = <?php echo $comfortConnected; ?>;
var comfortNotConnected = <?php echo $comfortNotConnected; ?>;


// Call the function to load the chart
function loadComfortChart(comfortConnected, comfortNotConnected) {
    console.log('Loading Comfort Panel Chart with:', comfortConnected, comfortNotConnected);

    Highcharts.chart('ComfortPie', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Comfort Panel Connection Status'
        },
        subtitle: {
            text: 'Column Chart Representation'
        },
        xAxis: {
            categories: ['Comfort Panel'],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Connections'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Connected',
            data: [comfortConnected]
        }, {
            name: 'Not Connected',
            data: [comfortNotConnected]
        }]
    });
}


// Initialize chart
loadComfortChart(comfortConnected, comfortNotConnected);

/* Comfort data ends */
</script>





</body>

</html>