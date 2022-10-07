<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login | E-Shopper</title>
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
	
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="signup-form"><!--sign up form-->
							<?php
							if(isset($_GET['crea']))
								echo "<h2>Account created!</h2>";
							else
							{
								echo "<h2>New User Signup!</h2>";
								echo "<form action='createacc.php' method='post'>";
								echo "<input name='name' type='text' placeholder='Full Name'/>";
								if(isset($_GET['auth']))
									echo "<h6>Email already used.</h6>";
								echo "<input name='email' type='email' placeholder='email'/>";
								echo "<input name='addresse1' type='text' placeholder='Adresse 1'/>";
								echo "<input name='addresse2' type='text' placeholder='Adresse 2'/>";
								echo "<input name='codepo' type='text' placeholder='Code Postale'/>";
								echo "<input name='country' type='text' placeholder='Country'/>";
								echo "<input name='city' type='text' placeholder='City'/>";
								echo "<input name='number' type='text' placeholder='Phone Number'/>";
								echo "<input name='password' type='password' placeholder='Password'/>";
								echo "<button type='submit' class='btn btn-default'>Signup</button></form>";
							}
							
							?>
					</div><!--/sign up form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="verifauth.php" method="post">
							<input type="email" name="log" placeholder="Email" />
							<input type="password" name="password" placeholder="Password" />
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	
	
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