<?php
	 include("../private/load.php") ;
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Contact-us| Books Library eCommerce Store</title>
	<meta name="description" content="Newton Books Online | #1 Online Bookstore and Publishing House in Ghana | Christian Literature | Business Books | Leadership Books">
	<meta name="keyworlds" content="bookstore , bookshop, buy books in ghana ">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Favicons -->
	<link rel="shortcut icon" href="assets/images/favicon.ico">
	<link rel="apple-touch-icon" href="assets/images/icon.png">


			<link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i,900" rel="stylesheet">
			<link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,600,600i,700,700i,800"
				rel="stylesheet">
			<link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">
	<!-- Stylesheets-->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/plugins.css">
	<link rel="stylesheet" href="assets/css/style.css">

	<!-- Cusom css -->
	<link rel="stylesheet" href="assets/css/custom.css">

	<!-- Modernizer js -->
	<script src="assets/js/vendor/modernizr-3.5.0.min.js"></script>
</head>

<body>
	
	<!-- Main wrapper -->
	<div class="wrapper" id="wrapper">

		<?php include("include/header.php") ?>
		<!-- Start Bradcaump area -->
		<div class="ht__bradcaump__area bg-image--6">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="bradcaump__inner text-center">
							<h2 class="bradcaump-title">Contact Us</h2>
							<nav class="bradcaump-content">
								<a class="breadcrumb_item" href="index.html">Home</a>
								<span class="brd-separetor">/</span>
								<span class="breadcrumb_item active">Contact Us</span>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Bradcaump area -->
		<!-- Start Contact Area -->
		<section class="wn_contact_area bg--white pt--80 pb--80">
			<!-- <div class="google__map pb--80">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div id="googleMap"></div>
						</div>
					</div>
				</div>
			</div> -->
			<div class="container">
			<?php 
				if(isset($contact_us_error)){
					foreach($contact_us_error as $error){
						?>
						<div class="alert alert-warning alert-dismissible fade show" role="alert">
						<strong></strong> <?= $error ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						</div>
					<?php
					}
				}
				
				if(isset($contact_us_success)){
					foreach($contact_us_success as $success){
						?>
						<div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong>Message Sent Sucessfully !!</strong> <?= $success ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						</div>
					<?php
					}
				}
			
			?>
				<div class="row">
					<div class="col-lg-8 col-12">
						<div class="contact-form-wrap">
							<h2 class="contact__title">Get in touch</h2>
							<p> </p>
							<form  action="contact-us" method="post">
								<div class="single-contact-form space-between">
									<input type="text" name="firstname" placeholder="First Name*" required>
									<input type="text" name="lastname" placeholder="Last Name*" required>
								</div>
								<div class="single-contact-form space-between">
									<input type="email" name="email" placeholder="Email*" required>
								
								</div>
								<div class="single-contact-form">
									<input type="text" name="subject" placeholder="Subject*" required>
								</div>
								<div class="single-contact-form message">
									<textarea name="message" placeholder="Type your message here.." required></textarea>
								</div>
								<div class="contact-btn">
									<button type="submit" name="send_email" >Send Email</button>
								</div>
							</form>
						</div>
				
					</div>
					<div class="col-lg-4 col-12 md-mt-40 sm-mt-40">
						<div class="wn__address">
							<h2 class="contact__title">Get office info.</h2>
							<p></p>
							<div class="wn__addres__wreapper">

								<div class="single__address">
									<i class="icon-location-pin icons"></i>
									<div class="content ">
										<span>address:</span>
										<address>
										Asafoatse Nettey Rd <br>
										Accra, Ghana, Greater-accra
										<br><br>
										P.O.Box MP 4624 <br>
										Mamprobi <br>
										Accra, Ghana <br>
										</address>
										<br>
										


									</div>
								</div>

								<div class="single__address">
									<i class="icon-phone icons"></i>
									<div class="content">
										<span>Phone Number:</span>
										<p>+233-244-49-8467</p>
									</div>
								</div>

								<div class="single__address">
									<i class="icon-envelope icons"></i>
									<div class="content">
										<span>Email address:</span>
										<p>support@newtonbooksonline.com</p>
									</div>
								</div>

								<div class="single__address">
									<i class="icon-globe icons"></i>
									<div class="content">
										<span>website address:</span>
										<p>newtonbooksonline.com</p>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Contact Area -->
		
		<!-- //Footer Area -->

	</div>
	<!-- //Main wrapper -->

	<?php include("include/footer.php") ?>

</body>

</html>