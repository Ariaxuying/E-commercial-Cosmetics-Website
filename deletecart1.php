<?php
SESSION_start();
$num=$_GET['num'];

$pid = explode(',', $_GET['pid']);


for($j=0;$j<$_SESSION['i'];$j++){
    for($i=0;$i<$num;$i++){
      if($_SESSION['cartpid'][$j]==$pid[$i])
          unset ($_SESSION['cartpid'][$j]);
    }
}




?>