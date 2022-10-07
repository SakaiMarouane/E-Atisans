<?php
session_start();
$num_product=$_GET['id'];
$id_vendor=$_GET['vendorid'];
$prodquantity=$_GET['proquantity'];
$quantity= $_POST['quantity'];
$x=0;
if(empty($_SESSION['id']))
{
	array_push($_SESSION['id'],array($num_product,$quantity,$id_vendor));
}
else
{
for($i = 0 ; $i < count($_SESSION['id']) ; $i++)
{
	if($_SESSION['id'][$i][0]==$num_product)
	{
		$_SESSION['id'][$i][1]=$_SESSION['id'][$i][1]+$quantity;
		print_r($_SESSION['id']);
		header('location:product-details.php?num='.$num_product);
		exit();
	}
}	

for($i = 0 ; $i < count($_SESSION['id']) ; $i++)
{
	if($_SESSION['id'][$i][0]!=$num_product)
	{
		$x = 0;
	}
	else
		$x = $x + 1;
}
if($x == 0)
{
	array_push($_SESSION['id'],array($num_product,$quantity,$id_vendor));
}
}
header('location:product-details.php?num='.$num_product)
?>

 
