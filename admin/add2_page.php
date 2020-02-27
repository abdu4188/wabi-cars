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
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/jquery.min.js"></script>
    <title>Wabi cars admin</title>
</head>
<body class="side-body">
    <div id="mySidenav" class="side-nav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="#">Add new car</a>
        <a href="#">Edit car info</a>
        <a href="#">Delete car</a>
    </div>
    <div id="main">
        <span  class="open-nav" onclick="openNav()">&#9776;</span>
        <center>
            <h2>Welcome back <?php echo $username?></h2>
        </center><br><br>
        <div class="container">
            <center><h5>Progress</h5></center>
            <div class="progress">
                <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 33%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
        <br><br>
        <div class="container">
            <form action="add2.php" method="POST" class="form-group card">
                <div class="card-header">
                    <center><h4>Add new car</h4></center>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="origin">Origin:</label>
                            <input type="text" class="form-control" name="origin" placeholder="origin" required><br>
                            <label for="year">Year produced:</label>
                            <input type="text" name="year" class="form-control" placeholder="year produced" required><br>
                            <label for="capacity">Capcity:</label>
                            <input type="text" name="capacity" class="form-control" placeholder="capacity" required><br>
                            <label for="fuel_consumption">Fuel consumption:</label>
                            <input type="text" name="fuel_consumption" class="form-control" placeholder="fuel consumption" required><br>
                            <label for="door_no">Door number:</label>
                            <input type="number" name="door_no" class="form-control" placeholder="door number" required><br>
                            <label for="fuel">Fuel:</label>
                            <select name="fuel" class="form-control" required>
                                <?php
                                    $stmt = "SELECT * FROM fuel";
                                    $result = mysqli_query($conn, $stmt);
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo '<option value="'.$row['id'].'">'.$row['fuel'].'</option>';
                                    }
                                ?>
                            </select><br>
                        </div>
                        <div class="col-sm-6">
                            <label for="mileage">Mileage:</label>
                            <input type="text" name="mileage" class="form-control" placeholder="mileage" required><br>
                            <label for="power">Power:</label>
                            <input type="text" name="power" class="form-control" placeholder="power" required><br>
                            <label for="seat_no">Seat numbers:</label>
                            <input type="number" name="seat_no" class="form-control" placeholder="seat number" required><br>
                            <label for="color">Color:</label>
                            <input type="text" name="color" class="form-control" placeholder="color" required><br>
                            <label for="transmission">Transmission:</label>
                            <select name="transmission" class="form-control" required>
                                <?php
                                    $stmt = "SELECT * FROM transmission";
                                    $result = mysqli_query($conn, $stmt);
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo '<option value="'.$row['id'].'">'.$row['transmission'].'</option>';
                                    }
                                ?>
                            </select><br>
                        </div>
                    </div><br><br>
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