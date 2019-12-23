<?php
    require 'session.php';
    require '../assets/php/db.php';

    $image2 = '';
    $image3 = '';
    $image4 = '';
    $image5 = '';
    $image6 = '';

    if (isset($_POST['image2'])) {
        $image2 = $_POST['image2'];
    }
    if (isset($_POST['image3'])) {
        $image3 = $_POST['image3'];
    }
    if (isset($_POST['image4'])) {
        $image4 = $_POST['image4'];
    }
    if (isset($_POST['image5'])) {
        $image5 = $_POST['image5'];
    }
    if (isset($_POST['image6'])) {
        $image6 = $_POST['image6'];
    }

    $_SESSION['car_name'] = $_POST['car-name'];
    $_SESSION['dealer'] = $_POST['dealer'];
    $_SESSION['category'] = $_POST['category'];
    $_SESSION['model'] = $_POST['model'];
    $_SESSION['image1'] = $_POST['image1'];
    $_SESSION['image2'] = $image2; 
    $_SESSION['image3'] = $image3; 
    $_SESSION['image4'] = $image4; 
    $_SESSION['image5'] = $image5; 
    $_SESSION['image6'] = $image6; 

    header('Location: add2_page.php');
?>