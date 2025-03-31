<?php
require 'frag/header.php';
require 'config/dbconnect.php';
require 'utils/fetch_user_details.php';

// Fetch user details based on session
$session_usr = fetchSessionUserDetails( $pdo );

if( $session_usr !== "empty" )
{
	header('Location: /novaride/index');
}
?>
<title>Create Account | Novaride #1 Car Rental Company</title>
</head>
<body>
	<!-- Preloader Start -->
	<?php include 'frag/preloader.php'; ?>
	<!-- Preloader End -->

	<!-- Header Start -->
	<?php require 'frag/navbar.php'; ?>
	<!-- Header End -->

  <!-- Page Contact Us Start -->
  <div class="page-contact-us" style="padding-top:0 !important;">
      <div class="contact-info-form">
          <div class="container">
              <div class="row">
                  <div class="col-lg-6">
                      <!-- Contact Information Start -->
                      <div class="contact-information">
                          <!-- Contact Information Title Start -->
                          <div class="section-title">
                              <h2 class="wow fadeInUp" data-cursor="-opaque">Create account</h2>
                              <p class="wow fadeInUp">Thanks for visiting us! Fill out the form</p>
                          </div>
                          <!-- Contact Information Title End -->
													<div style="height:250px;"></div>
                      </div>
                      <!-- Contact Information End -->
                  </div>

                  <div class="col-lg-6">
                      <!-- Contact Form Start -->
                      <div class="contact-us-form">
                        <form id="createAccountForm" class="wow fadeInUp" data-wow-delay="0.5s">
                          <div class="row">
                              <div class="form-group col-md-6 mb-4">
                                  <label>first name</label>
                                  <input type="text" name="fname" class="form-control" id="fname" placeholder="Enter Your Name" required>
                                  <div class="help-block with-errors"></div>
                              </div>

                              <div class="form-group col-md-6 mb-4">
                                  <label>last name</label>
                                  <input type="text" name="lname" class="form-control" id="lname" placeholder="Enter Your Name" required>
                                  <div class="help-block with-errors"></div>
                              </div>

                              <div class="form-group col-md-12 mb-4">
                                  <label>email</label>
                                  <input type="email" name ="email" class="form-control" id="email" placeholder="Enter Your Email" required>
                                  <div class="help-block with-errors"></div>
                              </div>

															<div class="form-group col-md-6 mb-4">
                                  <label>password</label>
                                  <input type="password" name="password" class="form-control" id="password" placeholder="Enter Your Password" required>
                                  <div class="help-block with-errors"></div>
                              </div>

															<div class="form-group col-md-6 mb-4">
                                  <label>re-type password</label>
                                  <input type="password" name="rtpassword" class="form-control" id="rtpassword" placeholder="Re-type Your Password" required>
                                  <div class="help-block with-errors"></div>
                              </div>

                              <div class="col-lg-12">
																<div class="response-div"></div>
                                <div class="contact-form-btn">
                                    <button type="submit" class="btn-default btn-create-account">create account</button>
                                    <div id="msgSubmit" class="h3 hidden"></div>

																		<p style="margin-top:20px;">If you have an account with us, click <a href="login" style="text-decoration:underline;color:#ff3600;">here</a> to sign in</p>
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
	<script src="assets/js/createAccount.js"></script>

</body>
</html>
