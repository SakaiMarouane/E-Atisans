<?php 
require'connexion.php';
require 'mesfonctions.php';
require 'param.php';
print_r($_POST);
print_r($_FILES['Photo']); 
$des= $_POST['Des']; 
$desc= $_POST['Desc']; 
$price= $_POST['Prix']; 
$type= $_POST['Type']; 
$date= $_POST['Date'];
$Cat= $_POST['cat'];
if($_FILES['Photo']['size']>$maxfilesize)
{
	echo 'error 404';
	exit;
}
elseif($_FILES['Photo']['type']!='image/jpeg' and $_FILES['Photo']['type']!='image/jpg')
{
	echo 'error 404';
	exit;
}
else
{
	$path=uniqid().'.jpeg';
	move_uploaded_file($_FILES['Photo']['tmp_name'],'Photo/'.$path);
}
$query = "insert into produits values(NULL,'$des','$desc',$price,'$date','$type','$path', $Cat)"; 
session_start();
trace($query);
echo $query; 
mysqli_query($connect, $query); 
mysqli_close($connect);header('location:all_produits.php')
?>