
<!-- <h1>Welcome To Dashboard</h1> -->

<?php
 
$dataPoints = array();
//Best practice is to create a separate file for handling connection to database
try{
     // Creating a new connection.
    // Replace your-hostname, your-db, your-username, your-password according to your database
    $link = new \PDO(   'mysql:host=localhost;dbname=ra_hms;charset=utf8mb4', //'mysql:host=localhost;dbname=canvasjs_db;charset=utf8mb4',
                        'root', //'root',
                        '', //'',
                        array(
                            \PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                            \PDO::ATTR_PERSISTENT => false
                        )
                    );
    
    $handle = $link->prepare('select crop_name as label, harvest_per_land as y from crops'); 
    $handle->execute(); 
    $result = $handle->fetchAll(\PDO::FETCH_OBJ);
        
    foreach($result as $row){
        array_push($dataPoints, array("label"=> $row->label, "y"=> $row->y));
    }
    $link = null;
}
catch(\PDOException $ex){
    print($ex->getMessage());
}

$dataPoints1 = array();
//Best practice is to create a separate file for handling connection to database
try{
     // Creating a new connection.
    // Replace your-hostname, your-db, your-username, your-password according to your database
    $link = new \PDO(   'mysql:host=localhost;dbname=ra_hms;charset=utf8mb4', //'mysql:host=localhost;dbname=canvasjs_db;charset=utf8mb4',
                        'root', //'root',
                        '', //'',
                        array(
                            \PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                            \PDO::ATTR_PERSISTENT => false
                        )
                    );
    
    $handle = $link->prepare('select text as label, id as y from data'); 
    $handle->execute(); 
    $result = $handle->fetchAll(\PDO::FETCH_OBJ);
        
    foreach($result as $row){
        array_push($dataPoints1, array("label"=> $row->label, "y"=> $row->y));
    }
    $link = null;
}
catch(\PDOException $ex){
    print($ex->getMessage());
}


$dataPoints2 = array();
//Best practice is to create a separate file for handling connection to database
try{
     // Creating a new connection.
    // Replace your-hostname, your-db, your-username, your-password according to your database
    $link = new \PDO(   'mysql:host=localhost;dbname=ra_hms;charset=utf8mb4', //'mysql:host=localhost;dbname=canvasjs_db;charset=utf8mb4',
                        'root', //'root',
                        '', //'',
                        array(
                            \PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                            \PDO::ATTR_PERSISTENT => false
                        )
                    );
    
    $handle = $link->prepare('select text as label, id as y from data'); 
    $handle->execute(); 
    $result = $handle->fetchAll(\PDO::FETCH_OBJ);
        
    foreach($result as $row){
        array_push($dataPoints2, array("label"=> $row->label, "y"=> $row->y));
    }
    $link = null;
}
catch(\PDOException $ex){
    print($ex->getMessage());
}

$dataPoints3 = array();
//Best practice is to create a separate file for handling connection to database
try{
     // Creating a new connection.
    // Replace your-hostname, your-db, your-username, your-password according to your database
    $link = new \PDO(   'mysql:host=localhost;dbname=ra_hms;charset=utf8mb4', //'mysql:host=localhost;dbname=canvasjs_db;charset=utf8mb4',
                        'root', //'root',
                        '', //'',
                        array(
                            \PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                            \PDO::ATTR_PERSISTENT => false
                        )
                    );
    
    $handle = $link->prepare('select text as label, id as y from data'); 
    $handle->execute(); 
    $result = $handle->fetchAll(\PDO::FETCH_OBJ);
        
    foreach($result as $row){
        array_push($dataPoints3, array("label"=> $row->label, "y"=> $row->y));
    }
    $link = null;
}
catch(\PDOException $ex){
    print($ex->getMessage());
}
?>


<script>
window.onload = function() {

    CanvasJS.addColorSet("greenShades",
                [//colorSet Array

                "#2aaa26",
                "#5cca58",
                "#046801",
                "#3CB371",
                "#90EE90"                
                ]);
 
    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        exportEnabled: true,
        colorSet: "greenShades",
        theme: "light2",
        title:{
            text: "Registered crops"
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
        title:{
            text: "Registered Data"
        },
        axisY: {
            title: "Harvest Per Land"
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
        title:{
            text: "Crop Distribution"
        },
        axisY: {
            title: "Harvest Per Land"
        },
        axisX:{
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
        title:{
            text: "Crop Distribution"
        },
        axisY: {
            title: "Harvest Per Land"
        },
        axisX:{
            title: "Crop Name"
        },
        data: [{
            type: "bar",
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

<script src="<?php echo URL; ?>/views/dashboard/js/default.js"></script>
