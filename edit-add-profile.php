<?php
SESSION_start();

    $fn=$_GET['fn'];
    $ln=$_GET['ln'];
    $pw=$_GET['pw'];
    $an=$_GET['an'];
    $em=$_GET['em'];
    $ph=$_GET['ph'];
    $sa=$_GET['sa'];
    $ba=$_GET['ba'];
 
if(strlen($em)==0)
    $em=NULL;
if(strlen($ph)==0)
    $ph=NULL;
if(strlen($sa)==0)
    $sa=NULL;
if(strlen($ba)==0)
    $ba=NULL;

$con=mysqli_connect("localhost","root","123456","hw3");
    if(!$con){
    die('database connection failed');}
   
if(isset($_SESSION['customer'])){
   
    $cid=$_SESSION['customer'];
  $sel1="select * from Customer where AccountName='$an' and Password='$pw'";
  $res1=mysqli_query($con,$sel1);
  if($res1->num_rows==0)
{  $sel="update Customer set FirstName='$fn',LastName='$ln',Password='$pw',Email='$em',Phone='$ph',DefaultShippingAddress='$sa',DefaultBillingAddress='$ba',AccountName='$an' where CustomerID=$cid";
   $res=mysqli_query($con,$sel);
   
echo'Update Profile Successfully!';}
else{
    $row1=mysqli_fetch_array($res1);
    if($row1['CustomerID']!=$cid)
{echo 'Customer already exsited! Please change your account name or password!';}
else{
    $sel="update Customer set FirstName='$fn',LastName='$ln',Password='$pw',Email='$em',Phone='$ph',DefaultShippingAddress='$sa',DefaultBillingAddress='$ba',AccountName='$an' where CustomerID=$cid";
   $res=mysqli_query($con,$sel);
   
echo'Update Profile Successfully!';}
}}
 
else{
  $sel2="select * from Customer where AccountName='$an' and Password='$pw'";
    $res2=mysqli_query($con,$sel2);
    if($res2->num_rows==0){
    $sel="insert into Customer (FirstName,LastName,Phone,Password,Email,DefaultShippingAddress,DefaultBillingAddress,AccountName) "
            . "values ('$fn','$ln','$ph','$pw','$em','$sa','$ba','$an')";
    $res=mysqli_query($con,$sel);
   /* $sel1="select * from Customer where AccountName='$an' and Password='$pw'";
    $res1=mysqli_query($con,$sel1);
    $row1=mysqli_fetch_array($res1);
    $_SESSION['customer']=$row1['CustomerID'];*/
   
    echo'Create Profile Successfully!Please Login!';}
    else 
        echo 'Customer already exsited! Please change your account name or password!';}
    
    
    
?>

