<h1>Notifications</h1>

<div class="user-tabs">
    <ul>
        <li><a id="tab1" href="#" class="active-tab">Recent</a></li>
        <li><a id="tab2" href="#">All</a></li>
    </ul>
</div>

<div id="tab1C" class="tabContainer">
    <?php
    $i = 0;
    foreach ($notifications as $notification) { ?>
        <dl class="notification">
            <dd><?php echo $notification['time_stamp']; ?></dd>
            <dd style="font-weight: bold;"><?php echo $notification['title']; ?></dd>
            <dd><?php echo "\t"; ?></dd>
            <dd><?php echo $notification['description']; ?></dd>
        </dl>
        <?php $i++;
        if ($i >= 8) {
            break;
        } ?>
    <?php  } ?>
</div>

<div id="tab2C" class="tabContainer">
    <?php
    $i = 0;
    foreach ($notifications as $notification) { ?>
        <dl class="notification">
            <dd><?php echo $notification['time_stamp']; ?></dd>
            <dd style="font-weight: bold;"><?php echo $notification['title']; ?></dd>
            <dd><?php echo "\t"; ?></dd>
            <dd><?php echo $notification['description']; ?></dd>
        </dl>
        <?php $i++;
        if ($i >= 25) {
            break;
        } ?>
    <?php  } ?>

</div>