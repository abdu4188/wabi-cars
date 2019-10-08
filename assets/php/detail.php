<?php
require 'db.php';
$id=$_GET['id'];
?>

<!Doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Wabi Cars</title>
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
        <link rel="stylesheet" href="../bootstrap-4.3.1-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/fontawesome.css">
        <link type="text/css" rel="stylesheet" href="../css/lightslider.css" />
        <script src="../js/script.js"></script>  
        <script src="../js/jquery-3.4.1.min.js"></script>
        <script src="../bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
        <script src="../js/lightslider.js"></script>
        <script>
            $(document).ready(function() {
			$("#content-slider").lightSlider({
                loop:true,
                keyPress:true
            });
            $('#image-gallery').lightSlider({
                gallery:true,
                item:1,
                thumbItem:9,
                slideMargin: 0,
                speed: 1000,
                auto:true,
                loop:true,
                pause: 4000,
                onSliderLoad: function() {
                    $('#image-gallery').removeClass('cS-hidden');
                }  
            });
		});
        </script>
    </head>
    <body>
        <div class="body-container">
            <nav class="navbar hidden fixed-top navbar-expand-lg navbar-light ">
                <a class="navbar-brand" href="#"><img src="../images/wabi.png"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                            <a class="nav-link" href="../../">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">New Cars</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Used Cars</a>
                        </li>
                    </ul>
                    <form class="form-inline header-search my-2 my-lg-0">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success " type="submit">Search</button>
                    </form>
                </div>
            </nav>

            
            <div class="car-detail col-sm-12">
                <?php
                    $stmt="SELECT * from car WHERE id=$id";
                    $result=mysqli_query($conn,$stmt);
                    while($row = mysqli_fetch_array($result)){
                        $time = strtotime($row['time_created']);
                        $myFormatForView = date("m/d/y g:i A", $time);
                        $year=$row['Year'];
                    
                ?>

                <center>
                <?php
                    echo '<h3>'.$row["Name"].' '.$row["Model"].'</h3>';
                ?>
                    <br><br><br>
                    <h4>Images</h4>
                    <br><br>
                </center>
               
                <div class="demo">
                    <div class="item " >            
                        <div class="clearfix" style="max-width:474px;">
                            <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                                    
                                    <?php
                                    echo '<li data-thumb="../../'.$row["image"].'">';
                                    echo '<img src="../../'.$row["image"].'">';
                                    ?>

                                    
                                    <?php
                                    echo '<li data-thumb="../../'.$row["image"].'">';
                                    echo '<img src="../../'.$row["image"].'">';
                                    ?>
                                    
                                
                                    <?php
                                    echo '<li data-thumb="../../'.$row["image"].'">';
                                    echo '<img src="../../'.$row["image"].'">';
                                    ?>
                                    
                                
                                    <?php
                                    echo '<li data-thumb="../../'.$row["image"].'">';
                                    echo '<img src="../../'.$row["image"].'">';
                                    ?>
                                    
                                
                                    <?php
                                    echo '<li data-thumb="../../'.$row["image"].'">';
                                    echo '<img src="../../'.$row["image"].'">';
                                    ?>
                                    
                                
                                    <?php
                                    echo '<li data-thumb="../../'.$row["image"].'">';
                                    echo '<img src="../../'.$row["image"].'">';
                                    ?>
                                    
                                
                            </ul>
                        </div>
                    </div>
                </div>
       
               <?php
            }
            ?>
                <br><br><br><br>
                
                <div class="detail-info row col-sm-12">
                    <?php
                        echo '<div class="row col-sm-6">';
                        echo '<div class="col-sm-6">';
                        echo '<center><h4>Specifications</h4></center><br>';
                        echo '<h5><strong>Year:</strong></h5>';
                        echo '<h5><strong>Category:</strong></h5>';
                        echo '<h5><strong>Origin:</strong></h5>';
                        echo '<h5><strong>Mileage:</strong></h5>';
                        echo '<h5><strong>Capacity:</strong></h5>';
                        echo '<h5><strong>Power:</strong></h5>';
                        echo '<h5><strong>Fuel:</strong></h5>';
                        echo '<h5><strong>Fuel Consumption:</strong></h5>';
                        echo '<h5><strong>Number of seat:</strong></h5>';
                        echo '<h5><strong>Doors:</strong></h5>';
                        echo '<h5><strong>Transmission:</strong></h5>';
                        echo '<h5><strong>Color:</strong></h5>';
                        echo '</div>';
                        echo '<div class="col-sm-6">';
                        $stmt = "SELECT * FROM detail WHERE id= $id";
                        $result=mysqli_query($conn,$stmt);
                        while($row = mysqli_fetch_array($result)){
                        echo '<br><br>';
                        echo "<h5>$year</h5>";
                        echo "<h5>".$row['category']."</h5>";
                        echo "<h5>".$row['origin']."</h5>";
                        echo "<h5>".$row['mileage']."</h5>";
                        echo "<h5>".$row['capacity']."</h5>";
                        echo "<h5>".$row['power']."</h5>";
                        echo "<h5>".$row['fuel']."</h5>";
                        echo "<h5>".$row['fuel_consumption']."</h5>";
                        echo "<h5>".$row['seat_no']."</h5>";
                        echo "<h5>".$row['door_no']."</h5>";
                        echo "<h5>".$row['transmission']."</h5>";
                        echo "<h5>".$row['color']."</h5>";
                        }
                        echo '</div>';
                        echo '</div>';
                    ?>
                    <div class="contact col-sm-6">
                        <center>
                        <h4>Contact</h4>
                        </center>
                        <br>

                        <h5><strong>Phone Number:</strong></h5>
                        <p>0911223344</p>
                        <h5><strong>Email Us:</strong></h5>
                        <p>contact@wabi.com</p>
                    
                    </div>
                </div>

                <div class="similar">
                    <center>
                    <h4>Similar Cars</h4>
                    </center>

                    <div class="row col-sm-12 similar-cars">

                    <?php
                        $stmt="SELECT * FROM car WHERE id=$id";
                        $result=mysqli_query($conn,$stmt);
                        while($row = mysqli_fetch_array($result)){
                            $year=$row['Year'];
                        }

                        $stmt="SELECT * FROM car WHERE Year BETWEEN $year-2 AND $year+2";
                        $result=mysqli_query($conn,$stmt);
                        while($row = mysqli_fetch_array($result)){
                            $time = strtotime($row['time_created']);
                            $myFormatForView = date("m/d/y g:i A", $time);
                            echo '<a href="detail.php?id='.$row["id"].'">';
                            echo '<div class="col-sm-3 col-xs-6">';
                            echo '<img src="../../'.$row["image"].'" style="width: 15vw; height: 25vh;">';
                            echo "<h3>". $row['Name']."</h3>";
                            echo "<h6>".$myFormatForView."</h6>";
                            echo "<h6> ".$row['Price']."Birr</h6> </a>";
                            if($row['new']==0){echo "<p><strong>New</strong></p>";}
                            else{echo "<p><strong>Used</strong></p>";}
                            echo '</a>';
                            echo '</div>';
                        }

                    ?>

                    </div>
                </div>

            </div>


            <br><br><br><br><br><br>
            <!-- <footer>
                <div class="footer">
                        <i class="fab fa-facebook fa-2x logos"></i>
                        <i class="fab fa-twitter fa-2x logos"></i>
                        <i class="fab fa-linkedin-in fa-2x logos"></i>
                        <i class="fab fa-skype fa-2x logos"></i>
                        <i class="fab fa-google-plus-g fa-2x logos"></i>
                        <h5>2019 Wabi Cars</h5>
                        <h5>Powered by Genesis Technologies</h5>
                    </div>
            
                    
            </footer> -->
            
        </div>
    </body>

</html>