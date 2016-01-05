<?php
SESSION_start();
$sub=$_POST['submit'];
$id=$_POST['id'];
$ps=$_POST['ps'];
if($sub=='Login'){
if(($id!=111)||($ps!=111))
    echo'<script>window.alert("Invalid Login!")</script>';
else
    $_SESSION['m']=1;
    header("Location:manager.php");
}
?>


<html>
<?php
echo'<form action="manager_login.php"method="POST">'
. 'UserID<input type="text"name="id"/>'
. 'Password<input type="password"name="ps"/>'
. '<input type="submit"name="submit"value="Login">'
        . '</form>';
?>
    <a href="login.php">Go Back</a>
</html>
