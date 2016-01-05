<?php
SESSION_start();
if(!isset($_SESSION['customer'])){

if(!isset($_SESSION['i'])){
    $i=0;
    $_SESSION['cartpid'][$i]=$_GET['cartpid'];
    $_SESSION['cartqty'][$i]=$_GET['cartqty'];
    echo'Add item and quantity successfully!';
    $_SESSION['i']=$i+1;
  
}
else
{ 
$i=$_SESSION['i'];

for($j=0;$j<$_SESSION['i'];$j++){
    if($_SESSION['cartpid'][$j]==$_GET['cartpid']&&$_SESSION['cartqty'][$j]!=$_GET['cartqty']&&$j<=($i-1))
    {echo'Quantity for this item change successfully!';
    $_SESSION['cartqty'][$j]=$_GET['cartqty'];
    break;
    }
    if($_SESSION['cartpid'][$j]==$_GET['cartpid']&&$_SESSION['cartqty'][$j]==$_GET['cartqty']&&$j<=($i-1))
    {echo'This item is already in your shopping cart with same quantity!';
     break;
    }
    if($_SESSION['cartpid'][$j]!=$_GET['cartpid']&&$j==($i-1))
    {echo'Add item and quantity successfully!';
     $_SESSION['cartpid'][$i]=$_GET['cartpid'];
     $_SESSION['cartqty'][$i]=$_GET['cartqty'];
     $_SESSION['i']= $_SESSION['i']+1;}
 
}}}

else{
    $con=mysqli_connect("localhost","root","123456","hw3");
   if(!$con){
   die('database connection failed');}
   $cartpid=$_GET['cartpid'];
   $cartqty=$_GET['cartqty'];
   $customerid=$_SESSION['customer'];
   $sel="select * from ShoppingCart where ProductID=$cartpid and CustomerID=$customerid";
   $res=mysqli_query($con,$sel);
   if($res->num_rows==0)
   {$sel1="insert into ShoppingCart (ProductID,CustomerID,ProductQty) values ($cartpid,$customerid,$cartqty)";
   $res1=mysqli_query($con,$sel1);
   echo 'Add item and quantity successfully!';
   }
 else {
      $row=mysqli_fetch_array($res);
      if($cartqty==$row['ProductQty'])
         echo'This item is already in your shopping cart with same quantity!';
      else
      {echo 'Quantity for this item change successfully!';
       $sel1="update ShoppingCart set ProductQty=$cartqty where ProductID=$cartpid and CustomerID=$customerid";
       $res1=mysqli_query($con,$sel1);   
      }
    
}
   
   
   
}
          



?>






