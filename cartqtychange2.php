<?php
SESSION_start();
$pid=$_GET['pid'];
$qty=$_GET['qty'];
$customerid=$_SESSION['customer'];
 $con=mysqli_connect("localhost","root","123456","hw3");
   if(!$con){
   die('database connection failed');}
 $sel="update ShoppingCart set ProductQty=$qty where CustomerID=$customerid and ProductID=$pid";
 $res=mysqli_query($con,$sel);
?>
