<?php
SESSION_start();

$num=$_GET['num'];

$pid = explode(',', $_GET['pid']);
$cid=$_SESSION['customer'];

$con=mysqli_connect("localhost","root","123456","hw3");
    if(!$con){
die('database connection failed');}
for($i=0;$i<$num;$i++){
 $sel="Delete from ShoppingCart where CustomerID=$cid and ProductID=$pid[$i]";
    $res=mysqli_query($con,$sel);
$row=mysqli_fetch_array($res);}