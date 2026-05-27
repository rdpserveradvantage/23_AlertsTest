<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Filter Panel</h5>
    </div>
    <div class="card-body">
        <?php if ($_GET) {
            $atmid = $_GET['atmid'];
        } ?>
        <form id="filterForm">
            <input type="hidden" id="Client" name="Client" value="Hitachi">
            <input type="hidden" id="Bank" name="Bank" value="PNB">

            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="Circle" class="form-label">Select Circle</label>
                    <select name="Circle" id="Circle" class="form-control form-control-sm">
                        <option value="">All Circle</option>
                        <option value="AGRA">AGRA</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="AtmID" class="form-label">Select AtmID</label>
                    <select name="AtmID" id="AtmID" class="form-control form-control-sm js-example-basic-single w-100"
                        value="<?php echo $atmid ?? ''; ?>">
                        <option value="">All Site</option>
                        <option value="B1156910">B1156910</option> <!-- AGRA -->
                        <option value="A1000310">A1000310</option>
                        <option value="T2052720">T2052720</option>
                        <option value="A1050010">A1050010</option>
                    </select>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-3">
                    <button type="button" class="btn btn-primary" id="show_detail">Show</button>
                    <!-- <a href="" class="btn btn-secondary">Clear</a> -->
                </div>
            </div>
        </form>
    </div>
</div>
<br>