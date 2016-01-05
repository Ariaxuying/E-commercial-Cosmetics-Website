<?php
require "pagehead.php";
$_SESSION['page']="ProductDetail.php";?>
<html>
    <head>
       <link rel="stylesheet" type="text/css" href="css.css"/>  
        <script type="text/javascript" src="js.js"></script>
   </head>
<div style="text-align:center">
 <?php
 if(isset($_GET['pid'])&&(!isset($_GET['n'])))
 {$_SESSION['pid']= $_GET['pid'];
 $pid=$_SESSION['pid'];}
 if((!isset($_GET['pid']))&&isset($_GET['n']))
 {$_SESSION['n']= $_GET['n'];
 $pid=$_SESSION['n'];}
 else
     $pid=$_SESSION['pid'];
 $sel="select * from Product where ProductID=$pid";
 $res=mysqli_query($con,$sel);
 $row=mysqli_fetch_array($res);
 
 
 
 echo'<h1>'.$row['ProductName'].'</h1>';
 echo '<img src="data:image/jpg;base64,'.base64_encode( $row['Pic'] ).'"/>'.'</br>'; 
 echo $row['Product'].'</br>';
 echo '<div style="position:relative;left:14cm;width:5cm">'.$row['Description'].'</div></br>';


     
     $sel1="select * from SpecialSales where ProductID=$pid";
     $res1=mysqli_query($con,$sel1);
     if($res1->num_rows==0)
     echo '$'.$row['Price'].'</br>';
     
else
{ $row1=mysqli_fetch_array($res1);
       echo '<span style="text-decoration:line-through">$'.$row['Price'].'</span></br>';
       echo '<span style="color:red">On Sale:$'.$row1['SpecialSalesPrice'].'</span></br>';}
     
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
             .'</select>&nbsp<input type="button"onclick="addcart('.$pid.')"value="Add to Shopping Cart">';
     
     echo '</br>'.'</br>'.'</br>';
 
mysqli_close($con);
?>

    </div>
</html>

