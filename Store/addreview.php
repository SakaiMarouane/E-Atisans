<?php 
require'connexion.php';
$name= $_POST['name'];
$email= $_POST['email'];
$review= $_POST['review'];
$num_product=$_GET['id'];
$vendor_id = $_POST['vendorid'];
$query = "insert into reviews values (NULL, '$name','$email', current_timestamp(), '$review', $num_product, $vendor_id )"; 
mysqli_query($connect, $query); 
mysqli_close($connect);

header('location:product-details.php?num='.$num_product)
?>