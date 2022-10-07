<?php
session_start();
$num_product=$_GET['num1'];
for($i = 0 ; $i < count($_SESSION['id']) ; $i++)
{
	if($_SESSION['id'][$i][0]==$num_product)
	{
		unset($_SESSION['id'][$i]);
	}
}
$_SESSION['id']=array_values($_SESSION['id']);
header('location:cart.php')
?>