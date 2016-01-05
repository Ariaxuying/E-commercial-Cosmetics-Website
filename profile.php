<?php
SESSION_start();
$fn='';
$ln='';
$an='';
$pw='';
$cpw='';
$em='';
$ph='';
$sa='';
$ba='';
if(isset($_SESSION['customer'])){
    require'myaccount.php';
    $cid=$_SESSION['customer'];
    $con=mysqli_connect("localhost","root","123456","hw3");
    if(!$con){
die('database connection failed');}
 $sel="select * from Customer where CustomerID=$cid";
    $res=mysqli_query($con,$sel);
    $row=mysqli_fetch_array($res);
   
   
   $fn=$row['FirstName'];
    $ln=$row['LastName'];
    $pw=$row['Password'];
    $cpw=$row['Password'];
    $em=$row['Email'];
    $ph=$row['Phone'];
    $sa=$row['DefaultShippingAddress'];
    $ba=$row['DefaultBillingAddress'];
    $an=$row['AccountName'];
}
else 
    require 'pagehead.php';?>
    

   <html>
       <head>
           <script type="text/javascript" src="js.js"></script>
          
       </head>
       <form>
    <?php
    echo'
    <PRE style="text-align:center">
    


    *FirstName       <input type="text" name="fn"required value="'.$fn.'"/>
    *LastName        <input type="text" name="ln"required value="'.$ln.'"/>
    *AccountName     <input type="text" name="an"required value="'.$an.'"/>
    *Password        <input type="password"name="pw"required value="'.$pw.'"/>
    *Confirm Password<input type="password" name="cpw"required value="'.$cpw.'"/>
    Email Address    <input type="email" name="em"value="'.$em.'"/>
    Phone            <input type="text" name="ph"value="'.$ph.'"/>
    Default Shipping Address
    <input type="text" name="sa"value="'.$sa.'"/>
    Default Billing Address
    <input type="text" name="ba"value="'.$ba.'"/>
    <input type="button"value="submit"onclick="validateprofile()"></PRE>';
    
 ?>
</form>
   </html>
    

    

