<?php
SESSION_start();
$pid=$_GET['pid'];
$qty=$_GET['qty'];
for($j=0;$j<$_SESSION['i'];$j++){
  if($_SESSION['cartpid'][$j]==$pid)
  {$_SESSION['cartqty'][$j]=$qty;
break;}
}
echo $_SESSION['cartqty'][$j];
?>

