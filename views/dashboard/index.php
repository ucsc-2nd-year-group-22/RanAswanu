<!-- <h1>Welcome To Dashboard</h1> -->

<?php

$dataPoints = array();
//Best practice is to create a separate file for handling connection to database
try {
    // Creating a new connection.
    // Replace your-hostname, your-db, your-username, your-password according to your database
    $link = new \PDO(
        'mysql:host=localhost;dbname=ra_hms;charset=utf8mb4', //'mysql:host=localhost;dbname=canvasjs_db;charset=utf8mb4',
        'root', //'root',
        '', //'',
        array(
            \PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_PERSISTENT => false
        )
    );

    $handle = $link->prepare('SELECT crop_varient as label, harvest_per_land as y FROM `crop` GROUP BY crop_type');
    $handle->execute();
    $result = $handle->fetchAll(\PDO::FETCH_OBJ);

    foreach ($result as $row) {
        array_push($dataPoints, array("label" => $row->label, "y" => $row->y));
    }
    $link = null;
} catch (\PDOException $ex) {
    print($ex->getMessage());
}

$dataPoints1 = array();
//Best practice is to create a separate file for handling connection to database
try {
    // Creating a new connection.
    // Replace your-hostname, your-db, your-username, your-password according to your database
    $link = new \PDO(
        'mysql:host=localhost;dbname=ra_hms;charset=utf8mb4', //'mysql:host=localhost;dbname=canvasjs_db;charset=utf8mb4',
        'root', //'root',
        '', //'',
        array(
            \PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_PERSISTENT => false
        )
    );

    $handle = $link->prepare('select crop_type as label, harvest_per_land as y from crop');
    $handle->execute();
    $result = $handle->fetchAll(\PDO::FETCH_OBJ);

    foreach ($result as $row) {
        array_push($dataPoints1, array("label" => $row->label, "y" => $row->y));
    }
    $link = null;
} catch (\PDOException $ex) {
    print($ex->getMessage());
}


$dataPoints2 = array();
//Best practice is to create a separate file for handling connection to database
try {
    // Creating a new connection.
    // Replace your-hostname, your-db, your-username, your-password according to your database
    $link = new \PDO(
        'mysql:host=localhost;dbname=ra_hms;charset=utf8mb4', //'mysql:host=localhost;dbname=canvasjs_db;charset=utf8mb4',
        'root', //'root',
        '', //'',
        array(
            \PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_PERSISTENT => false
        )
    );

    $handle = $link->prepare('SELECT demand_for_crop_center.demant_amount as label, crop.crop_type as y
        FROM demand_for_crop_center
        JOIN crop ON demand_for_crop_center.crop_id =crop.crop_id
        WHERE demand_for_crop_center.month_id = 5 AND demand_for_crop_center.center_id = 2
        GROUP BY crop.crop_type');
    $handle->execute();
    $result = $handle->fetchAll(\PDO::FETCH_OBJ);

    foreach ($result as $row) {
        array_push($dataPoints2, array("label" => $row->label, "y" => $row->y));
    }
    $link = null;
} catch (\PDOException $ex) {
    print($ex->getMessage());
}

$dataPoints3 = array();
//Best practice is to create a separate file for handling connection to database
try {
    // Creating a new connection.
    // Replace your-hostname, your-db, your-username, your-password according to your database
    $link = new \PDO(
        'mysql:host=localhost;dbname=ra_hms;charset=utf8mb4', //'mysql:host=localhost;dbname=canvasjs_db;charset=utf8mb4',
        'root', //'root',
        '', //'',
        array(
            \PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_PERSISTENT => false
        )
    );

    $handle = $link->prepare('SELECT gathered_harvest.harvest_amount as y, crop.crop_varient as label
                            FROM gathered_harvest
                            JOIN crop ON gathered_harvest.crop_id =crop.crop_id
                            WHERE gathered_harvest.center_id = 2
                            GROUP BY crop.crop_type');
    $handle->execute();
    $result = $handle->fetchAll(\PDO::FETCH_OBJ);

    foreach ($result as $row) {
        array_push($dataPoints3, array("label" => $row->label, "y" => $row->y));
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
                text: "Harvest Per Land"
            },
            axisY: {
                title: "Harvest Per Land"
            },
            data: [{
                type: "pie",
                yValueFormatString: "#,##0.## tonnes",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();


        var chart1 = new CanvasJS.Chart("chartContainer1", {
            animationEnabled: true,
            exportEnabled: true,
            theme: "light2",
            title: {
                text: ""
            },
            axisY: {
                title: ""
            },
            data: [{
                type: "line",
                yValueFormatString: "#,##0.## tonnes",
                dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart1.render();

        var chart2 = new CanvasJS.Chart("chartContainer2", {
            animationEnabled: true,
            exportEnabled: true,
            theme: "light3",
            dataPointMaxWidth: 90,
            title: {
                text: "Demand (Dambulla - May )"
            },
            axisY: {
                title: "Demand (kilo grams)"
            },
            axisX: {
                title: "Crop Name"
            },
            data: [{
                type: "column",
                yValueFormatString: "#,##0.## tonnes",
                dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart2.render();

        var chart3 = new CanvasJS.Chart("chartContainer3", {
            animationEnabled: true,
            exportEnabled: true,
            theme: "light3",
            title: {
                text: "Collected Harvest (Dambulla - May)"
            },
            axisY: {
                title: "Collected harvest (kilo grams)"
            },
            axisX: {
                title: "Crop Name"
            },
            data: [{
                type: "column",
                yValueFormatString: "#,##0.## tonnes",
                dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart3.render();


    }
</script>

<div class="charts">
    <div id="chartContainer"></div>
    <div id="chartContainer1"></div>
</div>

<div id="chartContainer2"></div>
<div id="chartContainer3"></div>
<div id="chartContainer4"></div>

<script src="<?php echo URL; ?>/views/dashboard/js/default.js"></script>