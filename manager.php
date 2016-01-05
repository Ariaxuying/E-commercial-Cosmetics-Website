<?php
SESSION_start();
if(!isset($_SESSION['m']))
  header("Location:logout.php");
        ?>
<html>
    <head>
        <script type="text/javascript" src="js.js"></script>
    </head>
<a href="logout.php" style="position:absolute;right:1cm;color:black">Logout</a>
<input type="text"id="cat"placeholder="CategoryID"/>
<input type="text"id="pro"placeholder="ProductID"/>


From<input type="date"id="bd"/>
to<input type="date"id="ed"/>
<input type="button"onclick="search()"value="Search">
<input type="button"onclick="spe()"value="SpecialSales"/>
<?php

$con=mysqli_connect("localhost","root","123456","hw3");
if(!$con){
die('database connection failed');}
 $sel="select * from OrderInfor";
 $res=mysqli_query($con,$sel);
if($res->num_rows==0)
    echo'No Orders!';
else{
  
    echo'<p id="result"style="position:absolute;left:12cm">';
    echo'<table>';
    while ($row=mysqli_fetch_array($res))
    {$oid=$row['OrderID'];
     $date=$row['OrderDate'];
     $customerid=$row['CustomerID'];
     echo '<tr>'
          .'<td><a class="link"href="manager_order.php?oid='.$oid.'" style="color:black;">Order#:'.$oid
          .'</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td><td>OrderDate:'.$date.'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>'
          . '<td>CustomerID:'.$customerid.'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td></tr>';
    }echo'</p>';}
    ?> 


</html>
