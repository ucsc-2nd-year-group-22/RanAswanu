
<h1>Dashboard</h1>

<h2>For all users</h2>

<?php
 
$dataPoints = array();
//Best practice is to create a separate file for handling connection to database
try{
     // Creating a new connection.
    // Replace your-hostname, your-db, your-username, your-password according to your database
    $link = new \PDO(   'mysql:host=localhost;dbname=mvc;charset=utf8mb4', //'mysql:host=localhost;dbname=canvasjs_db;charset=utf8mb4',
                        'root', //'root',
                        '', //'',
                        array(
                            \PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                            \PDO::ATTR_PERSISTENT => false
                        )
                    );
    
    $handle = $link->prepare('select crop_varient as label, harvest_per_land as y from crops'); 
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
    $link = new \PDO(   'mysql:host=localhost;dbname=mvc;charset=utf8mb4', //'mysql:host=localhost;dbname=canvasjs_db;charset=utf8mb4',
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

?>


<script>
window.onload = function() {
 
    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
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
 
}
</script>
<div id="chartContainer" style="height: 370px; width: 100%; margin: 20px"></div>
<div id="chartContainer1" style="height: 370px; width: 100%; margin: 20px"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aperiam nisi quaerat architecto sint explicabo atque ratione unde consequatur repudiandae eum, harum excepturi laborum id doloremque animi laboriosam earum odio accusantium.</p>