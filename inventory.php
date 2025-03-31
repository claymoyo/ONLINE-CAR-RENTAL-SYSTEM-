<?php
require 'frag/header.php';
require 'config/dbconnect.php';
require 'utils/fetch_user_details.php';
require_once 'utils/fetch_vehicle_name.php';
require_once 'utils/fetch_vehicle_model.php';
require_once 'utils/fetch_vehicle_category.php';
require_once 'utils/fetch_power_train.php';

// Fetch user details based on session
$session_usr = fetchSessionUserDetails( $pdo );
$usr_id = $session_usr['usr_id'];
$usr_role_id = $session_usr['usr_role_id'];
$usr_fullname = $session_usr['usr_firstname'] . " " . $session_usr['usr_lastname'];

if( $session_usr == "empty" ){
  header('Location: index');
}
?>
<title>Inventory | Novaride #1 Car Rental Company</title>
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
  .upload-box{
    padding:40px;
    border: 3px dashed #ccc;
    border-radius: 25px !important;
    margin-bottom:40px;
    display: grid;
    place-items: center;
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
        <h3 style="margin-top:30px;">Inventory</h3>
        <hr>
        <button type="button" class="btn btn-short btn-add" style="margin-bottom:30px;">Add Vehicle</button>

        <?php
          // Load all vehicles
          $fetch_inv_stmt = $pdo->prepare("SELECT * FROM inventory ORDER BY id DESC ");
          $fetch_inv_stmt->execute([$usr_id]);

          if( $fetch_inv_stmt->rowCount() < 1 )
          {
            ?>
            <div class="jumbotron-large" style="text-align:center;padding:90px;">
              <img src="assets/images/image-search-no-results.webp" style="height:150px;" alt="">
              <h5 style="margin-top:20px;">You have no vehicle in your inventory!</h5>
              <p>You can create a new vehicle to add to your inventory</p>
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
                    <th>Make</th>
                    <th>Model</th>
                    <th>Category</th>
                    <th>Max Passengers</th>
                    <th>Transmission Type</th>
                    <th>Power Train</th>
                    <th>Rate(£)</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $no = 1;

                    while($inventory = $fetch_inv_stmt->fetch(PDO::FETCH_ASSOC))
                    {
                      $inventory_id = $inventory['id'];
                      $vehicle_category_id = $inventory['vehicle_category_id'];
                      $vehicle_make_id = $inventory['vehicle_make_id'];
                      $vehicle_model_id = $inventory['vehicle_model_id'];
                      $max_passengers = $inventory['max_passengers'];
                      $transmission_type = $inventory['transmission_type'];
                      $power_train_id = $inventory['power_train_id'];
                      $num_doors = $inventory['num_doors'];
                      $num_bags = $inventory['num_bags'];
                      $aircondition = $inventory['aircondition'];
                      $vehicle_age = $inventory['vehicle_age'];
                      $photo_name = $inventory['photo_name'];
                      $interior_photo = $inventory['interior_photo'];
                      $rate = $inventory['rate'];

                      // Fetch related data
                      $vehicle_make = fetchVehicleName($pdo, $vehicle_make_id) ?? "Unknown Make";
                      $vehicle_category = fetchVehicleCategory($pdo, $vehicle_category_id) ?? "Unknown Category";
                      $vehicle_model = fetchVehicleModel($pdo, $vehicle_model_id) ?? "Unknown Model";
                      $vehicle_power_train = fetchPowerTrain($pdo, $power_train_id) ?? "Unknown Power Train";

                      ?>
                      <tr>
                        <td><?= $no; ?></td>
                        <td><?= $vehicle_make; ?></td>
                        <td><?= $vehicle_model; ?></td>
                        <td><?= $vehicle_category; ?></td>
                        <td><?= $max_passengers; ?></td>
                        <td><?= $transmission_type; ?></td>
                        <td><?= $vehicle_power_train; ?></td>
                        <td><?= $rate; ?></td>
                        <td>
                          <a href="view-inventory?i=<?= $inventory_id; ?>" class="btn btn-sm btn-short btn-view" style="padding: 5px !important;">View</a>
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

  <!-- Modal -->
  <div id="add-new" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add New Vehicle</h4>
        </div>
        <div class="modal-body">
          <div class="container">
            <div class="contact-us-form">
              <form id="vehicleForm" enctype="multipart/form-data">
                <div class="row">
                  <div class="form-group col-md-12 mb-4">
                    <label>Vehicle Name:</label>
                    <select class="form-control" name="vehicle_make" id="vehicle_make">
                      <option value="" selected disabled>-Select -</option>
                      <?php
                        $fetch_vn_stmt = $pdo->query("SELECT * FROM vehicle_make");
                        while( $vehicle_make_details = $fetch_vn_stmt->fetch(PDO::FETCH_ASSOC) )
                        {
                          $vehicle_make_id = $vehicle_make_details['id'];
                          $vehicle_make_name = $vehicle_make_details['vehicle_make_name'];
                          ?>
                          <option value="<?= $vehicle_make_id; ?>"><?= $vehicle_make_name; ?></option>
                          <?php
                        }
                      ?>
                    </select>
                  </div>

                  <div class="form-group col-md-12 mb-4">
                    <label>Vehicle Model:</label>
                    <select class="form-control" name="vehicle_model" id="vehicle_model">
                      <option value="" selected disabled>-Select -</option>
                    </select>
                  </div>

                  <div class="form-group col-md-12 mb-4">
                    <label>Vehicle Category:</label>
                    <select class="form-control" name="vehicle_category" id="vehicle_category">
                      <option value="" selected disabled>-Select -</option>
                      <?php
                        $fetch_vc_stmt = $pdo->query("SELECT * FROM vehicle_category");
                        while( $vehicle_category = $fetch_vc_stmt->fetch(PDO::FETCH_ASSOC) )
                        {
                          $vehicle_cat_id = $vehicle_category['id'];
                          $vehicle_cat_name = $vehicle_category['category_name'];
                          ?>
                          <option value="<?= $vehicle_cat_id; ?>"><?= $vehicle_cat_name; ?></option>
                          <?php
                        }
                      ?>
                    </select>
                  </div>

                  <div class="form-group col-md-12 mb-4">
                    <label>Power Train:</label>
                    <select class="form-control" name="power_train" id="power_train">
                      <option value="" selected disabled>-Select -</option>
                      <?php
                        $fetch_pt_stmt = $pdo->query("SELECT * FROM power_train");
                        while( $power_train = $fetch_pt_stmt->fetch(PDO::FETCH_ASSOC) )
                        {
                          $power_train_id = $power_train['id'];
                          $power_train_name = $power_train['power_train_name'];
                          ?>
                          <option value="<?= $power_train_id; ?>"><?= $power_train_name; ?></option>
                          <?php
                        }
                      ?>
                    </select>
                  </div>

                  <div class="form-group col-md-6 mb-4">
                      <label>Max Passengers</label>
                      <input type="number" name="max_passengers" class="form-control" id="max_passengers" placeholder="Enter max passengers" min="1" required>
                  </div>

                  <div class="form-group col-md-6 mb-4">
                      <label>Number of Doors</label>
                      <input type="number" name="num_doors" class="form-control" id="num_doors" placeholder="Enter num doors" min="1" required>
                  </div>
                  </div>

                  <div class="form-group col-md-12 mb-4">
                      <label>Number of Bags</label>
                      <input type="number" name="num_bags" class="form-control" id="num_bags" placeholder="Enter number of bags" min="1" required>
                  </div>

                  <div class="form-group col-md-12 mb-4">
                      <label>Vehicle Age</label>
                      <input type="number" name="vehicle_age" class="form-control" id="vehicle_age" placeholder="Enter Vehicle Age" min="1" required>
                  </div>

                  <div class="form-group col-md-12 mb-4">
                      <label>Does it have an active Aircondition?</label>
                      <select class="form-control" name="aircondition" required>
                        <option value="" selected disabled>- Select -</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                      </select>
                  </div>

                  <div class="form-group col-md-12 mb-4">
                      <label>Transmission Type</label>
                      <select class="form-control" name="transmission_type" required>
                        <option value="" selected disabled>- Select -</option>
                        <option value="automatic">Automatic</option>
                        <option value="manual">Manual</option>
                      </select>
                  </div>

                  <div class="form-group col-md-12 mb-4">
                      <label>Rate per day (£)</label>
                      <input type="text" name="rate" class="form-control" id="rate" placeholder="Enter Rate per day" required>
                  </div>

                  <div class="form-group col-md-12 mb-4">
                    <label>Upload Vehicle Photo:</label>
                    <input type="file" name="vehicle_photo" class="form-control" required>
                  </div>

                  <div class="form-group col-md-12 mb-4">
                    <label>Upload Interior Photo:</label>
                    <input type="file" name="interior_photo" class="form-control" required><br>
                  </div>

                  <div class="col-md-12 mb-4">
                    <button type="submit" class="btn btn-short btn-create-vehicle">Create Vehicle</button>
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
    $('.btn-add').click(function(){
      $('#add-new').modal('show');
    });

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
            url: 'controller/create_vehicle.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            beforeSend:function(){
              $('.btn-create-vehicle').text("Creating vehicle...");
              $('.btn-create-vehicle').attr("disabled", true);
            },
            success: function(response) {
              if( response == "success" )
              {
                $('.btn-create-vehicle').text("Vehicle created successfully!");
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
