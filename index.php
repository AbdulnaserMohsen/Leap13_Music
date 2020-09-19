<?PHP
	$loggedin = false;
	session_start();
	if(isset($_SESSION['loggedin']) && $_SESSION['name'] != '') 
	{
		$loggedin = true;
	}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Leap13 Music Task</title>
		<!-- Description, Keywords and Author -->
		<meta name="description" content="Your description">
		<meta name="keywords" content="Your,Keywords">
		<meta name="author" content="HimanshuGupta">
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- Styles -->
		<!-- Bootstrap CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">	
		<!-- Animate CSS -->
		<link href="css/animate.min.css" rel="stylesheet">
		<!-- Basic stylesheet -->
		<link rel="stylesheet" href="css/owl.carousel.css">
		<!-- Font awesome CSS -->
		<link href="css/font-awesome.min.css" rel="stylesheet">		
		<!-- Custom CSS -->
		<link href="css/style.css" rel="stylesheet">
		<link href="css/style-color.css" rel="stylesheet">
		<link href="css/developer.css" rel="stylesheet">
		<link href="css/loginAndRegister.css" rel="stylesheet">
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="img/logo/icon1.png">
	</head>
	
	<body>
		
		<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header text-center">
		         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body mx-3">
		        <div class="registerArea ">
					  <div class="wrapper ">
						<form class="login validate-form" method="POST" id="login_form"data-file="">
						  
						  <div class="profile">
							<img src="img/logo/biglogo.png" alt="Logo" title="Logo" >
						  </div>
						  
						  <div class="form-element validate-input " data-validate="username just contains characters, numbers , underscore(_) and dot(.)">
							<div class="ay7aga">
							  <span><i class="fa fa-user"></i> Username:</span>
							  <input name="username" type="text" placeholder="abc_def" value="" required autocomplete="username" />
							</div>
						  </div>
						  
						  <div class="form-element validate-input " data-validate="password must be at least 8 characters">
							<div class="ay7aga">
							  <span><i class="fa fa-lock"></i> Password:</span>
							  <input name="password" type="password" placeholder="********" required autocomplete="current-password"/>
							</div>
						  </div>
						  
						  <button type="submit" class="btn-login">Login <i class="fa fa-sign-in"></i></button>
						</form>

					  </div>
					</div>

		      </div>
		    </div>
		  </div>
		</div>

		<!-- wrapper -->
		<div class="wrapper" id="home">
		
			<!-- header area -->
			<header id="header">
				<div id="all_nav">
					<!-- secondary menu -->
					<nav class="secondary-menu">
						<div class="container">
							<!-- secondary menu left link area -->
							<div class="sm-left">
								<a href="#"> <strong><i class="fa fa-user"></i> Account</strong> </a>
							</div>
							<!-- secondary menu right link area -->
							<div class="sm-right">
								<!-- social link -->
								<div class="sm-social-link">
									<a class="h-facebook" href="#"><i class="fa fa-facebook"></i></a>
									<a class="h-twitter" href="#"><i class="fa fa-twitter"></i></a>
									<a class="h-google" href="#"><i class="fa fa-google-plus"></i></a>
									<a class="h-linkedin" href="#"><i class="fa fa-linkedin"></i></a>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
					</nav>
					<!-- primary menu -->
					<nav class="navbar navbar-fixed-top navbar-default">
						<div class="container">
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header">
								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<!-- logo area -->
								<a class="navbar-brand" href="#home">
									<!-- logo image -->
									<img class="img-responsive" src="img/logo/logo1.png" alt="Logo" />
								</a>
							</div>

							<!-- Collect the nav links, forms, and other content for toggling -->
							<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
								<ul class="nav navbar-nav navbar-right">
									<li><a href="#latestalbum">Latest Music</a></li>
									<?PHP
										if (!$loggedin) 
										{
											echo '<li ><a id="log" href="#" data-toggle="modal" data-target="#modalLoginForm">Login</a></li>';
										}
										else
										{
											echo '<li><a href="logout.php">Logout</a></li>';
										}

									?>
									
								</ul>
							</div><!-- /.navbar-collapse -->
						</div><!-- /.container-fluid -->
					</nav>
				</div>
			</header>
			<!--/ header end -->
			
			<!-- banner area -->
			<div class="banner">
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox">
						<div class="item active">
							<img src="img/banner/b1.jpg" alt="...">
							<div class="container">
								<!-- banner caption -->
								<div class="carousel-caption slide-one">
									<!-- heading -->
									<h2 class="animated fadeInLeftBig"><i class="fa fa-music"></i> See the latest Music !</h2>
									<!-- paragraph -->
									<h3 class="animated fadeInRightBig">Find Your Favorite Music </h3>
									<!-- button -->
									<a href="#latestalbum" class="animated fadeIn btn btn-theme">Latest Music</a>
								</div>
							</div>
						</div>
						<div class="item">
							<img src="img/banner/b2.jpg" alt="...">
							<div class="container">
								<!-- banner caption -->
								<div class="carousel-caption slide-two">
									<!-- heading -->
									<h2 class="animated fadeInLeftBig"><i class="fa fa-headphones"></i> Login &amp; Download It. </h2>
									<!-- paragraph -->
									<h3 class="animated fadeInRightBig">Login &amp; Download Your Favorite Music</h3>
									<!-- button -->
									<?PHP
										if (!$loggedin)
										{
											echo '<a href="#" class="animated fadeIn btn btn-theme"  data-toggle="modal" data-target="#modalLoginForm">Login Now</a>';
										}
									?>
									
								</div>
							</div>
						</div>
					</div>

					<!-- Controls -->
					<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
						<span class="fa fa-arrow-left" aria-hidden="true"></span>
					</a>
					<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
						<span class="fa fa-arrow-right" aria-hidden="true"></span>
					</a>
				</div>
			</div>
			<!--/ banner end -->
			
			<!-- block for animate navigation menu -->
			<div class="nav-animate"></div>
			
			<!-- Hero block area -->
			<div id="latestalbum" class="hero pad">
				<div class="container">
					<!-- hero content -->
					<div class="hero-content ">
						<!-- heading -->
						<h2>Latest Music</h2>
						<hr>
						<!-- paragraph -->
						<p>Our Latest <strong class="theme-color">Music</strong> and  <strong class="theme-color">Albums</strong>.</p>
					</div>
					<!-- hero play list -->
					<div class="hero-playlist">
						<div class="row">
							<div class="col-md-12 col-sm-12">
								<!-- play list -->
								<div class="playlist-content">
									<ul class="list-unstyled">
										

									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/ hero end -->
			
			
			
			<!-- FOOTER -->
			<footer id="footer">
				<!-- bottom footer -->
				<div id="bottom-footer" class="section">
					<div class="container">
						<!-- row -->
						<div class="row">
							<div class="col-md-12 text-center wow fadeInDown">
								
								<div class="developer">
									<h3 class="footer-title">Developed by</h3>
									<p><i class="fa fa-user"></i> Name: Abdulnaser Ahmed Mohseen</p>
									<p><i class="fa fa-map-marker"></i> Address: Assiut, Assiut, Egypt</p>
									<p><i class="fa fa-mobile"></i> Mobile Phone: +20-11-25567102</p>
									<p><i class="fa fa-envelope"></i> Email: <a href="">naserahmed1995@gmail.com</a></p>
									<a href="https://www.linkedin.com/in/abdulnaser-mohsen-7233a5103/"><i class="fa fa-linkedin"></i></a>
									<a href="https://github.com/AbdulnaserMohsen"><i class="fa fa-github"></i></a>
								</div>
								
								<!-- copy right -->
								<p class="copy-right">&copy; copyright 2020, All rights are reserved.</p>
							</div>
						</div>
							<!-- /row -->
					</div>
					<!-- /container -->
				</div>
				<!-- /bottom footer -->
			</footer>
			<!-- /FOOTER -->
			<!-- footer end -->
			
			<!-- Scroll to top -->
			<span class="totop"><a href="#"><i class="fa fa-chevron-up"></i></a></span> 
			
		</div>
		
		<!-- Javascript files -->
		<!-- jQuery -->
		<script src="js/jquery.js"></script>
		<!-- Bootstrap JS -->
		<script src="js/bootstrap.min.js"></script>
		<!-- WayPoints JS -->
		<script src="js/waypoints.min.js"></script>
		<!-- Include js plugin -->
		<script src="js/owl.carousel.min.js"></script>
		<!-- One Page Nav -->
		<script src="js/jquery.nav.js"></script>
		<!-- Respond JS for IE8 -->
		<script src="js/respond.min.js"></script>
		<!-- HTML5 Support for IE -->
		<script src="js/html5shiv.js"></script>
		<!-- Custom JS -->
		<script src="js/custom.js"></script>
		<script src="js/loginAndRegister.js"></script>
		<script src="js/get.js"></script>
	</body>	
</html>