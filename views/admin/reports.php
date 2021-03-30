<h1>Create Report</h1>

<!-- <div class="user-tabs">
    <ul>
        <li><a href="#">Home</a></li>
    </ul>
</div> -->

<div class="main-form">
    <form action="<?= URL; ?>/report/generateReport" target="_blank" method="post">
        <div class="row">
            <div class="col-25">
                <label for="cetner_name">Col. Center</label>
            </div>
            <div class="col-75">
                <select id="center_name" name="center_name">
                    <option value="null"> -- SELECT COL. CENTER --</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="district">District</label>
            </div>
            <div class="col-75">
                <select id="district" name="district">
                    <option value="null"> -- SELECT DISTRICT --</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="month">Month</label>
            </div>
            <div class="col-75">
                <select id="month" name="month">
                    <option value="null"> -- SELECT MONTH --</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="cropType">Crop Type</label>
            </div>
            <div class="col-75">
                <select id="cropType" name="cropType">
                    <option value="null"> -- SELECT CROP --</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="cropVart">Crop Varient</label>
            </div>
            <div class="col-75">
                <select id="cropVart" name="cropVart">
                    <option value="null"> -- SELECT CROP VART --</option>
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

<script src="<?= URL; ?>views/admin/js/dropDowns.js"></script>

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