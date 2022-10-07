<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Cart | E-Shopper</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
	
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.php"><img src="images/home/logo.png" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="../../marketplace/pages/auth/register.php"><i class="fa fa-user"></i> Create Your store</a></li>
								<li><a href="cart.php">
								<?php
									session_start();
									if(!isset($_SESSION['id']))
											$_SESSION['id'] = array();
									$num_orders=count($_SESSION['id']);
									echo "<span class='badge badge-warning' id='lblCartCount'>$num_orders</span><i class='fa fa-shopping-cart'> Cart </i></a>";
									echo "</li>";
									require'connexion.php';


									if(!isset($_SESSION['user']))
									{
										echo "<li><a href='login.php'><i class='fa fa-lock'></i> Login </a></li>";
									}
									else
										echo "<li><a href='logout.php'><i class='fa fa-lock'></i> Logout</a></li>";
								?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php" class="active">Home</a></li>
                                <li class="dropdown"><a href="#">Category<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                    	<?php
										$query = "SELECT categorie_id, categ_design FROM categories"; 
										$result = mysqli_query($connect,$query);
										echo "<li><a href='categorie.php?num=all'>ALL PRODUCTS</a></li>";
										while($prod=mysqli_fetch_row($result))
										{
										echo "<li><a href='categorie.php?num=$prod[0]'>$prod[1]</a></li>";
										}
										?>
                                    </ul>
                                </li>  
								<li><a href="artisans.php">Artisans</a></li>
								<li><a href="contact-us.php">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<form action="search.php" method="post">
								<table>
       								<td>
										<input type="text" placeholder="Search Product" name="search"/>
										<!--/<input value="Search" type="submit">-->
									</td>
						
							</form>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	</header><!--/header-->

	<section id="cart_items">
		<div class="container">
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						
							<?php
							$Totale=0;
							$Totaletax = 0;
							$coupon_prod_qu=array();
							for($i = 0 ; $i < count($_SESSION['id']) ; $i++)
							{
								$SESS = $_SESSION['id'][$i];
								$query = "SELECT prod_photo, prod_design, prod_price from products where prod_id=$SESS[0]"; 
								$result = mysqli_query($connect,$query);
								while($prod=mysqli_fetch_array($result))
								{
									echo "<tr>";
									echo "<td class='cart_product'><a href=''><img src='../../marketplace/pages/products/uploads/$prod[0]' alt='' width='100' height='100'></a></td>";
									
									echo "<td class='cart_description'>";
									echo "<h4><a href='product-details.php?num=$SESS[0]'>&ensp;&ensp;&ensp;&ensp;$prod[1]</a></h4>";
									echo "</td>";
									echo "<td class='cart_price'>";
									echo "<p>$prod[2]$</p>";
									echo "</td>";
									echo "<td class='cart_price'>";
									echo "<p>&ensp;&ensp;&ensp;$SESS[1]</p>";
									echo "</td>";
									echo "<td class='cart_total'>";
									$totale= $prod[2]*$SESS[1];
									$Totaletax=$Totaletax+$totale;
									array_push($coupon_prod_qu,array($totale));
									echo "<p class='cart_total_price'>$totale$</p>";
									echo "</td>";
									echo "<td class='cart_delete'>";
									echo "<a class='cart_total_price' href='delcart.php?num1=$SESS[0]'><i class='fa fa-times'></i></a></td>";
									echo "</tr>";
								}

							}

							?>


					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="row">
							<?php
							$vendors = array();
							for($i = 0 ; $i < count($_SESSION['id']) ; $i++)
							{
								array_push($vendors,$_SESSION['id'][$i][2]);
							}
							$vendors=array_unique($vendors);
							$vendors=array_values($vendors);
							if(count($vendors)!=0)
							{
								echo "<div class='col-sm-6'>";
								echo "<div class='total_area'><ul>";
								echo "<h2> Coupon : </h2>";
								if(!isset($_SESSION['coupon']))
								{
									$n=count($vendors);
									echo "<form action='addcoupon.php?numvendors=$n' method='post'>";
									for($i = 0 ; $i < count($vendors) ; $i++)
									{
										array_push($coupon_prod_qu[$i],1);
										$query = "SELECT name_store from vendors where vendor_id=$vendors[$i]";
										$result = mysqli_query($connect,$query);
										while($prod=mysqli_fetch_array($result))
										{
											$j=$i+100;
											echo "<li>$prod[0] <span><input name=$i type='text'></span></li>";
											echo "<input type='hidden' name=$j value=$vendors[$i]>";
										}
									}
									echo "</ul>&nbsp;&nbsp;&nbsp;&nbsp;<button type='submit' class='btn btn-default'>Update</button></form>";
									echo "</div></div>";
								}
								if(isset($_SESSION['coupon']))
								{
									$n=count($vendors);
									echo "<form action='addcoupon.php?numvendors=$n' method='post'>";
									for($i = 0 ; $i < count($vendors) ; $i++)
									{
										$query = "SELECT name_store from vendors where vendor_id=$vendors[$i]";
										$result = mysqli_query($connect,$query);
										while($prod=mysqli_fetch_array($result))
										{
											if(!isset($_SESSION['coupon'][$i][2]))
											{
												array_push($coupon_prod_qu[$i],1);
												$query = "SELECT name_store from vendors where vendor_id=$vendors[$i]";
												$result = mysqli_query($connect,$query);
												while($prod=mysqli_fetch_array($result))
												{
													$j=$i+100;
													echo "<li>$prod[0] <span><input name=$i type='text'></span></li>";
													echo "<input type='hidden' name=$j value=$vendors[$i]>";
												}
											}
											else
											{
												if($_SESSION['coupon'][$i][2]==1)
												{
													$j=$i+100;
													$couponverif=$_SESSION['coupon'][$i][1];
													$idvendorvrif=$_SESSION['coupon'][$i][0];
													$query = "select value_coupon from coupons where id_vendor='$idvendorvrif' and code_coupon='$couponverif'";
													$result=mysqli_query($connect, $query);
													$data=mysqli_fetch_array($result); 
													$new_per=(100-$data[0])/100;
													array_push($coupon_prod_qu[$i],$new_per);
													echo "<li>$prod[0] <span> $couponverif </span></li>";
													echo "<input type='hidden' name=$i value=$couponverif>";
													echo "<input type='hidden' name=$j value=$vendors[$i]>";
												}
												if($_SESSION['coupon'][$i][2]==0)
												{
													array_push($coupon_prod_qu[$i],1);
													$j=$i+100;
													$couponverif=$_SESSION['coupon'][$i][1];
													echo "<li>$prod[0] <span><input name=$i type='text'></span></li>";
													echo "<input type='hidden' name=$j value=$vendors[$i]>";
												}
												
											}
										}
									}
									echo "</ul>&nbsp;&nbsp;&nbsp;&nbsp;<button type='submit' class='btn btn-default'>Update</button></form>";
									echo "</div></div>";
								}
							}
							?>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Shipping Cost <span>Free</span></li>
							<?php
							echo "<li>Price <span>$Totaletax$</span></li>";
							for($i = 0 ; $i < count($coupon_prod_qu) ; $i++)
							{
								$Totale=$Totale+($coupon_prod_qu[$i][0]*$coupon_prod_qu[$i][1]);
							}
							$diff=$Totale-$Totaletax;
							echo "<li>Difference <span>$diff$</span></li>";
							echo "<li>Totale <span>$Totale$</span></li>";
							?>
						</ul>
							<?php
							if(!isset($_SESSION['user']))
							{
								echo "<a class='btn btn-default check_out' href='login.php'>Check Out</a>";
							}
							else
								echo "<a class='btn btn-default check_out' href='addroder.php'>Check Out</a>";
							?>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><span>e</span>-artisans</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
		
	</footer><!--/Footer-->
	



</body>
</html>