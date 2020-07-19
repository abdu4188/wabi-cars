<?php
 require 'db.php';
 $status = $_GET['status'];
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cars for sale</title>
        <link href="https://fonts.googleapis.com/css?family=Quicksand:300,500" rel="stylesheet">
        <link rel="stylesheet" href="../bootstrap-4.3.1-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
        <script src="../js/jquery-3.4.1.min.js"></script>
        <script src="../bootstrap-4.3.1-dist/js/bootstrap.bundle.js"></script>
        <script src="../js/script.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    </head>
    <body>
        <div class="body-container">


            <nav class="navbar hidden fixed-top navbar-expand-lg navbar-light ">
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

            <div class="side-by-side">
            <div class="sidenav">
                    <div class="card">
                        <div class="card-body">
                            <form class="form-inline header-search " method="POST" action="searching.php">
                                <input name="search" class="form-control" type="search" id="search" placeholder="Search" aria-label="Search"><br><br>
                                <button class="btn btn-outline-success " type="submit">Search</button>
                            </form><br>

                            <div class="category">
                                <ul id="myUL">
                                    <li><span class="caret">Catagories</span>
                                        <ul class="nested">
                                        <a href="filtered_by_catagory.php?catagory=Sedan"><li>Sedan</li></a>
                                        <a href="filtered_by_catagory.php?catagory=Compact"><li>Compact</li></a>
                                        <a href="filtered_by_catagory.php?catagory=Estate"><li>Estate</li></a>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            
                            <div class="price-range">
                                <ul id="myUL">
                                    <li><span class="caret">Price Range</span>
                                        <ul class="nested">
                                        <form class="form-group" action="filtered_by_price.php" method="POST">
                                            <label for="minmum">Min.</label>
                                            <input class="form-control" type="number" name="minimum" placeholder="Min." value="0">
                                            <label for="maximum">Max.</label>
                                            <input class="form-control" type="number" name="maximum" placeholder="Max."><br>
                                            <button class="btn btn-outline-success " type="submit">Filter Result</button>
                                        </form>
                                        </ul>
                                    </li>
                                </ul>
                            </div>

                            <div class="condition">
                                <ul id="myUL">
                                    <li><span class="caret">Condition</span>
                                        <ul class="nested">
                                        <a href="filtered_by_status.php?status=3"><li>Used</li></a>
                                        <a href="filtered_by_status.php?status=1"><li>New</li></a>
                                        <a href="filtered_by_status.php?status=2"><li>Used Abroad</li></a>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="car-list">
                    <div class="row">
                        <div class="for-sale col-sm-6 col-6">
                            <h5>cars for sale</h5>
                        </div>
                        <!-- <div class="col-sm-6 col-6">
                            <div class="dropdown show">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   sort <i class="fa fa-filter"></i>
                                </a>
                                
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="#">By Name</a>
                                    <a class="dropdown-item" href="#">By Date posted</a>
                                    <a class="dropdown-item" href="#">By Price</a>
                                </div>
                            </div>
                        </div> -->
                    </div>

                    <?php

                        $stmt = $conn ->prepare("SELECT * FROM cars WHERE availability = 1 AND new_or_used = ?");
                        $stmt->bind_param('i', $status);
                        $stmt->execute();
                        $result= $stmt->get_result();
                        while($row = $result->fetch_assoc()){
                            $year = $row['year'];
                            $time = strtotime($row['time_created']);
                            $myFormatForView = date("m/d/y g:i A", $time);
                            if ($row['new_or_used'] == 1) {
                                $new_used = "New";
                            }
                            elseif($row['new_or_used'] == 2){
                                $new_used = "Used abroad";
                            }
                            elseif($row['new_or_used'] == 3){
                                $new_used = "Used";
                            }
                            $sql = "SELECT transmission_id FROM details WHERE id =".$row['details_id'];
                            $transmissionResult = mysqli_query($conn, $sql);
                            while($transmissionRow = mysqli_fetch_array($transmissionResult)){
                                if ($transmissionRow['transmission_id'] == 1) {
                                    $transmission = "Automatic";
                                }
                                elseif ($transmissionRow['transmission_id'] == 2) {
                                    $transmission = "Manual";
                                }
                            }
                    
                            echo '<div class="card">';
                                echo '<div class="card-body">';
                                    echo '<div class="row">';
                                        echo '<div class="col-sm-4 col-6 ">';
                                        $stmt2= "SELECT * FROM image WHERE car_id=".$row['id'];
                                        $result2= mysqli_query($conn,$stmt2);
                                        while($row2 = mysqli_fetch_array($result2)){
                                            $stmt3= "SELECT * FROM car_name WHERE id=".$row['name_id'];
                                            $result3= mysqli_query($conn,$stmt3);
                                            while($row3 = mysqli_fetch_array($result3)){
                                                $stmt4= "SELECT * FROM model WHERE id=".$row['model_id'];
                                                $result4= mysqli_query($conn,$stmt4);
                                                while($row4 = mysqli_fetch_array($result4)){
                                                
                                            echo '<a href="detail.php?id='.$row["id"].'"><img src="../../uploads/'.$row2['path_1'].'">';
                                            
                                        echo '</div>';
                                        echo '<div class="col-sm-4 col-6 ">';
                                            
                                            echo '<h5><strong>'.$row3['name'].' '.$row4['model'].'</strong></h5>'; 
                                            echo '<h6>'.$new_used.' - '.$transmission.' - '.$year.'</h6>';
                                            echo '<p>'.$myFormatForView.'</p>';
                                            echo '<p>'.number_format($row['price']) .' Birr</p></a>';
                                            
                                        echo '</div>';

                                        echo '<div class="col-sm-4 col-12">';
                                            echo '<a href="tel:0941889238"><i class="fa fa-2x fa-phone">call</i></a>';
                                            echo '<a href=""><i class="fab fa-2x fa-whatsapp"></i></a>';
                                            echo '<a href=""><i class="fab fa-2x fa-telegram"></i></a>';
                                        echo '</div>';
                                        echo '</div>';

                                        echo '</div>';
                                        echo '</div>';
                            
                        }
                    }
                }
            }
                ?>

                    
                </div>
            </div>

        </div>
    </body>
    <script>
        
        var toggler = document.getElementsByClassName("caret");
        var i;

        for (i = 0; i < toggler.length; i++) {
        toggler[i].addEventListener("click", function() {
            this.parentElement.querySelector(".nested").classList.toggle("active");
            this.classList.toggle("caret-down");
        });
        }

    </script>
    <script type="text/javascript">
        $(function() {
            $( "#search" ).autocomplete({
            source: 'assets//php//search.php',
            });
        });
    </script>
</html>