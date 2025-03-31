<?php
require 'frag/header.php';
require 'config/dbconnect.php';
require 'utils/fetch_user_details.php';

// Fetch user details based on session
$session_usr = fetchSessionUserDetails( $pdo );

?>
<!-- Page Title -->
<title>Contact Us - Car Rental Company</title>
</head>
<body>
	<!-- Preloader Start -->
	<?php include 'frag/preloader.php'; ?>
	<!-- Preloader End -->

	<!-- Header Start -->
	<?php require 'frag/navbar.php'; ?>
	<!-- Header End -->

	<!-- Page Header Start -->
	<div class="page-header bg-section parallaxie">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<!-- Page Header Box Start -->
					<div class="page-header-box">
						<h1 class="text-anime-style-3" data-cursor="-opaque">Contact Us</h1>
						<nav class="wow fadeInUp">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index">home</a></li>
								<li class="breadcrumb-item active" aria-current="page">contact us</li>
							</ol>
						</nav>
					</div>
					<!-- Page Header Box End -->
				</div>
			</div>
		</div>
	</div>
	<!-- Page Header End -->

	<!-- Page Contact Us Start -->
	<div class="page-contact-us">
		<div class="contact-info-form">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<!-- Contact Information Start -->
						<div class="contact-information">
							<!-- Contact Information Title Start -->
							<div class="section-title">
								<h2 class="text-anime-style-3" data-cursor="-opaque">Contact information</h2>
								<p>Say something to start a live chat!</p>
							</div>
							<!-- Contact Information Title End -->

							<!-- Contact Information List Start -->
							<div class="contact-info-list">
								<!-- Contact Info Item Start -->
								<div class="contact-info-item wow fadeInUp" data-wow-delay="0.25s">
									<!-- Icon Box Start -->
									<div class="icon-box">
										<img src="assets/images/icon-phone.svg" alt="">
									</div>
									<!-- Icon Box End -->

									<!-- Contact Info Content Start -->
									<div class="contact-info-content">
										<p>(+01) 789 854 856</p>
									</div>
									<!-- Contact Info Content End -->
								</div>
								<!-- Contact Info Item End -->

								<!-- Contact Info Item Start -->
								<div class="contact-info-item wow fadeInUp" data-wow-delay="0.5s">
									<!-- Icon Box Start -->
									<div class="icon-box">
										<img src="assets/images/icon-mail.svg" alt="">
									</div>
									<!-- Icon Box End -->

									<!-- Contact Info Content Start -->
									<div class="contact-info-content">
										<p>info@domain.com</p>
									</div>
									<!-- Contact Info Content End -->
								</div>
								<!-- Contact Info Item End -->

								<!-- Contact Info Item Start -->
								<div class="contact-info-item wow fadeInUp" data-wow-delay="0.75s">
									<!-- Icon Box Start -->
									<div class="icon-box">
										<img src="assets/images/icon-location.svg" alt="">
									</div>
									<!-- Icon Box End -->

									<!-- Contact Info Content Start -->
									<div class="contact-info-content">
										<p>1234 Elm Street, Suite 567 Springfield, United States</p>
									</div>
									<!-- Contact Info Content End -->
								</div>
								<!-- Contact Info Item End -->
							</div>
							<!-- Contact Information List End -->

							<!-- Contact Information Social Start -->
							<div class="contact-info-social wow fadeInUp" data-wow-delay="0.5s">
								<ul>
									<li><a href="contact.html#"><i class="fa-brands fa-facebook-f"></i></a></li>
									<li><a href="contact.html#"><i class="fa-brands fa-twitter"></i></a></li>
									<li><a href="contact.html#"><i class="fa-brands fa-linkedin-in"></i></a></li>
									<li><a href="contact.html#"><i class="fa-brands fa-instagram"></i></a></li>
								</ul>
							</div>
							<!-- Contact Information Social End -->
						</div>
						<!-- Contact Information End -->
					</div>

					<div class="col-lg-6">
						<!-- Contact Form Start -->
						<div class="contact-us-form">
							<form id="contactForm" data-toggle="validator" class="wow fadeInUp" data-wow-delay="0.5s">
								<div class="row">
									<div class="form-group col-md-6 mb-4">
										<label>first name</label>
										<input type="text" name="name" class="form-control" id="fname" placeholder="Enter Your Name" required>
										<div class="help-block with-errors"></div>
									</div>

									<div class="form-group col-md-6 mb-4">
										<label>last name</label>
										<input type="text" name="name" class="form-control" id="lname" placeholder="Enter Your Name" required>
										<div class="help-block with-errors"></div>
									</div>

									<div class="form-group col-md-6 mb-4">
										<label>email</label>
										<input type="email" name ="email" class="form-control" id="email" placeholder="Enter Your Email" required>
										<div class="help-block with-errors"></div>
									</div>

									<div class="form-group col-md-6 mb-4">
										<label>phone</label>
										<input type="text" name="phone" class="form-control" id="phone" placeholder="Enter Your Number" required>
										<div class="help-block with-errors"></div>
									</div>

									<div class="form-group col-md-12 mb-4">
										<label>message</label>
										<textarea name="msg" class="form-control" id="msg" rows="4" placeholder="Write Your Message" required></textarea>
										<div class="help-block with-errors"></div>
									</div>

									<div class="col-lg-12">
										<div class="contact-form-btn">
											<button type="submit" class="btn-default">send message</button>
											<div id="msgSubmit" class="h3 hidden"></div>
										</div>
									</div>
								</div>
							</form>
						</div>
						<!-- Contact Form End -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Page Contact Us End -->

	<!-- Google Map Start -->
	<div class="google-map">
		<div class="container">
			<div class="row section-row">
				<div class="col-lg-12">
					<!-- Section Title Start -->
					<div class="section-title">
						<h3 class="wow fadeInUp">location</h3>
						<h2 class="text-anime-style-3" data-cursor="-opaque">How to reach our location</h2>
					</div>
					<!-- Section Title End -->
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<!-- Google Map Iframe Start -->
					<div class="google-map-iframe">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9941.196706408671!2d-0.476342966818661!3d51.47102254887899!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48767234cdc56de9%3A0x8fe7535543f64167!2sHeathrow%20Airport!5e0!3m2!1sen!2sca!4v1741708023661!5m2!1sen!2sca" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
					</div>
					<!-- Google Map Iframe End -->
				</div>
			</div>
		</div>
	</div>
	<!-- Google Map End -->

	<!-- Footer Start -->
	<?php require 'frag/footer.php'; ?>
	<!-- Footer End -->

	<!-- Jquery Library File -->
	<script src="assets/js/jquery-3.7.1.min.js"></script>
	<!-- Jquery Ui Js File -->
	<script src="assets/js/jquery-ui.js"></script>
	<!-- Bootstrap js file -->
	<script src="assets/js/bootstrap.min.js"></script>
	<!-- Validator js file -->
	<script src="assets/js/validator.min.js"></script>
	<!-- SlickNav js file -->
	<script src="assets/js/jquery.slicknav.js"></script>
	<!-- Swiper js file -->
	<script src="assets/js/swiper-bundle.min.js"></script>
	<!-- Counter js file -->
	<script src="assets/js/jquery.waypoints.min.js"></script>
	<script src="assets/js/jquery.counterup.min.js"></script>
	<!-- Magnific js file -->
	<script src="assets/js/jquery.magnific-popup.min.js"></script>
	<!-- SmoothScroll -->
	<script src="assets/js/SmoothScroll.js"></script>
	<!-- Parallax js -->
	<script src="assets/js/parallaxie.js"></script>
	<!-- MagicCursor js file -->
	<script src="assets/js/gsap.min.js"></script>
	<script src="assets/js/magiccursor.js"></script>
	<!-- Text Effect js file -->
	<script src="assets/js/SplitText.js"></script>
	<script src="assets/js/ScrollTrigger.min.js"></script>
	<!-- YTPlayer js File -->
	<script src="assets/js/jquery.mb.YTPlayer.min.js"></script>
	<!-- Wow js file -->
	<script src="assets/js/wow.js"></script>
	<!-- Main Custom js file -->
	<script src="assets/js/function.js"></script>
	<script src="assets/js/theme-panel.js"></script>
</body>
</html>
