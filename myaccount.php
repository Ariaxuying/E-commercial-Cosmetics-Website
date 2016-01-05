<?php
SESSION_start();
if(!isset($_SESSION['customer']))
    header("Location:logout.php");
require 'pagehead.php';
$_SESSION['page']="myaccount.php";?>

<html>
    <head>
       <link rel="stylesheet" type="text/css" href="css.css"/>  
   </head>

<?php

   
echo'<p style="text-align:center">';
echo'<a class="link"href="shopping_cart.php"style="color:black">My Shpping Cart</a>&nbsp&nbsp&nbsp&nbsp';
echo'<a class="link"href="order_history.php"style="color:black">My Order</a>&nbsp&nbsp&nbsp&nbsp';
echo'<a class="link"href="profile.php" style="color:black">My Profile</a>';
echo'</p>';?>
</html>

