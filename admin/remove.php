<?php
    require '../assets/php/db.php';
    require 'session.php';
    $id=$_GET['id'];
    $_SESSION['car_id'] = $id;
    $username = $_SESSION['username'];
    
    $stmt = "UPDATE cars SET availability = 0 WHERE id = ".$id;
    if (mysqli_query($conn, $stmt)) {
        echo "<script>alert('car marked as sold')</script>";
        header("Location: homepage.php");
    }
    else{
        echo "<script>alert('Something went wrong')</script>";
    }
?>