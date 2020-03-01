<?php
    require 'session.php';
    require '../assets/php/db.php';
    $id= 0;
    $id = $_SESSION['car_id'];

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

    function insertTodb($conn, $car_name, $category, $origin, $mileage, $capacity, $power, $fuel, $fuel_consumption, $seat_no, $door_no, $trasmission, $color,$image1, $image2, $image3, $image4, $image5, $image6, $model, $ac, $air_bag, $rear_camera, $cd_player, $fm_radio, $year, $price, $new_used, $user_id, $dealer, $id)
    {
        $status= true;

        $stmt = "UPDATE cars SET year = '".$year."', price = '".$price."', new_or_used = '".$new_used."', dealer_id = '".$dealer."', user_id = '".$user_id."' WHERE id = ". $id;
        if (mysqli_query($conn, $stmt)) {
        }
        else{
            echo "error";
            $status = false;
        }

        $stmt = "UPDATE car_name SET name = '".$car_name."' WHERE id = '".$id."'";
        if (mysqli_query($conn, $stmt)) {
        }
        else{
            echo "error";
            return false;
        }

        $stmt = "UPDATE details SET  origin = '".$origin."', mileage = '".$mileage."', capacity = '".$capacity."', power = '".$power."', fuel_id = '".$fuel."', fuel_consumption = '".$fuel_consumption."', seat_no = '".$seat_no."', door_no = '".$door_no."', transmission_id = '".$trasmission."', color = '".$color."' WHERE id = '". $id. "'";
        if (mysqli_query($conn, $stmt)) {
        }
        else{
            echo "error";
            $status = false;
        }

        $stmt = "UPDATE features SET ac = '".$ac."', air_bag = '".$air_bag."', rear_camera = '".$rear_camera."', cd_player = '".$cd_player."', fm_radio = '".$fm_radio."' WHERE id = '".$id."'";
        
        if (mysqli_query($conn, $stmt)) {
        }
        else{
            echo "error";
            $status = false;
        }

        $stmt = "UPDATE image SET path_1 = '".$image1."', path_2 = '".$image2."', path_3 = '".$image3."', path_4 = '".$image4."', path_5 = '".$image5."', path_6 = '".$image6."' WHERE id = '".$id."'";
        if (mysqli_query($conn, $stmt)) {
        }
        else{
            echo "error";
            $status = false;
        }

        $stmt = "UPDATE model SET model = '".$model."' WHERE id = '".$id."'";
        if (mysqli_query($conn, $stmt)) {
        }
        else{
            echo "error";
            $status = false;
        }

        return $status;
    }

    checkFeatureset($ac, $rear_camera, $air_bag, $cd_player, $fm_radio);
    setVariablesFromSesion($car_name, $dealer, $category, $model, $image1, $image2, $image3, $image4, $image5, $image6, $origin, $mileage, $capacity, $power, $fuel_consumption, $seat_no, $door_no, $color, $fuel, $trasmission, $user_id, $year, $price, $new_used);
    if(insertTodb($conn, $car_name, $category, $origin, $mileage, $capacity, $power, $fuel, $fuel_consumption, $seat_no, $door_no, $trasmission, $color, $image1, $image2, $image3, $image4, $image5, $image6, $model, $ac, $air_bag, $rear_camera, $cd_player, $fm_radio, $year, $price, $new_used, $user_id, $dealer, $id)){
        echo "<script> alert('Car information edited successfully')</script>";
        header('Location: homepage.php');
    }
    

?>