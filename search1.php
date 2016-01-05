<?php
SESSION_start();
if(!isset($_SESSION['m']))
  header("Location:logout.php");
$con=mysqli_connect("localhost","root","123456","hw3");
if(!$con){
die('database connection failed');}
$bd=$_GET['bd'];
$ed=$_GET['ed'];


   $sql="select * from SpecialSales";
  $res=mysqli_query($con,$sql);
   echo'<table>';
   $t=0;
 //  echo mysqli_error($con);
  while($row=mysqli_fetch_array($res))
    {$pid=$row['ProductID'];
    $sql2="select * from Product where ProductID=$pid";
    $res2=mysqli_query($con,$sql2);
    $row2=mysqli_fetch_array($res2);
    if(strlen($bd)==0&&strlen($ed)==0)
   {
    $sql1="select sum(ProductQty) as totalQty from OrderDetail where ProductID=$pid group by ProductID";
    $res1=mysqli_query($con,$sql1);
   if($res1->num_rows!=0)
    {$row1=mysqli_fetch_array($res1);
     echo '<tr><td>'.$row2['ProductName'].'&nbsp&nbsp&nbsp&nbsp</td><td>Qty:'.$row1['totalQty'].'</td></tr>';
     $t=$t+$row1['totalQty'];}}
   
    else{
     $sql1="select sum(ProductQty) as totalQty from OrderDetail inner join OrderInfor where ProductID=$pid and OrderDetail.OrderID"
             . "=OrderInfor.OrderID and OrderDate>='$bd' and OrderDate<='$ed' group by ProductID"; 
     $res1=mysqli_query($con,$sql1);
     if($res1->num_rows!=0)
     {$row1=mysqli_fetch_array($res1);
     echo '<tr><td>'.$row2['ProductName'].'&nbsp&nbsp&nbsp&nbsp</td><td>Qty'.$row1['totalQty'].'</td></tr>';
     $t=$t+$row1['totalQty'];}
    }}  
   echo'</table></br></br>Total Quantity:'.$t;?>

