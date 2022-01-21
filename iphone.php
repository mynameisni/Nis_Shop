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
    <title> iPhone </title> 
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
<?php
    error_reporting(0);
    session_start(); 
    if(isset($_POST['i_search'])){
        $_SESSION['content_search'] = $_POST['search']; 
        header('location: search.php');
    } 
?>
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
									<input name="search" placeholder="Search Products Here....." type="search">
									<button class="btnn" name="i_search"><i class="ti-search"></i></button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-lg-2 col-md-3 col-12">
						<div class="right-bar">
							<!-- Search Form -->
							<div class="sinlge-bar">
								<a href="#" class="single-icon"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
							</div>
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
												<li class = "active"><a href="product.php"> Product <i class="ti-angle-down"></i></a>
													<ul class="dropdown">
														<li><a href="mac.php"> Mac </a></li>
														<li><a href="ipad.php"> iPad </a></li>
														<li><a href="iphone.php"> iPhone </a></li>
														<li><a href="watch.php"> Watch </a></li>
														<li><a href="airpods.php"> AirPods </a></li>
													</ul>
												</li>												
												<li><a href="service.php"> Service </a></li>
												<li><a href="#"> Shop <i class="ti-angle-down"></i></a>
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
							<li><a href="product.php"> Products <i class="ti-arrow-right"></i></a></li>
							<li> iPhone </li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->
	
	<!-- Start Product Area -->
    <div class="product-area section">
            <div class="container">
				<div class="row">
					<div class="col-12">
						<div class="section-title">
							<h2> iPhone Products </h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="product-info">
							<div class="tab-content" id="myTabContent">
								<!-- Start Single Tab -->
								<div class="tab-pane fade show active" id="man" role="tabpanel">
									<div class="tab-single">
										<div class="row">
											<?php
									            $conn = new mysqli ('localhost','root','','nis_shop') or die("Connection failed!");
    											mysqli_query($conn, 'set names utf8');
									            $sqlSelect = "SELECT * FROM `products` WHERE id_category = '3' order by mfg desc "; 
									            $result = mysqli_query($conn,$sqlSelect) ;
		                                        if (mysqli_num_rows($result) > 0) {
		                                            while ($r = mysqli_fetch_assoc($result)) {
									        ?>
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">

												<div class="single-product">
													<div class="product-img">
														<a data-toggle="modal" data-target="#exampleModal" >
															<img class="default-img" src="images/<?php echo $r["image"]?>.png" alt="#">
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Product View View"><i class=" ti-eye"></i><span> View </span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span> Add to Wishlist </span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#"> Add to cart </a>
															</div>
														</div>
													</div>

													<div class="product-content">
														<h3><a data-toggle="modal" data-target="#exampleModal"> <?php echo $r['product_name']; ?> </a></h3>
														<div class="product-price">
															<span>$<?php echo $r['price']?></span>
														</div>
													</div>
												</div>
											</div>
											<?php 
									            } ;
									        ?>
										</div>
									</div>
								</div>
								<!--/ End Single Tab -->
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
						<h4>Free shipping</h4>
						<p>Orders over $100</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-reload"></i>
						<h4>Free Return</h4>
						<p>Within 30 days returns</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-lock"></i>
						<h4>Sucure Payment</h4>
						<p>100% secure payment</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-tag"></i>
						<h4>Best Peice</h4>
						<p>Guaranteed price</p>
					</div>
					<!-- End Single Service -->
				</div>
			</div>
		</div>
	</section>
	<!-- End Shop Services Area -->
	
	<!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row no-gutters">
							<div class="col-lg-6 offset-lg-3 col-12">
								<h4 style="margin-top:100px;font-size:14px; font-weight:500; color:#F7941D; display:block; margin-bottom:12px;">Eshop Free Lite</h4>
								<h3 style="font-size:30px;color:#333;">Currently You are using free lite Version of Eshop.<h3>
								<p style="display:block; margin-top:20px; color:#888; font-size:14px; font-weight:400;">Please, purchase full version of the template to get all pages, features and commercial license</p>
								<div class="button" style="margin-top:30px;">
									<a href="https://wpthemesgrid.com/downloads/eshop-ecommerce-html5-template/" target="_blank" class="btn" style="color:#fff;">Buy Now!</a>
								</div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <!-- Modal end -->
	
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
							<p class="text"> Love Apple products? You’re in the right place! Shop now and save – why wouldn’t you? </p>
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
								<p> Copyright © 2021 Nis Inc. All Rights Reserved. </p>
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

</body>
</html>