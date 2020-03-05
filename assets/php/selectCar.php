<?php
    require 'db.php';
    $selectedName = $_POST['selectedName'];
    $stmt = "SELECT DISTINCT model FROM model WHERE id IN ( SELECT model_id FROM cars WHERE name_id IN ( SELECT id FROM car_name WHERE name = '".$selectedName."'))";

    $models = array();

    $result = mysqli_query($conn, $stmt);
    while($row = mysqli_fetch_array($result)){
        $models[] = $row['model'];
        $test = $row['model'];
    }
    echo json_encode($models) ;

?>