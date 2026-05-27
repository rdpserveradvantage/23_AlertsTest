<div class="card">
    <div class="card-header">
        <h5 class="mb-0">AI TicketView Filter</h5>
    </div>
    <div class="card-body">

        <form id="filterForm">


            <div class="row mb-3">

                <div class="col-md-6">
                    <label for="AtmID" class="form-label">Select From & To</label>
                    <div class="col-sm-9">
                        <div id="reportrange"
                            style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                            <i class="fa fa-calendar"></i>&nbsp;
                            <span></span> <i class="fa fa-caret-down"></i>
                        </div>

                        <input type="hidden" id="start" name="start" value="<?php echo date('Y-m-d'); ?>">
                        <input type="hidden" id="end" name="end" value="<?php echo date('Y-m-d'); ?>">
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-3">
                    <button type="button" class="btn btn-primary" id="show_detail"
                        onclick="get_ai_ticket()">Show</button>
                    <!-- <button id="showTickets" class="btn btn-primary">Show</button> -->

                </div>
            </div>
        </form>
    </div>
</div>
<br>