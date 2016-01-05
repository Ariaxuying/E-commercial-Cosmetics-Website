<?php
SESSION_start();
$submit=$_POST['submit'];
$name=$_POST['account_name'];
$password=$_POST['password'];
if($submit=='Login')
{$con=mysqli_connect("localhost","root","123456","hw3");
   if(!$con){
   die('database connection failed');}
$sel="select * from Customer where AccountName='$name' and Password='$password'";
$res=mysqli_query($con,$sel);
if($res->num_rows==0)
{echo '<script>window.alert("Invalid Login!")</script>';}
else {
          $row=mysqli_fetch_array($res);
          $_SESSION['customer']=$row['CustomerID'];
          if(isset($_SESSION['i']))
          {for($j=0;$j<$_SESSION['i'];$j++)
          if(isset($_SESSION['cartpid'][$j])){
          {$customerid=$row['CustomerID'];
              $cartpid=$_SESSION['cartpid'][$j];
              $cartqty=$_SESSION['cartqty'][$j];
              $customerid=$_SESSION['customer'];
              $sel2="select * from ShoppingCart where ProductID=$cartpid and CustomerID=$customerid";
              $res2=mysqli_query($con,$sel2);
              if($res2->num_rows==0)
              {$sel1="insert into ShoppingCart (ProductID,CustomerID,ProductQty) values ($cartpid,$customerid,$cartqty)";
              $res1=mysqli_query($con,$sel1);}
              else{
               $sel3="update ShoppingCart set ProductQty=$cartqty where ProductID=$cartpid";
                $res3=mysqli_query($con,$sel3);
              }
         
          }}}
          
           $_SESSION['time']=time();
           $_SESSION['expire']=$_SESSION['time']+300;
           header("Location:".$_SESSION['page']."");
           
              
          }
        
}?>
<html>

        <body>
            <form style="text-align: center"action="login.php"method="POST"></br>
        Account Name<input type="text" name="account_name"/></br></br>
        Password<input type="password" name="password"/></br></br></br>
        
        <input type="submit" value="Login"name="submit"/>
        <a href="profile.php" style="color:black">Create New Account</a></br></br></br>
       
        <?php
        echo'<a href="'.$_SESSION['page'].'"style="color:black"> Go Back </a></br></br>';
        echo'<a href="manager_login.php"style="color:black">Manager Login</a>';
        
        ?>


      </body>
        </form>
    
        
</html>
