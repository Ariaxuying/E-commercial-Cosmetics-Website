<?php
SESSION_start();
if(!isset($_SESSION['m']))
  header("Location:logout.php");
$cat=$_GET['cat'];
$pro=$_GET['pro'];

$bd=$_GET['bd'];
$ed=$_GET['ed'];

$con=mysqli_connect("localhost","root","123456","hw3");
if(!$con){
die('database connection failed');}

if((strlen($cat)==0&&strlen($pro)==0)){
    if(strlen($bd)==0&&strlen($ed)==0){
    $sql="select sum(ProductQty) as TotalQty,ProductID from OrderDetail group by ProductID Order"
    . " by TotalQty DESC";}
    else{
    $sql="select sum(ProductQty) as TotalQty,ProductID from OrderDetail inner join OrderInfor where OrderDetail.OrderID"
             . "=OrderInfor.OrderID and OrderDate>='$bd' and OrderDate<='$ed' group by ProductID Order"
    . " by TotalQty DESC"; }
    $res=mysqli_query($con,$sql);
     echo'<table>';
    $t=0;
    echo mysqli_error($con);
    while($row=mysqli_fetch_array($res))
    {$pid=$row['ProductID'];
     $sql1="select * from Product where ProductID=$pid";
    $res1=mysqli_query($con,$sql1);
    $row1=mysqli_fetch_array($res1);
    $pro=$row1['ProductName'];
     echo '<tr><td>'.$pro.'&nbsp&nbsp&nbsp&nbsp</td><td>Qty'.$row['TotalQty'].'</td></tr>';
     $t=$t+$row['TotalQty'];}
    

   echo'</table></br></br>Total Quantity:'.$t; }
   
   
   
   
elseif(strlen($cat)>0&&strlen($pro)==0){
  $sql="select * from Product where CategoryID=$cat";
  $res=mysqli_query($con,$sql);
   echo'<table>';
   $t=0;
  while($row=mysqli_fetch_array($res))
    {$pid=$row['ProductID'];
  
    if(strlen($bd)==0&&strlen($ed)==0)
   {
    $sql1="select sum(ProductQty) as totalQty from OrderDetail where ProductID=$pid group by ProductID";
    $res1=mysqli_query($con,$sql1);
   if($res1->num_rows!=0)
    {$row1=mysqli_fetch_array($res1);
     echo '<tr><td>'.$row['ProductName'].'&nbsp&nbsp&nbsp&nbsp</td><td>Qty:'.$row1['totalQty'].'</td></tr>';
     $t=$t+$row1['totalQty'];}}
   
    else{
     $sql1="select sum(ProductQty) as totalQty from OrderDetail inner join OrderInfor where ProductID=$pid and OrderDetail.OrderID"
             . "=OrderInfor.OrderID and OrderDate>='$bd' and OrderDate<='$ed' group by ProductID"; 
     $res1=mysqli_query($con,$sql1);
     if($res1->num_rows!=0)
     {$row1=mysqli_fetch_array($res1);
     echo '<tr><td>'.$row['ProductName'].'&nbsp&nbsp&nbsp&nbsp</td><td>Qty'.$row1['totalQty'].'</td></tr>';
     $t=$t+$row1['totalQty'];}
    }}  
   echo'</table></br></br>Total Quantity:'.$t;}
  
   
elseif(strlen($cat)==0&&strlen($pro)>0){
    $sql2="select * from Product where ProductID=$pro";
    $res2=mysqli_query($con,$sql2);
    $row2=mysqli_fetch_array($res2);
    $name=$row2['ProductName'];
    echo'<table>';
    $t=0;
if(strlen($bd)==0&&strlen($ed)==0)
   {
    $sql="select sum(ProductQty) as totalQty from OrderDetail where ProductID=$pro group by ProductID";
    $res=mysqli_query($con,$sql);
   if($res->num_rows!=0)
    {$row=mysqli_fetch_array($res);
     echo '<tr><td>'.$name.'&nbsp&nbsp&nbsp&nbsp</td><td>Qty'.$row['totalQty'].'</td></tr>';
     $t=$t+$row['totalQty'];}}
   
    else{
     $sql1="select sum(ProductQty) as totalQty from OrderDetail inner join OrderInfor where ProductID=$pro and OrderDetail.OrderID"
             . "=OrderInfor.OrderID and OrderDate>='$bd' and OrderDate<='$ed' group by ProductID"; 
     $res1=mysqli_query($con,$sql1);
     if($res1->num_rows!=0)
     {$row1=mysqli_fetch_array($res1);
     echo '<tr><td>'.$name.'&nbsp&nbsp&nbsp&nbsp</td><td>Qty'.$row1['totalQty'].'</td></tr>';
     $t=$t+$row1['totalQty'];}
    }
echo'</table></br></br>Total Quantity:'.$t;}



    
 ?>

   
   

   
   

  
