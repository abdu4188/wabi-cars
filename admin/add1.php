<?php
    require 'session.php';
    require '../assets/php/db.php';

    echo "<script>alert('here')</script>";
    function compressImage($source, $destination, $quality) {
        $exploded = explode('.',$source);
        $ext = $exploded[count($exploded) - 1];

        if (preg_match('/jpg|jpeg/i',$ext))
        {
            $imageTmp=imagecreatefromjpeg($source);
            imagejpeg($imageTmp, $destination, $quality);
        }
        else if (preg_match('/png/i',$ext))
        {
            $quality = $quality/10;
            $imageTmp=imagecreatefrompng($source);
            imagepng($imageTmp, $destination, $quality);
        }
            
        else if (preg_match('/gif/i',$ext))
        {
            $quality = $quality/10;
            $imageTmp=imagecreatefromgif($source);
            imagegif($imageTmp, $destination, $quality);
        }
        else if (preg_match('/bmp/i',$ext))
        {
            $quality = $quality/10;
            $imageTmp=imagecreatefrombmp($source);
            imagebmp($imageTmp, $destination, $quality);
        }
        else
            return 0;
        
      
      }
      

    $image1 = '';
    $image2 = '';
    $image3 = '';
    $image4 = '';
    $image5 = '';
    $image6 = '';

    $target_dir = "../uploads/";
    if (!empty($_FILES['image1']['name'])) {
        $temp = explode(".", $_FILES["image1"]["name"]);
        $newName = date('Ymdhis')."1";
        $newName = strval($newName) . "." . end($temp);
        $newPath = '../uploads/'.$newName;
        move_uploaded_file($_FILES['image1']['tmp_name'], $target_dir . $newName);
        compressImage($newPath, $newPath, 60);
        $image1 = $newName;
        
    }

    if (!empty($_FILES['image2']['name'])) {
        $temp = explode(".", $_FILES["image2"]["name"]);
        $newName = date('Ymdhis')."2";
        $newName = strval($newName) . "." . end($temp);
        $newPath = '../uploads/'.$newName;
        move_uploaded_file($_FILES['image2']['tmp_name'], $target_dir . $newName);
        compressImage($newPath, $newPath, 60);
        $image2 = $newName;
    }

    if (!empty($_FILES['image3']['name'])) {
        $temp = explode(".", $_FILES["image3"]["name"]);
        $newName = date('Ymdhis')."3";
        $newPath = '../uploads/'.$newName;
        move_uploaded_file($_FILES['image3']['tmp_name'], $target_dir . $newName);
        compressImage($newPath, $newPath, 60);
        $image3 = $newName;
    }

    if (!empty($_FILES['image4']['name'])) {
        $temp = explode(".", $_FILES["image4"]["name"]);
        $newName = date('Ymdhis')."4";
        $newPath = '../uploads/'.$newName;
        move_uploaded_file($_FILES['image4']['tmp_name'], $target_dir . $newName);
        compressImage($newPath, $newPath, 60);
        $image4 = $newName;
    }

     if (!empty($_FILES['image5']['name'])) {
        $temp = explode(".", $_FILES["image5"]["name"]);
        $newName = date('Ymdhis')."5";
        $newPath = '../uploads/'.$newName;
        move_uploaded_file($_FILES['image5']['tmp_name'], $target_dir . $newName);
        compressImage($newPath, $newPath, 60);
        $image5 = $newName;
    }

     if (!empty($_FILES['image6']['name'])) {
        $temp = explode(".", $_FILES["image6"]["name"]);
        $newName = date('Ymdhis')."6";
        $newPath = '../uploads/'.$newName;
        move_uploaded_file($_FILES['image6']['tmp_name'], $target_dir . $newName);
        compressImage($newPath, $newPath, 60);
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
    header('Location: add2_page.php');
?>