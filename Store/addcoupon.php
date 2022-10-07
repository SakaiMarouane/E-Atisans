<?php 
require'connexion.php';
$coupons=array();
for($i = 0 ; $i < $_GET['numvendors'] ; $i++)
{
	$a=$i;
	$b=$i+100;
	echo $_POST[$a];
	array_push($coupons,array($_POST[$b],$_POST[$a]));
}
print_r($coupons);
session_start();
$_SESSION['coupon']=$coupons;
for($i = 0 ; $i < $_GET['numvendors'] ; $i++)
{
	$id_vendor=$coupons[$i][0];
	$code_coupon=$coupons[$i][1];
	$query = "select count(*) from coupons where id_vendor='$id_vendor' and code_coupon='$code_coupon'";
	$result=mysqli_query($connect, $query);
	$data=mysqli_fetch_array($result); 
	if($data[0]==1)
		array_push($_SESSION['coupon'][$i],1);
	if($data[0]==0)
		array_push($_SESSION['coupon'][$i],0);
}
header('location:cart.php')
?>