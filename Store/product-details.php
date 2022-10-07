<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Product Details | E-Shopper</title>
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
	</header>
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<div class="brands_products"><!--brands_products-->
							<h2>Store</h2>
							<div class="single-products">
								<div class="productinfo text-center">
									<?php 
									$num1=$_GET['num'];
									$query = "SELECT full_name, photo_store, vendor_id from vendors , products where products.prod_id=$num1 and products.id_vendor=vendors.vendor_id"; 
									$result = mysqli_query($connect,$query);
									$vendor_id = 0;
									while($prod=mysqli_fetch_array($result))
									{
										$vendor_id = $prod[2];
										echo "<img class='product-image-wrapper' src='../../marketplace/pages/vendor/uploads/$prod[1]' alt='' /><h2>$prod[0]</h2>";
										echo "<a href='blog-single.php?num=$prod[2]' class='btn btn-default add-to-cart'>View profile</a>";
									}
								?>
								</div>
							</div>
						</div>
						
					</div>
				</div>
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<?php 

									$num=$_GET['num'];
									$query = "SELECT prod_photo from products  where prod_id=$num"; 
									$result = mysqli_query($connect,$query);
										while($prod=mysqli_fetch_array($result))
										{
											echo "<img src='../../marketplace/pages/products/uploads/$prod[0]' alt='' />";
										}
									echo "</div><div id='similar-product' class='carousel slide' data-ride='carousel'>";
								 	echo "<a class='left item-control' href='#similar-product' data-slide='prev'>";
									echo "</a>";
								    echo "<a class='right item-control' href='#similar-product' data-slide='next'>";
									echo "</i></a></div></div>";
									echo "<div class='col-sm-7'>";
									echo "<div class='product-information'>";
									$query = "SELECT products.prod_design ,products.prod_price ,products.prod_quantity ,products.prod_descrip, vendors.vendor_id from products, vendors  where vendors.vendor_id=products.id_vendor and products.prod_id=$num"; 
									$result = mysqli_query($connect,$query);
										while($prod=mysqli_fetch_array($result))
										{

											echo "<h1>$prod[0]</h1>";
											echo "<h2>Price : $prod[1]$</h2>";
											if($prod[2]!=0)
											{
												echo "<h2>Quantity :<h2><form action='addcart.php?id=$num&vendorid=$prod[4]&proquantity=$prod[2]' method='post'><input type='number' min=1 max=$prod[2] name='quantity' value='1' /><br><br>";
												echo "<input value='Add to cart' class='btn btn-fefault cart' type='submit'></form>";
												$avai=" ".$prod[2]." Available in stock";
											}
											if($prod[2]==0)
											{
												$avai="Out of stock";
											}
											echo "<p><b>Availability:</b>$avai<br></p>";
											echo "</div></div></div>";
											echo "<div class='category-tab shop-details-tab'>";
						
											echo "<div class='col-sm-12'>";
											echo "<ul class='nav nav-tabs'>";
											echo "<li class='active'><a href='#details' data-toggle='tab'>Details</a></li>";
											echo "<li><a href='#reviews' data-toggle='tab'>Reviews</a></li>";
											echo "</ul>";
											echo "</div>";
											echo "<div class='tab-content'>";
											echo "<div class='tab-pane fade active in' id='details' >";
											echo "<div class='col-sm-12'>";
											echo "<p>$prod[3]</p></div></div>";
										}
							?>
							<div class="tab-pane fade" id="reviews" >
								<div class="col-sm-12">
									
							<?php
								$num=$_GET['num'];
								$query = "SELECT reviews.reviewer_name, reviews.reviewer_email, reviews.review_date, reviews.review_content  from products, reviews where products.prod_id=reviews.prod_id and reviews.prod_id=$num"; 
								$result = mysqli_query($connect,$query);
								while($prod=mysqli_fetch_array($result))
								{
										echo "<ul><li><i class='fa fa-user'></i>&nbsp;$prod[0]&nbsp;&nbsp;&nbsp;</li>";
										echo "<li><i class='fa fa-envelope'></i>&nbsp;$prod[1]&nbsp;&nbsp;&nbsp;</li>";
										echo "<li><i class='fa fa-calendar-o'></i></li>&nbsp;$prod[2]</ul>";
										echo "<p>$prod[3]<br><br><br><br></p>";
									

								}
							?>		
							<p><b>Write Your Review</b></p>							
									<form action="addreview.php?id=<?php echo $num; ?>" method="post">
										<span>
											<input id="prodId" name="vendorid" type="hidden" value="<?php echo $vendor_id;?>">
											<input type="text" name="name" placeholder="Your Name"/>
											<input type="email" name="email" placeholder="Email Address"/>
										</span>
										<textarea name="review" ></textarea>


										<input value="Submit" class="btn btn-default pull-right" type="submit">
										
									</form>
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">	
									<?php
									$num1=$_GET['num'];
									$query = "SELECT vendor_id from vendors , products where products.prod_id=$num1 and products.id_vendor=vendors.vendor_id"; 
									$result = mysqli_query($connect,$query);
									$prod=mysqli_fetch_row($result);
									$vendor_id=$prod[0];
									$query = "SELECT products.prod_id, products.prod_photo, products.prod_price, products.prod_design FROM vendors , products where products.id_vendor=vendors.vendor_id and vendors.vendor_id=$vendor_id ORDER BY rand() DESC limit 6";
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