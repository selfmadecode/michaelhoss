<?php SESSION_START(); ?>

<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Eskwela Template</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />

  <!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700,800" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	
	<!-- Flaticons  -->
	<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
		
	<div class="colorlib-loader"></div>

	<div id="page">
			<nav class="colorlib-nav" role="navigation">
	
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-md-12 text-center">
							<div id="colorlib-logo"><a href="index.html"><img style="width: 80px;" src="images/person3.jpg" alt=""></a></div>
						</div>
						<div class="col-md-12 text-center menu-1">
							<ul>
								<li><a href="index.html">Home</a></li>
								<li><a href="about.html">About</a></li>
								<li class="active"><a href="news.html">News</a></li>
								<li><a href="#colorlib-subscribe">Contact</a></li>
								<li><a href="gallery.html">Gallery</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
					
		
	
		<div id="colorlib-subscribe" class="subs-img" style="background-image: url(images/img_bg_2.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center colorlib-heading animate-box">
						<h2>Registration</h2>
						<p>
							<?php 
								if(isset($_SESSION['err_msg']))
								{
									$errors = $_SESSION['err_msg'];
									foreach($errors as $err)
									{
										echo "<span style='color:white'>
										 <b> $err; <br>
										
										
										</span>";
									}
									$fields = $_SESSION['fields']; //the array holding the content of the input fields

								unset($_SESSION['err_msg']);// clears the errors in the session, stops the above code from running
								unset($_SESSION['fields']);
								} else{
									echo "Few inputs and you are in..";
								}
							
							
							?>
						
						
						</p>
					</div>
				</div>
				<div class="row animate-box">
							<div class="col-md-12">
								<form action="<?php echo htmlentities("action.php");?>" method="post">
									<div class="row form-group">
										<div class="col-md-6">
											<!-- <label for="fname">full Name</label> -->
											<input type="text" name="full_name" class="form-control" placeholder="Full Name" value="<?php echo isset($fields['full_name'])? $fields['full_name'] : '' ?>">
                                        </div>
                                        
                                        <div class="col-md-6">
											<!-- <label for="fname">email Name</label> -->
											<input type="email" name="email" class="form-control" placeholder=" Email" value="<?php echo isset($fields['email'])? $fields['email'] : '' ?>">
                                        </div>
                                        <br><br><br>
                                        <div class="col-md-6">
											<!-- <label for="fname">Phone Number</label> -->
											<input type="text" name="phone" class="form-control" placeholder="Your Phone Number" value="<?php echo isset($fields['phone'])? $fields['phone'] : '' ?>">
                                        </div>
										<div class="col-md-6">
											<!-- <label for="fname">confirm password</label> -->
											<input type="password" name="password" class="form-control" placeholder="Enter password">
                                        </div>
                                        <br><br><br>
                                        <div class="col-md-6">
											<!-- <label for="fname">confirm password</label> -->
											<input type="password" name="cpassword" class="form-control" placeholder="Enter password Again">
                                        </div>
										<div class="col-md-6">
											<!-- <label for="lname">date of birth </label> -->
											<input type="date" name="dob" class="form-control" placeholder="Date of Birth" value="<?php echo isset($fields['dob'])? $fields['dob'] : '' ?>">
                                        </div>
                                        <br><br><br>
                                        <div class="col-md-12">
											<!-- <label for="lname">Address</label> -->
											<input type="text" name="address" class="form-control" placeholder="Address" value="<?php echo isset($fields['address'])? $fields['address'] : '' ?>">
										</div>
									</div>

									<div class="form-group text-center">
                                        <input type="submit" name="register" value="Get Me Registered" class="btn btn-primary">
                                        <br> <span style="color:black;">Already registered?</span> <a href="login.php">login</a>
									</div>
								</form>	
							</div>
						</div>
			</div>
		</div>
		<footer id="colorlib-footer">
			<div class="container">
				<div class="row row-pb-md">
					<div class="col-md-3 colorlib-widget">
						<h4>About School</h4>
						<p>Far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics</p>
						<p>
							<ul class="colorlib-social-icons">
								<li><a href="#"><i class="icon-twitter"></i></a></li>
								<li><a href="#"><i class="icon-facebook"></i></a></li>
								<li><a href="#"><i class="icon-linkedin"></i></a></li>
								<li><a href="#"><i class="icon-dribbble"></i></a></li>
							</ul>
						</p>
					</div>
					<div class="col-md-3 colorlib-widget">
						<h4>Quick Links</h4>
						<p>
							<ul class="colorlib-footer-links">
								<li><a href="#"><i class="icon-check"></i> About Us</a></li>
								<li><a href="#"><i class="icon-check"></i> News</a></li>
								<li><a href="#"><i class="icon-check"></i> Contact</a></li>
							</ul>
						</p>
					</div>

					<div class="col-md-3 colorlib-widget">
						<h4>Recent Post</h4>
						<div class="f-blog">
							<a href="blog.html" class="blog-img" style="background-image: url(images/blog-1.jpg);">
							</a>
							<div class="desc">
								<h2><a href="blog.html">Creating Mobile Apps</a></h2>
								<p class="admin"><span>18 April 2018</span></p>
							</div>
						</div>
						<div class="f-blog">
							<a href="blog.html" class="blog-img" style="background-image: url(images/blog-2.jpg);">
							</a>
							<div class="desc">
								<h2><a href="blog.html">Creating Mobile Apps</a></h2>
								<p class="admin"><span>18 April 2018</span></p>
							</div>
						</div>
						<div class="f-blog">
							<a href="blog.html" class="blog-img" style="background-image: url(images/blog-3.jpg);">
							</a>
							<div class="desc">
								<h2><a href="blog.html">Creating Mobile Apps</a></h2>
								<p class="admin"><span>18 April 2018</span></p>
							</div>
						</div>
					</div>

					<div class="col-md-3 colorlib-widget">
						<h4>Contact Info</h4>
						<ul class="colorlib-footer-links">
							<li>291 South 21th Street, <br> Suite 721 New York NY 10016</li>
							<li><a href="tel://1234567920"><i class="icon-phone"></i> + 1235 2355 98</a></li>
							<li><a href="mailto:info@yoursite.com"><i class="icon-envelope"></i> info@yoursite.com</a></li>
							<li><a href="http://luxehotel.com"><i class="icon-location4"></i> yourwebsite.com</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="copy">
				<div class="container">
					<div class="row">
						<div class="col-md-12 text-center">
							<p>
								<small class="block">
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
 <br>With <i class="icon-heart" aria-hidden="true"></i> by <a href="http://portiola.com" target="_blank">Portiola</a>
</small><br> 
							</p>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- Owl carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Counters -->
	<script src="js/jquery.countTo.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>

