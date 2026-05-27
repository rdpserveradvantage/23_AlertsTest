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
// rass start
var rassConnected = <?php echo $rassConnected; ?>;
var rassNotConnected = <?php echo $rassNotConnected; ?>;
// rass ends

// Call the function to load the chart
function loadRassChart(rassConnected, rassNotConnected) {
    console.log('Loading Rass Chart with:', rassConnected, rassNotConnected);
    Highcharts.chart('RassPie', {
        chart: {
            type: 'pie'
        },
        title: {
            text: 'RASS Panel Connection Status'
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
                    name: 'Connected',
                    y: rassConnected,
                    sliced: true,
                    selected: true
                },
                {
                    name: 'Not Connected',
                    y: rassNotConnected
                }
            ]
        }]
    });
}

// Initialize chart
loadRassChart(rassConnected, rassNotConnected);
// loadsmartipnbboiChart(smartiConnected, smartiNotConnected, smartinConnected, smartinNotConnected);

// Smart-I || Smart-IN starts

var smartiConnected = <?php echo $smartiConnected; ?>;
var smartiNotConnected = <?php echo $smartiNotConnected; ?>;
var smartinConnected = <?php echo $smartinConnected; ?>;
var smartinNotConnected = <?php echo $smartinNotConnected; ?>;

// Smart-I || Smart-IN ends

// smarti function
function loadsmartipnbboiChart(smartiConnected, smartiNotConnected, smartinConnected, smartinNotConnected) {
    console.log('Loading Smart-I || Smart-IN Chart with:', smartiConnected, smartiNotConnected, smartinConnected,
        smartinNotConnected);

    Highcharts.chart('Smarti_inPie', {
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45
            }
        },
        title: {
            text: 'Smart-I || Smart-IN Panel Connection Status'
        },
        subtitle: {
            text: '3D Pie Chart Representation'
        },
        plotOptions: {
            pie: {
                innerSize: 100,
                depth: 45,
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
            data: [
                ['Smart-I Connected', smartiConnected],
                ['Smart-I Not Connected', smartiNotConnected],
                ['Smart-IN Connected', smartinConnected],
                ['Smart-IN Not Connected', smartinNotConnected]
            ]
        }]
    });
}

// Initialize the chart
loadsmartipnbboiChart(smartiConnected, smartiNotConnected, smartinConnected, smartinNotConnected);


// RASS PNB || RASS BOI starts

var rasspnbConnected = <?php echo $rasspnbConnected; ?>;
var rasspnbNotConnected = <?php echo $rasspnbNotConnected; ?>;
var rassboiConnected = <?php echo $rassboiConnected; ?>;
var rassboiNotConnected = <?php echo $rassboiNotConnected; ?>;

// RASS PNB || RASS BOI ends

// RASS PNB || RASS BOI function
function loadRassPnbBoiChart(rasspnbConnected, rasspnbNotConnected, rassboiConnected, rassboiNotConnected) {
    console.log('Loading RASS PNB || RASS BOI Chart with:', rasspnbConnected, rasspnbNotConnected, rassboiConnected,
        rassboiNotConnected);

    Highcharts.chart('RassPnbBoiPie', {
        chart: {
            type: 'pie'
        },
        title: {
            text: 'RASS PNB || RASS BOI Panel Connection Status'
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
                    name: 'RASS PNB Connected',
                    y: rasspnbConnected,
                    sliced: true,
                    selected: true
                },
                {
                    name: 'RASS PNB Not Connected',
                    y: rasspnbNotConnected
                },
                {
                    name: 'RASS BOI Connected',
                    y: rassboiConnected
                },
                {
                    name: 'RASS BOI Not Connected',
                    y: rassboiNotConnected
                }
            ]
        }]
    });
}

// Initialize the chart
loadRassPnbBoiChart(rasspnbConnected, rasspnbNotConnected, rassboiConnected, rassboiNotConnected);


/* Smarti [hdfc,pnb,boi] ends */

var smartihdfcConnected = <?php echo $smartihdfcConnected; ?>;
var smartihdfcNotConnected = <?php echo $smartihdfcNotConnected; ?>;
var smartiboiConnected = <?php echo $smartiboiConnected; ?>;
var smartiboiNotConnected = <?php echo $smartiboiNotConnected; ?>;
var smartipnbConnected = <?php echo $smartipnbConnected; ?>;
var smartipnbNotConnected = <?php echo $smartipnbNotConnected; ?>;


function loadSmartIHdfcPnbBoiChart(smartihdfcConnected, smartihdfcNotConnected, smartiboiConnected,
    smartiboiNotConnected,
    smartipnbConnected, smartipnbNotConnected) {
    console.log('Loading SMART-I[HDFC || BOI || PNB] Chart with:', smartihdfcConnected, smartihdfcNotConnected,
        smartiboiConnected,
        smartiboiNotConnected, smartipnbConnected, smartipnbNotConnected);

    Highcharts.chart('SmartIHdfcPnbBoiChartColumn', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'SMART-I[HDFC || BOI || PNB] Panel Connection Status'
        },
        subtitle: {
            text: 'Column Chart Representation'
        },
        xAxis: {
            categories: [
                'RASS PNB',
                'RASS BOI',
                'RASS PNB'
            ],
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
                '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
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
            name: 'Smart-I HDFC Connected',
            data: [smartihdfcConnected]
        }, {
            name: 'Smart-I HDFC Not Connected',
            data: [smartihdfcNotConnected]
        }, {
            name: 'Smart-I BOI Connected',
            data: [smartiboiConnected]
        }, {
            name: 'Smart-I BOI Not Connected',
            data: [smartiboiNotConnected]
        }, {
            name: 'Smart-I PNB Connected',
            data: [smartipnbConnected]
        }, {
            name: 'Smart-I PNB Not Connected',
            data: [smartipnbNotConnected]
        }]
    });
}

loadSmartIHdfcPnbBoiChart(smartihdfcConnected, smartihdfcNotConnected, smartiboiConnected, smartiboiNotConnected,
    smartipnbConnected, smartipnbNotConnected);

/* Smarti [hdfc,pnb,boi] ends */

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