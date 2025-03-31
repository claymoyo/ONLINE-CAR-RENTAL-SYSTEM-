<?php
require 'frag/header.php';
require 'config/dbconnect.php';
require 'utils/fetch_user_details.php';

// Fetch user details based on session
$session_usr = fetchSessionUserDetails( $pdo );
$usr_id = $session_usr['usr_id'];
$usr_role_id = $session_usr['usr_role_id'];
$usr_fullname = $session_usr['usr_firstname'] . " " . $session_usr['usr_lastname'];

if( $session_usr == "empty" ){
  header('Location: index');
}
if( empty($session_usr['usr_country']) )
{
  $usr_country = "empty";
}
?>
<title>My Profile | Novaride #1 Car Rental Company</title>
<style media="screen">
  .main-nav {
    display: flex;
    gap: 10px;
  }
  .sub{
    width: 140px;
    height: 100px;
    text-align: center;
    line-height: 100px;
    padding-top:10px;
  }
  .sub:nth-child(1) {
    width:70px;
    padding-top:0px !important;
  }
  .sub:nth-child(2) {
    width:250px;
    text-align: left;
    margin-right: 50px;
  }
  .acc-links{
    color: #000;
    font-weight: 600;
  }
</style>

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
      <!-- Account Nav -->
      <?php require 'frag/account_nav.php'; ?>
      <!-- End of Account Nav -->

      <div class="page-body" style="min-height:500px;">
        <h3 style="margin-top:30px;">My Profile</h3>
        <hr>

        <div class="row">
          <div class="col-md-4">
            <div class="fleets-single-sidebar">
                <div class="fleets-single-sidebar-box wow fadeInUp">
                    <div class="fleets-single-sidebar-pricing" style="padding-bottom:0 !important;border-color:transparent !important;">
                      <img src="assets/images/<?= $session_usr['usr_avatar']; ?>">
                      <h4 style="margin-top:20px;margin-bottom:-5px;"><span class="profile-fname"><?= $session_usr['usr_firstname']; ?></span> <span class="profile-lname"><?= $session_usr['usr_lastname']; ?></span> </h4>
                      <p><a href="change-password" style="color:#646464 !important;">Change Your Password</a> </p>
                    </div>
                </div>
            </div>
          </div>


          <div class="col-md-8">
            <div style="margin-top:30px;">
              <h4>Profile Details</h4>

              <div name="contact-us-form" class="contact-us-form">
                <form class="profileForm" class="wow fadeInUp" style="margin-top:30px;">
                  <div class="row">
                    <div class="form-group col-md-6 mb-4">
                        <label>first name</label>
                        <input type="text" name="fname" class="form-control" id="fname" placeholder="Enter Your Name" value="<?= $session_usr['usr_firstname']; ?>" required>
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group col-md-6 mb-4">
                        <label>last name</label>
                        <input type="text" name="lname" class="form-control" id="lname" placeholder="Enter Your Name" value="<?= $session_usr['usr_lastname']; ?>" required>
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group col-md-6 mb-4">
                        <label>email (This is your username)</label>
                        <input type="email" name ="email" class="form-control" id="email" placeholder="Enter Your Email" value="<?= $session_usr['usr_email']; ?>" disabled required>
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group col-md-6 mb-4">
                        <label>address</label>
                        <input type="text" name ="address" class="form-control" id="email" placeholder="Enter Your Address" value="<?= $session_usr['usr_address']; ?>">
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group col-md-4 mb-4">
                        <label>city</label>
                        <input type="text" name ="city" class="form-control" id="email" placeholder="Enter Your City" value="<?= $session_usr['usr_city']; ?>">
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group col-md-4 mb-4">
                        <label>postal code</label>
                        <input type="text" name ="postal_code" class="form-control" id="email" placeholder="Enter Your Postal Code" value="<?= $session_usr['usr_postal_code']; ?>">
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group col-md-4 mb-4">
                        <label>state</label>
                        <input type="text" name ="state" class="form-control" id="email" placeholder="Enter Your State" value="<?= $session_usr['usr_state']; ?>">
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group col-md-4 mb-4">
                        <label>Country</label>
                        <select class="form-control" name="country">
                          <option value="">Choose Country</option>
                          <?php
                          $fetch_countries_query = " SELECT * FROM country ";
                          $fetch_countries_stmt = $pdo->query( $fetch_countries_query );

                          if( $fetch_countries_stmt->rowCount() > 0 )
                          {
                            while( $countries_result = $fetch_countries_stmt->fetch(PDO::FETCH_ASSOC) )
                            {
                              $db_country_id = $countries_result['id'];
                              $db_country = $countries_result['country_name'];
                              $selected = ($db_country_name == $usr_country) ? 'selected' : '';

                              ?>
                              <option value="<?= $db_country_id; ?>" <?= $selected; ?>><?= $db_country; ?></option>
                              <?php
                            }
                          }
                          ?>
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group col-md-4 mb-4">
                        <label>phone</label>
                        <input type="text" name ="phone" class="form-control" id="email" placeholder="Enter Your Phone" value="<?= $session_usr['usr_phone']; ?>">
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="col-lg-12">
                      <div class="response-div"></div>
                      <div class="contact-form-btn">
                        <div id="msgSubmit" style="margin-bottom:20px;"></div>
                        <button type="submit" class="btn-default btn-update-profile">Update Profile</button>
                      </div>
                    </div>
                  </div>

                </form>
              </div>



            </div>


          </div>



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
  <script src="assets/js/theme-panel.js"></script>
  <script src="assets/js/profile.js"></script>
</body>
</html>
