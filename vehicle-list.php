<?php
 require 'frag/header.php';
 require 'config/dbconnect.php';
 require 'utils/fetch_user_details.php';
 require 'utils/fetch_vehicle_name.php';
 require 'utils/fetch_vehicle_model.php';
 require 'utils/fetch_vehicle_category.php';
 require 'utils/fetch_power_train.php';

 // Fetch user details based on session
 $session_usr = fetchSessionUserDetails( $pdo );

 // Get values from URL
 $url_vehicle_cat_id = htmlspecialchars($_GET['vc'] ?? 'not_set', ENT_QUOTES, 'UTF-8');
 $url_pickup_date = htmlspecialchars($_GET['pd'] ?? 'not_set', ENT_QUOTES, 'UTF-8');
 $url_return_location = htmlspecialchars($_GET['rl'] ?? 'not_set', ENT_QUOTES, 'UTF-8');
 $url_return_date = htmlspecialchars($_GET['rd'] ?? 'not_set', ENT_QUOTES, 'UTF-8');
 $url_filter_cat_id = explode(',', htmlspecialchars($_GET['fvc'] ?? 'not_set', ENT_QUOTES, 'UTF-8'));
 $url_filter_power_train = explode(',', htmlspecialchars($_GET['fpt'] ?? 'not_set', ENT_QUOTES, 'UTF-8'));
 $url_filter_num_bags = explode(',', htmlspecialchars($_GET['fnb'] ?? 'not_set', ENT_QUOTES, 'UTF-8'));
 $url_filter_num_pass = explode(',', htmlspecialchars($_GET['fnp'] ?? 'not_set', ENT_QUOTES, 'UTF-8'));
 $fnb_p = htmlspecialchars($_GET['fnb'] ?? 'not_set', ENT_QUOTES, 'UTF-8');
 $fnp_p = htmlspecialchars($_GET['fnp'] ?? 'not_set', ENT_QUOTES, 'UTF-8');

?>
<title>Vehicle List | Novaride #1 Car Rental Company</title>
</head>
<body>
	<!-- Preloader Start -->
	<?php include 'frag/preloader.php'; ?>
	<!-- Preloader End -->

	<!-- Header Start -->
	<?php require 'frag/navbar.php'; ?>
	<!-- Header End -->

    <!-- Page Header Start -->
	<div class="page-header bg-section parallaxie">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<!-- Page Header Box Start -->
					<div class="page-header-box">
						<h1 class="text-anime-style-3" data-cursor="-opaque">Our Fleet</h1>
						<nav class="wow fadeInUp">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index">home</a></li>
								<li class="breadcrumb-item active" aria-current="page">fleet</li>
							</ol>
						</nav>
					</div>
					<!-- Page Header Box End -->
				</div>
			</div>
		</div>
	</div>
	<!-- Page Header End -->

    <!-- Page Fleets Start -->
    <div class="page-fleets">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
									<form class="filterForm" name="filterForm">
										<!-- Fleets Sidebar Start -->
                    <div class="fleets-sidebar wow fadeInUp">
                        <div class="fleets-sidebar-list-box">
                            <!-- Vehicle Category Sidebar List Start -->
                            <div class="fleets-sidebar-list">
                                <div class="fleets-list-title">
                                    <h3>Car Type</h3>
                                </div>

                                <ul>
																	<?php
																	// Fetch vehicle categories from db
																	$fetch_car_cat_query = "SELECT * FROM vehicle_category";
																	$fetch_car_cat_result = $pdo->query($fetch_car_cat_query);

																	if ($fetch_car_cat_result->rowCount() > 0) {
																		while ($car_cat_row = $fetch_car_cat_result->fetch(PDO::FETCH_ASSOC)) {
																			$car_category_id = $car_cat_row['id'];
																			$car_category_name = $car_cat_row['category_name'];

																			if( isset( $_GET['fvc'] ) )
																			{
																				$checked = (in_array($car_category_id, $url_filter_cat_id)) ? 'checked' : '';
																			}
																			else
																			{
																				$checked = ($url_vehicle_cat_id == $car_category_id) ? 'checked' : '';
																			}
																			?>
																			<li class="form-check">
																				<input class="form-check-input" type="checkbox" name="selected_categories[]" value="<?= $car_category_id; ?>" id="checkbox_<?= $car_category_id; ?>" <?= $checked; ?>>
																				<label class="form-check-label" for="checkbox_<?= $car_category_id; ?>"><?= $car_category_name; ?></label>
																			</li>
																			<?php
																		}
																	}
																	?>
                                </ul>
                            </div>
                            <!-- Vehicle Category Sidebar List End -->

                            <!-- Passengers Sidebar List Start -->
                            <div class="fleets-sidebar-list">
                                <div class="fleets-list-title">
                                    <h3>Passengers</h3>
                                </div>

																<select class="form-select selectedPassengers">
																	<option value="" disabled selected>All</option>
                                	<?php
																		for ($i=2; $i <= 9; $i++)
																		{
																			$selected = ($i == $fnp_p) ? 'selected' : '';
																			?>
																			<option value="<?= $i; ?>" <?= $selected; ?>><?= $i; ?> passengers</option>
																			<?php
																		}
																	?>
                                </select>
                            </div>
                            <!-- Passengers Sidebar List End -->

														<!-- Num of Bags Sidebar List Start -->
                            <div class="fleets-sidebar-list">
                                <div class="fleets-list-title">
                                    <h3>Number of Bags</h3>
                                </div>

                                <select class="form-select selectedBags">
																	<option value="" disabled selected>All</option>
                                	<?php
																		for ($i=2; $i <= 9 ; $i++)
																		{
																			$selected = ($i == $fnb_p) ? 'selected' : '';
																			?>
																			<option value="<?= $i; ?>" <?= $selected; ?>><?= $i; ?> bags</option>
																			<?php
																		}
																	?>
                                </select>
                            </div>
                            <!-- Num of Bags Sidebar List End -->

                            <!-- Power Train Sidebar List Start -->
                            <div class="fleets-sidebar-list">
                                <div class="fleets-list-title">
                                    <h3>Power Train</h3>
                                </div>

																<ul>
																	<?php
																	// Fetch power train from db
																	$fetch_power_train_query = "SELECT * FROM power_train";
																	$fetch_power_train_result = $pdo->query($fetch_power_train_query);

																	if ($fetch_power_train_result->rowCount() > 0) {
																		while ($power_train_row = $fetch_power_train_result->fetch(PDO::FETCH_ASSOC)) {
																			$power_train_id = $power_train_row['id'];
																			$power_train_name = $power_train_row['power_train_name'];
																			$checked = (in_array($power_train_id, $url_filter_power_train)) ? 'checked' : '';
																			?>
																			<li class="form-check">
																				<input class="form-check-input" type="checkbox" name="selected_power_train[]" value="<?= $power_train_id; ?>" id="chkbox_<?= $power_train_id; ?>" <?= $checked; ?>>
																				<label class="form-check-label" for="chkbox_<?= $power_train_id; ?>"><?= $power_train_name; ?></label>
																			</li>
																			<?php
																		}
																	}
																	?>
                                </ul>
                            </div>
                            <!-- Power Train Sidebar List End -->

														<button type="submit" class="btn btn-success btn-full" name="button">Search</button>
                        </div>
                    </div>
                    <!-- Fleets Sidebar End -->
									</form>

                </div>




                <!-- ====================================
                          M A I N   B O D Y
                =========================================-->
                <div class="col-lg-9">
                    <!-- Fleets Collection Box Start -->
                    <div class="fleets-collection-box">
                        <div class="row">
                          <?php
                          $list_query = "SELECT * FROM inventory WHERE vehicle_category_id = :vehicle_category_id";
                          $params = [":vehicle_category_id" => $url_vehicle_cat_id];

                          // Filter by vehicle category (multiple categories)
                          if (isset($_GET['fvc']) && !empty($_GET['fvc'])) {
                              $category_ids = explode(',', $_GET['fvc']);
                              $placeholders = implode(',', array_map(fn($k) => ":fvc_$k", array_keys($category_ids)));
                              $list_query .= " AND vehicle_category_id IN ($placeholders)";

                              foreach ($category_ids as $key => $id) {
                                  $params[":fvc_$key"] = (int)$id;
                              }
                          }

                          // Filter by power train (multiple power trains)
                          if (isset($_GET['fpt']) && !empty($_GET['fpt'])) {
                              $power_train_ids = explode(',', $_GET['fpt']);
                              $placeholders = implode(',', array_map(fn($k) => ":fpt_$k", array_keys($power_train_ids)));
                              $list_query .= " AND power_train_id IN ($placeholders)";

                              foreach ($power_train_ids as $key => $id) {
                                  $params[":fpt_$key"] = (int)$id;
                              }
                          }

                          // Filter by number of bags
                          if (isset($_GET['fnb']) && is_numeric($_GET['fnb'])) {
                              $list_query .= " AND num_bags <= :fnb";
                              $params[":fnb"] = (int)$_GET['fnb'];
                          }

                          // Filter by number of passengers
                          if (isset($_GET['fnp']) && is_numeric($_GET['fnp'])) {
                              $list_query .= " AND max_passengers <= :fnp";
                              $params[":fnp"] = (int)$_GET['fnp'];
                          }

                          // Prepare query
                          $list_stmt = $pdo->prepare($list_query);

                          // Execute query with parameters
                          $list_stmt->execute($params);

                          // Fetch results
                          if ($list_stmt->rowCount() > 0) {
                            while ($list_result = $list_stmt->fetch(PDO::FETCH_ASSOC)) {
                              $inventory_id = $list_result['id'];
                              $vehicle_make_id = $list_result['vehicle_make_id'];
                              $vehicle_category_id = $list_result['vehicle_category_id'];
                              $vehicle_model_id = $list_result['vehicle_model_id'];
                              $vehicle_max_passengers = $list_result['max_passengers'];
                              $vehicle_transmission_type = $list_result['transmission_type'];
                              $vehicle_power_train_id = $list_result['power_train_id'];
                              $vehicle_num_doors = $list_result['num_doors'];
                              $vehicle_num_bags = $list_result['num_bags'];
                              $vehicle_photo_name = $list_result['photo_name'];
                              $vehicle_rate = $list_result['rate'];

                              // Get vehicle name
                              $vehicle_name = fetchVehicleName( $pdo, $vehicle_make_id );
                              // Get vehicle category name
                              $vehicle_category = fetchVehicleCategory( $pdo, $vehicle_category_id );
                              // Get vehicle model name
                              $vehicle_model = fetchVehicleModel( $pdo, $vehicle_model_id );
                              // Get vehicle power train name
                              $vehicle_power_train = fetchPowerTrain( $pdo, $vehicle_power_train_id );

                              ?>
                              <div class="col-lg-4 col-md-6">
                                  <!-- Perfect Fleets Item Start -->
                                  <div class="perfect-fleet-item fleets-collection-item wow fadeInUp">
                                      <!-- Image Box Start -->
                                      <div class="image-box">
                                          <img src="assets/images/vehicles/<?= $vehicle_photo_name; ?>" alt="">
                                      </div>
                                      <!-- Image Box End -->

                                      <!-- Perfect Fleets Content Start -->
                                      <div class="perfect-fleet-content">
                                          <!-- Perfect Fleets Title Start -->
                                          <div class="perfect-fleet-title">
                                              <h3><?= $vehicle_category; ?></h3>
                                              <h2><?= $vehicle_name . " " . $vehicle_model; ?></h2>
                                          </div>
                                          <!-- Perfect Fleets Content End -->

                                          <!-- Perfect Fleets Body Start -->
                                          <div class="perfect-fleet-body">
                                              <ul>
                                                  <li><img src="assets/images/icon-fleet-list-1.svg" alt=""><?= $vehicle_max_passengers; ?> passenger</li>
                                                  <li><img src="assets/images/icon-fleet-list-2.svg" alt=""><?= $vehicle_num_doors; ?> door</li>
                                                  <li><img src="assets/images/icon-fleet-list-3.svg" alt=""><?= $vehicle_num_bags; ?> bags</li>
                                                  <li><img src="assets/images/icon-fleet-list-4.svg" alt=""><?= $vehicle_power_train; ?></li>
                                              </ul>
                                          </div>
                                          <!-- Perfect Fleets Body End -->

                                          <!-- Perfect Fleets Footer Start -->
                                          <div class="perfect-fleet-footer">
                                              <!-- Perfect Fleets Pricing Start -->
                                              <div class="perfect-fleet-pricing">
                                                  <h2>£<?= $vehicle_rate; ?><span>/day</span></h2>
                                              </div>
                                              <!-- Perfect Fleets Pricing End -->

                                              <!-- Perfect Fleets Btn Start -->
                                              <div class="perfect-fleet-btn">
                                                  <a href="vehicle-details?i=<?= $inventory_id; ?>&pd=<?= $url_pickup_date; ?>&rl=<?= $url_return_location; ?>&rd=<?= $url_return_date; ?>" class="section-icon-btn"><img src="assets/images/arrow-white.svg" alt=""></a>
                                              </div>
                                              <!-- Perfect Fleets Btn End -->
                                          </div>
                                          <!-- Perfect Fleets Footer End -->
                                      </div>
                                      <!-- Perfect Fleets Content End -->
                                  </div>
                                  <!-- Perfect Fleets Item End -->
                              </div>
                              <?php
                            }
                          } else {
                            echo "<p>No record found.</p>";
                          }
                          ?>

                        </div>
                    </div>
                    <!-- Fleets Collection Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Fleets End -->

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
      $(".filterForm").on("submit", function(event){
        event.preventDefault();

        let selectedCategories = [];
        $("input[name='selected_categories[]']:checked").each(function(){
            selectedCategories.push($(this).val());
        });

        let selectedCatString = selectedCategories.length > 0 ? "&fvc=" + selectedCategories.join(",") : "";

        // Passengers
        let selectedPassengers = $('.selectedPassengers').val();
        let selectedPassString = selectedPassengers !== null && "&fnp=" + selectedPassengers;

        // Number of Bags
        let selectedBags = $('.selectedBags').val();
        let selectedBagsString = selectedBags !== null && "&fnb=" + selectedBags;

        // Power Train
        let selectedPowerTrain = [];
        $("input[name='selected_power_train[]']:checked").each(function(){
            selectedPowerTrain.push($(this).val());
        });

        let selectedPowerTrainString = selectedPowerTrain.length > 0 ? "&fpt=" + selectedPowerTrain.join(",") : "";


        // Dealing with the URL
        let currentUrl = window.location.href;
        let rdIndex = currentUrl.indexOf('rd=');

        if (rdIndex !== -1)
        {
          let endOfRd = currentUrl.indexOf('&', rdIndex);
          if (endOfRd === -1) {
            endOfRd = currentUrl.length;
          }

          // Truncate the URL after the rd parameter
          let newUrl = currentUrl.substring(0, endOfRd);

          // Add values to the URL
          newUrl += selectedCatString + (selectedPassString ? selectedPassString : "") + (selectedBagsString ? selectedBagsString : "") + selectedPowerTrainString;

          window.location.href = newUrl;
        }
        else
        {
          window.location.href = "index";
        }



      });
    </script>
</body>
</html>
