<?php
SESSION_start();
require 'myaccount.php';


$fn='';
$ln='';
$ph='';
$sa='';
$ba='';


$con=mysqli_connect("localhost","root","123456","hw3");
if(!$con){
die('database connection failed');}
$cid=$_SESSION['customer'];
$sel="select * from ShoppingCart where CustomerID=$cid";
$res=mysqli_query($con,$sel);
echo'<h1 style="text-align:center">Order Information</h1>';
echo'<table>';
        $total=0;
        while ($row=mysqli_fetch_array($res)){
            
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
          .'<td><img src="data:image/jpg;base64,'.base64_encode( $row1['Pic'] ).'"/>&nbsp&nbsp&nbsp</td>'
          .'<td>'.$row1['ProductName'].'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>'
          . '<td>Qty&nbsp&nbsp&nbsp'.$qty.'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>'
          .'<td>'.'$'.$price.'</td></tr>';
    }
    echo'</table>';
    echo'<p style="position:absolute;right:8cm">Totale Price:$'.$total.'</p></br></br></br></br>';
 
    
echo'<h1 style="text-align:center">Shipping Information</h1>';
    $sel="select * from Customer where CustomerID=$cid";
    $res=mysqli_query($con,$sel);
    $row=mysqli_fetch_array($res);
    $fn=$row['FirstName'];
    $ln=$row['LastName'];
    $ph=$row['Phone'];
    $sa=$row['DefaultShippingAddress'];
    $ba=$row['DefaultBillingAddress'];
   
?>
    

   <html>
       <head>
           <link rel="stylesheet" type="text/css" href="css.css"/>  
           <script type="text/javascript" src="js.js"></script>
       </head>
       
    <?php
    echo'<form action="place_order.php"method="POST"onsubmit="return validatepay()">
    <PRE style="text-align:center">
    


    *FirstName       <input type="text" name="fn"required value="'.$fn.'"/>
    *LastName        <input type="text" name="ln"required value="'.$ln.'"/>
    *Phone           <input type="text" name="ph"required value="'.$ph.'"/>
    *Shipping Address
    <input required type="text" name="sa"value="'.$sa.'"/>
    *Billing Address
    <input required type="text" name="ba"value="'.$ba.'"/>
    *Card Number
    <input required type="text" name="cn"/>
    
    <input type="submit"value="Place Your Order"></PRE>';
    echo' </form>';
 ?>

   </html>
      

      
