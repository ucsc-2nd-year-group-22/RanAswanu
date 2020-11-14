<h1>Create Report</h1>

<!-- <div class="user-tabs">
    <ul>
        <li><a href="#">Home</a></li>
    </ul>
</div> -->

<div class="main-form">
    <form action="#" method="post">
        <div class="row">
            <div class="col-25">
            <label for="province">Select report type</label>
            </div>
            <div class="col-75">
            <select id="province" name="province">
                <option value="report1">report 1</option>
                <option value="report2">report 2</option>
                <option value="report3">report 3</option>
            </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            <label for="dob">From </label>
            </div>
            <div class="col-75">
            <input type="date" id="from" name="from" placeholder="Month/Date/Year ">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
            <label for="dob">To </label>
            </div>
            <div class="col-75">
            <input type="date" id="to" name="to" placeholder="Month/Date/Year ">
            </div>
        </div>
        <div class="row">
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
        </div>
        <div class="row">
            <div class="col-25">
            
            </div>
            <div class="col-75">
            <button type="Submit"><i class="fas fa-file"></i> Create Report</button>
            </div>
        </div>
    </form>
</div>
<div class="main-form">

    <form action="<?= URL;?>officer/sendmail" method="post">
        <div class="row">
            <div class="col-25">
            
            </div>
            <div class="col-75">
            <button type="Submit">Email report</button>
            </div>
        </div>
    </form>
</div>