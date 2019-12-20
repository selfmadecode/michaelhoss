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
	//connecting to the database
	$connect = mysqli_connect('localhost', 'root', '', 'encodeup_internship');
	if(!$connect)
		die('Connection Error');

	
	$user_id = $_SESSION['user']['id']; //fetches the id of the logged in user

	$title="";
	$content = "";
	$update = false;


// deleting a post
    if(isset($_GET['delete'])){ //if the edit button is clicked
		$id = $_GET['delete']; //fetch the content in the superglobal $_GET edit variable


		//fetches the content of the post with the specific id
		$sql = "DELETE FROM post WHERE id = '$id'";
		$dquery = mysqli_query($connect, $sql);
    
        if(!$dquery){
		die('Query Error!'. mysqli_error($connect));
	   }else
            $_SESSION['deleted'] = "<h1 style='Text-align: Center';>Post Deleted successfully..</h1>";
	}

	//Editing a post

	if(isset($_GET['edit'])){ //if the edit button is clicked
		$id = $_GET['edit']; //fetch the content in the superglobal $_GET edit variable


		//fetches the content of the post with the specific id
		$sql = "SELECT * FROM post WHERE id = '$id'";
		$query = mysqli_query($connect, $sql);
		$rs = mysqli_fetch_assoc($query);

		//display the content in the input form field
		$title = $rs['title'];
		$content = $rs['content'];
		$edit_id = $rs['id'];
		$update = true;
	}

	//fetch the record of the user
	$sql = "SELECT * FROM post WHERE user_id = '$user_id'";
	$query = mysqli_query($connect, $sql);
	if(!$query){
		die('Query Error!'. mysqli_error($connect));
	}
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
								<li class="btn-cta"><a href="#"><span>Logout</span></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
					<div class="upper-menu">
				<div class="container">
					<div class="row">
						<div class="col-xs-4">
							<p>Welcome <?php echo $_SESSION['user']['name'] ?></p>
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
							<p class="btn-apply"><a href="#">Logout</a></p>
						</div>
					</div>
				</div>
			</div>
		</nav>
		
		<?php 
            if(isset($_SESSION['deleted'])){
               echo $_SESSION['deleted'];
                unset  ($_SESSION['deleted']);
            }
        
        
        ?>
		
		<div class="colorlib-blog colorlib-light-grey">
			<div class="container">
				<div class="row">
				

				<?php while($rs = mysqli_fetch_assoc($query)) { ?>

					<div class="col-md-4 animate-box">
						<article class="article-entry">
							<a href="blog.html" class="blog-img" style="background-image: url(images/blog-1.jpg);">
								<p class="meta"><span class="day"><?php echo date("d", strtotime($rs['date'])); ?></span><span class="month"><?php echo date("M", strtotime($rs['date'])); ?></span></p>
							</a>
							<div class="desc" style="word-wrap: break-word;">
								<h2><a href="blog.html"><?php echo $rs['title']; ?></a></h2>
								<!-- <p class="admin"><span>Posted by:</span> <span>Poster</span></p> -->
								<p><?php echo strlen($rs['content']) > 225 ? substr($rs['content'], 0, 225) . ' <a href="#">[...]</a>' : $rs['content']; ?></p>
								<div class="row">
									<div class="form-group col-md-6">
									<a href="user.php?edit=<?php echo $rs['id']; ?>"><input type="submit" value="Edit" class="btn btn-primary"></a>
									</div>

									<div class="form-group col-md-6">
										<a href="user.php?delete=<?php echo $rs['id']; ?>"><input type="submit" value="Delete" class="btn btn-danger"></a>
									</div>
								</div>
							</div>
						</article>
					</div>
				<?php } ?>
					<!-- <div class="col-md-4 animate-box">
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
					</div> -->
				</div>
			</div>
		</div>
	
			<div id="colorlib-subscribe" class="subs-img" style="background-image: url(images/img_bg_2.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center colorlib-heading animate-box">
						<h2><?php 
						
							if(isset($_SESSION['post']))
								{
									echo ($_SESSION['post']);
								unset($_SESSION['post']);
								} else{
									echo "Make a post let the world hear you";
								};
						?></h2>
						<p>Let the world hear you!</p>
					</div>
				</div>
				<div class="row animate-box">
							<div class="col-md-12">
								<form action="<?php echo htmlentities("action.php");?>" method="post">
								<input type="hidden" name="update_id" value="<?php if(isset($edit_id)) echo $edit_id; ?>">
									
									<div class="row form-group">
										<div class="col-md-12">
											<!-- <label for="fname">First Name</label> -->
											<input type="text" id="fname" class="form-control" placeholder="Post Title" name='post_title' value="<?php echo $title ?>"  >
										</div>
									</div>
									
									<!-- <div class="row form-group">
										<div class="col-md-12">
											<input type="file" id="file" name="img_post"  class="form-control">
										</div>
									</div> -->

									<div class="row form-group">
										<div class="col-md-12">
											<!-- <label for="message">Message</label> -->
											<textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Post"> <?php echo $content ?>  </textarea>
										</div>
									</div>
									<div class="form-group text-center">
										<input type="submit" name="<?php echo $update ? 'update' : 'submit'; ?>" value="<?php echo $update ? 'Update Post' : 'Make Your Post'; ?>" class="btn btn-primary">
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

