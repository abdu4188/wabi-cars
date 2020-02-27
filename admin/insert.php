<?php
    require 'session.php';
    require '../assets/php/db.php';

    $ac;
    $ac = 0;
    $rear_camera = 0;
    $air_bag = 0;
    $cd_player = 0;
    $fm_radio = 0;
    $car_name;
    $car_name = '';
    $dealer=0; 
    $category=0;
    $model='';   
    $image1=''; 
    $image2='';
    $image3=''; 
    $image4='';
    $image5='';
    $image6='';
    $origin='';
    $mileage='';
    $capacity='';
    $power='';    
    $fuel_consumption='';
    $seat_no=0;
    $door_no=0;
    $color='';  
    $fuel=0;
    $trasmission=0;
    $user_id=0;
    $year=0 ;
    $price='';
    $new_used=0;
    
    function checkFeatureset(&$ac, &$rear_camera, &$air_bag, &$cd_player, &$fm_radio)
    {
        if (isset($_POST['ac'])) {
            $ac = 1;
        }
        if (isset($_POST['rear-camera'])) {
            $rear_camera = 1;
        }
        if (isset($_POST['air-bag'])) {
            $air_bag = 1;
        }
        if (isset($_POST['cd-player'])) {
            $cd_player = 1;
        }
        if (isset($_POST['fm-radio'])) {
            $fm_radio = 1;
        }
    }
    
    function setVariablesFromSesion(&$car_name, &$dealer, &$category, &$model, &$image1, &$image2, &$image3, &$image4, &$image5, &$image6, &$origin, &$mileage, &$capacity, &$power, &$fuel_consumption, &$seat_no, &$door_no, &$color, &$fuel, &$trasmission, &$user_id, &$year, &$price, &$new_used)
    {
        
        $car_name = $_SESSION['car_name'];
        $dealer = $_SESSION['dealer'];
        $category = $_SESSION['category'];
        $model = $_SESSION['model'];
        $image1 = $_SESSION['image1'];
        $image2 = $_SESSION['image2'];
        $image3 = $_SESSION['image3'];
        $image4 = $_SESSION['image4'];
        $image5 = $_SESSION['image5'];
        $image6 = $_SESSION['image6'];
        $origin = $_SESSION['origin'];
        $mileage = $_SESSION['mileage'];
        $capacity = $_SESSION['capacity'];
        $power = $_SESSION['power'];
        $fuel_consumption = $_SESSION['fuel_consumption'];
        $seat_no = $_SESSION['seat_no'];
        $door_no = $_SESSION['door_no'];
        $color = $_SESSION['color'];
        $fuel = $_SESSION['fuel'];
        $trasmission = $_SESSION['transmission'];
        $user_id = $_SESSION['user_id'];
        $year = $_SESSION['year'];
        $price = $_SESSION['price'];
        $new_used = $_SESSION['new-used'];
    }

    function insertTodb($conn, $car_name, $category, $origin, $mileage, $capacity, $power, $fuel, $fuel_consumption, $seat_no, $door_no, $trasmission, $color,$image1, $image2, $image3, $image4, $image5, $image6, $model, $ac, $air_bag, $rear_camera, $cd_player, $fm_radio, $year, $price, $new_used, $user_id)
    {
        $status =true;
        $stmt = "SELECT id FROM cars ORDER BY id DESC LIMIT 1";
        if($result = mysqli_query($conn, $stmt)){
            $row = mysqli_fetch_array($result);
            $car_id = $row['id'] + 1;
        }
        $stmt = "INSERT INTO car_name (name) VALUES ('$car_name')";
        if (mysqli_query($conn, $stmt)) {
        }
        else{
            echo "<script>alert('Something went wrong')</script>";
            header('Location: error.php');
            $status = false;
        }

        $stmt = "INSERT INTO details (category_id, origin, mileage, capacity, power, fuel_id, fuel_consumption, seat_no, door_no, transmission_id, color) VALUES ($category,'$origin', '$mileage', '$capacity', '$power', $fuel, '$fuel_consumption', '$seat_no', '$door_no', $trasmission,  '$color')";
        if (mysqli_query($conn, $stmt)) {
        }
        else{
            echo "<script>alert('Something went wrong')</script>";
            header('Location: error.php');
            $status = false;
        }

        $stmt = "INSERT INTO image (path_1, path_2, path_3, path_4, path_5, path_6, car_id) VALUES ('$image1', '$image2', '$image3', '$image4', '$image5', '$image6', $car_id)";
        if (mysqli_query($conn, $stmt)) {
        }
        else{
            echo "<script>alert('Something went wrong')</script>";
            header('Location: error.php');
            $status = false;
        }

        $stmt = "INSERT INTO model (model) VALUES ('$model')";
        if (mysqli_query($conn, $stmt)) {
            
        }
        else{
            echo "<script>alert('Something went wrong')</script>";
            header('Location: error.php');
            $status = false;
        }

        $stmt ="INSERT INTO features (ac, air_bag, rear_camera, cd_player, fm_radio) VALUES ('$ac', '$air_bag', '$rear_camera', '$cd_player', '$fm_radio')";
        if (mysqli_query($conn, $stmt)) {
            
        }
        else{
            echo "<script>alert('Something went wrong')</script>";
            header('Location: error.php');
            $status = false;
        }

        $availability=1;
        $stmt = "INSERT INTO cars (name_id, model_id, details_id, year, price, new_or_used, availability, feature_id, dealer_id, user_id) VALUES ($car_id, $car_id, $car_id, $year, '$price', $new_used, $availability, $car_id, $car_id, $user_id)";
        if (mysqli_query($conn, $stmt)) {
            
        }
        else{
            echo "<script>alert('Something went wrong')</script>";
            header('Location: error.php');
            $status = false;
            
        }

        return $status;

    }

    checkFeatureset($ac, $rear_camera, $air_bag, $cd_player, $fm_radio);
    setVariablesFromSesion($car_name, $dealer, $category, $model, $image1, $image2, $image3, $image4, $image5, $image6, $origin, $mileage, $capacity, $power, $fuel_consumption, $seat_no, $door_no, $color, $fuel, $trasmission, $user_id, $year, $price, $new_used);
    if(insertTodb($conn, $car_name, $category, $origin, $mileage, $capacity, $power, $fuel, $fuel_consumption, $seat_no, $door_no, $trasmission, $color, $image1, $image2, $image3, $image4, $image5, $image6, $model, $ac, $air_bag, $rear_camera, $cd_player, $fm_radio, $year, $price, $new_used, $user_id)){
        header('Location: homepage.php');
    }

?>