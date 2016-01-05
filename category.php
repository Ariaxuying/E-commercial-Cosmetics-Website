<?php
require "pagehead.php";
$_SESSION['page']="Category.php";
?>
<html>
    <head>
       <link rel="stylesheet" type="text/css" href="css.css"/>  
       <script type="text/javascript" src="js.js"></script>
   </head>
    
<div style="text-align:center">
 <?php

 if(isset($_GET['cid']))
 $_SESSION['cid']= $_GET['cid'];
 $cid=$_SESSION['cid'];
 $sel1="select * from Category where CategoryID=$cid";
 $res1=mysqli_query($con,$sel1);
 $row1=mysqli_fetch_array($res1);
 
 
 
 echo'<h1>'.$row1['CategoryName'].'</h1>';
   

$sel="select * from Product where CategoryID=$cid";
$res=mysqli_query($con,$sel);
 while($row=mysqli_fetch_array($res)){
     $pid=$row['ProductID'];
     echo '<a class="link"href="ProductDetail.php?pid='.$pid.'"><img src="data:image/jpg;base64,'.base64_encode( $row['Pic'] ).'"/>'.'</a></br>';
     echo '<a class="link"href="ProductDetail.php?pid='.$pid.'" style="color:black;">'.$row['ProductName'].'</a></br>';
     $sel2="select * from SpecialSales where ProductID=$pid";
     $res2=mysqli_query($con,$sel2);
     if($res2->num_rows==0)
     echo '$'.$row['Price'].'</br>';
     else
     { $row2=mysqli_fetch_array($res2);
       echo '<span style="text-decoration:line-through">$'.$row['Price'].'</span></br>';
       echo '<span style="color:red">On Sale:$'.$row2['SpecialSalesPrice'].'</span></br>';}
     
     echo'Qty<select id="'.$pid.'">'
             .'<option value="1">1</option>'
             .'<option value="2">2</option>'
             .'<option value="3">3</option>'
             .'<option value="4">4</option>'
             .'<option value="5">5</option>'
             .'<option value="6">6</option>'
             .'<option value="7">7</option>'
             .'<option value="8">8</option>'
             .'<option value="9">9</option>'
             .'<option value="10">10</option>'
             .'</select>&nbsp<input type="button"onclick="addcart('.$pid.')"  value="Add to Shopping Cart">';
     
     echo '</br>'.'</br>'.'</br>';
 }
mysqli_close($con);
?>

    </div>
</html>

