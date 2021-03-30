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

    //chart2
    $dataPoints2 = array();
    $handle = $link->prepare("SELECT demand_for_crop_center.demant_amount as y, crop.crop_varient as label
        FROM demand_for_crop_center
        JOIN crop ON demand_for_crop_center.crop_id =crop.crop_id
        WHERE demand_for_crop_center.month_id = $month AND demand_for_crop_center.center_id = $center_id
        ");
    $handle->execute();
    $result = $handle->fetchAll(\PDO::FETCH_OBJ);
    foreach ($result as $row) {
        array_push($dataPoints2, array("label" => $row->label, "y" => $row->y));
    }

    //chart3
    $dataPoints3 = array();
    $handle = $link->prepare("SELECT gathered_harvest.harvest_amount as y, crop.crop_varient as label FROM gathered_harvest
    JOIN crop ON crop.crop_id = gathered_harvest.crop_id
    WHERE gathered_harvest.month_id = $month AND gathered_harvest.center_id = $center_id");
    $handle->execute();
    $result = $handle->fetchAll(\PDO::FETCH_OBJ);
    foreach ($result as $row) {
        array_push($dataPoints3, array("label" => $row->label, "y" => $row->y));
    }

    //chart4
    $dataPoints4 = array();
    $handle = $link->prepare('select crop_varient as label, harvest_per_land as y from crop');
    $handle->execute();
    $result = $handle->fetchAll(\PDO::FETCH_OBJ);
    foreach ($result as $row) {
        array_push($dataPoints4, array("label" => $row->label, "y" => $row->y));
    }


    $link = null;
} catch (\PDOException $ex) {

    print($ex->getMessage());
}

?>


<script>
    window.onload = function() {

        var chart2 = new CanvasJS.Chart("chartContainer2", {
            animationEnabled: true,
            exportEnabled: true,
            theme: "light3",
            dataPointMaxWidth: 90,
            title: {
                text: "Demand ( <?php echo $center_name; ?> - <?php echo $month_name; ?> )"
            },
            axisY: {
                title: "Demand (kilo grams)"
            },
            axisX: {
                title: "Crop Name"
            },
            data: [{
                type: "column",
                yValueFormatString: "#,##0.## kg",
                dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart2.render();

        var chart3 = new CanvasJS.Chart("chartContainer3", {
            animationEnabled: true,
            exportEnabled: true,
            theme: "light3",
            title: {
                text: "Collected Harvest ( <?php echo $center_name; ?> - <?php echo $month_name; ?> )"
            },
            axisY: {
                title: "Collected harvest (kilo grams)"
            },
            axisX: {
                title: "Crop Name"
            },
            data: [{
                type: "column",
                yValueFormatString: "#,##0.## kg",
                dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart3.render();

        var chart4 = new CanvasJS.Chart("chartContainer4", {
            title: {
                text: "Harvest ( kg ) / Acres"
            },
            axisY: {
                title: "Havest Amount(kg)",
                valueFormatString: "#0.#,.",
            },
            axisX: {
                title: "Crop Varient"
            },
            data: [{
                type: "line",
                dataPoints: <?php echo json_encode($dataPoints4, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart4.render();


    }
</script>

<div id="chartContainer2"></div>
<div id="chartContainer3"></div>
<div id="chartContainer4"></div>

<script src="<?php echo URL; ?>/views/dashboard/js/default.js"></script>