<?php
require 'frag/header.php';
require 'config/dbconnect.php';
require 'utils/fetch_user_details.php';

// Fetch user details based on session
$session_usr = fetchSessionUserDetails( $pdo );
$usr_id = $session_usr['usr_id'];
$usr_fullname = $session_usr['usr_firstname'] . " " . $session_usr['usr_lastname'];


?>
<title>My Account | Novaride #1 Car Rental Company</title>

</head>
<body>

  <!-- Preloader Start -->
  <?php include 'frag/preloader.php'; ?>
  <!-- Preloader End -->

  <!-- Header Start -->
  <?php require 'frag/navbar.php'; ?>
  <!-- Header End -->

  <!-- Page Feets Single Start -->
	<div class="page-fleets-single" style="padding-top:0 !important;">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<!-- Feets Single Sidebar Start -->
					<div class="fleets-single-sidebar">
						<div class="fleets-single-sidebar-box wow fadeInUp">
							<!-- Feets Single Sidebar Pricing Start -->
							<div class="fleets-single-sidebar-pricing" style="padding-bottom:0 !important;">
								<img src="assets/images/avatar.png" style="height:200px;">
								<h4 style="margin-top:20px;margin-bottom:0px;"><?= $usr_fullname; ?></h4>
                <p>User Account</p>
							</div>
							<!-- Feets Single Sidebar Pricing End -->

							<!-- Feets Single Sidebar List Start -->
							<div class="fleets-single-sidebar-list">
								<ul>
									<li><img src="assets/images/wheel.svg">My Orders</li>
									<li><img src="assets/images/calendar-tick.svg">My Delivery Addresses</li>
									<li><img src="assets/images/calendar-tick.svg">Delivery Date</li>
									<li><img src="assets/images/calendar-tick.svg">Delivery Date</li>
									<li><img src="assets/images/calendar-tick.svg">Delivery Date</li>
								</ul>
							</div>
							<!-- Feets Single Sidebar List End -->

							<!-- Feets Single Sidebar Btn Start -->
							<div class="fleets-single-sidebar-btn">
								<button type="button" class="btn btn-full btn-book" style="color:#fff;" disabled>Book now for £<?= number_format($total_charge, 2); ?></button>
							</div>
							<!-- Feets Single Sidebar Btn End -->
						</div>
					</div>
					<!-- Feets Single Sidebar End -->
				</div>


        <div class="col-lg-8">

				</div>

      </div>
		</div>
	</div>
	<!-- Page Feets Single End -->


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
  <script src="assets/assets/js/theme-panel.js"></script>
</body>
</html>
