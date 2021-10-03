<h1>Create Report</h1>

<div class="main-form">
    <form action="<?= URL; ?>/report/generateReport" target="_blank" method="post">
        <div class="row">
            <div class="col-25">
                <label for="reportType">Report Type</label>
            </div>
            <div class="col-75">
                <select id="reportType" name="reportType">
                    <option value="null"> -- SELECT REPORT TYPE --</option>
                    <option value="userInfo"> User Information </option>
                    <option value="cropInfo"> Crop Information </option>
                    <option value="dmgInfo"> Damage Information </option>
                    <option value="hvstInfo"> Harvest Information </option>
                </select>
            </div>
        </div>
        
        <div class="row">
            <div class="col-25">
                <label for="from">From </label>
            </div>
            <div class="col-75">
                <input type="date" id="from" name="from" placeholder="Month/Date/Year ">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="to">To </label>
            </div>
            <div class="col-75">
                <input type="date" id="to" name="to" placeholder="Month/Date/Year ">
            </div>
        </div>
        <!-- <div class="row">
            <div class="col-25">

            </div>
            <div class="col-75">
                <input type="checkbox" checked="checked" name="remember"> Email report
            </div>
        </div>
        <div class="row">
            <div class="col-25">

            </div>
            <div class="col-75">
                <input type="checkbox" checked="checked" name="remember"> Open PDF in new tab
            </div>
        </div> -->
        <div class="row">
            <div class="col-25">

            </div>
            <div class="col-75">
                <button type="Submit"><i class="fas fa-file"></i> Create Report</button>
            </div>
        </div>
    </form>
</div>

<!-- <script src="<?= URL; ?>views/admin/js/dropDowns.js"></script> -->

<!-- <div class="main-form">

    <form action="<?= URL; ?>officer/sendmail" method="post">
        <div class="row">
            <div class="col-25">

            </div>
            <div class="col-75">
                <button type="Submit">Email report</button>
            </div>
        </div>
    </form>
</div> -->
