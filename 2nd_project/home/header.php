<?php
error_reporting(E_ALL);
ob_start();
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<?php
	$title;
	switch ($_SERVER['PHP_SELF']) {
		case '/2nd_project/index.php':
			$title='Home';
			break;
		case '/2nd_project/about.php':
			$title='About';
			break;
		case '/2nd_project/shopproduct.php':
			$title='Shop Product';
			break;
		case '/2nd_project/mail.php':
			$title='Mail';
			break;
		case '/2nd_project/checkout.php':
			$title='Check Out';
			break;
		default :
			$title='Home';
	}
?>	
<title><?php global $title; echo $title; ?></title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Women's Fashion Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link rel="icon" href="image/favicon.ico" type="image/x-icon">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/fasthover.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="css/flexslider.css">
<!-- js -->
<script src="js/jquery.min.js"></script>
<!-- //js -->
<!-- countdown -->
<link rel="stylesheet" href="css/jquery.countdown.css" />
<!-- //countdown -->
<!-- cart -->
<script src="js/simpleCart.min.js"></script>
<!-- cart -->
<!-- for bootstrap working -->
<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
<!-- //for bootstrap working -->
<link href='//fonts.googleapis.com/css?family=Glegoo:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smooth-scrolling -->
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- //end-smooth-scrolling -->
</head>
<body>
<!--body oncontextmenu="return false;" -->
<!-- header -->
	<div class="header">
		<div class="container">
			<div class="w3l_login">
				<a href="#" data-toggle="modal" data-target="#myModal88"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>
			</div>
			<div class="w3l_logo">
				<h1><a href="index.php">Women's Fashion<span>For Fashion Lovers</span></a></h1>
			</div>
			<div class="search">
				<input class="search_box" type="checkbox" id="search_box">
				<label class="icon-search" for="search_box"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></label>
				<div class="search_form">
					<form action="#" method="post">
						<input type="text" name="Search" placeholder="Search...">
						<input type="submit" value="Send">
					</form>
				</div>
			</div>
			<div class="cart box_1">
				<a href="checkout.php">
					<div class="total">
					<?php
					$sql="SELECT * FROM tbl_cart_temp";
					$conn=$db->prepare($sql);
					$conn->execute();

					$total=0;
					$count=$conn->rowCount();
					$sql="SELECT SUM(product_price) FROM tbl_cart_temp";
					$conn=$db->prepare($sql);
					$conn->execute();
					$result=$conn->fetchAll(PDO::FETCH_ASSOC);
					foreach($result as $row){
						$total +=$row['SUM(product_price)'];
					?>
					<span><?php echo $total; ?>.TK</span> (<?php echo $count;?> items)</div>
					<img src="images/bag.png" alt="" />
					<?php } ?>
				</a>
				<div class="clearfix"> </div>
			</div>	
			<div class="clearfix"> </div>
		</div>
	</div>
	<div class="navigation">
		<div class="container">
			<nav class="navbar navbar-default">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header nav_2">
					<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div> 
				<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
					<ul class="nav navbar-nav">
						<li><a href="index.php" class="<?php if($_SERVER['PHP_SELF']=='/2nd_project/index.php'){echo "act";}else{echo "";}?>">Home</a></li>	
						<!-- Mega Menu -->
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Products <b class="caret"></b></a>
							<ul class="dropdown-menu multi-column columns-3">
								<div class="row">
									<div class="col-sm-3">
										<ul class="multi-column-dropdown">
											<h6>Clothing</h6>
											<li><a href="dresses.html">Dresses<span>New</span></a></li>
											<li><a href="sweaters.html">Sweaters</a></li>
											<li><a href="skirts.html">Shorts & Skirts</a></li>
											<li><a href="jeans.html">Jeans</a></li>
											<li><a href="shirts.html">Shirts & Tops<span>New</span></a></li>
										</ul>
									</div>
									<div class="col-sm-3">
										<ul class="multi-column-dropdown">
											<h6>Ethnic Wear</h6>
											<li><a href="salwars.html">Salwars</a></li>
											<li><a href="sarees.html">Sarees<span>New</span></a></li>
											<li><a href="products.html"><i>Summer Store</i></a></li>
										</ul>
									</div>
									<div class="col-sm-2">
										<ul class="multi-column-dropdown">
											<h6>Foot Wear</h6>
											<li><a href="sandals.html">Flats</a></li>
											<li><a href="sandals.html">Sandals</a></li>
											<li><a href="sandals.html">Boots</a></li>
											<li><a href="sandals.html">Heels</a></li>
										</ul>
									</div>
									<div class="col-sm-4">
										<div class="w3ls_products_pos">
											<h4>50%<i>Off/-</i></h4>
											<img src="images/1.jpg" alt=" " class="img-responsive" />
										</div>
									</div>
									<div class="clearfix"></div>
								</div>
							</ul>
						</li>
						<li><a href="about.php" class="<?php if($_SERVER['PHP_SELF']=='/2nd_project/about.php'){echo "act";}else{echo "";}?>" >About Us</a></li>
						<li><a href="shopproduct.php" class="<?php if($_SERVER['PHP_SELF']=='/2nd_project/shopproduct.php'){echo "act";}else{echo "";}?>" >Shop</a></li>
						<li><a href="mail.php" class="<?php if($_SERVER['PHP_SELF']=='/2nd_project/mail.php'){echo "act";}else{echo "";}?>" >Mail Us</a></li>
						<?php
						if(isset($_SESSION['full_name']) && isset($_SESSION['id'])){
						?>
						<li><a href="logout.php" >Logout</a></li>
						<?php
						}else{
						?>
						<li><a href="productlogin.php">Login</a></li>
						<?php
						}
						?>
					</ul>
				</div>
			</nav>
		</div>
	</div>
<!-- //header -->