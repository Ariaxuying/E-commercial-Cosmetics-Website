<?php
SESSION_start();
if(!isset($_SESSION['m']))
  header("Location:logout.php");
echo'<a href="logout.php" style="position:absolute;right:1cm;color:black">Logout</a>';
$con=mysqli_connect("localhost","root","123456","hw3");
if(!$con){
die('database connection failed');}
if(isset($_GET['oid']))
 $_SESSION['moid']= $_GET['oid'];
 $oid=$_SESSION['moid'];
 $sel="select * from OrderDetail where OrderID=$oid";
 $res=mysqli_query($con,$sel);
 echo'<h1 style="text-align:center">Order Information</h1>';
 echo'<table style="position:absolute;left:5cm">';
 while($row=mysqli_fetch_array($res)){
     $pid=$row['ProductID'];
     $qty=$row['ProductQty'];
     $sel1="select * from Product where ProductID=$pid";
     $res1=mysqli_query($con,$sel1);
     $row1=mysqli_fetch_array($res1);
     $proname=$row1['ProductName'];
     $proprice=$row1['Price'];
     $sel2="select * from SpecialSales where ProductID=$pid";
     $res2=mysqli_query($con,$sel2);
     if($res2->num_rows!=0)
     {$row2=mysqli_fetch_array($res2);
     $proprice=$row2['SpecialSalesPrice'];}
     $price=$qty*$proprice;
     $total+=$price;
     echo'<tr>'
          
          .'<td>'.$row1['ProductName'].'</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>'
          . '<td>Qty&nbsp&nbsp&nbsp'.$qty.'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>'
          .'<td>'.'$'.$price.'</td></tr>';
 }
 echo'</table>';
echo'<p style="position:absolute;right:8cm">Totale Price:$'.$total.'</p></br></br></br></br></br></br></br></br>';

    $sel3="select * from OrderInfor where OrderID=$oid";
    $res3=mysqli_query($con,$sel3);
    $row3=mysqli_fetch_array($res3);
    $fn=$row3['FirstName'];
    $ln=$row3['LastName'];
    $ph=$row3['Phone'];
    $sa=$row3['ShippingAddress'];
    $ba=$row3['BillingAddress'];
    $cn=$row3['CardNumber'];
   

echo'<div style="position:absolute;left:13cm;text-align:left">
     <h1>Personal Information</h1>
     
    


     FirstName:'.$fn
    .'</br>LastName:'.$ln
    .'</br>Phone:'.$ph
    .'</br>Shipping Address:'.$sa
    .'</br>Billing Address:'.$ba
    .'</br>Card Number:'.$cn
    .'</br></br></br></br></br></br></br></br></div>';
 
 
     
 
    
 ?>


  
   
