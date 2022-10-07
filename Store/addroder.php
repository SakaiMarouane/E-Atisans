<?php 
require'connexion.php';
session_start();
$var=0;
$totale=array();
$order_product=array();
$order=array();
for($i = 0 ; $i < count($_SESSION['id']) ; $i++)
{
		$x=0;
		$s=$_SESSION['id'];
		$s1=$s[$i][0];
		$s2=$s[$i][1];
		$s3=$s[$i][2];
		$query = "SELECT prod_price from products where prod_id=$s1"; 
		$result = mysqli_query($connect,$query);
		$prod=mysqli_fetch_array($result);
		$prix=$prod[0];
		if(empty(count($totale)))
		{
			array_push($totale,array($s3,$s2*$prix,array($s1),array($s2)));
		}
		else
		{
			for($j = 0 ; $j < count($totale) ; $j++)
			{
				if($s3==$totale[$j][0])
				{
					$x=1;
					
					$totale[$j][1]=$totale[$j][1]+$s2*$prix;
					array_push($totale[$j][3],$s2);
					array_push($totale[$j][2],$s1);
					break;
				}
			}
			if($x!=1)
			{
				array_push($totale,array($s3,$s2*$prix,array($s1),array($s2)));
			}

		}
}
//print_r($totale); # vendorid/prix/quantitetotale 
for($i = 0 ; $i < count($totale) ; $i++)
{
	$ss=$_SESSION['user'];
	$price=$totale[$i][1];
	$vendorid=$totale[$i][0];
	//echo $ss;
	if(isset($_SESSION['coupon']))
	{
		$couponverif=$_SESSION['coupon'][$i][1];
		$idvendorvrif=$_SESSION['coupon'][$i][0];
		echo $couponverif;
		echo $idvendorvrif;


		$query0="select coupon_id from coupons where id_vendor='$idvendorvrif' and code_coupon='$couponverif'";
		$result = mysqli_query($connect,$query0);
		$prod=mysqli_fetch_array($result);
		if(is_null($prod))
		{
			$coupon_id=NULL;
			$query1 = "insert into orders values(NULL, current_timestamp(), $price, 0, $ss, NULL, $vendorid)";

		}
		else{
			
			$coupon_id=$prod[0];
			$query1 = "insert into orders values(NULL, current_timestamp(), $price, 0, $ss, $coupon_id, $vendorid)";

		}
		echo $coupon_id;

    mysqli_query($connect, $query1);
	}

	else
	{
		$query1 = "insert into orders values(NULL, current_timestamp(), $price, 0, $ss, NULL,$vendorid)";
		mysqli_query($connect, $query1);

	}
	$query2 = "SELECT @@IDENTITY";
	$result = mysqli_query($connect,$query2);
   	$prod=mysqli_fetch_array($result);
   	$totale[$i][4]=$prod[0];
}
$len=0;
for($i = 0 ; $i < count($totale) ; $i++)
{
	//echo count($totale);
	$len=count($totale[$i][2]);
	for($j = 0 ; $j < $len ; $j++)
	{
		$prodid=$totale[$i][2][$j];
		$prodquant=$totale[$i][3][$j];
		$orderid=$totale[$i][4];
		$query3 = "insert into order_product values($orderid, $prodid, $prodquant)";
		mysqli_query($connect, $query3);
    	$query4 = "update products set prod_quantity = prod_quantity - $prodquant where prod_id=$prodid";
    	mysqli_query($connect, $query4);
	}
}
if(isset($_SESSION['coupon']))
{
	for($i = 0 ; $i < count($_SESSION['coupon']) ; $i++)
	{
		if($_SESSION['coupon'][$i][2]==1)
		{
			$couponverif=$_SESSION['coupon'][$i][1];
			$idvendorvrif=$_SESSION['coupon'][$i][0];
			$query5 = "update coupons set nbr_utilisation = nbr_utilisation + 1 where id_vendor='$idvendorvrif' and code_coupon='$couponverif'";
	   		mysqli_query($connect, $query5);
		}
	}
}
mysqli_close($connect);

for($i = 0 ; $i < count($_SESSION['id'])+1 ; $i++)
{
    unset($_SESSION['id'][$i]);
}
$_SESSION['id'] = array();
header('location:succes.php')
?>