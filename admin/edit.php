<?php
    require '../assets/php/db.php';
    require 'session.php';
    $username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/jquery.min.js"></script>
    <title>Edit cars</title>
</head>
<body class="side-body">
    <div id="mySidenav" class="side-nav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="homepage.php">Add new car</a>
        <a href="edit.php">Edit car info</a>
        <a href="delete.php">Mark car as sold</a>
    </div>
    <div id="main">
        <span  class="open-nav" onclick="openNav()">&#9776;</span>
        <center>
            <h2>Welcome back <?php echo $username?></h2>
        </center><br><br>
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <center><h4>Cars in the database</h4></center>
                </div>
                <div class="card-body">
                    <?php
                        $stmt = "SELECT * FROM cars ORDER BY time_created";
                        $result= mysqli_query($conn,$stmt);
                        while($row = mysqli_fetch_array($result)){
                            $time = strtotime($row['time_created']);
                            $myFormatForView = date("m/d/y g:i A", $time);
                            echo '<div class="card cars-list-no-shadow">';
                                echo '<div class="card-body">';
                                    echo '<div class="row">';
                                        echo '<div class="col-sm-4 col-6">';
                                        $stmt2 = "SELECT * FROM image WHERE car_id=".$row['id'];
                                        $result2= mysqli_query($conn,$stmt2);
                                        while($row2 = mysqli_fetch_array($result2)){
                                            $stmt3= "SELECT * FROM car_name WHERE id=".$row['name_id'];
                                            $result3= mysqli_query($conn,$stmt3);
                                            while($row3 = mysqli_fetch_array($result3)){
                                                $stmt4= "SELECT * FROM model WHERE id=".$row['model_id'];
                                                $result4= mysqli_query($conn,$stmt4);
                                                while($row4 = mysqli_fetch_array($result4)){
                                                    echo '<img style="width: 20vw; height: 20vh;" src="../uploads/'.$row2['path_1'].'">';
                                                    echo '</div>';
                                                    echo '<div class="col-sm-4 col-6 ">';
                                                        echo '<h5><strong>'.$row3['name'].' '.$row4['model'].'</strong></h5>'; 
                                                        echo '<p>'.$myFormatForView.'</p>';
                                                        echo '<p>'.$row['price'].'</p></a>';
                                                    echo '</div>';
                                                    echo '<div class="col-sm-4 col-6 ">';
                                                        echo '<a href="edit_form.php?id='.$row['id'].'" class="btn btn-primary">Edit</a>';
                                                    echo '</div>';
                                                }
                                            }
                                        }
                                        
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}
</script>
</html>