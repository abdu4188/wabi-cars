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
                <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
        <br><br>
        <div class="container">
            <form action="add1.php" method="post" class="form-group card" enctype="multipart/form-data">
                <div class="card-header">
                    <center><h4>Add new car</h4></center>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="car-name">Car-name</label>
                            <input type="text" class="form-control" name="car-name" placeholder="car name" required><br>
                            <label for="dealer">Dealer</label>
                            <select name="dealer" class="form-control">
                                <?php
                                    $stmt = "SELECT * FROM dealer";
                                    $result = mysqli_query($conn, $stmt);
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                                    }
                                ?>
                            </select><br>
                            <label for="new-used">New or used</label>
                            <select name="new-used" class="form-control">
                                <option value="0">New</option>
                                <option value="1">Used</option>
                                <option value="3">Used abroad</option>
                            </select><br>
                            <label for="image2">Image 2:</label>
                            <input type="file" class="form-control" name="image2"><br>
                            <label for="image4">Image 4:</label>
                            <input type="file" class="form-control" name="image4"><br>
                            <label for="image6">Image 6:</label>
                            <input type="file" class="form-control" name="image6">
                        </div>
                        <div class="col-sm-6">
                            <label for="category">Category</label>
                            <select class="form-control" name="category">
                                <?php
                                $stmt = "SELECT * FROM category";
                                $result = mysqli_query($conn, $stmt);
                                while ($row = mysqli_fetch_array($result)) {
                                    echo '<option value="'.$row['id'].'">'.$row['category'].'</option>';
                                }
                                ?>
                            </select><br>
                            <label for="model">Model:</label>
                            <input type="text" name="model" class="form-control" placeholder="model" required><br>
                            <label for="price">Price:</label>
                            <input type="text" name="price" class="form-control" placeholder="price" required><br>
                            <label for="image1">Image 1(required):</label>
                            <input type="file" class="form-control" name="image1" required><br>
                            <label for="image3">Image 3:</label>
                            <input type="file" class="form-control" name="image3"><br>
                            <label for="image5">Image 5:</label>
                            <input type="file" class="form-control" name="image5">
                        </div>
                    </div><br><br>
                    <center>
                        <input type="submit" class="btn btn-primary" name="next" value="Next">
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