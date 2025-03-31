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
        <h3 style="margin-top:30px;">Change Password</h3>
        <hr>

        <div class="row">
          <div class="col-md-4">
            <div class="fleets-single-sidebar">
                <div class="fleets-single-sidebar-box wow fadeInUp">
                    <div class="fleets-single-sidebar-pricing" style="padding-bottom:0 !important;border-color:transparent !important;">
                      <img src="assets/images/avatar.png">
                      <h4 style="margin-top:20px;margin-bottom:-5px;"><span class="profile-fname"><?= $session_usr['usr_firstname']; ?></span> <span class="profile-lname"><?= $session_usr['usr_lastname']; ?></span> </h4>
                      <p><a href="my-profile" style="color:#646464 !important;">My Profile</a> </p>
                    </div>
                </div>
            </div>
          </div>


          <div class="col-md-8">
            <div style="margin-top:30px;">
              <h4>Profile Details</h4>

              <div name="contact-us-form" class="contact-us-form">
                <form class="changePwdForm" class="wow fadeInUp" style="margin-top:30px;">
                  <div class="row">
                    <div class="form-group col-md-6 mb-4">
                        <label>Old Password</label>
                        <input type="password" name="old_password" class="form-control" id="old_password" placeholder="Enter Your Old Password" required>
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group col-md-6 mb-4">
                        <label>New Password</label>
                        <input type="password" name="new_password" class="form-control" id="new_password" placeholder="Enter Your Old Password" required>
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group col-md-6 mb-4">
                        <label>Retype Password</label>
                        <input type="password" name="retype_password" class="form-control" id="retype_password" placeholder="Enter Your Old Password" required>
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="col-lg-12">
                      <div class="response-div"></div>
                      <div class="contact-form-btn">
                        <div id="msgSubmit"></div>
                        <button type="submit" class="btn-default btn-change-password">Change Password</button>
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
  <script type="text/javascript">
    $('.changePwdForm').submit(function(){
      let formData = $(this).serialize();

      $.ajax({
        type:'POST',
        url:'controller/change_password.php',
        data: formData,
        beforeSend:function(){
          $('.btn-change-password').text("Changing password...");
          $('.btn-change-password').attr('disabled', true);
        },
        success:function( response ){
          if( response == "success" )
          {
            $('#msgSubmit').text("Password changed successfully");
            $('#msgSubmit').css("margin-bottom", "20px");
            $('.changePwdForm').trigger("reset");
          }
          else
          {
            $('#msgSubmit').text( response );
            $('#msgSubmit').css("margin-bottom", "20px");
          }
        },
        error:function(){
          alert("Failed!");
        },
        complete:function(){
          $('.btn-change-password').text("Change Password");
          $('.btn-change-password').attr('disabled', false);
        }
      });

      return false;
    });
  </script>
</body>
</html>
