<?php 
require'connexion.php';
$name= $_POST['name'];
$email= $_POST['email'];
$addresse1= $_POST['addresse1'];
$addresse2= $_POST['addresse2'];
$codepo= $_POST['codepo'];
$country= $_POST['country'];
$city= $_POST['city'];
$number= $_POST['number'];
$password= $_POST['password']; 
$query = "select count(*) from users where email='$email'";
$result=mysqli_query($connect, $query);
$data=mysqli_fetch_array($result); 
if($data[0]==1)
{

	header('location:login.php?auth=0');
}
else
{
	$query = "insert into users values(NULL,'$name','$email','$addresse1','$addresse2',$codepo,'$city', '$country', '$number', MD5('$password'))";
	mysqli_query($connect, $query); 
	mysqli_close($connect);
	header('location:login.php?crea=0');	
}
?>