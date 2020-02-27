<?php
    require '../assets/php/db.php';
    require 'session.php';
    $username = $_POST['username'];
    $password =$_POST['password'];
    $stmt = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $stmt);
    if(mysqli_num_rows($result) == 0){
        $_SESSION['error'] = "Incorrect username or password";
        header('Location: index.php');
    }
    else{
        while ($row = mysqli_fetch_array($result)) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['logged_in'] = true;
            echo $row['username'];
            header('Location: homepage.php');
        }
    }
?>