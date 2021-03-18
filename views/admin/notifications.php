<h1>Notifications</h1>

<div class="user-tabs">
    <ul>
        <li><a id="tab1" href="#"  class="active-tab">Today</a></li>
        <li><a id="tab2" href="#">Old</a></li>
    </ul>
</div>

<div id="tab1C" class="tabContainer">
    <?php 
        foreach ($notifications as $notification){ ?>
            <dl class="notification">
                <dd><?php echo $notification['title']; ?></dd>
                <dd><?php echo $notification['description']; ?></dd>
            </dl>
    <?php  } ?>
</div>

<div id="tab2C" class="tabContainer">
    <dl class="notification">
        <dd>12-01-2020</dd>
        <dd>10.00 AM</dd>
        <dd>Sunil Siripala submitted a crop request (Pumpking, 1.2MT, 7 weeks, below-demand) </dd>
    </dl>
    <dl class="notification">
        <dd>12-01-2020</dd>
        <dd>10.00 AM</dd>
        <dd>Sunil Siripala submitted a crop request (Pumpking, 1.2MT, 7 weeks, below-demand) </dd>
    </dl>
    <dl class="notification">
        <dd>12-01-2020</dd>
        <dd>10.00 AM</dd>
        <dd>Sunil Siripala submitted a crop request (Pumpking, 1.2MT, 7 weeks, below-demand) </dd>
    </dl>

</div>