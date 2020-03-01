<?php
    require 'session.php';

    $_SESSION['origin'] = $_POST['origin'];
    $_SESSION['mileage'] = $_POST['mileage'];
    $_SESSION['capacity'] = $_POST['capacity'];
    $_SESSION['power'] = $_POST['power'];
    $_SESSION['fuel_consumption'] = $_POST['fuel_consumption'];
    $_SESSION['seat_no'] = $_POST['seat_no'];
    $_SESSION['door_no'] = $_POST['door_no'];
    $_SESSION['color'] = $_POST['color'];
    $_SESSION['fuel'] = $_POST['fuel'];
    $_SESSION['transmission'] = $_POST['transmission'];
    $_SESSION['year'] = $_POST['year'];

    header('Location: edit_form3.php');
?>