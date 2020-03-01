<?php
    require '../assets/php/db.php';
    require 'session.php';
    $username = $_SESSION['username'];
    $id=$_SESSION['car_id'];

    $stmt = "SELECT * FROM details WHERE id = '".$id."'";
    if ($result = mysqli_query($conn, $stmt)) {
        $row = mysqli_fetch_array($result);
        $origin = $row['origin'];
        $mileage = $row['mileage'];
        $power = $row['power'];
        $capacity = $row['capacity'];
        $seat_no = $row['seat_no'];
        $door_no = $row['door_no'];
        $fuel_consumption = $row['fuel_consumption'];
        $color = $row['color'];
        $transmission = $row['transmission_id'];
        $fuel = $row['fuel_id'];
    }

    $stmt = "SELECT * FROM cars WHERE id = '".$id."'";
    if ($result = mysqli_query($conn, $stmt)) {
        $row = mysqli_fetch_array($result);
        $year = $row['year'];
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
            <form action="edit_session2.php" method="POST" class="form-group card">
                <div class="card-header">
                    <center><h4>Add new car</h4></center>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="origin">Origin:</label>
                            <input type="text" class="form-control" <?php echo 'value="'.$origin.'"'; ?> name="origin" placeholder="origin" required><br>
                            <label for="year">Year produced:</label>
                            <input type="text" name="year" <?php echo 'value="'.$year.'"'; ?> class="form-control" placeholder="year produced" required><br>
                            <label for="capacity">Capcity:</label>
                            <input type="text" name="capacity" <?php echo 'value="'.$capacity.'"'; ?> class="form-control" placeholder="capacity" required><br>
                            <label for="fuel_consumption">Fuel consumption:</label>
                            <input type="text" name="fuel_consumption" <?php echo 'value="'.$fuel_consumption.'"'; ?> class="form-control" placeholder="fuel consumption" required><br>
                            <label for="door_no">Door number:</label>
                            <input type="number" name="door_no" <?php echo 'value="'.$door_no.'"'; ?> class="form-control" placeholder="door number" required><br>
                            <label for="fuel">Fuel:</label>
                            <select name="fuel" class="form-control" required>
                                <?php
                                    $stmt = "SELECT * FROM fuel";
                                    $result = mysqli_query($conn, $stmt);
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo '<option value="'.$row['id'].'" ';
                                        echo ($row['id'] == $fuel) ? "selected" : "";
                                        echo ' >'.$row['fuel'].'</option>';
                                    }
                                ?>
                            </select><br>
                        </div>
                        <div class="col-sm-6">
                            <label for="mileage">Mileage:</label>
                            <input type="text" name="mileage" <?php echo 'value="'.$mileage.'"'; ?> class="form-control" placeholder="mileage" required><br>
                            <label for="power">Power:</label>
                            <input type="text" name="power" <?php echo 'value="'.$power.'"'; ?> class="form-control" placeholder="power" required><br>
                            <label for="seat_no">Seat numbers:</label>
                            <input type="number" name="seat_no" <?php echo 'value="'.$seat_no.'"'; ?> class="form-control" placeholder="seat number" required><br>
                            <label for="color">Color:</label>
                            <input type="text" name="color" <?php echo 'value="'.$color.'"'; ?> class="form-control" placeholder="color" required><br>
                            <label for="transmission">Transmission:</label>
                            <select name="transmission" class="form-control" required>
                                <?php
                                    $stmt = "SELECT * FROM transmission";
                                    $result = mysqli_query($conn, $stmt);
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo '<option value="'.$row['id'].'" ';
                                        echo ($row['id'] == $transmission) ? "selected" : "";
                                        echo ' >'.$row['transmission'].'</option>';
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