<?php
require 'frag/header.php';
require 'config/dbconnect.php';
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
<title>My Account | Novaride #1 Car Rental Company</title>
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

      <div class="page-body">
        <?= ($usr_role_id == 1) ? '<h3 style="margin-top:30px;">Dashboard</h3>' : '<h3 style="margin-top:30px;">My Bookings</h3>' ; ?>
        <hr>

        <?php

          if($usr_role_id == 1)
          {
            /*==============================
              FOR ADMIN
            ================================*/
            ?>
            <div class="row">
              <div class="col-md-4">
                <div class="service-item wow fadeInUp">
                  <div class="icon-box">
                      <img src="assets/images/received.svg" alt="">
                  </div>
                  <div class="service-content">
                    <h3>Orders Received</h3>
                    <p>Manage all your received orders here</p>
                  </div>
                  <div class="service-footer">
                    <a href="orders-received" class="section-icon-btn"><img src="assets/images/arrow-white.svg" alt=""></a>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="service-item wow fadeInUp">
                  <div class="icon-box">
                      <img src="assets/images/dispatched.svg" alt="">
                  </div>
                  <div class="service-content">
                      <h3>Orders Dispatched</h3>
                      <p>Manage all your dispatched orders here</p>
                  </div>
                  <div class="service-footer">
                    <a href="orders-dispatched" class="section-icon-btn"><img src="assets/images/arrow-white.svg" alt=""></a>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="service-item wow fadeInUp">
                  <div class="icon-box">
                      <img src="assets/images/delivered.svg" alt="">
                  </div>
                  <div class="service-content">
                      <h3>Orders Delivered</h3>
                      <p>Manage all your delivered orders here</p>
                  </div>
                  <div class="service-footer">
                    <a href="orders-delivered" class="section-icon-btn"><img src="assets/images/arrow-white.svg" alt=""></a>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="service-item wow fadeInUp">
                  <div class="icon-box">
                      <img src="assets/images/return.svg" alt="">
                  </div>
                  <div class="service-content">
                      <h3>Orders Returned</h3>
                      <p>Manage all your returned orders here</p>
                  </div>
                  <div class="service-footer">
                    <a href="orders-returned" class="section-icon-btn"><img src="assets/images/arrow-white.svg" alt=""></a>
                  </div>
                </div>
              </div>

              <div class="col-md-8">
                <div class="service-item wow fadeInUp" style="background-color:#fff8f6;border-color:transparent;">
                  <div class="icon-box">
                      <img src="assets/images/order.svg" alt="">
                  </div>
                  <div class="service-content">
                      <h3>Return Passed</h3>
                      <p>Manage all orders that have passed the return date</p>
                  </div>
                  <div class="service-footer">
                    <a href="return-passed" class="section-icon-btn"><img src="assets/images/arrow-white.svg" alt=""></a>
                  </div>
                </div>
              </div>

            </div>

            <?php
          }
          else if($usr_role_id == 2)
          {
            /*==============================
              FOR REGULAR USERS
            ================================*/
            // Check for any record of booking
            $chk_booking_stmt = $pdo->prepare("SELECT * FROM orders WHERE user_id = ? ORDER BY id DESC ");
            $chk_booking_stmt->execute([$usr_id]);

            if( $chk_booking_stmt->rowCount() < 1 )
            {
              ?>
              <div class="jumbotron-large" style="text-align:center;padding:90px;">
                <img src="assets/images/image-search-no-results.webp" style="height:150px;" alt="">
                <h5 style="margin-top:20px;">You don't have any bookings yet!</h5>
                <p>Ensure you upload your drivers license and insurance here before booking a vehicle</p>
              </div>
              <?php
            }
            else
            {
              ?>
              <div class="row" style="margin-top:30px;">
                <?php
                  while($chk_booking = $chk_booking_stmt->fetch(PDO::FETCH_ASSOC))
                  {
                    $order_id = $chk_booking['id'];
                    $inventory_id = $chk_booking['inventory_id'];
                    $order_date_time = explode(" ", $chk_booking['order_date_time'])[0];
                    $pickup_date = $chk_booking['pickup_date'];
                    $return_date = $chk_booking['return_date'];
                    $order_status_id = $chk_booking['order_status_id'];

                    $formatted_pd = date("F d, Y", strtotime(str_replace("-", "/", $pickup_date)));
                    $formatted_rd = date("F d, Y", strtotime(str_replace("-", "/", $return_date)));
                    $formatted_od = date("F d, Y", strtotime(str_replace("-", "/", $order_date_time)));

                    // Get order status name
                    $order_status = fetchOrderStatus( $pdo, $order_status_id );

                    // Get details of this vehicle using the inventoryID
                    $vehicle_details = fetchVehicleInventoryDetails($pdo, $inventory_id);
                    $vehicle_name = $vehicle_details['vehicle_make'];
                    $vehicle_model = $vehicle_details['vehicle_model'];
                    $vehicle_photo_name = $vehicle_details['vehicle_photo_name'];

                    // $check_passed = (strtotime($date) < time()) ? "passed" : "future";

                    if( $order_status_id == 2 )
                    {
                      $notif = '<span class="label label-default">Out for Delivery</span>';
                    }
                    elseif( $order_status_id == 3 )
                    {
                      $notif = '<span class="label label-default">Delivered</span>';
                    }
                    elseif( $order_status_id == 4 )
                    {
                      $notif = '<span class="label label-default">Returned</span>';
                    }
                    elseif( $order_status_id == 5 )
                    {
                      $notif = '<span class="label label-danger">Return Date Passed</span>';
                    }

                    ?>

                      <div class="col-lg-4 col-md-4">
                        <div class="service-item wow fadeInUp booking-item" id="<?= $order_id; ?>" style="cursor:pointer;">
                          <center>
                            <div style="padding:40px;">
                              <img src="assets/images/vehicles/<?= $vehicle_photo_name; ?>">
                            </div>
                          </center>
                          <div class="service-content" style="margin-top:30px;">
                            <h3><?= $vehicle_name . " " . $vehicle_model; ?> <?= $notif; ?></h3>
                            <p>Booked on <?= $formatted_od; ?> | Delivery Date: <?= $formatted_pd; ?></p>
                          </div>
                          <div class="service-footer">
                            <hr>
                            <a href="booking-details?i=<?= $order_id; ?>" class="section-icon-btn"><img src="assets/images/arrow-white.svg" alt=""></a>
                          </div>
                        </div>
                      </div>

                    <?php

                  }
                ?>
              </div>
              <?php
            }
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

  <script type="text/javascript">
    $('.booking-item').click(function(){
      let order_id = $(this).attr('id');

      window.location.href = "booking-details?i=" + order_id;
    });
  </script>
</body>
</html>
