<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-ARTISANS</title>
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
	
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>E</span>-ARTISANS</h1>
									<?php
										$query = "SELECT prod_id ,prod_design ,prod_descrip ,prod_photo from products where prod_id=1"; 
										$result = mysqli_query($connect,$query);
										while($prod=mysqli_fetch_row($result))
										{
												echo "<h2>$prod[1] </h2>";
												echo "<p>$prod[2] </p>";
												echo "<a href='product-details.php?num=$prod[0]' class='btn btn-default get'>Get it now</a>";
												echo "</div><div class='col-sm-6'><img src='../../marketplace/pages/products/uploads/$prod[3]' class='girl img-responsive' alt='' />";
												echo "<img src='images/home/pricing.png'  class='pricing' alt='' />";
										}
										echo "</div>";
										echo "</div>";
										echo "<div class='item'>";
										echo "<div class='col-sm-6'>";
										echo "<h1><span>E</span>-ARTISANS</h1>";
										$query = "SELECT prod_id ,prod_design ,prod_descrip ,prod_photo from products where prod_id=3"; 
										$result = mysqli_query($connect,$query);
										while($prod=mysqli_fetch_row($result))
										{
												echo "<h2>$prod[1] </h2>";
												echo "<p>$prod[2] </p>";
												echo "<a href='product-details.php?num=$prod[0]' class='btn btn-default get'>Get it now</a>";
												echo "</div><div class='col-sm-6'><img src='../../marketplace/pages/products/uploads/$prod[3]' class='girl img-responsive' alt='' />";
												echo "<img src='images/home/pricing.png'  class='pricing' alt='' />";
										}
										echo "</div>";
										echo "</div>";
										echo "<div class='item'>";
										echo "<div class='col-sm-6'>";
										echo "<h1><span>E</span>-ARTISANS</h1>";
										$query = "SELECT prod_id ,prod_design ,prod_descrip ,prod_photo from products where prod_id=6"; 
										$result = mysqli_query($connect,$query);
										while($prod=mysqli_fetch_row($result))
										{
												echo "<h2>$prod[1] </h2>";
												echo "<p>$prod[2] </p>";
												echo "<a href='product-details.php?num=$prod[0]' class='btn btn-default get'>Get it now</a>";
												echo "</div><div class='col-sm-6'><img src='../../marketplace/pages/products/uploads/$prod[3]' class='girl img-responsive' alt='' />";
												echo "<img src='images/home/pricing.png' class='pricing' alt='' /></div></div>";
										}
									?>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<?php
							$query = "SELECT categorie_id, categ_design FROM categories";
							$result = mysqli_query($connect,$query);
							echo "<div class='panel panel-default'>";
							echo "<div class='panel-heading'>";
							echo "<h4 class='panel-title'><a href='categorie.php?num=all'>ALL PRODUCTS</a></h4></div></div>";
							while($prod=mysqli_fetch_row($result))
							{
								echo "<div class='panel panel-default'>";
								echo "<div class='panel-heading'>";
								echo "<h4 class='panel-title'><a href='categorie.php?num=$prod[0]'>$prod[1]</a></h4></div></div>";	
							}
						?>
						</div><!--/category-products-->
					</div>
				</div>					
						
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">New arrivals</h2>
						<?php
						$query = "SELECT products.prod_id, products.prod_photo, products.prod_price, products.prod_design, vendors.full_name, vendors.vendor_id FROM vendors , products where products.id_vendor=vendors.vendor_id ORDER BY prod_date DESC limit 6";
						$result = mysqli_query($connect,$query);
						while($prod=mysqli_fetch_row($result))
						{
							echo "<div class='col-sm-4'>";
							echo "<div class='product-image-wrapper'>";
							echo "<div class='single-products'>";
							echo "<div class='productinfo text-center'>";
							echo "<img src='../../marketplace/pages/products/uploads/$prod[1]' alt='' />";
							echo "<h2>$prod[2]$</h2>";
							echo "<p>$prod[3]</p>";				
							echo "<a href='product-details.php?num=$prod[0]' class='btn btn-default add-to-cart'><i class='fa fa-eye'></i>View Product</a>";
							echo "<a href='blog-single.php?num=$prod[5]' class='btn btn-default add-to-cart'><i class='fa fa-home'></i>$prod[4]</a>";
							echo "</div></div></div></div>";
						}
						?>
					
						
					</div><!--features_items-->
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">	
									<?php
									$query = "SELECT products.prod_id, products.prod_photo, products.prod_price, products.prod_design FROM vendors , products where products.id_vendor=vendors.vendor_id ORDER BY rand() DESC limit 6";
									$result = mysqli_query($connect,$query);
									$i=0;
									while($prod=mysqli_fetch_row($result))
									{	
										$i+=1;
										if ($i==4)
										{
											echo "</div><div class='item'>";
											echo "<div class='col-sm-4'>";
											echo "<div class='product-image-wrapper'>";
											echo "<div class='single-products'>";
											echo "<div class='productinfo text-center'>";
											echo "<img src='../../marketplace/pages/products/uploads/$prod[1]' alt='' />";
											echo "<h2>$prod[2]$</h2>";
											echo "<p>$prod[3]</p>";
											echo "<a href='product-details.php?num=$prod[0]' class='btn btn-default add-to-cart'><i class='fa fa-eye'></i>View Product</a>";
											echo "</div></div></div></div>";
										}
										if ($i==6) 
										{
											echo "<div class='col-sm-4'>";
											echo "<div class='product-image-wrapper'>";
											echo "<div class='single-products'>";
											echo "<div class='productinfo text-center'>";
											echo "<img src='../../marketplace/pages/products/uploads/$prod[1]' alt='' />";
											echo "<h2>$prod[2]$</h2>";
											echo "<p>$prod[3]</p>";
											echo "<a href='product-details.php?num=$prod[0]' class='btn btn-default add-to-cart'><i class='fa fa-eye'></i>View Product</a>";
											echo "</div></div></div></div>";
										}
										if ($i==1 or $i==2 or $i==3 or $i==5) 
										{
											echo "<div class='col-sm-4'>";
											echo "<div class='product-image-wrapper'>";
											echo "<div class='single-products'>";
											echo "<div class='productinfo text-center'>";
											echo "<img src='../../marketplace/pages/products/uploads/$prod[1]' alt='' />";
											echo "<h2>$prod[2]$</h2>";
											echo "<p>$prod[3]</p>";
											echo "<a href='product-details.php?num=$prod[0]' class='btn btn-default add-to-cart'><i class='fa fa-eye'></i>View Product</a>";
											echo "</div></div></div></div>";
										}
									}
									?>
								</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</section>
	
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
	

  
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>