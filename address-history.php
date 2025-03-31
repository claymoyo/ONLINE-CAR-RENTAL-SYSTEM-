<?php
require 'frag/header.php';
require 'config/dbconnect.php';
require 'utils/fetch_country_name.php';
require 'utils/fetch_user_details.php';
require 'utils/fetch_order_status.php';
require 'utils/fetch_vehicle_inventory_details.php';

// Fetch user details based on session
$session_usr = fetchSessionUserDetails( $pdo );
$usr_id = $session_usr['usr_id'];
$usr_role_id = $session_usr['usr_role_id'];
$usr_fullname = $session_usr['usr_firstname'] . " " . $session_usr['usr_lastname'];

if( $session_usr == "empty" ){
  header('Location: index');
}
?>
<title>My Address History | Novaride #1 Car Rental Company</title>
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
  .label-danger{
    background-color: #ff3600;
    padding: 6px;
    border-radius: 4px;
    font-size: 10px !important;
    color: #fff;
    margin-top: -57px !important;
  }
  .label-default{
    background-color: #bcbcbc;
    padding: 6px;
    border-radius: 4px;
    font-size: 10px !important;
    color: #fff;
    margin-top: -57px !important;
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
        <h3 style="margin-top:30px;">My Address History</h3>
        <hr>

        <?php
          // Check for any record of booking
          $del_addr_history_stmt = $pdo->prepare("SELECT * FROM delivery_addresses WHERE user_id = ? ORDER BY id DESC ");
          $del_addr_history_stmt->execute([$usr_id]);

          if( $del_addr_history_stmt->rowCount() < 1 )
          {
            ?>
            <div class="jumbotron-large" style="text-align:center;padding:90px;">
              <img src="assets/images/house.svg" style="height:150px;" alt="">
              <h5 style="margin-top:20px;">You don't have any address saved yet!</h5>
              <p>You need to book a vehicle for your address to show up here</p>
            <?php
          }
          else
          {
            ?>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>S/N</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Postal Code</th>
                    <th>Province</th>
                    <th>Country</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $no = 1;

                    while($del_adrr_history = $del_addr_history_stmt->fetch(PDO::FETCH_ASSOC))
                    {
                      $address = $del_adrr_history['address'];
                      $city = $del_adrr_history['city'];
                      $postal_code = $del_adrr_history['postal_code'];
                      $province = $del_adrr_history['province'];
                      $country_id = $del_adrr_history['country_id'];

                      $country = fetchCountryName( $pdo, $country_id );

                      ?>
                      <tr>
                        <td><?= $no; ?></td>
                        <td><?= $address; ?></td>
                        <td><?= $city; ?></td>
                        <td><?= $postal_code; ?></td>
                        <td><?= $province; ?></td>
                        <td><?= $country; ?></td>
                      </tr>
                      <?php

                      $no++;
                    }

                  ?>
                </tbody>
              </table>
            </div>
            <?php

          }

        ?>

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
