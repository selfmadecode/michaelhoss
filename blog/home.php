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
	<?php
        
        $connect = mysqli_connect('localhost', 'root', '', 'encodeup_internship');
        if(!$connect){
            die("Connection Error");
        }
        
        $sql = "SELECT * FROM post";
        $query = mysqli_query($connect, $sql);
    ?>
		
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
								<li class="btn-cta"><a href="#"><span>Portal</span></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
					<div class="upper-menu">
				<div class="container">
					<div class="row">
						<div class="col-xs-4">
<!--							<p><?php echo $_SESSION['user']['name'] ?></p>-->
						</div>
						<div class="col-xs-6 col-md-push-2 text-right">
							<p>
								<ul class="colorlib-social-icons">
									<li><a href="#"><i class="icon-twitter"></i></a></li>
									<li><a href="#"><i class="icon-facebook"></i></a></li>
									<li><a href="#"><i class="icon-linkedin"></i></a></li>
									<li><a href="#"><i class="icon-dribbble"></i></a></li>
								</ul>
							</p>
							<p class="btn-apply"><a href="#">Go to Portal </a></p>
						</div>
					</div>
				</div>
			</div>
		</nav>
		<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url(images/img_bg_2.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-sm-12 col-md-offset-3 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h1>News</h1>
				   					<h2><span><a href="index.html">Home</a> | News</span></h2>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>
		
		<div class="colorlib-blog colorlib-light-grey">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center colorlib-heading animate-box">
						<h2>Read Our News</h2>
						<p>Get the full gist of every of our latest news on this page</p>
					</div>
				</div>
				<?php
                    while ($rs = mysqli_fetch_assoc($query)){
                        $title = $rs['title'];
                        $content = $rs['content'];
                    
                
                
                ?>
				<div class="row">
				
					<div class="col-md-4 animate-box">
						<article class="article-entry">
							<a href="blog.html" class="blog-img" style="background-image: url(images/blog-1.jpg);">
								<p class="meta"><span class="day"><?php echo date("d", strtotime($rs['date'])); ?></span><span class="month"><?php echo date("M", strtotime($rs['date'])); ?></span></p>
							</a>
							<div class="desc">
								<h2><a href="blog.html"><?php if(isset($rs['title'])){echo $rs['title'];} ?></a></h2>
								<p class="admin"><span>Posted by:</span> <span>Poster</span></p>
								<p><?php if(isset($rs['content'])){echo $rs['content'];} ?></p>
							</div>
						</article>
					</div>
					<?php } ?>
<!--
					<div class="col-md-4 animate-box">
						<article class="article-entry">
							<a href="blog.html" class="blog-img" style="background-image: url(images/blog-1.jpg);">
								<p class="meta"><span class="day">18</span><span class="month">Apr</span></p>
							</a>
							<div class="desc">
								<h2><a href="blog.html">Sample News Title</a></h2>
								<p class="admin"><span>Posted by:</span> <span>Poster</span></p>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure non nam expedita cum asperiores quia totam neque vitae necessitatibus quaerat officia, quo aperiam hic nihil laborum quod adipisci blanditiis enim?</p>
							</div>
						</article>
					</div>
-->
<!--
					<div class="col-md-4 animate-box">
						<article class="article-entry">
							<a href="blog.html" class="blog-img" style="background-image: url(images/blog-1.jpg);">
								<p class="meta"><span class="day">18</span><span class="month">Apr</span></p>
							</a>
							<div class="desc">
								<h2><a href="blog.html">Sample News Title</a></h2>
								<p class="admin"><span>Posted by:</span> <span>Poster</span></p>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure non nam expedita cum asperiores quia totam neque vitae necessitatibus quaerat officia, quo aperiam hic nihil laborum quod adipisci blanditiis enim?</p>
							</div>
						</article>
					</div>
-->
				</div>
			</div>
		</div>
	
			<div id="colorlib-subscribe" class="subs-img" style="background-image: url(images/img_bg_2.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center colorlib-heading animate-box">
						<h2>Contact Us</h2>
						<p>We are just a message away</p>
					</div>
				</div>
				<div class="row animate-box">
							<div class="col-md-12">
								<form action="#">
									<div class="row form-group">
										<div class="col-md-6">
											<!-- <label for="fname">First Name</label> -->
											<input type="text" id="fname" class="form-control" placeholder="Your Name">
										</div>
										<div class="col-md-6">
											<!-- <label for="lname">Last Name</label> -->
											<input type="text" id="lname" class="form-control" placeholder="Email Address">
										</div>
									</div>

									<div class="row form-group">
										<div class="col-md-12">
											<!-- <label for="message">Message</label> -->
											<textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Say something about us"></textarea>
										</div>
									</div>
									<div class="form-group text-center">
										<input type="submit" value="Send your message" class="btn btn-primary">
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

