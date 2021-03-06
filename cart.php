<?php
    ob_start();
    session_start(); 
    if(!isset($_SESSION["name"])){
		header("location:login.php");
	}
    $conn = new mysqli ('localhost','root','','nis_shop') or die("Connection failed!");
    mysqli_query($conn, 'set names utf8');
?>
<!DOCTYPE html>
<html lang="zxx">
<head>

	<!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Title Tag  -->
    <title> Cart </title> 
	<!-- Web Font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
	
	<!-- StyleSheet -->
	
	<!-- Bootstrap -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Magnific Popup -->
    <link rel="stylesheet" href="css/magnific-popup.min.css">
	<!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.css">
	<!-- Fancybox -->
	<link rel="stylesheet" href="css/jquery.fancybox.min.css">
	<!-- Themify Icons -->
    <link rel="stylesheet" href="css/themify-icons.css">
	<!-- Nice Select CSS -->
    <link rel="stylesheet" href="css/niceselect.css">
	<!-- Animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
	<!-- Flex Slider CSS -->
    <link rel="stylesheet" href="css/flex-slider.min.css">
	<!-- Owl Carousel -->
    <link rel="stylesheet" href="css/owl-carousel.css">
	<!-- Slicknav -->
    <link rel="stylesheet" href="css/slicknav.min.css">
	
	<!-- Eshop StyleSheet -->
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">
	
</head>
<body class="js">
	<form action="" method="post">
	<!-- Preloader -->
	<div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
	<!-- End Preloader -->
	
	<!-- Header -->
	<header class="header shop">
		<!-- Topbar -->
		<div class="topbar">
			<div class="container">
				<div class="row">
					<div class="col-lg-5 col-md-12 col-12">
						<!-- Top Left -->
						<div class="top-left">
							<ul class="list-main">
								<li><i class="ti-headphone-alt"></i> +84 353 687 272 </li>
								<li><i class="ti-email"></i> phamthily.hd98@gmail.com</li>
							</ul>
						</div>
						<!--/ End Top Left -->
					</div>
					<div class="col-lg-7 col-md-12 col-12">
						<!-- Top Right -->
						<div class="right-content">
							<ul class="list-main">
								<li><i class="ti-location-pin"></i><a href="storeLocation.php"> Store location </a></li>
								<li><i class="ti-power-off"></i>
									<?php
										if(isset($_SESSION["name"])){
											echo "<a href='logout.php'> LogOut </a>";
										} else {
											echo "<a href='login.php'> LogIn </a>";
										}
									?> 
									</li>
							</ul>
						</div>
						<!-- End Top Right -->
					</div>
				</div>
			</div>
		</div>
		<!-- End Topbar -->

		<div class="middle-inner">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 col-md-2 col-12">
						<!-- Logo -->
						<div class="logo">
							<a href="index.php"><img src="images/logo.png" alt="logo"></a>
						</div>
						<!--/ End Logo -->
						<div class="mobile-nav"></div>
					</div>
					<div class="col-lg-8 col-md-7 col-12">
						<div class="search-bar-top">
							<div class="search-bar">
								<form>
									<input name="search" placeholder="Search Products Here ..." type="search">
									<button class="btnn" name="i_search"><i class="ti-search"></i></button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-lg-2 col-md-3 col-12">
						<div class="right-bar">
							<!-- Search Form -->
							<div class="sinlge-bar">
								<a href="myAccount.php" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>

							</div>
							<div class="sinlge-bar shopping">
								<?php
									$number = 0;
									$total = 0;
									if (isset($_SESSION["cart"])) {
										$cart = $_SESSION["cart"];
										foreach ($cart as $vl) {
							                $number += (int)$vl["number"];
							                $total += (int)$vl["number"]*(int)$vl["price"];
							            }
									}
								?>
								<a href="cart.php" class="single-icon"><i class="ti-bag"></i><span class="total-count" id="qty"> <?php echo $number ?> </span></a>
								<!-- Shopping Item -->
								<div class="shopping-item">
									<div class="dropdown-cart-header">
										<span> <?php echo $number ?> Items </span>
										<a href="cart.php"> View Cart </a>
									</div>
									<?php 
										if (isset($_SESSION["cart"])) {
											$cart = $_SESSION["cart"];
											foreach ($cart as $vl) { ?>
									<ul class="shopping-list">
										<li>
											<a class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
											<a class="cart-img"><img width=5% height=8% src="images/<?php echo $vl['image'] ?>.png" alt="#"></a>
											<h4><a> <?php echo $vl['name'] ?> </a></h4>
											<p class="quantity"><span class="amount"> $<?php echo $vl['price'] ?> </span></p>
										</li>
									</ul>
									<?php } } ?>
									<div class="bottom">
										<div class="total">
											<span> Total </span>
											<span class="total-amount" id="total"> $<?php echo $total ?> </span>
										</div>
									</div>
								</div>
								<!--/ End Shopping Item -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Header Inner -->
		<div class="header-inner">
			<div class="container">
				<div class="cat-nav-head">
					<div class="row">
						<div class="col-lg-9 col-12">
							<div class="menu-area">
								<!-- Main Menu -->
								<nav class="navbar navbar-expand-lg">
									<div class="navbar-collapse">	
										<div class="nav-inner">	
											<ul class="nav main-menu menu navbar-nav">
												<li><a href="index.php"> Home </a></li>
												<li><a href="product.php"> Product <i class="ti-angle-down"></i></a>
													<ul class="dropdown">
														<li><a href="mac.php"> Mac </a></li>
														<li><a href="ipad.php"> iPad </a></li>
														<li><a href="iphone.php"> iPhone </a></li>
														<li><a href="watch.php"> Watch </a></li>
														<li><a href="airpods.php"> AirPods </a></li>
													</ul>
												</li>												
												<li><a href="service.php"> Service </a></li>
												<li class = "active"><a href=""> Shop <i class="ti-angle-down"></i></a>
													<ul class="dropdown">
														<li><a href="cart.php"> Cart </a></li>
														<li><a href="checkout.php"> Checkout </a></li>
													</ul>
												</li>
												<li><a href="contact.php"> Contact </a></li>
											</ul>
										</div>
									</div>
								</nav>
								<!--/ End Main Menu -->	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/ End Header Inner -->
	</header>
	<!--/ End Header -->

	<!-- Breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="index.php"> Home <i class="ti-arrow-right"></i></a></li>
							<li> Shop <i class="ti-arrow-right"></i></li>
							<li> Cart </li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->

	<!-- Start Product Area -->
    <div id="home" style="margin-top:50px; margin-bottom: 50px;">
        <div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-6">
					<div class="order-summary clearfix">
						<div>
							<h3 class="title" style="margin-bottom: 20px;"> Cart </h3>
						</div>
						<table class="shopping-cart-table table" id="listCart">
							<thead>
								<tr>
									<th> Product </th>
									<th></th>
									<th class="text-center"> Price </th>
									<th class="text-center"> Quantity </th>
									<th class="text-center"> Total </th>
									<th class="text-right"></th>
								</tr>
							</thead>
							<tbody>
							<?php 
								$number = 0;
        						$total = 0;
        						$subtotal = 0;
        						if (isset($_SESSION['cart'])) {
        							$cart = $_SESSION['cart'];
        							foreach ($cart as $key => $vl) { ?>
								<tr>
									<td class="thumb"><img width=10% hight=10% src="images/<?php echo $vl['image'] ?>.png"></td>
									<td class="details">
										<a> <?php echo $vl['name']; ?> </a>
									</td>
									<td class="price text-center">
										<strong> $
											<?php 
												$price = (int)$vl['price'];
												echo $price;
											?>
										</strong>
									</td>
									<td class="qty text-center">
										<input type="number" value="<?php echo $vl['number'] ?>" id="num_<?php echo $key; ?>" onclick="updateCart(<?php echo $key; ?>)" style="width: 4em; border: 1px solid gray; text-align: center;">
									</td>
									<td class="total text-center">
										<strong class="primary-color" id="to_tal"> $ 
											<?php 
												$total = (int)$vl["number"]*(int)$vl["price"];
												$subtotal +=$total; 
												echo $total; 
											?>	
										</strong>
									</td>
									<td class="text-right"><button class="main-btn icon-btn" onclick="deleteCart(<?php echo $key; ?>)"><i class="fa fa-close"></i></button></td>
								</tr>
								<?php } } ?>
							</tbody>
							<tfoot>
								<tr>
									<th class="empty" colspan="3"></th>
									<th> TOTAL </th>
									<th colspan="2" class="total"> $ <?php echo $subtotal; ?></th>
								</tr>
							</tfoot>
						</table>
						<div class="pull-right">
							<button type="submit" class ="btn"><a href="checkout.php"> Place Order </a></button>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
	<!-- End Product Area -->
	
	<!-- Start Shop Services Area -->
	<section class="shop-services section home" style="margin-bottom:100px;">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-rocket"></i>
						<h4> Free shipping </h4>
						<p> Orders over $100 </p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-reload"></i>
						<h4> Free Return </h4>
						<p> Within 30 days returns </p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-lock"></i>
						<h4> Sucure Payment </h4>
						<p> 100% secure payment </p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-tag"></i>
						<h4> Best Peice </h4>
						<p> Guaranteed price </p>
					</div>
					<!-- End Single Service -->
				</div>
			</div>
		</div>
	</section>
	<!-- End Shop Services Area -->
	
<!-- Start Footer Area -->
	<footer class="footer">
		<!-- Footer Top -->
		<div class="footer-top section">
			<div class="container">
				<div class="row">
					<div class="col-lg-5 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer about">
							<div class="logo">
								<a href="index.html"><img src="images/logo2.png" alt="#"></a>
							</div>
							<p class="text"> Love Apple products? You???re in the right place! Shop now and save ??? why wouldn???t you? </p>
							<p class="call"> Got Question? Call us 24/7 <span><a href="tel:0353687272"> +84 353 687 272</a></span></p>
						</div>
						<!-- End Single Widget -->
					</div>
					<div class="col-lg-2 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer links">
							<h4> Information </h4>
							<ul>
								<li><a href="aboutUs.php"> About Us </a></li>
								<li><a href="terms.php"> Terms & Conditions </a></li>
								<li><a href="contact.php"> Contact Us </a></li>
								<li><a href="help.php"> Help </a></li>
							</ul>
						</div>
						<!-- End Single Widget -->
					</div>
					<div class="col-lg-2 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer links">
							<h4> Customer Service </h4>
							<ul>
								<li><a href="paymentMethods"> Payment Methods </a></li>
								<li><a href="returns.php"> Returns </a></li>
								<li><a href="shipping.php"> Shipping </a></li>
								<li><a href="privacyPolicy.php"> Privacy Policy </a></li>
							</ul>
						</div>
						<!-- End Single Widget -->
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer social">
							<h4> Get In Touch </h4>
							<!-- Single Widget -->
							<div class="contact">
								<ul>
									<li><i class="ti-location-pin" style="color:#F7941D"></i>&nbsp No.136, Xuan Thuy Street, Cau </li>
									<li> &nbsp&nbsp&nbsp&nbsp&nbsp Giay District, Ha Noi, Viet Nam </li>
									<li><i class="ti-email" style="color:#F7941D"></i>&nbsp phamthily.hd98@gmail.com </li>
									<li><i class="ti-headphone-alt" style="color:#F7941D"></i>&nbsp +84 353 687 272 </li>
								</ul>
							</div>
							<!-- End Single Widget -->
							<ul>
								<li><a href="https://www.facebook.com/pham.ly.08061998/"><i class="ti-facebook"></i></a></li>
								<li><a href="https://twitter.com/phamlyhd8698"><i class="ti-twitter"></i></a></li>
								<li><a href="https://www.instagram.com/nis_hd98/"><i class="ti-instagram"></i></a></li>
							</ul>
						</div>
						<!-- End Single Widget -->
					</div>
				</div>
			</div>
		</div>
		<!-- End Footer Top -->
		<div class="copyright">
			<div class="container">
				<div class="inner">
					<div class="row">
						<div class="col-lg-6 col-12">
							<div class="left">
								<p> Copyright ?? <script> document.write(new Date().getFullYear()) </script> Nis Inc. All Rights Reserved. </p>
							</div>
						</div>
						<div class="col-lg-6 col-12">
							<div class="right">
								<img src="images/payment-method.png" alt="#">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- /End Footer Area -->
	</form>
 
	<!-- Jquery -->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<!-- Popper JS -->
	<script src="js/popper.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Color JS -->
	<script src="js/colors.js"></script>
	<!-- Slicknav JS -->
	<script src="js/slicknav.min.js"></script>
	<!-- Owl Carousel JS -->
	<script src="js/owl-carousel.js"></script>
	<!-- Magnific Popup JS -->
	<script src="js/magnific-popup.js"></script>
	<!-- Fancybox JS -->
	<script src="js/facnybox.min.js"></script>
	<!-- Waypoints JS -->
	<script src="js/waypoints.min.js"></script>
	<!-- Countdown JS -->
	<script src="js/finalcountdown.min.js"></script>
	<!-- Nice Select JS -->
	<script src="js/nicesellect.js"></script>
	<!-- Ytplayer JS -->
	<script src="js/ytplayer.min.js"></script>
	<!-- Flex Slider JS -->
	<script src="js/flex-slider.js"></script>
	<!-- ScrollUp JS -->
	<script src="js/scrollup.js"></script>
	<!-- Onepage Nav JS -->
	<script src="js/onepage-nav.min.js"></script>
	<!-- Easing JS -->
	<script src="js/easing.js"></script>
	<!-- Active JS -->
	<script src="js/active.js"></script>
<!-- 	<script type="js/cart.js"></script> -->
	<script>
		function addCart(id_product){
			$.post("shoppingcart.php",{'id_product':id_product}, function(data, status){
			    item = data.split("-");
			    $("#qty").text(item[0]);
			    $("#total").text(item[1]);
			});
		}
		function updateCart(id_product){
			num = $("#num_"+id_product).val();
			$.post("updateCart.php",{'id_product':id_product, 'num':num}, function(data){
				$("#listCart").load('http://localhost/NiShop/Nis-Shop/cart.php #listCart');
			});
		}
		function deleteCart(id_product){
			$.post("updateCart.php",{'id_product':id_product, 'num':0}, function(data){
				$("#listCart").load('http://localhost/NiShop/Nis-Shop/cart.php #listCart');
			});
		}
	</script>
</body>
</html>