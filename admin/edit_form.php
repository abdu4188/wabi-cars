<?php
    require '../assets/php/db.php';
    require 'session.php';
    $id=$_GET['id'];
    $_SESSION['car_id'] = $id;
    $username = $_SESSION['username'];

    $stmt = "SELECT * FROM car_name WHERE id = '".$id."'";
    if ($result = mysqli_query($conn, $stmt)) {
        $row = mysqli_fetch_array($result);
        $car_name = $row['name'];
    }

    $stmt = "SELECT * FROM details WHERE id = '".$id."'";
    if ($result = mysqli_query($conn, $stmt)) {
        $row = mysqli_fetch_array($result);
        $category_id = $row['category_id'];
    }

    $stmt = "SELECT * FROM model WHERE id = '".$id."'";
    if ($result = mysqli_query($conn, $stmt)) {
        $row = mysqli_fetch_array($result);
        $model = $row['model'];
    }

    $stmt = "SELECT * FROM cars WHERE id = '".$id."'";
    if ($result = mysqli_query($conn, $stmt)) {
        $row = mysqli_fetch_array($result);
        $price = $row['price'];
    }

    $stmt = "SELECT * FROM image WHERE id = '".$id."'";
    if ($result = mysqli_query($conn, $stmt)) {
        $row = mysqli_fetch_array($result);
        $image1 = $row['path_1'];
    }

    $stmt = "SELECT * FROM details WHERE id = '".$id."'";
    if ($result = mysqli_query($conn, $stmt)) {
        $row = mysqli_fetch_array($result);
        $category = $row['category_id'];
    }

    $stmt = "SELECT * FROM cars WHERE id = '".$id."'";
    if ($result = mysqli_query($conn, $stmt)) {
        $row = mysqli_fetch_array($result);
        $dealer = $row['dealer_id'];
    }

    $stmt = "SELECT * FROM cars WHERE id = '".$id."'";
    if ($result = mysqli_query($conn, $stmt)) {
        $row = mysqli_fetch_array($result);
        $new_used = $row['new_or_used'];
    }

    $stmt = "SELECT * FROM image WHERE id = '".$id."'";
    if ($result = mysqli_query($conn, $stmt)) {
        $row = mysqli_fetch_array($result);
        $path1 = $row['path_1'];
        $path2 = $row['path_2'];
        $path3 = $row['path_3'];
        $path4 = $row['path_4'];
        $path5 = $row['path_5'];
        $path6 = $row['path_6'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/jquery.min.js"></script>
    <title>Edit</title>
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
                <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
        <br><br>
        <div class="container">
            <form action="edit_session.php" method="post" class="form-group card" enctype="multipart/form-data">
                <div class="card-header">
                    <center><h4>Edit car</h4></center>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="car-name">Car-name</label>
                            <input type="text" class="form-control" name="car-name"<?php echo 'value="'.$car_name.'"'?> placeholder="car name" required><br>
                            <label for="dealer">Dealer</label>
                            <select name="dealer" class="form-control">
                                <?php
                                    $stmt = "SELECT * FROM dealer";
                                    $result = mysqli_query($conn, $stmt);
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo '<option value="'.$row['id'].'" ';
                                        echo ($row['id'] == $dealer) ? "selected" : "";
                                        echo ' >'.$row['name'].'</option>';
                                    }
                                ?>
                            </select><br>
                            <label for="new-used">New or used</label>
                            <select name="new-used" class="form-control">
                                <option value="0" <?php echo ($new_used == 0) ? "selected" : ""; ?>>New</option>
                                <option value="1" <?php echo ($new_used == 1) ? "selected" : ""; ?>>Used</option>
                                <option value="2" <?php echo ($new_used == 2) ? "selected" : ""; ?>>Used abroad</option>
                            </select><br>
                            <label for="image2">Image 2:</label>
                            <?php echo ($path2 != "") ? '<img style="width: 20vw; height: 20vh;" src="../uploads/'.$path2.'">' : ""; ?>
                            <input type="file" class="form-control" name="image2"><br>
                            <label for="image4">Image 4:</label>
                            <?php echo ($path4 != "") ? '<img style="width: 20vw; height: 20vh;" src="../uploads/'.$path4.'">' : ""; ?>
                            <input type="file" class="form-control" name="image4"><br>
                            <label for="image6">Image 6:</label>
                            <?php echo ($path6 != "") ? '<img style="width: 20vw; height: 20vh;" src="../uploads/'.$path6.'">' : ""; ?>
                            <input type="file" class="form-control" name="image6">
                        </div>
                        <div class="col-sm-6">
                            <label for="category">Category</label>
                            <select class="form-control" name="category">
                                <?php
                                $stmt = "SELECT * FROM category";
                                $result = mysqli_query($conn, $stmt);
                                while ($row = mysqli_fetch_array($result)) {
                                    echo '<option value="'.$row['id'].'" ';
                                    echo ($row['id'] == $category) ? "selected" : "";
                                    echo ' >'.$row['category'].'</option>';
                                }
                                ?>
                            </select><br>
                            <label for="model">Model:</label>
                            <input type="text" name="model" class="form-control" <?php echo 'value ="'.$model.'"' ?> placeholder="model" required><br>
                            <label for="price">Price:</label>
                            <input type="text" name="price" class="form-control"  <?php echo 'value ="'.$price.'"' ?> placeholder="price" required><br>
                            <label for="image1">Image 1(required):</label>
                            <?php echo ($path1 != "") ? '<img style="width: 20vw; height: 20vh;" src="../uploads/'.$path1.'">' : ""; ?>
                            <input type="file" class="form-control" name="image1" required><br>
                            <label for="image3">Image 3:</label>
                            <?php echo ($path3 != "") ? '<img style="width: 20vw; height: 20vh;" src="../uploads/'.$path3.'">' : ""; ?>
                            <input type="file" class="form-control" name="image3"><br>
                            <label for="image5">Image 5:</label>
                            <?php echo ($path5 != "") ? '<img style="width: 20vw; height: 20vh;" src="../uploads/'.$path5.'">' : ""; ?>
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