<?php
	 include("../private/load.php") ;
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Newtonbooksonline | about us</title>
	<meta name="description" content="Newton Books Online | #1 Online Bookstore and Publishing House in Ghana | Christian Literature | Business Books | Leadership Books">
	<meta name="keyworlds" content="bookstore , bookshop, buy books in ghana ">

	<?php  include("include/head.php"); ?>

</head>

<body>


	<!-- Main wrapper -->
	<div class="wrapper" id="wrapper">
		
			<?php include("include/header2.php") ?>
	   
		<!-- Start Bradcaump area -->
		<!-- <div class="ht__bradcaump__area bg-image--6">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="bradcaump__inner text-center">
							<h2 class="bradcaump-title">About us</h2>
							<nav class="bradcaump-content">
								<a class="breadcrumb_item" href="index.html">Home</a>
								<span class="brd-separetor">/</span>
								<span class="breadcrumb_item active">About us</span>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div> -->
		<!-- End Bradcaump area -->
		<!-- Start About Area -->
		<br><br><br><br>
		<div class="page-about about_area bg--white section-padding--lg mb-5">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section__title--3 text-center pb--30">
							<h2>Our Process Skill Of High</h2>
							<p>the right people for your project</p>
						</div>
					</div>
				</div>
				<div class="row align-items-center">
					<div class="col-lg-6 col-sm-12 col-12">
						<div class="content text-left text_style--2">
							<h2>we have skills to show</h2>
							<div class="skill-container">
								<!-- Start single skill -->
								<div class="single-skill">
									<p>Customer Favorites</p>
									<div class="progress">
										<div class="progress-bar wow fadeInLeft" data-wow-duration="0.8s"
											data-wow-delay=".5s" role="progressbar" aria-valuenow="90" aria-valuemin="0"
											aria-valuemax="100" style="width:90%"><span class="pen-lable"></span>
										</div>
									</div>
								</div>
								<!-- End single skill -->
								<!-- Start single skill -->
								<div class="single-skill">
									<p>Popular Authors</p>
									<div class="progress">
										<div class="progress-bar wow fadeInLeft" data-wow-duration="0.8s"
											data-wow-delay=".5s" role="progressbar" aria-valuenow="95" aria-valuemin="0"
											aria-valuemax="100" style="width:95%"><span class="pen-lable"></span>
										</div>
									</div>
								</div>
								<!-- End single skill -->
								<!-- Start single skill -->
								<div class="single-skill">
									<p>Bestselling Series</p>
									<div class="progress">
										<div class="progress-bar wow fadeInLeft" data-wow-duration="0.8s"
											data-wow-delay=".5s" role="progressbar" aria-valuenow="93" aria-valuemin="0"
											aria-valuemax="100" style="width:93%"><span class="pen-lable"></span>
										</div>
									</div>
								</div>
								<!-- End single skill -->
								<!-- Start single skill -->
								<div class="single-skill">
									<p>Bargain Books</p>
									<div class="progress">
										<div class="progress-bar wow fadeInLeft" data-wow-duration="0.8s"
											data-wow-delay=".5s" role="progressbar" aria-valuenow="90" aria-valuemin="0"
											aria-valuemax="100" style="width:90%"><span class="pen-lable"></span>
										</div>
									</div>
								</div>
								<!-- End single skill -->
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-sm-12 col-12">
						<!-- <div class="content">
							<h3>Buy Book</h3>
							<h2>Different Knowledge</h2>
							<p class="mt--20 mb--20">Claritas est etiam processus dynamicus, qui sequitur mutationem
								consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum
								claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta
								decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in
								futurum.</p>
							<strong>London Address</strong>
							<p>34 Parer Place via Musk Avenue Kelvin Grove, QLD, 4059</p>
						</div>

						<div class="content">
							<h3>Buy Book</h3>
							<h2>Different Knowledge</h2>
							<p class="mt--20 mb--20">Claritas est etiam processus dynamicus, qui sequitur mutationem
								consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum
								claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta
								decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in
								futurum.</p>
							<strong>London Address</strong>
							<p>34 Parer Place via Musk Avenue Kelvin Grove, QLD, 4059</p>
						</div> -->
 <?php
$db = new main_db(HOSTNAME, HOSTUSERNAME, HOSTPASSWORD, DBNAME);
 $about_us = $db->Fetch("SELECT * FROM about_us", null);
 extract($about_us[0]);
 
 ?>
						<section class="wn__faq__area bg--white pt--80 pb--60">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="wn__accordeion__content">
							<h2>ABOUT US</h2>
							<p>You are Welcome to Newton Books
Thank you so much for visiting and searching our online inventory.<br>
We look forward to serving you and helping you find the best books you're looking for and even help you discover more!</p>
						</div>
						<div id="accordion" class="wn_accordion" role="tablist">
							<div class="card">
								<div class="acc-header" role="tab" id="headingOne">
									<h5>
										<a data-toggle="collapse" href="#collapseOne" role="button" aria-expanded="true"
											aria-controls="collapseOne">Our Story</a>
									</h5>
								</div>
								<div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne"
									data-parent="#accordion">
									<div class="card-body">
										<?=nl2br(json_decode($our_story))?>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="acc-header" role="tab" id="headingTwo">
									<h5>
										<a class="collapsed" data-toggle="collapse" href="#collapseTwo" role="button"
											aria-expanded="false" aria-controls="collapseTwo">
											 OUR PHILOSOPHY
										</a>
									</h5>
								</div>
								<div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo"
									data-parent="#accordion">
									<div class="card-body">
										<?=nl2br(json_decode($our_philosophy))?>
									  </div>
								</div>
							</div>
							<div class="card">
								<div class="acc-header" role="tab" id="headingThree">
									<h5>
										<a class="collapsed" data-toggle="collapse" href="#collapseThree" role="button"
											aria-expanded="false" aria-controls="collapseThree">
											Best For Less</a>
									</h5>
								</div>
								<div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree"
									data-parent="#accordion">
									<div class="card-body">
										<?=nl2br(json_decode($best_for_less))?>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="acc-header" role="tab" id="headingFour">
									<h5>
										<a class="collapsed" data-toggle="collapse" href="#collapseFour" role="button"
											aria-expanded="false" aria-controls="collapseFour">
											Our Mission</a>
									</h5>
								</div>
								<div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingFour"
									data-parent="#accordion">
									<div class="card-body">
										<?=nl2br(json_decode($our_mission))?>
									</div>
								</div>
							</div>
							
								<!-- <div id="collapseEight" class="collapse" role="tabpanel" aria-labelledby="headingEight"
									data-parent="#accordion">
									<div class="card-body">Donec mattis finibus elit ut tristique. Nullam tempus nunc
										eget arcu vulputate, eu porttitor tellus commodo. Aliquam erat volutpat. Aliquam
										consectetur lorem eu viverra lobortis. Morbi gravida, nisi id fringilla
										ultricies, elit lorem eleifend lorem</div>
								</div> -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>


					</div>
				</div>
			</div>
		</div>
		<!-- End About Area -->
		

	</div>
	<!-- //Main wrapper -->

	<?php include("include/footer.php") ?>

</body>
</html>