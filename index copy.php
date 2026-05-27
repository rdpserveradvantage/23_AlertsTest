<?php include 'header.php';
$con = OpenCon();

?>
<style>
.bt {
    border-top: 1px solid #1e1f33;
}

.br {
    border-right: 1px solid #282844;
}

div.card-body {
    text-align: justify;
}

.menu-icon {
    width: 33px;
    margin-right: 7%;
}

th,
td {
    white-space: nowrap;
}

.card-custom {
    background: #00bcd4;
    color: white;
    padding: 20px;
    border-radius: 10px;
    margin-bottom: 20px;
    text-align: center;
    height: 120px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.card-custom h5 {
    margin: 0;
    font-size: 20px;
    font-weight: bold;
}

.card-custom p {
    margin: 5px 0 0 0;
    font-size: 16px;
}
</style>
<?php include 'navbar.php'; ?>
<div class="main-container">
    <div class="pd-ltr-20">

        <div class="content-wrapper">
            <h4 class="card-title text-center mt-4 mb-4" style="font-size: 28px; font-weight: bold;">Comfort Panel</h4>



            <!-- Start of Cards -->
            <div class="row">

                <div class="col-md-6">
                    <div class="card-custom" style="background:#00BCD4;">
                        <h5>
                            <?php

                            $totalsitesQry = mysqli_query($con, "select count(*) as totalSites from panel_health");

                            // if ($_SESSION['permission'] != "" && $_SESSION['designation'] == "2") {
                            
                            //     $Id = $_SESSION['permission'];
                            //     $perm = array();
                            
                            //     $IDsplit = explode(',', $Id);
                            

                            //     foreach ($IDsplit as $element) {
                            //         $perm[] = $element;
                            //     }
                            //     $per = "'" . implode("','", $perm) . "'";
                            
                            //     $abc_count .= " and atmid IN (select ATMID from sites where CTS_LocalBranch IN($per) and live='Y')";
                            //     $abc .= " and atmid IN (select ATMID from sites where CTS_LocalBranch IN($per) and live='Y')";
                            // }
                            // if ($_SESSION['designation'] == "4") {
                            
                            //     $abc_count .= " and atmid IN (select ATMID from sites where Customer='Hitachi' and live='Y')";
                            //     $abc .= " and atmid IN (select ATMID from sites where Customer='Hitachi' and live='Y')";
                            // }
                            
                            $totalSites = mysqli_fetch_assoc($totalsitesQry)['totalSites'];

                            echo $totalSites;
                            ?>
                        </h5>
                        <p class="text-uppercase m-b-5 font-13 font-600"><a href="" style="color:white"
                                target="_blank">Total Sites</a></p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card-custom" style="background:#2196F3;">
                        <!-- <p style="margin:0; font-size:18px;">Comfort Panel</p> -->
                        <h5 style="margin:5px 0;">
                            <?php
                            $checkcomfortQry = mysqli_query($con, "select count(*) as totalCount from panel_health_api_response ");
                            $totalComfortPanel = mysqli_fetch_assoc($checkcomfortQry)['totalCount'];

                            echo $totalComfortPanel;
                            ?>
                        </h5>
                        <p class="text-uppercase m-b-5 font-13 font-600" style="margin:0;"><a href="panel_health.php"
                                style="color:white" target="_blank">Comfort Panel</a>
                        </p>
                    </div>
                </div>


                <?php
                $checkrassconnectedQry = mysqli_query($con, "select count(*) as totalConnect from panel_health where status='0' and panelName='Rass'");
                $rassConnected = mysqli_fetch_assoc($checkrassconnectedQry)['totalConnect'];

                $checkrassconnectedQry = mysqli_query($con, "select count(*) as totalNotConnect from panel_health where status='1' and panelName='Rass'");
                $rassNotConnected = mysqli_fetch_assoc($checkrassconnectedQry)['totalNotConnect'];


                // echo $rassConnected . " / " . $rassNotConnected;
                ?>


                <?php
                $checksmartiConnectedQry = mysqli_query($con, "select count(*) as totalConnect from panel_health where status='0' and panelName ='SMART -I' ");
                $smartiConnected = mysqli_fetch_assoc($checksmartiConnectedQry)['totalConnect'] ?? 0;

                $checksmartiNotConnectedQry = mysqli_query($con, "select count(*) as totalNotConnect from panel_health where status='1' and panelName ='SMART -I' ");
                $smartiNotConnected = mysqli_fetch_assoc($checksmartiNotConnectedQry)['totalNotConnect'] ?? 0;

                $checksmartINConnectedQry = mysqli_query($con, "select count(*) as totalConnect from panel_health where status='0' and panelName ='SMART -IN' ");
                $smartinConnected = mysqli_fetch_assoc($checksmartINConnectedQry)['totalConnect'] ?? 0;

                $checksmartINnotConnectedQry = mysqli_query($con, "select count(*) as totalNotConnect from panel_health where status='1' and panelName ='SMART -IN' ");
                $smartinNotConnected = mysqli_fetch_assoc($checksmartINnotConnectedQry)['totalNotConnect'] ?? 0;


                // echo $smartiConnected . " / " . $smartiNotConnected . ' || ' . $smartinConnected . ' / ' . $smartinNotConnected;
                
                ?>

            </div>
            <div class="row">


                <?php
                $checkrasspnbconnectQry = mysqli_query($con, "select count(*) as totalConnect from panel_health where status='0' and panelName ='rass_pnb' ");
                $rasspnbConnected = mysqli_fetch_assoc($checkrasspnbconnectQry)['totalConnect'] ?? 0;

                $checkrasspnbNotconnectQry = mysqli_query($con, "select count(*) as totalNotConnect from panel_health where status='1' and panelName ='rass_pnb' ");
                $rasspnbNotConnected = mysqli_fetch_assoc($checkrasspnbNotconnectQry)['totalNotConnect'] ?? 0;

                $checkrassboiconnectQry = mysqli_query($con, "select count(*) as totalConnect from panel_health where status='0' and panelName ='rass_boi' ");
                $rassboiConnected = mysqli_fetch_assoc($checkrassboiconnectQry)['totalConnect'] ?? 0;

                $checkrassboiNotconnectQry = mysqli_query($con, "select count(*) as totalNotConnect from panel_health where status='1' and panelName ='rass_pnb' ");
                $rassboiNotConnected = mysqli_fetch_assoc($checkrassboiNotconnectQry)['totalNotConnect'] ?? 0;

                // echo $rasspnbConnected . "/" . $rasspnbNotConnected . " || " . $rassboiConnected . '/' . $rassboiNotConnected;
                

                ?>



                <?php
                $checksmartihdfcConnectQry = mysqli_query($con, "select count(*) as totalConnect from panel_health where status='0' and panelName ='smarti_hdfc32'");
                $smartihdfcConnected = mysqli_fetch_assoc($checksmartihdfcConnectQry)['totalConnect'] ?? 0;

                $checksmartihdfcNotConnectQry = mysqli_query($con, "select count(*) as totalNotConnect from panel_health where status='1' and panelName ='smarti_hdfc32'");
                $smartihdfcNotConnected = mysqli_fetch_assoc($checksmartihdfcNotConnectQry)['totalNotConnect'] ?? 0;

                $checksmartiboiConnectQry = mysqli_query($con, "select count(*) as totalConnect from panel_health where status='0' and panelName ='smarti_boi'");
                $smartiboiConnected = mysqli_fetch_assoc($checksmartiboiConnectQry)['totalConnect'] ?? 0;

                $checksmartiboiNotConnectQry = mysqli_query($con, "select count(*) as totalNotConnect from panel_health where status='1' and panelName ='smarti_boi'");
                $smartiboiNotConnected = mysqli_fetch_assoc($checksmartiboiConnectQry)['totalNotConnect'] ?? 0;

                $checksmartipnbConnectQry = mysqli_query($con, "select count(*) as totalConnect from panel_health where status='0' and panelName ='smarti_pnb'");
                $smartipnbConnected = mysqli_fetch_assoc($checksmartipnbConnectQry)['totalConnect'] ?? 0;

                $checksmartipnbNotConnectQry = mysqli_query($con, "select count(*) as totalNotConnect from panel_health where status='1' and panelName ='smarti_pnb'");
                $smartipnbNotConnected = mysqli_fetch_assoc($checksmartipnbNotConnectQry)['totalNotConnect'] ?? 0;


                // echo $smartihdfcConnected . "/" . $smartihdfcNotConnected . " || " . $smartiboiConnected . '/' . $smartiboiNotConnected . " || " . $smartipnbConnected . '/' . $smartipnbNotConnected;
                

                ?>


                <?php
                $checkcomfortConnectQry = mysqli_query($con, "select count(*) as totalConnect from panel_health_api_response where connection_display='1' ");
                $comfortConnected = mysqli_fetch_assoc($checkcomfortConnectQry)['totalConnect'] ?? 0;

                $checkcomfortNotConnectQry = mysqli_query($con, "select count(*) as totalNotConnect from panel_health_api_response where connection_display='0' ");
                $comfortNotConnected = mysqli_fetch_assoc($checkcomfortNotConnectQry)['totalNotConnect'] ?? 0;


                ?>
            </div>

            <!-- <div class="bg-white pd-20 card-box mb-30" id="RassPie"></div> -->
            <div class="pd-ltr-20 xs-pd-20-10">
                <div class="min-height-200px">
                    <div class="bg-white pd-20 card-box mb-30" id="ComfortPie"></div>

                    <div class="bg-white pd-20 card-box mb-30" id="RassPie"></div>
                    <div class="bg-white pd-20 card-box mb-30" id="Smarti_inPie"></div>
                    <div class="bg-white pd-20 card-box mb-30" id="RassPnbBoiPie"></div>
                    <div class="bg-white pd-20 card-box mb-30" id="SmartIHdfcPnbBoiChartColumn"></div>

                </div>

            </div>




        </div>
    </div>

</div>

<?php include 'footer.php' ?>