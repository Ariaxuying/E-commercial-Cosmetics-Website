<?php
require "pagehead.php";
$_SESSION['page']="homepage.php";
?>

<html>
   <head>
       <link rel="stylesheet" type="text/css" href="css.css"/>  
       <script type="text/javascript" src="js.js"></script>
          
    
   </head>
    <?php
    
    
echo '<div style="text-align:center">
<h1>Special Sales Now!</h1>';


$sel="select * from Product, SpecialSales where Product.ProductID=SpecialSales.ProductID";
$res=mysqli_query($con,$sel);
 while($row=mysqli_fetch_array($res)){
     
     $pid=$row['ProductID'];
     echo '<a class="link"href="ProductDetail.php?pid='.$pid.'"><img src="data:image/jpg;base64,'.base64_encode( $row['Pic'] ).'"/>'.'</a></br>';
     echo '<a class="link"href="ProductDetail.php?pid='.$pid.'" style="color:black;">'.$row['ProductName'].'</a></br>';
     echo '<span style="text-decoration:line-through">$'.$row['Price'].'</span></br>';
     echo '<span style="color:red">$'.$row['SpecialSalesPrice'].'</span></br>';
     echo 'End Date:'.$row['EndDate'].'</br>';
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
             .'</select>&nbsp<input type="button" onclick="addcart('.$pid.')"value="Add to Shopping Cart"/>';
     
     echo '</br>'.'</br>'.'</br>';
    
 }
mysqli_close($con);
echo'</div>';
?>
    
   
</html>



       

    
     


