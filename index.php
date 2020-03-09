<?php
 require 'assets/php/db.php';
?>

<!Doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Wabi Cars</title>
        <link href="https://fonts.googleapis.com/css?family=Quicksand:300,500" rel="stylesheet">
        <link rel="stylesheet" href="assets/bootstrap-4.3.1-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/owl.carousel.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.10.2/css/fontawesome.css"> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
        <script src="assets/js/jquery-3.4.1.min.js"></script>
        <script src="assets/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
        <script src="assets/js/script.js"></script>
        <script src="assets/js/owl.carousel.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    </head>
    <body>
        <div class="body-container">
            <nav class="navbar hidden fixed-top navbar-expand-lg navbar-light shadow-none" id="navbar">
                <a class="navbar-brand" href="/wabi-cars"><img src="assets/images/wabi_logo.png"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="assets/php/new_cars.php">New Cars</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="assets/php/used_cars.php">Used Cars</a>
                        </li>
                    </ul>
                    <form class="form-inline header-search my-2 my-lg-0" method="POST" action="assets/php/searching.php">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search" id="search" name="search">
                        <button class="btn btn-outline-success " type="submit">Search</button>
                    </form>
                </div>
            </nav>
            <header>
                            
                <center>
                    <div class="header-comp">
                        <h2>Providing from everyday cars to luxurious cars</h2>
                        <div class="header-btns">
                            <a href="assets/php/new_cars.php" class="btn btn-primary">New Cars</a>
                            <a href="assets/php/used_cars.php" class="btn btn-warning">Used Cars</a>
                        </div>
                    
                    </div>
                    </center>

                <div class="header-cars">
                    <img src="assets/images/rove.png" class="header-range">
                    <img src="assets/images/mercedes.png" class="header-mercedes">
                </div>
                

                
            </header>

            <div class="models section">
                <center>
                    
                <h3>Choose cars by make</h3><br><br>
                <div class="pill-tab">
                    <!-- Nav pills -->
                    <center>
                    <ul class="nav nav-pills" role="tablist">
                        <li class="nav-item">
                        <a class="nav-link  active" data-toggle="pill" href="#new">New</a>
                        </li>
                        <li class="nav-item nav-item-used">
                        <a class="nav-link" data-toggle="pill" href="#used">Used</a>
                        </li>
                    
                    </ul>
                    </center>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="new" class="container tab-pane active"><br>
                        <div class="row" style="margin-left: -30vw;">
                                <div class="col-sm-4"></div>
                                <div class="col-sm-4">
                                    <div class="row">
                            <?php
                                $stmt = "SELECT DISTINCT name FROM car_name WHERE id IN (SELECT name_id FROM cars WHERE new_or_used = 1 OR new_or_used = 2)";
                                if ($result2= mysqli_query($conn, $stmt)) {
                                    while($row2 = mysqli_fetch_array($result2)){
                                        echo '<div class="col-sm-5 col-5 col-md-5">';
                                        echo '<a href="assets/php/cars_models.php?name='.$row2['name'].'">'.$row2['name'].'</a>';
                                        echo '</div>';
                                        echo '<br> <br>';
                                    }
                                }
                            ?>
                            
                                    </div> 
                                </div>
                                <div class="col-sm-4"></div>
                            </div>
                        </div>
                        <div id="used" class="container tab-pane fade"><br>
                            <div class="row" style="margin-left: -30vw;">
                                <div class="col-sm-4"></div>
                                <div class="col-sm-4">
                                    <div class="row">
                                    <?php
                                    $stmt = "SELECT DISTINCT name FROM car_name WHERE id IN (SELECT name_id FROM cars WHERE new_or_used = 3)";
                                    if ($result2= mysqli_query($conn, $stmt)) {
                                        while($row2 = mysqli_fetch_array($result2)){
                                            echo '<div class="col-sm-6 col-xs-6 car-names">';
                                            echo '<a href="assets/php/cars_models.php?name='.$row2['name'].'">'.$row2['name'].'</a>';
                                            echo '</div>';
                                        }
                                    }
                                ?>
                                    </div>
                                </div>
                                <div class="col-sm-4"></div>
                            </div>
                        </div>
                    </div>
                </center>
            </div>

            <div class="specific-car col-sm-12 section">
                <center>
                    <h3>Choose the specific car for you</h3>
                    <h6>Do you have a car you want to buy in your mind? No worries, Just tell us what car fits your life.</h6><br>
                    <form action="assets/php/specificCar.php" method="post" class="form-group col-sm-6">
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="car-name">Select Make:</label>
                                <select name="car-name" id="select-name" class="form-control">
                                    <option value="select_make">Choose make</option>
                                    <?php 
                                        $stmt = "SELECT DISTINCT name FROM car_name";
                                        if ($result = mysqli_query($conn, $stmt)) {
                                            while($row = mysqli_fetch_array($result)){
                                                echo '<option value = "'.$row['name'].'">'.$row['name'].'</option>';
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label for="car-model">Select model:</label>
                                <select name="car-model" id="select-model" class="form-control">
                                    <option value="select_model">Choose model</option>
                                    <?php 
                                        $stmt = "SELECT DISTINCT model FROM model WHERE id IN ( SELECT model_id FROM cars ";
                                        if ($result = mysqli_query($conn, $stmt)) {
                                            while($row = mysqli_fetch_array($result)){
                                                echo '<option value = "'.$row['name'].'">'.$row['name'].'</option>';
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <br><input type="submit" value="Go" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </center>
            </div>

            <div class="recent-cars col-sm-12 section">
                <center>
                    <h3>Recently posted cars for sale</h3><br><br>

                    <div class="row">
                    <?php
                        $count=0;   
                        $stmt= "SELECT * FROM cars ORDER BY time_created desc LIMIT 8";
                        $result= mysqli_query($conn,$stmt);
                        while($row = mysqli_fetch_array($result)){
                            $time = strtotime($row['time_created']);
                            $myFormatForView = date("m/d/y g:i A", $time);

                                $stmt2="SELECT * FROM car_name WHERE id =". $row['name_id'];
                                $result2= mysqli_query($conn,$stmt2);
                                while($row2 = mysqli_fetch_array($result2)){
                                    $stmt3="SELECT * FROM image WHERE car_id =". $row['id'];
                                    $result3= mysqli_query($conn,$stmt3);
                                    while($row3 = mysqli_fetch_array($result3)){
                                        echo '';
                                        echo '<div class="col-sm-3">'; 
                                        echo '<a href="assets/php/detail.php?id='.$row["id"].'"><img src="uploads/'. $row3["path_1"].'" style="width: 15vw; height: 15vh;">';
                                        echo "<h3>". $row2['name']."</h3>";
                                        echo "<h6>".$myFormatForView."</h6>";
                                        echo "<h6> ". number_format($row['price']) ."Birr</h6> </a>";
                                        if($row['new_or_used']==1){echo "<p><strong>New</strong></p>";}
                                        elseif($row['new_or_used']==2){echo "<p><strong>Used Abroad</strong></p>";}
                                        else{echo "<p><strong>Used</strong></p>";}
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

                    <a  href="assets/php/cars.php"><button class="btn btn-primary">View All</button></a>
                </center>

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
         <script type="text/javascript">
              $(function() {
                 $( "#search" ).autocomplete({
                   source: 'assets//php//search.php',
                 });
              });
        </script>
    </body>
    <script>
        $('#select-name').on('change', function () {
            $('#select-model').empty();
            
            var selectedName = $(this).find('option:selected').val();
            $.ajax({
                type: "POST",
                url: "assets/php/selectCar.php",
                data: {selectedName: selectedName},
                dataType: "json",
                success: function (data) {
                    $.each(data, function (i, value) { 
                        $('#select-model').append('<option value = "'+value+'">'+value+'</option>');
                    });
                },
                error: function(datat){
                    console.log(datat);
                },
            });
        })
    </script>
   
</html>