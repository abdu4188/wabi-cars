<?php
require_once "db.php";
if (isset($_GET['term'])) {
     
   $query = "SELECT name FROM car_name WHERE name LIKE '{$_GET['term']}%' LIMIT 5";
    $result = mysqli_query($conn, $query);

    $query2 = "SELECT category FROM category WHERE category LIKE '{$_GET['term']}%' LIMIT 5";
    $result2 = mysqli_query($conn, $query2);
 
 	$query3 = "SELECT model FROM model WHERE model LIKE '{$_GET['term']}%' LIMIT 5";
    $result3 = mysqli_query($conn, $query3);
 
 	$total_array = array();
 	$res = array();
 	$res2 = array();
 	$res3 = array();
 
    if (mysqli_num_rows($result) > 0) {
     while ($user = mysqli_fetch_array($result)) {
      $res[] = $user['name'];
     }
    }
    if (mysqli_num_rows($result2) > 0) {
     while ($category = mysqli_fetch_array($result2)) {
      $res2[] = $category['category'];
     }
    }
    if (mysqli_num_rows($result3) > 0) {
     while ($model = mysqli_fetch_array($result3)) {
      $res3[] = $model['model'];
     }
    }
    $total_array = array_merge($res,$res2,$res3);
    //return json res
    echo json_encode($total_array);
}
?>