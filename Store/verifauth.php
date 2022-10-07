<?php 
require'connexion.php';
print_r($_POST);
$log= $_POST['log'];
$pass= $_POST['password']; 
$query = "select count(*) from users where email='$log' and password=MD5('$pass')";
$result=mysqli_query($connect, $query);
$data=mysqli_fetch_array($result); 
$query1 = "select id_user from users where email='$log' and password=MD5('$pass')";
$result1=mysqli_query($connect, $query1);
$data1=mysqli_fetch_array($result1);
if($data[0]==1)
{
	session_start();
	$_SESSION['user'] = $data1[0];
	header('location:index.php');
}
else
{
	header('location:login.php');
}
mysqli_close($connect)
?>