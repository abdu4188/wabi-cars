<?php
require 'db.php';
$id=$_GET['id'];
$seat_material = "";
?>

<!Doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Wabi Cars</title>
        <link href="https://fonts.googleapis.com/css?family=Quicksand:300,500" rel="stylesheet">
        <link rel="stylesheet" href="../bootstrap-4.3.1-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
        <link rel="stylesheet" href="../css/owl.carousel.css">
        <link rel="stylesheet" href="../css/lightslider.css">
        <script src="../js/jquery-3.4.1.min.js"></script>
        <script src="../js/lightslider.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
        <script src="../bootstrap-4.3.1-dist/js/bootstrap.bundle.js"></script>
        <script src="../js/script.js"></script>

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
            <nav class="navbar hidden fixed-top navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="/wabi-cars"><img src="../images/wabi_logo.png"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                            <a class="nav-link" href="../../">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="new_cars.php">New Cars</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="used_cars.php">Used Cars</a>
                        </li>
                    </ul>
                    <form class="form-inline header-search my-2 my-lg-0" method="POST" action="searching.php">
                        <input name="search" class="form-control" type="search" id="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success " type="submit">Search</button>
                    </form>
                </div>
            </nav>

            
            <div class="car-detail col-sm-12">
                <?php
                    $stmt="SELECT * from cars WHERE id=$id";
                    $result=mysqli_query($conn,$stmt);
                    while($row = mysqli_fetch_array($result)){
                        $time = strtotime($row['time_created']);
                        $myFormatForView = date("m/d/y g:i A", $time);
                        $year=$row['year'];
                        $price = $row['price'];
                        if ($row['new_or_used'] == 1) {
                            $new_used = 'New';
                        }
                        elseif ($row['new_or_used'] == 2) {
                            $new_used = 'Used abroad';
                        }
                        elseif ($row['new_or_used'] == 3) {
                            $new_used = 'Used';
                        }
                        $dealer = '';

                        $sql = "SELECT * FROM dealer WHERE id = ".$row['dealer_id'];
                        $resultt = mysqli_query($conn, $sql);
                        while($roww = mysqli_fetch_array($resultt)){
                            $dealer = $roww['name'];
                        }

                        $featurestmt = "SELECT * FROM features WHERE id = ".$row['feature_id'];
                        $featureresult = mysqli_query($conn, $featurestmt);
                        while ($featurerow = mysqli_fetch_array($featureresult)) {
                            $seat_material = $featurerow['seat_material'];
                            $ac = $featurerow['ac'];
                            $air_bag = $featurerow['air_bag'];
                            $rear_camera = $featurerow['rear_camera'];
                            $cd_player = $featurerow['cd_player'];
                            $fm_radio = $featurerow['fm_radio'];
                        }
                        
                    
                ?>

                <center>
                <?php
                    $stmt2="SELECT * from car_name WHERE id=".$row['id'];
                    $result2=mysqli_query($conn,$stmt2);
                    while($row2 = mysqli_fetch_array($result2)){
                        $stmt3="SELECT * from model WHERE id=".$row['model_id'];
                        $result3=mysqli_query($conn,$stmt3);
                        while($row3 = mysqli_fetch_array($result3)){
                        echo '<h3>'.$row2["name"].' '.$row3["model"].'</h3>';
                        $stmt4="SELECT * FROM image WHERE car_id =". $row['id'];
                        $result4=mysqli_query($conn,$stmt4);
                        while($row4 = mysqli_fetch_array($result4)){
                ?>
                    <br>
                    <h4>Images</h4>
                    <br><br>
                </center>
               
                <div class="demo">
                    <div class="item " >            
                        <div class="clearfix" style="max-width:474px;">
                            <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                                    
                                    <?php
                                    if ($row4['path_1'] != '') {
                                        echo '<li data-thumb="../../uploads/'.$row4["path_1"].'">';
                                        echo '<img src="../../uploads/'.$row4["path_1"].'">'; 
                                    }
                                    ?>

                                    
                                    <?php
                                    if ($row4['path_2'] != ''){
                                        echo '<li data-thumb="../../uploads/'.$row4["path_2"].'">';
                                        echo '<img src="../../uploads/'.$row4["path_2"].'">';
                                    }
                                    ?>
                                    
                                
                                    <?php
                                    if ($row4['path_3'] != ''){
                                    echo '<li data-thumb="../../uploads/'.$row4["path_3"].'">';
                                    echo '<img src="../../uploads/'.$row4["path_3"].'">';
                                    }
                                    ?>
                                    
                                
                                    <?php
                                    if ($row4['path_4'] != ''){
                                        echo '<li data-thumb="../../uploads/'.$row4["path_4"].'">';
                                        echo '<img src="../../uploads/'.$row4["path_4"].'">';
                                    }
                                    ?>
                                    
                                
                                    <?php
                                    if ($row4['path_5'] != ''){
                                        echo '<li data-thumb="../../uploads/'.$row4["path_5"].'">';
                                        echo '<img src="../../uploads/'.$row4["path_5"].'">';
                                    }
                                    ?>
                                    
                                
                                    <?php
                                    if ($row4['path_6'] != ''){
                                        echo '<li data-thumb="../../uploads/'.$row4["path_6"].'">';
                                        echo '<img src="../../uploads/'.$row4["path_6"].'">';                                        
                                    }
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
                    <div class="row specification-card col-sm-6 card" style="height: 100%; width: 100%; margin-right: 1vw;">
                        <div class="card-header">
                            <h4><strong><center>Specification</center></strong></h4>
                        </div>
                        <div class="card-body">
                            <table>
                                <?php
                                $stmt5="SELECT * FROM details WHERE id =". $row['details_id'];
                                $result5=mysqli_query($conn,$stmt5);
                                while($row5 = mysqli_fetch_array($result5)){
                                    $stmt6="SELECT * FROM category WHERE id =". $row5['category_id'];
                                    $result6=mysqli_query($conn,$stmt6);
                                    while($row6 = mysqli_fetch_array($result6)){
                                        $stmt7="SELECT * FROM fuel WHERE id =". $row5['fuel_id'];
                                        $result7=mysqli_query($conn,$stmt7);
                                        while($row7 = mysqli_fetch_array($result7)){
                                            $stmt8="SELECT * FROM transmission WHERE id =". $row5['transmission_id'];
                                            $result8=mysqli_query($conn,$stmt8);
                                            while($row8 = mysqli_fetch_array($result8)){
                                                echo '<tr>';
                                                echo '<td>';
                                                echo '<h5><strong>Category:</strong></h5>';
                                                echo '</td>';
                                                echo '<td>';
                                                echo '<h5 class="specification-values">'.$row6['category']."</h5>";
                                                echo '</td>';
                                                echo '</tr>';

                                                echo '<tr>';
                                                echo '<td>';
                                                echo '<h5><strong>Status:</strong></h5>';
                                                echo '</td>';
                                                echo '<td>';
                                                echo '<h5 class="specification-values">'.$new_used."</h5>";
                                                echo '</td>';
                                                echo '</tr>';

                                                echo '<tr>';
                                                echo '<td>';
                                                echo '<h5><strong>Year:</strong></h5>';
                                                echo '</td>';
                                                echo '<td>';
                                                echo '<h5 class="specification-values">'.$year."</h5>";
                                                echo '</td>';
                                                echo '</tr>';

                                                echo '<tr>';
                                                echo '<td>';
                                                echo '<h5><strong>Fuel:</strong></h5>';
                                                echo '</td>';
                                                echo '<td>';
                                                echo '<h5 class="specification-values">'.$row7['fuel']."</h5>";
                                                echo '</td>';
                                                echo '</tr>';

                                                echo '<tr>';
                                                echo '<td>';
                                                echo '<h5><strong>Transmission:</strong></h5>';
                                                echo '</td>';
                                                echo '<td>';
                                                echo '<h5 class="specification-values">'.$row8['transmission']."</h5>";
                                                echo '</td>';
                                                echo '</tr>';

                                                echo '<tr>';
                                                echo '<td>';
                                                echo '<h5><strong>Origin:</strong></h5>';
                                                echo '</td>';
                                                echo '<td>';
                                                echo '<h5 class="specification-values">'.$row5['origin']."</h5>";
                                                echo '</td>';
                                                echo '</tr>';

                                                echo '<tr>';
                                                echo '<td>';
                                                echo '<h5><strong>Mileage:</strong></h5>';
                                                echo '</td>';
                                                echo '<td>';
                                                echo '<h5 class="specification-values">'.$row5['mileage']."</h5>";
                                                echo '</td>';
                                                echo '</tr>';

                                                echo '<tr>';
                                                echo '<td>';
                                                echo '<h5><strong>Capacity:</strong></h5>';
                                                echo '</td>';
                                                echo '<td>';
                                                echo '<h5 class="specification-values">'.$row5['capacity']."</h5>";
                                                echo '</td>';
                                                echo '</tr>';

                                                echo '<tr>';
                                                echo '<td>';
                                                echo '<h5><strong>Power:</strong></h5>';
                                                echo '</td>';
                                                echo '<td>';
                                                echo '<h5 class="specification-values">'.$row5['power']."</h5>";
                                                echo '</td>';
                                                echo '</tr>';

                                                echo '<tr>';
                                                echo '<td>';
                                                echo '<h5><strong>Fuel consumption:</strong></h5>';
                                                echo '</td>';
                                                echo '<td>';
                                                echo '<h5 class="specification-values">'.$row5['fuel_consumption']."</h5>";
                                                echo '</td>';
                                                echo '</tr>';

                                                echo '<tr>';
                                                echo '<td>';
                                                echo '<h5><strong>Color:</strong></h5>';
                                                echo '</td>';
                                                echo '<td>';
                                                echo '<h5 class="specification-values">'.$row5['color']."</h5>";
                                                echo '</td>';
                                                echo '</tr>';

                                                echo '<tr>';
                                                echo '<td>';
                                                echo '<h5><strong>Number of seats:</strong></h5>';
                                                echo '</td>';
                                                echo '<td>';
                                                echo '<h5 class="specification-values">'.$row5['seat_no']."</h5>";
                                                echo '</td>';
                                                echo '</tr>';

                                                echo '<tr>';
                                                echo '<td>';
                                                echo '<h5><strong>Number of doors:</strong></h5>';
                                                echo '</td>';
                                                echo '<td>';
                                                echo '<h5 class="specification-values">'.$row5['door_no']."</h5>";
                                                echo '</td>';
                                                echo '</tr>';

                                                echo '<tr>';
                                                echo '<td>';
                                                echo '<h5><strong>Price:</strong></h5>';
                                                echo '</td>';
                                                echo '<td>';
                                                echo '<h5 class="specification-values">'.number_format($price) ." Birr</h5>";
                                                echo '</td>';
                                                echo '</tr>';

                                                echo '<tr>';
                                                echo '<td>';
                                                echo '<h5><strong>Date posted:</strong></h5>';
                                                echo '</td>';
                                                echo '<td>';
                                                echo '<h5 class="specification-values">'.$myFormatForView."</h5>";
                                                echo '</td>';
                                                echo '</tr>';

                                                echo '<tr>';
                                                echo '<td>';
                                                echo '<h5><strong>Dealership:</strong></h5>';
                                                echo '</td>';
                                                echo '<td>';
                                                echo '<h5 class="specification-values">'.$dealer."</h5>";
                                                echo '</td>';
                                                echo '</tr>';
                                            }
                                        }
                                    }
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                    <?php
                        
                    }
                }
                    }
                
                    ?>
                    <div class="contact col-sm-6 card">
                        <div class="card-header">
                        <center>
                            <h4>Features</h4>
                        </center>
                        </div>
                        <div class="card-body">
                        <table>
                                <?php
                                
                                echo "<tr>";
                                echo "<td>";
                                echo "<h5><strong>Seat material:</strong></h5>";
                                echo "</td>";
                                echo '<td class="feature-value">';
                                echo "<h5>".$seat_material."</h5>";
                                echo "</td>";
                                echo "</tr>";

                                echo "<tr>";
                                echo "<td>";
                                echo "<h5><strong>AC:</strong></h5>";
                                echo "</td>";
                                echo '<td class="feature-value">';
                                if ($ac == 1) {
                                    echo '<i class="fa fa-check-circle fa-2x" style="font-size: 1.6em;"></i><br>';
                                }
                                else{
                                    echo '<i class="fa fa-times-circle fa-2x" style="font-size: 1.6em;"></i><br>';
                                }
                                echo "</td>";
                                echo "</tr>";

                                echo "<tr>";
                                echo "<td>";
                                echo "<h5><strong>Air bag:</strong></h5>";
                                echo "</td>";
                                echo '<td class="feature-value">';
                                if ($air_bag == 1) {
                                    echo '<i class="fa fa-check-circle fa-2x" style="font-size: 1.6em;"></i><br>';
                                }
                                else{
                                    echo '<i class="fa fa-times-circle fa-2x" style="font-size: 1.6em;"></i><br>';
                                }
                                echo "</td>";
                                echo "</tr>";

                                echo "<tr>";
                                echo "<td>";
                                echo "<h5><strong>Rear camera:</strong></h5>";
                                echo "</td>";
                                echo '<td class="feature-value">';
                                if ($rear_camera == 1) {
                                    echo '<i class="fa fa-check-circle fa-2x" style="font-size: 1.6em;"></i><br>';
                                }
                                else{
                                    echo '<i class="fa fa-times-circle fa-2x" style="font-size: 1.6em;"></i><br>';
                                }
                                echo "</td>";
                                echo "</tr>";

                                echo "<tr>";
                                echo "<td>";
                                echo "<h5><strong>Cd player:</strong></h5>";
                                echo "</td>";
                                echo '<td class="feature-value">';
                                if ($cd_player == 1) {
                                    echo '<i class="fa fa-check-circle fa-2x" style="font-size: 1.6em;"></i><br>';
                                }
                                else{
                                    echo '<i class="fa fa-times-circle fa-2x" style="font-size: 1.6em;"></i><br>';
                                }
                                echo "</td>";
                                echo "</tr>";

                                echo "<tr>";
                                echo "<td>";
                                echo "<h5><strong>Fm radio:</strong></h5>";
                                echo "</td>";
                                echo '<td class="feature-value">';
                                if ($fm_radio == 1) {
                                    echo '<i class="fa fa-check-circle fa-2x" style="font-size: 1.6em;"></i><br>';
                                }
                                else{
                                    echo '<i class="fa fa-times-circle fa-2x" style="font-size: 1.6em;"></i><br>';
                                }
                                echo "</td>";
                                echo "</tr>";

                                ?>
                            </table>
                            <br>
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
                </div><br><br><br><br>

                <div class="similar">
                    <center>
                    <h4>Similar Cars</h4>
                    </center><br><br>

                    <div class="row col-sm-12 similar-cars">

                    <?php
                    $count=0;
                        $stmt="SELECT * FROM cars WHERE id=$id";
                        $result=mysqli_query($conn,$stmt);
                        while($row = mysqli_fetch_array($result)){
                            $year=$row['year'];
                        }

                        $stmt="SELECT * FROM cars WHERE year BETWEEN $year-2 AND $year+2";
                        $result=mysqli_query($conn,$stmt);
                        while($row = mysqli_fetch_array($result)){
                            
                            $stmt2="SELECT * FROM car_name WHERE id =". $row['name_id'];
                            $result2= mysqli_query($conn,$stmt2);
                            while($row2 = mysqli_fetch_array($result2)){
                                $stmt3="SELECT * FROM image WHERE car_id =". $row['id'];
                                $result3= mysqli_query($conn,$stmt3);
                                while($row3 = mysqli_fetch_array($result3)){
                                    echo '';
                                    echo '<div class="col-sm-3">';
                                    echo '<div class="card">';
                                    echo '<div class="card-body">'; 
                                    echo '<a href="?id='.$row["id"].'"><img src="../../uploads/'. $row3["path_1"].'" style="width: 15vw; height: 15vh;">';
                                    echo "<h3>". $row2['name']."</h3>";
                                    echo "<h6>".$myFormatForView."</h6>";
                                    echo "<h6> ".$row['price']."</h6> </a>";
                                    if($row['new_or_used']==1){echo "<p><strong>New</strong></p>";}
                                    elseif ($row['new_or_used'] == 2){ echo "<p><strong>Used Abroad</strong></p>";}
                                    elseif ($row['new_or_used'] == 3){echo "<p><strong>Used</strong></p>";}
                                    echo '</div>';
                                    echo '</div>';
                                echo '</div>';
                                $count++;
                                if($count=3){
                                    echo '<br><br>';
                                }
                        }
                    }
                    }

                    ?>

                    </div>
                </div>

            </div>


            <br><br><br><br><br><br>
            <footer>
                <div class="footer">
                        <i class="fab fa-facebook fa-2x logos"></i>
                        <i class="fab fa-twitter fa-2x logos"></i>
                        <i class="fab fa-linkedin-in fa-2x logos"></i>
                        <i class="fab fa-skype fa-2x logos"></i>
                        <i class="fab fa-google-plus-g fa-2x logos"></i>
                        <h5>2019 Wabi Cars</h5>
                        <h5>Powered by Genesis Technologies</h5>
                    </div>
            
                    
            </footer>
            
        </div>
    </body>
    <script type="text/javascript">
        $(function() {
            $( "#search" ).autocomplete({
            source: 'assets//php//search.php',
            });
        });
    </script>

</html>