<?php
require 'frag/header.php';
require 'config/dbconnect.php';
require 'utils/fetch_country_name.php';
require 'utils/fetch_user_details.php';
require 'utils/fetch_order_status.php';
require 'utils/fetch_booking_details.php';
require 'utils/fetch_vehicle_inventory_details.php';
require 'utils/fetch_order_user_details.php';

// Get order ID from URL
$url_order_id = htmlspecialchars($_GET['i'] ?? 'not_set', ENT_QUOTES, 'UTF-8');

// Fetch user details based on session
$session_usr = fetchSessionUserDetails( $pdo );
$usr_id = $session_usr['usr_id'];
$usr_role_id = $session_usr['usr_role_id'];
$usr_fullname = $session_usr['usr_firstname'] . " " . $session_usr['usr_lastname'];

if( $session_usr == "empty" ){
  header('Location: index');
}

// Get details of this order
$booking_details = fetchBookingDetails($pdo, $url_order_id, $usr_id, $usr_role_id);
$inventory_id = $booking_details['inventory_id'];
$order_user_id = $booking_details['booking_user_id'];

if( $booking_details == "denied" || $booking_details == null )
{
  header('Location: index');
}

// Get details of this vehicle
$vehicle_details = fetchVehicleInventoryDetails( $pdo, $inventory_id );

// Calculate total fees. Get total days for rent
$pd_date = DateTime::createFromFormat('m-d-Y', $booking_details['pickup_date']);
$rd_date = DateTime::createFromFormat('m-d-Y', $booking_details['return_date']);
$interval = $pd_date->diff($rd_date);
$duration = $interval->days;

?>
<title>Booking Details | Novaride #1 Car Rental Company</title>
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
  .center{
    text-align:center;
  }
  .returned-div{
    background-color:#6bc69c;
    color:#fff;
    padding:20px;
    border-radius:20px;
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
        <h3 style="margin-top:30px;">Booking Details</h3>
        <hr>
        <div class="row">
          <div class="col-md-4">
            <!-- Feets Single Sidebar Start -->
            <div class="fleets-single-sidebar">
                <div class="fleets-single-sidebar-box wow fadeInUp">
                    <!-- Feets Single Sidebar Pricing Start -->
                    <div class="fleets-single-sidebar-pricing" style="padding-bottom:0 !important;">
                      <img src="assets/images/vehicles/<?= $vehicle_details['vehicle_photo_name']; ?>">
                      <h3 style="margin-top:20px;margin-bottom:-5px;"><?= $vehicle_details['vehicle_make'] . " " . $vehicle_details['vehicle_model']; ?></h3>
                      <p><?= $vehicle_details['vehicle_category']; ?></p>
                    </div>

                    <div class="fleets-single-sidebar-list">
                        <ul>
                            <li><img src="assets/images/icon-fleets-single-sidebar-list-1.svg">Passengers <span><?= $vehicle_details['vehicle_max_passengers']; ?></span></li>
                            <li><img src="assets/images/icon-fleets-single-sidebar-list-2.svg">Max Bags <span><?= $vehicle_details['vehicle_num_bags']; ?></span></li>
                            <li><img src="assets/images/icon-fleets-single-sidebar-list-3.svg">Doors <span><?= $vehicle_details['vehicle_num_doors']; ?></span></li>
                            <li><img src="assets/images/gear.svg">Power Train <span><?= $vehicle_details['vehicle_power_train']; ?></span></li>
                            <li><img src="assets/images/icon-fleets-single-sidebar-list-4.svg">Transmission <span><?= $vehicle_details['vehicle_transmission_type']; ?></span></li>
                            <li><img src="assets/images/icon-fleets-single-sidebar-list-5.svg">Air Condition <span><?= $vehicle_details['vehicle_aircondition']; ?></span></li>
                        </ul>
                    </div>

                    <div class="fleets-single-sidebar-list">
                        <ul>
                            <li><img src="assets/images/money.svg">Vehicle Rate <span>£<?= $vehicle_details['vehicle_rate'] . "/day"; ?></span></li>
                            <li><img src="assets/images/clock.svg">Duration <span><?= $duration . " days"; ?></span></li>
                            <li><img src="assets/images/money.svg">Service Charge <span>£120</span></li>
                        </ul>
                    </div>
                    <!-- Feets Single Sidebar List End -->
                </div>

                <!-- Feets Single Sidebar Btn Start -->
                <h5>Total Paid <span style="float:right;">£<?= number_format($booking_details['total_amount'], 2); ?></span></h5>
                <!-- Feets Single Sidebar Btn End -->
            </div>
            <!-- Feets Single Sidebar End -->

          </div>




          <div class="col-md-8">
            <div>
              <div class="row">
                <div class="col-md-4">
                  <div class="service-item wow fadeInUp">
                    <div class="icon-box">
                        <img src="assets/images/calendar.svg" alt="">
                    </div>
                    <div class="service-content">
                        <h3>Booking Date</h3>
                        <p>This vehicle was booked on <?= date("F d, Y", strtotime(str_replace("-", "/", $booking_details['order_date_time']))); ?></p>
                    </div>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="service-item wow fadeInUp">
                    <div class="icon-box">
                        <img src="assets/images/calendar.svg" alt="">
                    </div>
                    <div class="service-content">
                        <h3>Delivery Date</h3>
                        <p>The delivery date for this vehicle is <?= date("F d, Y", strtotime(str_replace("-", "/", $booking_details['order_date_time']))); ?></p>
                    </div>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="service-item wow fadeInUp">
                    <div class="icon-box">
                        <img src="assets/images/return.svg" alt="">
                    </div>
                    <div class="service-content">
                        <h3>Return Date</h3>
                        <p>The return date for this vehicle is <?= date("F d, Y", strtotime(str_replace("-", "/", $booking_details['return_date']))); ?></p>
                    </div>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="service-item wow fadeInUp">
                    <div class="icon-box">
                        <img src="assets/images/map-pin.svg" alt="">
                    </div>
                    <div class="service-content">
                        <h3>Return Location</h3>
                        <p>The return location for this vehicle is <?= ucfirst($booking_details['return_location']) . " Office"; ?></p>
                    </div>
                  </div>
                </div>

                <div class="col-md-8">
                  <div class="service-item wow fadeInUp" style="background-color:#fff8f6;border-color:transparent;">
                    <div class="icon-box">
                        <img src="assets/images/order.svg" alt="">
                    </div>
                    <div class="service-content">
                        <h3>Order Status</h3>
                        <p>The order status at this time is <strong><?= $booking_details['order_status']; ?></strong>.
                          <?php
                            if( $usr_role_id == 1 )
                            {
                              echo 'To change status, click <span class="changeStatus" style="color:#000;text-decoration:underline;cursor:pointer;">here</span>';
                            }
                            else
                            {
                              echo 'For any dispute, contact our support team <a href="contact" style="color:#000;text-decoration:underline;">here</a>';
                            }
                          ?>
                        </p>
                    </div>
                  </div>
                </div>

                <?php
                  if( $booking_details['order_status'] == "Returned" )
                  {
                    ?>
                    <div class="returned-div">
                      <p style="margin-bottom:0;">This vehicle has been returned. It was received on <?= $booking_details['date_returned']; ?></p>
                    </div>
                    <?php
                  }

                ?>

              </div>
            </div>

            <?php
              /*===============================
                MORE INFO FOR ADMIN
              =================================*/
              if( $usr_role_id == 1 )
              {
                // Get details of the user that made this booking
                $order_user_details = fetchOrderUserDetails( $pdo, $order_user_id );

                ?>
                <h4 style="margin-bottom:20px;margin-top:30px;">Customer Information</h4>
                <hr>
                <div class="row">
                  <div class="col-md-4">
                    <div class="fleets-single-sidebar">
                        <div class="fleets-single-sidebar-box wow fadeInUp">
                            <div class="fleets-single-sidebar-pricing" style="padding-bottom:0 !important;border-color:transparent !important;">
                              <img src="assets/images/<?= $order_user_details['order_usr_avatar']; ?>">
                              <h6 style="margin-top:20px;margin-bottom:-5px;"><?= $order_user_details['order_usr_firstname'] . " " . $order_user_details['order_usr_lastname']; ?></h6>
                              <hr>

                              <p style="margin-bottom:0;"><strong>Delivery Address</strong> </p>
                              <p><?=
                                $booking_details['del_address'] . ", " .
                                $booking_details['del_addr_city'] . ", " .
                                $booking_details['del_addr_postal_code'] . ", " .
                                $booking_details['del_addr_province'] . ", " .
                                $booking_details['del_addr_country'];
                                ?>
                              </p>
                              <p style="margin-bottom:0;"><strong>Phone<br></strong> <?= $booking_details['recipient_phone']; ?></p>
                            </div>
                        </div>
                    </div>
                  </div>

                  <div class="col-md-8">
                    <div class="row">
                      <?php
                      // Get documents belonging to this customer
                      $my_docs_stmt = $pdo->prepare("SELECT * FROM user_documents WHERE user_id = ? ORDER BY id DESC ");
                      $my_docs_stmt->execute([$order_user_id]);

                      if( $my_docs_stmt->rowCount() < 1 )
                      {
                        ?>
                        <div class="col-md-12">
                          <div class="jumbotron-large" style="text-align:center;padding:90px;">
                            <img src="assets/images/document.svg" style="height:150px;" alt="">
                            <h5 style="margin-top:20px;">Customer has not uploaded any document</h5>
                            <p>Uploaded documents appear here</p>
                          </div>
                        </div>
                        <?php
                      }
                      else
                      {
                        while($my_docs = $my_docs_stmt->fetch(PDO::FETCH_ASSOC))
                        {
                          $document_id = $my_docs['id'];
                          $document_title = $my_docs['document_title'];
                          $file_name = $my_docs['file_name'];
                          $upload_date = $my_docs['upload_date'];
                          ?>

                            <div class="col-md-6">
                              <div class="service-item wow fadeInUp">
                                  <div class="icon-box">
                                      <img src="assets/images/file.svg">
                                  </div>
                                  <div class="service-content">
                                      <h3><?= $document_title; ?></h3>
                                      <p>Customer uploaded this document on <?= $upload_date; ?></p>
                                  </div>
                                  <div class="service-footer">
                                      <a href="assets/documents/<?= $file_name; ?>" class="section-icon-btn" target="_blank"><img src="assets/images/arrow-white.svg"></a>
                                  </div>
                              </div>
                            </div>
                          <?php
                        }

                      }

                      ?>
                    </div>
                  </div>

                </div>
                <?php

              }

            ?>





          </div>
        </div>
      </div>
		</div>
	</div>
	<!-- Page Feets Single End -->



  <!-- Modal -->
  <div id="changeStatusModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Change Booking Status</h4>
        </div>
        <div class="modal-body">
          <p style="margin-bottom:0;">Select the status</p>
          <select class="form-control new-status">
            <option value="" disabled selected>- Select-</option>
            <option value="1" <?= ($booking_details['order_status'] == "Order Received") ? "selected" : ""; ?> >Order Received</option>
            <option value="2" <?= ($booking_details['order_status'] == "Order Dispatched") ? "selected" : ""; ?>>Order Dispatched</option>
            <option value="3" <?= ($booking_details['order_status'] == "Delivered to Customer") ? "selected" : ""; ?>>Delivered to Customer</option>
            <option value="4" <?= ($booking_details['order_status'] == "Returned") ? "selected" : ""; ?>>Returned</option>
            <option value="5" <?= ($booking_details['order_status'] == "Return Date Passed") ? "selected" : ""; ?>>Return Date Passed</option>
          </select>

          <button type="button" class="btn btn-short btn_change_status" id="<?= $url_order_id; ?>" style="padding: 5px 10px;margin-top:10px;margin-bottom:30px;">Change Status</button>
        </div>
      </div>

    </div>
  </div>


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
    $('.changeStatus').click(function(){
      $("#changeStatusModal").modal('show');
    });

    $('.btn_change_status').click(function(){
      let new_status_val = $('.new-status').val();
      let bid = $(this).attr("id");
      let conf = confirm("You are about to change the booking status of this order. Are you sure you want to proceed?");

      if(conf)
      {
        $.ajax({
          type:'POST',
          url:'controller/change_booking_status.php',
          data:{ new_status_val, bid },
          beforeSend:function(){
            $(this).text("Please wait...");
            $(this).attr("disabled", true);
          },
          success:function( response ){
            if( response == "success" )
            {
              window.location.reload();
            }
            else
            {
              alert( response );
            }
          },
          error:function(){
            alert("Something went wrong!");
          }
        });
      }
    });
  </script>

</body>
</html>
