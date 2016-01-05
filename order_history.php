<?php
require 'myaccount.php';
$cid=$_SESSION['customer'];
$con=mysqli_connect("localhost","root","123456","hw3");
if(!$con){
die('database connection failed');}
 $sel="select * from OrderInfor where CustomerID=$cid";
 $res=mysqli_query($con,$sel);
if($res->num_rows==0)
    echo'<h1 style="text-align:center">No Order History!</h1>';
else{
    echo'<p style="position:absolute;left:13cm">';
    echo'<table>';
    while ($row=mysqli_fetch_array($res))
    {$oid=$row['OrderID'];
     $date=$row['OrderDate'];
     echo '<tr>'
          .'<td><a class="link"href="OrderDetail.php?oid='.$oid.'" style="color:black;">Order#:'.$oid
          .'</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td><td>OrderDate:'.$date.'</td></tr>';
    }
    echo'</p>';}
 
