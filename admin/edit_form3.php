<?php
    require '../assets/php/db.php';
    require 'session.php';
    $username = $_SESSION['username'];
    $id=$_SESSION['car_id'];
    if (!isset($_SESSION['logged_in'])) {
        header('Location: index.php');
    }

    $stmt = "SELECT * FROM features WHERE  id = '".$id."'";
    if ($result = mysqli_query($conn, $stmt)) {
        $row = mysqli_fetch_array($result);
        $ac = $row['ac'];
        $air_bag =  $row['air_bag'];
        $rear_camera = $row['rear_camera'];
        $cd_player = $row['cd_player'];
        $fm_radio = $row['fm_radio'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/jquery.min.js"></script>
    <title>Wabi cars admin</title>
</head>
<body class="side-body">
    <div id="mySidenav" class="side-nav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="homepage.php">Add new car</a>
        <a href="edit.php">Edit car info</a>
        <a href="delete.php">Mark car as sold</a>
        <a href="logout.php" class="logout">Logout</a>
    </div>
    <div id="main">
        <span  class="open-nav" onclick="openNav()">&#9776;</span>
        <center>
            <h2>Welcome back <?php echo $username?></h2>
        </center><br><br>
        <div class="container">
            <center><h5>Progress</h5></center>
            <div class="progress">
                <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 66%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
        <br><br>
        <div class="container">
            <form action="update.php" method="POST" class="form-group  card">
                <div class="card-header">
                    <center><h4>Add new car</h4></center>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <center>
                                <div class="form-check">
                                    <input type="checkbox" <?php echo ($ac == 1) ? "checked" : "" ?> value="1" name="ac" class="form-check-input">
                                    <label for="ac" class="form-check-label">Ac</label>
                                </div><br>
                                <div class="form-check">
                                    <input type="checkbox" value="1" <?php echo ($rear_camera == 1) ? "checked" : "" ?> name="rear-camera" class="form-check-input">
                                    <label for="rear-camera" class="form-check-label">Rear camera</label>
                                </div>
                            </center>
                        </div>
                        <div class="col-sm-6">
                            <center>
                                <div class="form-check">
                                    <input type="checkbox" value="1" <?php echo ($air_bag == 1) ? "checked" : "" ?> name="air-bag" class="form-check-input">
                                    <label for="air-bag" class="form-check-label">Air-bag</label>
                                </div><br>
                                <div class="form-check">
                                    <input type="checkbox" value="1" <?php echo ($cd_player == 1) ? "checked" : "" ?> name="cd-player" class="form-check-input">
                                    <label for="cd-player" class="form-check-label">Cd player</label>
                                </div>
                            </center>
                        </div>
                    </div><br><br>
                    <center>
                        <div class="form-check">
                            <input type="checkbox" value="1" <?php echo ($fm_radio == 1) ? "checked" : "" ?> name="fm-radio" class="form-check-input">
                            <label for="fm-radio" class="form-check-label">Fm radio</label>
                        </div>
                    </center><br><br>
                    <center>
                        <input type="submit" class="btn btn-primary" value="Next">
                    </center>
                </div>
            </form>
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