<?php
SESSION_start();
require "myaccount.php";

$fn=$_POST['fn'];
$ln=$_POST['ln'];
$ph=$_POST['ph'];
$sa=$_POST['sa'];
$ba=$_POST['ba'];
$cn=$_POST['cn'];
$cid=$_SESSION['customer'];
date_default_timezone_set('America/Los_Angeles');
$date = date("Y-m-d");
$con=mysqli_connect("localhost","root","123456","hw3");
if(!$con){
die('database connection failed');}
mysqli_query($con,"start transaction");
$insert="insert into OrderInfor(CustomerID,OrderDate,ShippingAddress,BillingAddress,CardNumber,Phone,FirstName,LastName) values ($cid,'$date','$sa','$ba','$cn','$ph','$fn','$ln')";
$res2=mysqli_query($con,$insert);
echo mysqli_error($con);
$select="select * from OrderInfor where OrderID=LAST_INSERT_ID()";
$sere=mysqli_query($con,$select);
if ($res2 and $sere) {
    mysqli_commit($con);
} else {        
    mysqli_rollback($con);
}


$rowre=mysqli_fetch_array($sere);
$oid=$rowre['OrderID'];



$sel="select * from ShoppingCart where CustomerID=$cid";
$res=mysqli_query($con,$sel);
while($row=mysqli_fetch_array($res)){
    $pid=$row['ProductID'];
    $qty=$row['ProductQty'];
    $ins="insert into OrderDetail(ProductID, ProductQty, OrderID) values ($pid,$qty,$oid)";
    mysqli_query($con,$ins);
    
}

$del="delete from ShoppingCart Where CustomerID=$cid";
mysqli_query($con,$del);
echo'<h1 style="text-align:center">Order Successfully!</h1>';



?>
