<?php
require 'myaccount.php';
if(isset($_GET['oid']))
 $_SESSION['oid']= $_GET['oid'];
 $oid=$_SESSION['oid'];
 $sel="select * from OrderDetail where OrderID=$oid";
 $res=mysqli_query($con,$sel);
 
 echo'<table><h1 style="text-align:center">Order Information</h1>';
 while($row=mysqli_fetch_array($res)){
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
          .'<td><a class="link"href="ProductDetail.php?pid='.$pid.'"><img src="data:image/jpg;base64,'.base64_encode( $row1['Pic'] ).'"/>&nbsp&nbsp&nbsp</a></td>'
          .'<td><a class="link"href="ProductDetail.php?pid='.$pid.'" style="color:black;">'.$row1['ProductName'].'</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>'
          . '<td>Qty&nbsp&nbsp&nbsp'.$qty.'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>'
          .'<td>'.'$'.$price.'</td></tr>';
 }
 echo'</table>';
echo'<p style="position:absolute;right:8cm">Totale Price:$'.$total.'</p></br></br></br></br></br></br></br></br>';

    $sel3="select * from OrderInfor where OrderID=$oid";
    $res3=mysqli_query($con,$sel3);
    $row3=mysqli_fetch_array($res3);
    $fn=$row3['FirstName'];
    $ln=$row3['LastName'];
    $ph=$row3['Phone'];
    $sa=$row3['ShippingAddress'];
    $ba=$row3['BillingAddress'];
    $cn=$row3['CardNumber'];
   

echo'<div style="position:absolute;left:13cm;text-align:left">
     <h1>Personal Information</h1>
     
    


     FirstName:'.$fn
    .'</br>LastName:'.$ln
    .'</br>Phone:'.$ph
    .'</br>Shipping Address:'.$sa
    .'</br>Billing Address:'.$ba
    .'</br>Card Number:'.$cn
    .'</br></br></br></br></br></br></br></br></div>';
 
 
     
 
    
 ?>


  
   
    

