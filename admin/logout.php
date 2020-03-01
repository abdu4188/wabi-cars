<?php
    require 'session.php';
    unset($_SESSION['user_id']);
    unset($_SESSION['username']);
    unset($_SESSION['logged_in']);
    header('Location: index.php');
?>