<div class="charts">
    <div id="chartContainer"></div>
    <div id="chartContainer1"></div>
</div>

<!-- FORM -->
<div class="main-form">
    <div id="errors" class="error"></div>

    <form action="<?= URL; ?>/dashboard/submit" onsubmit="return CheckPassword()" method="post">
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

            </div>
            <div class="col-75">
                <input type="submit" value="Submit">
            </div>
        </div>
    </form>
</div>

<script src="<?php echo URL; ?>views/dashboard/js/validate.js"></script>
<script src="views/dashboard/js/dropDowns.js"></script>

<?php

try {
    // Creat the connection
    $link = new \PDO(
        'mysql:host=localhost;dbname=ra_hms;charset=utf8mb4', //'mysql:host=localhost;dbname=canvasjs_db;charset=utf8mb4',
        'root', //'root',
        '', //'',
        array(
            \PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_PERSISTENT => false
        )
    );


    //chart
    $dataPoints = array();
    $handle = $link->prepare('SELECT crop_varient as label, harvest_per_land as y FROM `crop` GROUP BY crop_type');
    $handle->execute();
    $result = $handle->fetchAll(\PDO::FETCH_OBJ);
    foreach ($result as $row) {
        array_push($dataPoints, array("label" => $row->label, "y" => $row->y));
    }

    //chart1
    $dataPoints1 = array();
    $handle = $link->prepare('SELECT COUNT(user.user_id) as y, user.role as label FROM user GROUP BY role');
    $handle->execute();
    $result = $handle->fetchAll(\PDO::FETCH_OBJ);
    foreach ($result as $row) {
        array_push($dataPoints1, array("label" => $row->label, "y" => $row->y));
    }

    $link = null;
} catch (\PDOException $ex) {

    print($ex->getMessage());
}
?>


<script>
    window.onload = function() {

        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            exportEnabled: true,
            theme: "light2",
            title: {
                text: "Expected Harvest (kg) / Acres"
            },
            legend: {
                maxWidth: 350,
                itemWidth: 120
            },
            axisY: {
                title: "Harvest (kg) / Acres"
            },
            axisX: {
                title: "Crop Varients"
            },
            data: [{
                type: "pie",
                yValueFormatString: "#,##0.## kg",
                showInLegend: true,
                legendText: "{label}",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();


        var chart1 = new CanvasJS.Chart("chartContainer1", {
            animationEnabled: true,
            exportEnabled: true,
            theme: "light2",
            title: {
                text: "User Distribution"
            },
            axisY: {
                title: "Number of Users"
            },
            axisX: {
                title: "Type of Users"
            },
            data: [{
                type: "pie",
                yValueFormatString: "#,##0.## s",
                showInLegend: true,
                legendText: "{label}",
                dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart1.render();
    }
</script>



<script src="<?php echo URL; ?>/views/dashboard/js/default.js"></script>