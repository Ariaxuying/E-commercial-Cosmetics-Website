<?php
SESSION_start();
$_SESSION['page']="shopping_cart.php";?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css.css"/>  
    <script type="text/javascript" src="js.js"></script>
</head>
<?php
$f=0;
if(!isset($_SESSION['customer'])){
require'pagehead.php';
if(!isset($_SESSION['i']))
    echo'<p style="text-align:center">Your shopping cart is empty!</p>';
else {
        echo '<form action="pay.php"method="POST">';
        echo'<table>';
        for($j=0;$j<$_SESSION['i'];$j++){
          if(isset($_SESSION['cartpid'][$j])){
          $pid=$_SESSION['cartpid'][$j];
          $qty=$_SESSION['cartqty'][$j];
          $sel="select * from Product where ProductID=$pid";
          $res=mysqli_query($con,$sel);
          $row=mysqli_fetch_array($res);
          $proname=$row['ProductName'];
          $proprice=$row['Price'];
          $sel1="select * from SpecialSales where ProductID=$pid";
          $res1=mysqli_query($con,$sel1);
          if($res1->num_rows!=0)
          {$row1=mysqli_fetch_array($res1);
          $proprice=$row1['SpecialSalesPrice'];}
          $price=$qty*$proprice;
        echo'<tr><td>'
          .'<input type="checkbox"name="cart"value="'. $pid.'"/></td>'
          .'<td><a class="link"href="ProductDetail.php?pid='.$pid.'"><img src="data:image/jpg;base64,'.base64_encode( $row['Pic'] ).'"/></a>&nbsp&nbsp&nbsp</td>'
          .'<td><a class="link"href="ProductDetail.php?pid='.$pid.'" style="color:black;">'.$row['ProductName']
          .'</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td><td>Qty<input type="text"id="'.$pid.'"onchange="cartqtychange1('.$pid.','.$qty.','.$price.','.$proprice.')"style="width:1cm"value="'.$qty.'"/>&nbsp&nbsp&nbsp</td>'
          .'<td id="'.$price.'">$'.$price.'</td></tr>';
        }}
    echo'</table>';
    echo'</form>';
    echo'<input type="button"onclick="deletecart1()"value="Delete selected items"/>&nbsp&nbsp&nbsp'
    . '<input type="button"onclick="emptycart1()"value="Delete All"/>'
    .'<a class="link"href="login.php?" style=";color:black;position:absolute;right:8cm">Login to checkout>>'
          .'</a></br></br></br></br>';
    
    
}
}

else{
    
    require'myaccount.php';
    $customerid=$_SESSION['customer'];
    $sel="select * from ShoppingCart where CustomerID=$customerid";
    $res=mysqli_query($con,$sel);
 
    if($res->num_rows==0)
 {echo'<p style="text-align:center">Your shopping cart is empty!</p>'; }
       


   
else {
        echo '<form action="pay.php"method="POST">';
        echo'<table>';
        while ($row=mysqli_fetch_array($res)){
           unset($_SESSION['qty']);
           unset($_SESSION['id']);
          $pid=$row['ProductID'];
          $qty=$row['ProductQty'];
        $sel3="select * from OrderDetail where ProductID=$pid";
        $res3=mysqli_query($con,$sel3);
         if($res3->num_rows!=0)
         {
           while ($row3=mysqli_fetch_array($res3)){
               $oid=$row3['OrderID'];
               if($f==0)
               {$_SESSION['qty']=$row3['ProductQty'];
               $_SESSION['id']=$pid;
               
               }
               
               
               
               $sel4="select ProductQty, ProductID from OrderDetail where OrderID=$oid Order by"
                       . " ProductQty DESC";
               $res4=mysqli_query($con,$sel4);
               echo mysqli_error($con);
               while ($row4=mysqli_fetch_array($res4)){
                   $opid=$row4['ProductID'];
                   $tq=$row4['ProductQty'];
                   if(($opid!=$pid)&&($tq>=$_SESSION['qty']))
                   {$_SESSION['qty']=$tq;
                    $_SESSION['id']=$opid;
                    $f=1;
                   
                    break;
                       
                   }
                       
               }
               
           }  
         $id=$_SESSION['id'];
        
        $sel5="select * from Product where ProductID=$id";
        $res5=mysqli_query($con,$sel5);
        $row5=mysqli_fetch_array($res5);
       
        echo mysqli_error($con);
       
        $n=$row5['ProductID'];
        $pic=$row5['Pic']; }
      
        
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
        echo'<tr>'
          .'<td><input type="checkbox"name="cart"value="'. $pid.'"/></td>'
          .'<td><a class="link"href="ProductDetail.php?pid='.$pid.'"><img src="data:image/jpg;base64,'.base64_encode( $row1['Pic'] ).'"/></a>&nbsp&nbsp&nbsp</td>'
          .'<td><a class="link"href="ProductDetail.php?pid='.$pid.'" style="color:black;">'.$row1['ProductName']
          .'</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td><td>Qty<input type="text"id="'.$pid.'"onchange="cartqtychange2('.$pid.','.$qty.','.$price.','.$proprice.')"style="width:1cm"value="'.$qty.'">&nbsp&nbsp&nbsp</td><td id="'.$price.'">'
          .'$'.$price.'</td><td>'.$name.'</td>';
        if(isset($_SESSION['id'])&&($id!=$pid))
        {$f=0;
            echo'<td>Other customers also ordered with</td><td><a class="link"href="ProductDetail.php?pid='.$n.'"><img height="42" width="42"src="data:image/jpg;base64,'.base64_encode($pic).'"/></a></td>';}
        echo'</tr>';
    }
    echo'</table>';
    echo'<input type="button"value="Delete selected items"onclick="deletecart2()"/>&nbsp&nbsp&nbsp'
    . '<input type="button"onclick="emptycart2()"value="Delete All"/>'
    .'<input type="submit"style="position:absolute;right:8cm"value="Process to checkout"/></br></br></br></br>';
    echo'</form>';
    
}}


        
    
   ?>
</html>

