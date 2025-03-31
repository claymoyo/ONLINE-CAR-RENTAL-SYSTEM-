<?php
 require 'frag/header.php';
 require 'config/dbconnect.php';
 require 'utils/fetch_user_details.php';
 require 'utils/fetch_vehicle_inventory_details.php';

 // Fetch user details based on session
 $session_usr = fetchSessionUserDetails( $pdo );

 // Get values from URL
 $url_inventory_id = htmlspecialchars($_GET['i'] ?? 'not_set', ENT_QUOTES, 'UTF-8');
 $url_pickup_date = htmlspecialchars($_GET['pd'] ?? 'not_set', ENT_QUOTES, 'UTF-8');
 $url_return_location = htmlspecialchars($_GET['rl'] ?? 'not_set', ENT_QUOTES, 'UTF-8');
 $url_return_date = htmlspecialchars($_GET['rd'] ?? 'not_set', ENT_QUOTES, 'UTF-8');

 // Get vehicle details based on the inventory id
 $vehicle_details = fetchVehicleInventoryDetails($pdo, $url_inventory_id );
 $rate = $vehicle_details['vehicle_rate'];

 // Calculate total fees. Get total days for rent
 $pd_date = DateTime::createFromFormat('m-d-Y', $url_pickup_date);
 $rd_date = DateTime::createFromFormat('m-d-Y', $url_return_date);
 $interval = $pd_date->diff($rd_date);
 $duration = $interval->days;

 // Total charge is the daily rate * duration + service charge
 $total_charge = ($rate * $duration) + 120;

 $p_timestamp = DateTime::createFromFormat('m-d-Y', $url_pickup_date);
 $delivery_date = $p_timestamp->format('jS F Y');

 $r_timestamp = DateTime::createFromFormat('m-d-Y', $url_return_date);
 $return_date = $r_timestamp->format('jS F Y');

?>
<style media="screen">
  .header-image{
    height:400px;
    border-radius:20px;
    background-position:center;
  }
  .fleets-benefits-item {
    width: calc(30% - 10px) !important;
  }
  .ed-div{ width:100%;margin-bottom: -30px; }
  .ed-div > p{ text-align:center;text-decoration:underline;color:#ff3600;cursor:pointer; }
  .list-li > li{ font-size: 16px !important; }
</style>
<title>Vehicle Details | Novaride #1 Car Rental Company</title>
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
          <div class="row">
              <div class="col-lg-4">
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

                          <!-- Feets Single Sidebar Btn Start -->
                          <button type="button" class="btn btn-full btn-book" style="color:#fff;">Book now for £<?= number_format($total_charge, 2); ?></button>
                          <!-- Feets Single Sidebar Btn End -->
                      </div>

                  </div>
                  <!-- Feets Single Sidebar End -->
              </div>

              <div class="col-lg-8">
                  <!-- Feets Single Content Start -->
                  <div class="fleets-single-content">
                      <!-- Feets Single Slider Start -->
                      <div class="fleets-single-slider">
                          <div class="swiper">
														<div class="header-image" style="background-image:url('assets/images/vehicles/header/<?= $vehicle_details['vehicle_interior_photo']; ?>');"></div>
													</div>
                      </div>
                      <!-- Feets Single Slider End -->

                      <!-- Feets Benefits Start -->
                      <div class="fleets-benefits wow fadeInUp">
                          <!-- Feets Benefits Item Start -->
                          <div class="fleets-benefits-item">
                              <div class="icon-box">
                                  <img src="assets/images/calendar-tick.svg" alt="">
                              </div>
                              <div class="fleets-benefits-content">
                                  <h3 style="margin-bottom:0;">Delivery Date</h3>
                                  <p><?= $delivery_date; ?></p>
                              </div>
                          </div>
                          <!-- Feets Benefits Item End -->

                          <!-- Feets Benefits Item Start -->
                          <div class="fleets-benefits-item">
                              <div class="icon-box">
                                  <img src="assets/images/return.svg" alt="">
                              </div>
                              <div class="fleets-benefits-content">
                                  <h3 style="margin-bottom:0;">Return Date</h3>
                                  <p><?= $return_date; ?></p>
                              </div>
                          </div>
                          <!-- Feets Benefits Item End -->

                          <!-- Feets Benefits Item Start -->
                          <div class="fleets-benefits-item">
                              <div class="icon-box">
                                  <img src="assets/images/location.svg" alt="">
                              </div>
                              <div class="fleets-benefits-content">
                                  <h3 style="margin-bottom:0;">Return Location</h3>
                                  <p><?= ucfirst($url_return_location); ?> Office</p>
                              </div>
                          </div>
                          <!-- Feets Benefits Item End -->

													<div class="ed-div">
														<p class="wow fadeInUp" data-bs-toggle="modal" data-bs-target="#editDeliveryInfoModal"><i class="fa fa-edit"></i> Edit Details</p>
													</div>
                      </div>
                      <!-- Feets Benefits End -->

                      <!-- Feets Information Start -->
                      <div class="fleets-information">
                          <div class="section-title">
                              <h3 class="wow fadeInUp">general information</h3>
                              <h2 class="wow fadeInUp" data-cursor="-opaque">What are the requirements for renting a car?</h2>
															<p class="wow fadeInUp" style="font-size:17px;color:#000;margin-bottom:20px;">Renting a vehicle with us is designed to be a seamless and hassle-free experience. However, to ensure that we comply
																with government regulations and industry standards, we do have specific requirements in place. These steps are necessary
																to verify your eligibility to rent a vehicle, ensure your safety on the road, and protect both you and the vehicle during your
																rental period. By meeting these requirements, we can guarantee that your rental process is smooth, transparent, and in full compliance
																with all legal guidelines. Our goal is to provide you with the best possible service while prioritizing your safety and peace of
																mind throughout your journey. We require the following:
															</p>
															<div class="fleets-information-list wow fadeInUp" data-wow-delay="0.5s">
		                              <ul class="list-li">
																		<li>Minimum age: 25 years</li>
																		<li>Driver's license of the country (depends on the language)</li>
																		<li>Passport or ID</li>
																		<li>International credit card in the driver's name</li>
																		<li>Proof of reservation - pre-paid voucher</li>
		                              </ul>
		                          </div>
                          </div>
                      </div>
                      <!-- Feets Information End -->

                      <!-- Rental Conditions Faqs Start -->
                      <div class="rental-conditions-faqs">
                          <!-- Section Title Start -->
                          <div class="section-title">
                              <h3 class="wow fadeInUp">Rental Information</h3>
                              <h2 class="text-anime-style-3" data-cursor="-opaque">Policies and agreement</h2>
                          </div>
                          <!-- Section Title End -->

                          <!-- Rental Conditions FAQ Accordion Start -->
                          <div class="rental-condition-accordion" id="rentalaccordion">
                              <!-- FAQ Item Start -->
                              <div class="accordion-item wow fadeInUp">
                                  <h2 class="accordion-header" id="rentalheading1">
                                      <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                          data-bs-target="#rentalcollapse1" aria-expanded="true" aria-controls="rentalcollapse1">
                                          What documents do I need to rent a car?
                                      </button>
                                  </h2>
                                  <div id="rentalcollapse1" class="accordion-collapse collapse show" aria-labelledby="rentalheading1"
                                      data-bs-parent="#rentalaccordion">
                                      <div class="accordion-body">
                                          <p>To rent a car, you will need a valid driver’s license, a credit card for payment and security
																						deposit, proof of identity and other documents mentioned above. Depending on the location,
																						additional documents may be required.</p>
                                      </div>
                                  </div>
                              </div>
                              <!-- FAQ Item End -->

                              <!-- FAQ Item Start -->
                              <div class="accordion-item wow fadeInUp" data-wow-delay="0.25s">
                                  <h2 class="accordion-header" id="rentalheading2">
                                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                          data-bs-target="#rentalcollapse2" aria-expanded="false" aria-controls="rentalcollapse2">
                                          What is the minimum age to rent a car?
                                      </button>
                                  </h2>
                                  <div id="rentalcollapse2" class="accordion-collapse collapse" aria-labelledby="rentalheading2"
                                      data-bs-parent="#rentalaccordion">
                                      <div class="accordion-body">
																				<p>The minimum age to rent a car is typically 21, but this may vary based on the rental location and the type of vehicle. Drivers under 25 may be subject to an additional young driver surcharge.</p>
                                      </div>
                                  </div>
                              </div>
                              <!-- FAQ Item End -->

                              <!-- FAQ Item Start -->
                              <div class="accordion-item wow fadeInUp" data-wow-delay="0.5s">
                                  <h2 class="accordion-header" id="rentalheading3">
                                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                          data-bs-target="#rentalcollapse3" aria-expanded="false" aria-controls="rentalcollapse3">
                                          Can I rent a car without a credit card?
                                      </button>
                                  </h2>
                                  <div id="rentalcollapse3" class="accordion-collapse collapse" aria-labelledby="rentalheading3"
                                      data-bs-parent="#rentalaccordion">
                                      <div class="accordion-body">
																				<p>Most of our rentals require a credit card for payment and deposit. However, alternative payment options may be available, depending on the rental location.</p>
																			</div>
                                  </div>
                              </div>
                              <!-- FAQ Item End -->

                              <!-- FAQ Item Start -->
                              <div class="accordion-item wow fadeInUp" data-wow-delay="0.75s">
                                  <h2 class="accordion-header" id="rentalheading4">
                                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                          data-bs-target="#rentalcollapse4" aria-expanded="false" aria-controls="rentalcollapse4">
                                          Do I need insurance to rent a car?
                                      </button>
                                  </h2>
                                  <div id="rentalcollapse4" class="accordion-collapse collapse" aria-labelledby="rentalheading4"
                                      data-bs-parent="#rentalaccordion">
                                      <div class="accordion-body">
																				<p>Yes, insurance is required for renting a car. You can either use your own insurance policy (if it covers rental cars) or purchase rental insurance from us. We offer a range of coverage options for added peace of mind.</p>
                                      </div>
                                  </div>
                              </div>
                              <!-- FAQ Item End -->

                              <!-- FAQ Item Start -->
                              <div class="accordion-item wow fadeInUp" data-wow-delay="1s">
                                  <h2 class="accordion-header" id="rentalheading5">
                                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                          data-bs-target="#rentalcollapse5" aria-expanded="false" aria-controls="rentalcollapse5">
                                          Can I rent a car with an international driver’s license?
                                      </button>
                                  </h2>
                                  <div id="rentalcollapse5" class="accordion-collapse collapse" aria-labelledby="rentalheading5"
                                      data-bs-parent="#rentalaccordion">
                                      <div class="accordion-body">
																				<p>Yes, you can rent a car with an international driver’s license as long as it is accompanied by a valid passport and the original driver’s license from your home country.</p>
                                      </div>
                                  </div>
                              </div>
                              <!-- FAQ Item End -->

                              <!-- FAQ Item Start -->
                              <div class="accordion-item wow fadeInUp" data-wow-delay="1.25s">
                                  <h2 class="accordion-header" id="rentalheading6">
                                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                          data-bs-target="#rentalcollapse6" aria-expanded="false" aria-controls="rentalcollapse6">
                                          What happens if I return the car late?
                                      </button>
                                  </h2>
                                  <div id="rentalcollapse6" class="accordion-collapse collapse" aria-labelledby="rentalheading6"
                                      data-bs-parent="#rentalaccordion">
                                      <div class="accordion-body">
																				<p>Late returns may incur additional charges based on the length of the delay. Please inform us if you anticipate being late, and we will try to accommodate any changes to your rental period.</p>
                                      </div>
                                  </div>
                              </div>
                              <!-- FAQ Item End -->
                              <!-- FAQ Item Start -->
                              <div class="accordion-item wow fadeInUp" data-wow-delay="1.25s">
                                  <h2 class="accordion-header" id="rentalheading7">
                                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                          data-bs-target="#rentalcollapse7" aria-expanded="false" aria-controls="rentalcollapse7">
                                          Can I drive the rental car outside of the country?
                                      </button>
                                  </h2>
                                  <div id="rentalcollapse7" class="accordion-collapse collapse" aria-labelledby="rentalheading7"
                                      data-bs-parent="#rentalaccordion">
                                      <div class="accordion-body">
																				<p>Driving a rental car outside of the country may be allowed, but you will need to check with us for any specific restrictions, insurance coverage, and additional fees that may apply.</p>
																			</div>
                                  </div>
                              </div>
                              <!-- FAQ Item End -->
                              <!-- FAQ Item Start -->
                              <div class="accordion-item wow fadeInUp" data-wow-delay="1.25s">
                                  <h2 class="accordion-header" id="rentalheading8">
                                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                          data-bs-target="#rentalcollapse8" aria-expanded="false" aria-controls="rentalcollapse8">
                                          Is there a deposit required when renting a car?
                                      </button>
                                  </h2>
                                  <div id="rentalcollapse8" class="accordion-collapse collapse" aria-labelledby="rentalheading8"
                                      data-bs-parent="#rentalaccordion">
                                      <div class="accordion-body">
																				<p>Yes, a deposit is required when renting a car. The deposit amount will depend on the type of vehicle and rental location. This deposit is refundable if the car is returned in good condition with no additional charges.</p>
																			</div>
                                  </div>
                              </div>
                              <!-- FAQ Item End -->

                          </div>
                          <!-- Rental Conditions FAQ Accordion End -->
                      </div>
                      <!-- Rental Conditions Faqs End -->
                  </div>
                  <!-- Feets Single Content End -->
              </div>
          </div>
      </div>
  </div>
  <!-- Page Feets Single End -->



	<!-- Edit Delivery info Modal -->
  <div class="modal wow fadeInUp" id="editDeliveryInfoModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title">Edit Delivery Details</h6>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">
  				<!-- Rent Details Item Start -->
  				<div class="rent-details-item" style="width:100% !important;">
  					<div class="icon-box">
  						<img src="assets/images/icon-rent-details-3.svg" alt="">
  					</div>
  					<div class="rent-details-content">
  						<h3>Delivery date</h3>
  						<p><input type="text" name="date" value="<?= $url_pickup_date; ?>" class="rent-details-form datepicker pickupDateField" required></p>
  					</div>
  				</div>
  				<!-- Rent Details Item End -->

  				<!-- Rent Details Item Start -->
  				<div class="rent-details-item" style="width:100% !important;margin-top:20px;">
  					<div class="icon-box">
  						<img src="assets/images/icon-rent-details-3.svg" alt="">
  					</div>
  					<div class="rent-details-content">
  						<h3>Return date</h3>
  						<p><input type="text" name="date" value="<?= $url_return_date; ?>" class="rent-details-form datepicker returnDateField" required></p>
  					</div>
  				</div>
  				<!-- Rent Details Item End -->

  				<!-- Rent Details Item Start -->
  				<div class="rent-details-item" style="width:100% !important;margin-top:20px;">
  					<div class="icon-box">
  						<img src="assets/images/icon-rent-details-4.svg" alt="">
  					</div>
  					<div class="rent-details-content">
  						<h3>Return Location</h3>
  						<select class="rent-details-form form-select returnLocation" required>
  							<option value="" disabled selected>Return Location</option>
  							<option value="london" <?php if( $url_return_location == "london" ){ echo "selected"; } ?>>London Office</option>
  							<option value="liverpool" <?php if( $url_return_location == "liverpool" ){ echo "selected"; } ?>>Liverpool Office</option>
  							<option value="hull" <?php if( $url_return_location == "hull" ){ echo "selected"; } ?>>Hull Office</option>
  						</select>
  					</div>
  				</div>
  				<!-- Rent Details Item End -->
  				<button type="button" class="btn btn-success btn-full btn-update-details" style="margin-top:25px;">Update Details</button>
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
	<script src="assets/js/vehicleDetails.js"></script>
	<script src="assets/assets/js/theme-panel.js"></script>

	<script type="text/javascript">
		$('.btn-update-details').click(function(){
			let pickupDate = $('.pickupDateField').val();
			let returnDate = $('.returnDateField').val();
			let returnLocation = $('.returnLocation').val();
			let invetoryID = <?= $url_inventory_id; ?>;

			pickupDate = pickupDate.split("/").join("-");
			returnDate = returnDate.split("/").join("-");

			window.location.href = 'vehicle-details?i=' + invetoryID + '&pd=' + pickupDate + '&rl=' + returnLocation + '&rd=' + returnDate;
		});

		$('.btn-book').click(function(){
			let inventoryID = "<?= $url_inventory_id; ?>";
			let pickupDate = "<?= $url_pickup_date; ?>";
			let returnLocation = "<?= $url_return_location; ?>";
			let returnDate = "<?= $url_return_date; ?>";

			// Using ajax, save the values
			$.ajax({
			  type:'POST',
			  url:'controller/save_booking_info.php',
			  data: { pickupDate, returnDate, returnLocation, inventoryID },
			  success:function( response ){
			    window.location.href='/novaride/book';
			  }
			});
		});
	</script>
</body>
</html>
