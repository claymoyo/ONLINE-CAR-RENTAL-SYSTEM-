<?php
require 'frag/header.php';
require 'config/dbconnect.php';
require 'utils/fetch_user_details.php';

// Fetch user details based on session
$session_usr = fetchSessionUserDetails( $pdo );

?>
<!-- Page Title -->
<title>FAQ - Car Rental Company</title>
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
						<h1 class="wow fadeInUp" data-cursor="-opaque">FAQs</h1>
						<nav class="wow fadeInUp">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index">home</a></li>
								<li class="breadcrumb-item active" aria-current="page">faqs</li>
							</ol>
						</nav>
					</div>
					<!-- Page Header Box End -->
				</div>
			</div>
		</div>
	</div>
	<!-- Page Header End -->

	<!-- Page Faqs Start -->
	<div class="page-faqs">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<!-- FAQs section start -->
					<div class="rental-condition-accordion" id="general_information">
						<div class="section-title faqs-section-title">
							<h3 class="wow fadeInUp">FAQs</h3>
							<h2 class="wow fadeInUp" data-cursor="-opaque">General information</h2>
						</div>
						<!-- FAQ Accordion Start -->
						<div class="faq-accordion" id="accordion">
							<!-- FAQ Item Start -->
							<div class="accordion-item wow fadeInUp">
								<h2 class="accordion-header" id="heading1">
									<button class="accordion-button" type="button" data-bs-toggle="collapse"
									data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
									What types of vehicles are available for rent?
								</button>
							</h2>
							<div id="collapse1" class="accordion-collapse collapse show" aria-labelledby="heading1"
							data-bs-parent="#accordion">
							<div class="accordion-body">
								<p>Yes, we accept international driver's licenses. An additional government-issued ID, such as a passport, is also required.</p>
							</div>
						</div>
					</div>
					<!-- FAQ Item End -->

					<!-- FAQ Item Start -->
					<div class="accordion-item wow fadeInUp" data-wow-delay="0.25s">
						<h2 class="accordion-header" id="heading2">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
							data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
							Where are your rental locations?
						</button>
					</h2>
					<div id="collapse2" class="accordion-collapse collapse" aria-labelledby="heading2"
					data-bs-parent="#accordion">
					<div class="accordion-body">
						<p>Yes, we accept international driver's licenses. An additional government-issued ID, such as a passport, is also required.</p>
					</div>
				</div>
			</div>
			<!-- FAQ Item End -->

			<!-- FAQ Item Start -->
			<div class="accordion-item wow fadeInUp" data-wow-delay="0.5s">
				<h2 class="accordion-header" id="heading3">
					<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
					data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
					What are your hours of operation?
				</button>
			</h2>
			<div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3"
			data-bs-parent="#accordion">
			<div class="accordion-body">
				<p>Yes, we accept international driver's licenses. An additional government-issued ID, such as a passport, is also required.</p>
			</div>
		</div>
	</div>
	<!-- FAQ Item End -->
</div>
<!-- FAQ Accordion End -->
</div>
<!-- FAQs section End -->

<!-- FAQs section start -->
<div class="rental-condition-accordion" id="booking_and_reservations">
	<div class="section-title faqs-section-title">
		<h3 class="wow fadeInUp">FAQs</h3>
		<h2 class="wow fadeInUp" data-cursor="-opaque">Booking and reservations</h2>
	</div>
	<!-- FAQ Accordion Start -->
	<div class="faq-accordion" id="accordion1">
		<!-- FAQ Item Start -->
		<div class="accordion-item wow fadeInUp" data-wow-delay="0.75s">
			<h2 class="accordion-header" id="heading4">
				<button class="accordion-button" type="button" data-bs-toggle="collapse"
				data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
				How do I make a reservation?
			</button>
		</h2>
		<div id="collapse4" class="accordion-collapse collapse show" aria-labelledby="heading4"
		data-bs-parent="#accordion1">
		<div class="accordion-body">
			<p>Yes, you can rent a car for someone else, but the primary driver must be present at the time of rental to provide their driver's license and sign the rental agreement.</p>
		</div>
	</div>
</div>
<!-- FAQ Item End -->

<!-- FAQ Item Start -->
<div class="accordion-item wow fadeInUp" data-wow-delay="1s">
	<h2 class="accordion-header" id="heading5">
		<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
		data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
		Can I modify or cancel my reservation?
	</button>
</h2>
<div id="collapse5" class="accordion-collapse collapse" aria-labelledby="heading5"
data-bs-parent="#accordion1">
<div class="accordion-body">
	<p>Yes, you can rent a car for someone else, but the primary driver must be present at the time of rental to provide their driver's license and sign the rental agreement.</p>
</div>
</div>
</div>
<!-- FAQ Item End -->

<!-- FAQ Item Start -->
<div class="accordion-item wow fadeInUp" data-wow-delay="0.5s">
	<h2 class="accordion-header" id="heading6">
		<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
		data-bs-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
		What is your cancellation policy?
	</button>
</h2>
<div id="collapse6" class="accordion-collapse collapse" aria-labelledby="heading6"
data-bs-parent="#accordion1">
<div class="accordion-body">
	<p>Yes, you can rent a car for someone else, but the primary driver must be present at the time of rental to provide their driver's license and sign the rental agreement.</p>
</div>
</div>
</div>
<!-- FAQ Item End -->
</div>
<!-- FAQ Accordion End -->
</div>
<!-- FAQs section End -->

<!-- FAQs section start -->
<div class="rental-condition-accordion" id="pricing_and_payment">
	<div class="section-title faqs-section-title">
		<h3 class="wow fadeInUp">FAQs</h3>
		<h2 class="wow fadeInUp" data-cursor="-opaque">Pricing and payment</h2>
	</div>
	<!-- FAQ Accordion Start -->
	<div class="faq-accordion" id="accordion2">
		<!-- FAQ Item Start -->
		<div class="accordion-item wow fadeInUp">
			<h2 class="accordion-header" id="heading7">
				<button class="accordion-button" type="button" data-bs-toggle="collapse"
				data-bs-target="#collapse7" aria-expanded="true" aria-controls="collapse7">
				What forms of payment do you accept?
			</button>
		</h2>
		<div id="collapse7" class="accordion-collapse collapse show" aria-labelledby="heading7"
		data-bs-parent="#accordion2">
		<div class="accordion-body">
			<p>Reservations can be made online through our website, by calling our customer service hotline, or by visiting one of our rental locations in person.</p>
		</div>
	</div>
</div>
<!-- FAQ Item End -->

<!-- FAQ Item Start -->
<div class="accordion-item wow fadeInUp" data-wow-delay="0.25s">
	<h2 class="accordion-header" id="heading8">
		<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
		data-bs-target="#collapse8" aria-expanded="false" aria-controls="collapse8">
		Are there any hidden fees?
	</button>
</h2>
<div id="collapse8" class="accordion-collapse collapse" aria-labelledby="heading8"
data-bs-parent="#accordion2">
<div class="accordion-body">
	<p>Reservations can be made online through our website, by calling our customer service hotline, or by visiting one of our rental locations in person.</p>
</div>
</div>
</div>
<!-- FAQ Item End -->

<!-- FAQ Item Start -->
<div class="accordion-item wow fadeInUp" data-wow-delay="0.5s">
	<h2 class="accordion-header" id="heading9">
		<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
		data-bs-target="#collapse9" aria-expanded="false" aria-controls="collapse9">
		Do you require a deposit?
	</button>
</h2>
<div id="collapse9" class="accordion-collapse collapse" aria-labelledby="heading9"
data-bs-parent="#accordion2">
<div class="accordion-body">
	<p>Reservations can be made online through our website, by calling our customer service hotline, or by visiting one of our rental locations in person.</p>
</div>
</div>
</div>
<!-- FAQ Item End -->
</div>
<!-- FAQ Accordion End -->
</div>
<!-- FAQs section End -->

<!-- FAQs section start -->
<div class="rental-condition-accordion" id="vehicle_information">
	<div class="section-title faqs-section-title">
		<h3 class="wow fadeInUp">FAQs</h3>
		<h2 class="wow fadeInUp" data-cursor="-opaque">Vehicle information</h2>
	</div>
	<!-- FAQ Accordion Start -->
	<div class="faq-accordion" id="accordion3">
		<!-- FAQ Item Start -->
		<div class="accordion-item wow fadeInUp">
			<h2 class="accordion-header" id="heading10">
				<button class="accordion-button" type="button" data-bs-toggle="collapse"
				data-bs-target="#collapse10" aria-expanded="true" aria-controls="collapse10">
				Are your vehicles insured?
			</button>
		</h2>
		<div id="collapse10" class="accordion-collapse collapse show" aria-labelledby="heading10"
		data-bs-parent="#accordion3">
		<div class="accordion-body">
			<p>We offer a diverse fleet of vehicles, including economy cars, compact cars, SUVs, luxury cars, and more to suit various needs and preferences.</p>
		</div>
	</div>
</div>
<!-- FAQ Item End -->

<!-- FAQ Item Start -->
<div class="accordion-item wow fadeInUp" data-wow-delay="0.25s">
	<h2 class="accordion-header" id="heading11">
		<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
		data-bs-target="#collapse11" aria-expanded="false" aria-controls="collapse11">
		Do you offer vehicles with automatic transmission?
	</button>
</h2>
<div id="collapse11" class="accordion-collapse collapse" aria-labelledby="heading11"
data-bs-parent="#accordion3">
<div class="accordion-body">
	<p>We offer a diverse fleet of vehicles, including economy cars, compact cars, SUVs, luxury cars, and more to suit various needs and preferences.</p>
</div>
</div>
</div>
<!-- FAQ Item End -->

<!-- FAQ Item Start -->
<div class="accordion-item wow fadeInUp" data-wow-delay="0.5s">
	<h2 class="accordion-header" id="heading12">
		<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
		data-bs-target="#collapse12" aria-expanded="false" aria-controls="collapse12">
		Can I choose a specific vehicle model?
	</button>
</h2>
<div id="collapse12" class="accordion-collapse collapse" aria-labelledby="heading12"
data-bs-parent="#accordion3">
<div class="accordion-body">
	<p>We offer a diverse fleet of vehicles, including economy cars, compact cars, SUVs, luxury cars, and more to suit various needs and preferences.</p>
</div>
</div>
</div>
<!-- FAQ Item End -->
</div>
<!-- FAQ Accordion End -->
</div>
<!-- FAQs section End -->
</div>
</div>
</div>
</div>
<!-- Page Faq End -->

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
