<?php
require 'frag/header.php';
require 'config/dbconnect.php';
require 'utils/fetch_user_details.php';
require 'utils/fetch_vehicle_inventory_details.php';
require 'utils/fetch_order_user_details.php';

// Fetch user details based on session
$session_usr = fetchSessionUserDetails( $pdo );
$usr_id = $session_usr['usr_id'];
$usr_role_id = $session_usr['usr_role_id'];
$usr_fullname = $session_usr['usr_firstname'] . " " . $session_usr['usr_lastname'];

if( $session_usr == "empty" ){
  header('Location: index');
}
?>
<title>Orders Dispatched | Novaride #1 Car Rental Company</title>
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
        <h3 style="margin-top:30px;">Orders Dispatched</h3>
        <hr>
        <?php
          // Check for any record of booking
          $fetch_orders_received_stmt = $pdo->query("SELECT * FROM orders WHERE order_status_id = 2 ORDER BY id DESC ");

          if( $fetch_orders_received_stmt->rowCount() < 1 )
          {
            ?>
            <div class="jumbotron-large" style="text-align:center;padding:90px;">
              <img src="assets/images/image-search-no-results.webp" style="height:150px;" alt="">
              <h5 style="margin-top:20px;">You don't have any dispatched orders!</h5>
              <p>You're all caught up on all dispatched orders. Proceed to manage your returns!</p>
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
                    <th>Order Date</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Phone</th>
                    <th>Vehicle</th>
                    <th>Delivery Date</th>
                    <th>Return Date</th>
                    <th>Total Paid (£)</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $no = 1;

                    while($orders_received = $fetch_orders_received_stmt->fetch(PDO::FETCH_ASSOC))
                    {
                      $order_id = $orders_received['id'];
                      $order_user_id = $orders_received['user_id'];
                      $order_inventory_id = $orders_received['inventory_id'];
                      $pickup_date = $orders_received['pickup_date'];
                      $return_date = $orders_received['return_date'];
                      $return_location = $orders_received['return_location'];
                      $vehicle_rate = $orders_received['vehicle_rate'];
                      $service_charge = $orders_received['service_charge'];
                      $total_paid = $orders_received['total_amount'];
                      $damage_reported = $orders_received['damage_reported'];
                      $damage_fee = $orders_received['damage_fee'];
                      $recipient_phone = $orders_received['recipient_phone'];
                      $order_date_time = $orders_received['order_date_time'];

                      $vehicle_details = fetchVehicleInventoryDetails( $pdo, $order_inventory_id );
                      $order_user_details = fetchOrderUserDetails( $pdo, $order_user_id );

                      ?>
                      <tr>
                        <td><?= $no; ?></td>
                        <td><?= date("F d, Y h:ia", strtotime(str_replace("-", "/", $order_date_time))); ?></td>
                        <td><?= $order_user_details['order_usr_firstname']; ?></td>
                        <td><?= $order_user_details['order_usr_lastname']; ?></td>
                        <td><?= $recipient_phone; ?></td>
                        <td><?= $vehicle_details['vehicle_make'] . " " . $vehicle_details['vehicle_model']; ?></td>
                        <td><?= date("F d, Y", strtotime(str_replace("-", "/", $pickup_date))); ?></td>
                        <td><?= date("F d, Y", strtotime(str_replace("-", "/", $return_date))); ?></td>
                        <td><?= number_format($total_paid, 2); ?></td>
                        <td>
                          <a href="booking-details?i=<?= $order_id; ?>" class="btn btn-sm btn-short" style="padding: 5px !important;">View</a>
                          <button type="button" class="btn btn-sm btn-short btn-dispatched" id="<?= $order_id; ?>" style="padding: 5px !important;">Mark as Delivered</button>
                        </td>
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
  <script type="text/javascript">
    $('.btn-dispatched').click(function(){
      let new_status_val = 3;
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
