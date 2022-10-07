<?php 
require'connexion.php';
$name=$_POST['name'];
$email=$_POST['email'];
$subject=$_POST['subject'];
$message=$_POST['message'];
$query = "insert into contact values(NULL, '$name','$email','$subject','$message')";
mysqli_query($connect, $query);
header('location:contact_success.php')
?>