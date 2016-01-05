<?php
SESSION_start();
$now=time();
if(isset($_SESSION['expire'])&&($now>$_SESSION['expire']))
    header("Location:logout.php");
if(isset($_SESSION['customer'])){
    $cid=$_SESSION['customer'];
    $con=mysqli_connect("localhost","root","123456","hw3");
    if(!$con){
die('database connection failed');}
 $sel="select * from Customer where CustomerID=$cid";
    $res=mysqli_query($con,$sel);
    $row=mysqli_fetch_array($res);
echo'Welcome Back&nbsp<a class="link"href="myaccount.php">'.$row['AccountName'].'!</a>&nbsp&nbsp';
echo'<a href="logout.php" style="position:absolute;right:1cm;color:black">Logout</a>';}
else
echo'<a href="login.php"style="color:black">Login</a>&nbsp&nbsp';  
echo'<a href="shopping_cart.php"style="color:black">Shpping Cart</a></br></br></br></br>';

$con=mysqli_connect("localhost","root","123456","hw3");
    if(!$con){
    die('database connection failed');}
    $sel="select * from Category";
    $res=mysqli_query($con,$sel);
    echo'<P style="text-align: center">';
    echo'<a href="homepage.php"class="link">SpecialSales</a>&nbsp;&nbsp;&nbsp;&nbsp';
    while($row=mysqli_fetch_array($res))
    { $cid=$row['CategoryID'];
    echo'<a class="link"href="category.php?cid='. $cid.'" style="color:black;">'.$row['CategoryName'].'</a>&nbsp;&nbsp;&nbsp;&nbsp;';}
   
  echo' <HR style="position:relative;FILTER: progid:DXImageTransform.Microsoft.Glow(color=#987cb9,strength=10)" width="94%" color=#333333 SIZE=1>
   </p>';
    ?>
