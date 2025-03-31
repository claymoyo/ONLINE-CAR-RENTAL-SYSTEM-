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

// Get id from URL
$url_inventory_id = htmlspecialchars($_GET['i'] ?? 'not_set', ENT_QUOTES, 'UTF-8');
// Get vehicle details
$vehicle_details = fetchVehicleInventoryDetails($pdo, $url_inventory_id );

?>
<title>View Inventory | Novaride #1 Car Rental Company</title>
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
  .header-image{
    height:400px;
    border-radius:20px;
    background-position:center;
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
        <h3 style="margin-top:30px;">Viewing Inventory</h3>
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
                            <li><img src="assets/images/money.svg">Service Charge <span>£120</span></li>
                        </ul>
                    </div>
                    <!-- Feets Single Sidebar List End -->
                </div>

            </div>
            <!-- Feets Single Sidebar End -->
          </div>





          <div class="col-md-8">
            <!-- Feets Single Content Start -->
            <div class="fleets-single-content">
                <!-- Feets Single Slider Start -->
                <div class="fleets-single-slider">
                    <div class="swiper">
                      <div class="header-image" style="background-image:url('assets/images/vehicles/header/<?= $vehicle_details['vehicle_interior_photo']; ?>');"></div>
                    </div>
                </div>
                <!-- Feets Single Slider End -->

                <div>
                  <h3 style="margin-bottom:20px;">Edit Vehicle Details</h3>

                  <div class="contact-us-form">
                    <form id="vehicleForm" enctype="multipart/form-data">
                      <div class="row">
                        <div class="form-group col-md-6 mb-4">
                          <label>Vehicle Make:</label>
                          <select class="form-control" name="vehicle_make" id="vehicle_make">
                            <option value="" selected disabled>-Select -</option>
                            <?php
                              $fetch_vn_stmt = $pdo->query("SELECT * FROM vehicle_make");
                              while( $vehicle_make_details = $fetch_vn_stmt->fetch(PDO::FETCH_ASSOC) )
                              {
                                $vehicle_make_id = $vehicle_make_details['id'];
                                $vehicle_make_name = $vehicle_make_details['vehicle_make_name'];
                                $selected = ($vehicle_details['vehicle_make_id'] == $vehicle_make_id) ? "selected" : "";
                                ?>
                                <option value="<?= $vehicle_make_id; ?>" <?= $selected; ?>><?= $vehicle_make_name; ?></option>
                                <?php
                              }
                            ?>
                          </select>
                        </div>

                        <div class="form-group col-md-6 mb-4">
                          <label>Vehicle Model:</label>
                          <select class="form-control" name="vehicle_model" id="vehicle_model">
                            <option value="" selected disabled>-Select -</option>
                            <?php
                              $fetch_vmodel_stmt = $pdo->query("SELECT * FROM vehicle_model");
                              while( $vehicle_model_details = $fetch_vmodel_stmt->fetch(PDO::FETCH_ASSOC) )
                              {
                                $vehicle_model_id = $vehicle_model_details['id'];
                                $vehicle_model_name = $vehicle_model_details['vehicle_model_name'];
                                $selected = ($vehicle_details['vehicle_model_id'] == $vehicle_model_id) ? "selected" : "";
                                ?>
                                <option value="<?= $vehicle_model_id; ?>" <?= $selected; ?>><?= $vehicle_model_name; ?></option>
                                <?php
                              }
                            ?>
                          </select>
                        </div>

                        <div class="form-group col-md-6 mb-4">
                          <label>Vehicle Category:</label>
                          <select class="form-control" name="vehicle_category" id="vehicle_category">
                            <option value="" selected disabled>-Select -</option>
                            <?php
                              $fetch_vc_stmt = $pdo->query("SELECT * FROM vehicle_category");
                              while( $vehicle_category = $fetch_vc_stmt->fetch(PDO::FETCH_ASSOC) )
                              {
                                $vehicle_cat_id = $vehicle_category['id'];
                                $vehicle_cat_name = $vehicle_category['category_name'];
                                $selected = ($vehicle_details['vehicle_category_id'] == $vehicle_cat_id) ? "selected" : "";
                                ?>
                                <option value="<?= $vehicle_cat_id; ?>" <?= $selected; ?>><?= $vehicle_cat_name; ?></option>
                                <?php
                              }
                            ?>
                          </select>
                        </div>

                        <div class="form-group col-md-6 mb-4">
                          <label>Power Train:</label>
                          <select class="form-control" name="power_train" id="power_train">
                            <option value="" selected disabled>-Select -</option>
                            <?php
                              $fetch_pt_stmt = $pdo->query("SELECT * FROM power_train");
                              while( $power_train = $fetch_pt_stmt->fetch(PDO::FETCH_ASSOC) )
                              {
                                $power_train_id = $power_train['id'];
                                $power_train_name = $power_train['power_train_name'];
                                $selected = ($vehicle_details['vehicle_power_train_id'] == $power_train_id) ? "selected" : "";
                                ?>
                                <option value="<?= $power_train_id; ?>" <?= $selected; ?>><?= $power_train_name; ?></option>
                                <?php
                              }
                            ?>
                          </select>
                        </div>

                        <div class="form-group col-md-6 mb-4">
                            <label>Max Passengers</label>
                            <input type="number" name="max_passengers" class="form-control" id="max_passengers" placeholder="Enter max passengers" min="1" value="<?= $vehicle_details['vehicle_max_passengers']; ?>" required>
                        </div>

                        <div class="form-group col-md-6 mb-4">
                            <label>Number of Doors</label>
                            <input type="number" name="num_doors" value="<?= $vehicle_details['vehicle_num_doors']; ?>" class="form-control" id="num_doors" placeholder="Enter num doors" min="1" required>
                        </div>
                        </div>

                        <div class="form-group col-md-12 mb-4">
                            <label>Number of Bags</label>
                            <input type="number" name="num_bags" value="<?= $vehicle_details['vehicle_num_bags']; ?>" class="form-control" id="num_bags" placeholder="Enter number of bags" min="1" required>
                        </div>

                        <div class="form-group col-md-12 mb-4">
                            <label>Vehicle Age</label>
                            <input type="number" name="vehicle_age" value="<?= $vehicle_details['vehicle_age']; ?>" class="form-control" id="vehicle_age" placeholder="Enter Vehicle Age" min="1" required>
                        </div>

                        <div class="form-group col-md-12 mb-4">
                            <label>Does it have an active Aircondition?</label>
                            <select class="form-control" name="aircondition" required>
                              <option value="" selected disabled>- Select -</option>
                              <option value="Yes" <?= ($vehicle_details['vehicle_aircondition'] == "Yes") ? "selected" : ""; ?> >Yes</option>
                              <option value="No" <?= ($vehicle_details['vehicle_aircondition'] == "No") ? "selected" : ""; ?> >No</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6 mb-4">
                            <label>Transmission Type</label>
                            <select class="form-control" name="transmission_type" required>
                              <option value="" selected disabled>- Select -</option>
                              <option value="Automatic" <?= ($vehicle_details['vehicle_transmission_type'] == "Automatic") ? "selected" : ""; ?> >Automatic</option>
                              <option value="Manual" <?= ($vehicle_details['vehicle_transmission_type'] == "Manual") ? "selected" : ""; ?> >Manual</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6 mb-4">
                            <label>Rate per day (£)</label>
                            <input type="text" name="rate" value="<?= $vehicle_details['vehicle_rate']; ?>" class="form-control" id="rate" placeholder="Enter Rate per day" required>
                        </div>

                        <div class="form-group col-md-6 mb-4">
                          <label>Upload New Vehicle Photo:</label>
                          <input type="file" name="vehicle_photo" class="form-control">
                        </div>

                        <div class="form-group col-md-6 mb-4">
                          <label>Upload New Interior Photo:</label>
                          <input type="file" name="interior_photo" class="form-control"><br>
                        </div>

                        <input type="hidden" name="inventory_id" value="<?= $url_inventory_id; ?>">

                        <div class="col-md-12 mb-4">
                          <button type="submit" class="btn btn-short btn-create-vehicle">Update Vehicle</button>
                        </div>

                      </div>
                    </form>
                  </div>

                </div>


            </div>
            <!-- Feets Single Content End -->




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
  <script src="assets/assets/js/theme-panel.js"></script>
  <script type="text/javascript">
    $('#vehicle_make').change(function(){
      var vm_id = $(this).val();

      $.ajax({
        type:'POST',
        url:'utils/fetch_all_vehicle_models.php',
        data:{ vm_id },
        beforeSend:function(){
          $('#vehicle_model').val('');
        },
        success:function( response )
        {
          $('#vehicle_model').html(response);
        },
        error:function(){
          alert("Failed!");
        }
      });
    });
    $('#vehicleForm').submit(function(e) {
        let formData = new FormData(this);

        $.ajax({
            url: 'controller/update_vehicle.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            beforeSend:function(){
              $('.btn-create-vehicle').text("Updating inventory...");
              $('.btn-create-vehicle').attr("disabled", true);
              $('.btn-create-vehicle').attr("color", "#fff");
            },
            success: function(response) {
              if( response == "success" )
              {
                $('.btn-create-vehicle').text("Vehicle updated successfully!");
                $('.btn-create-vehicle').attr("color", "#fff");
                setTimeout(function(){
                  window.location.reload();
                }, 2000);
              }
              else
              {
                alert(response);
                $('.btn-create-vehicle').attr("disabled", false);
              }
            },
            error:function(){
              alert("Unable to create vehicle!");
            }
        });

        return false;
    });
  </script>
</body>
</html>
