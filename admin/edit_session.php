<?php
    require 'session.php';
    require '../assets/php/db.php';

    $image2 = '';
    $image3 = '';
    $image4 = '';
    $image5 = '';
    $image6 = '';

    echo "<script>console.log('uploaded')</script>";


    $target_dir = "../uploads/";
    $stmt = "SELECT * FROM image_last_name ORDER BY name DESC LIMIT 1";
    if($result = mysqli_query($conn, $stmt)){
        $row = mysqli_fetch_array($result);
        $last_name = $row['name'];
    }

    if (!empty($_FILES['image1']['name'])) {
        $temp = explode(".", $_FILES["image1"]["name"]);
        $newName = $last_name + 1;
        $newName = strval($newName) . "." . end($temp);
        $last_name += 1;
        move_uploaded_file($_FILES['image1']['tmp_name'], $target_dir . $newName);
        $image1 = $newName;
    }

    if (!empty($_FILES['image2']['name'])) {
        $temp = explode(".", $_FILES["image2"]["name"]);
        $newName = $last_name + 1;
        $newName = strval($newName) . "." . end($temp);
        $last_name += 1;
        move_uploaded_file($_FILES['image2']['tmp_name'], $target_dir . $newName);
        $image2 = $newName;
    }

    if (!empty($_FILES['image3']['name'])) {
        $temp = explode(".", $_FILES["image3"]["name"]);
        $newName = $last_name + 1;
        $newName = strval($newName) . "." . end($temp);
        $last_name += 1;
        move_uploaded_file($_FILES['image3']['tmp_name'], $target_dir . $newName);
        $image3 = $newName;
    }

    if (!empty($_FILES['image4']['name'])) {
        $temp = explode(".", $_FILES["image4"]["name"]);
        $newName = $last_name + 1;
        $newName = strval($newName) . "." . end($temp);
        $last_name += 1;
        move_uploaded_file($_FILES['image4']['tmp_name'], $target_dir . $newName);
        $image4 = $newName;
    }

     if (!empty($_FILES['image5']['name'])) {
        $temp = explode(".", $_FILES["image5"]["name"]);
        $newName = $last_name + 1;
        $newName = strval($newName) . "." . end($temp);
        $last_name += 1;
        move_uploaded_file($_FILES['image5']['tmp_name'], $target_dir . $newName);
        $image5 = $newName;
    }

     if (!empty($_FILES['image6']['name'])) {
        $temp = explode(".", $_FILES["image6"]["name"]);
        $newName = $last_name + 1;
        $newName = strval($newName) . "." . end($temp);
        $last_name += 1;
        move_uploaded_file($_FILES['image6']['tmp_name'], $target_dir . $newName);
        $image6 = $newName;
    }

    $_SESSION['car_name'] = $_POST['car-name'];
    $_SESSION['dealer'] = $_POST['dealer'];
    $_SESSION['category'] = $_POST['category'];
    $_SESSION['model'] = $_POST['model'];
    $_SESSION['price'] = $_POST['price'];
    $_SESSION['new-used'] = $_POST['new-used'];
    $_SESSION['image1'] = $image1;
    $_SESSION['image2'] = $image2; 
    $_SESSION['image3'] = $image3; 
    $_SESSION['image4'] = $image4; 
    $_SESSION['image5'] = $image5; 
    $_SESSION['image6'] = $image6; 
    echo $image1;

    $stmt =" INSERT INTO image_last_name (name) VALUES $last_name";
    if (mysqli_query($conn,$stmt)) {
        
    }
    else{
        echo "<script>alert('something went wrong</script>";
    }
    header('Location: edit_form2.php');
?>