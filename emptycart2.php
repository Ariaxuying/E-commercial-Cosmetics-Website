<?php
SESSION_start();
$cid=$_SESSION['customer'];
$con=mysqli_connect("localhost","root","123456","hw3");
    if(!$con){
    die('database connection failed');}
$sel="Delete from ShoppingCart where CustomerID=$cid";
$res=mysqli_query($con,$sel);
?>
