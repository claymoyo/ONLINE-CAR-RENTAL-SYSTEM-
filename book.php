<?php
require 'frag/header.php';
require 'config/dbconnect.php';
require 'utils/fetch_user_details.php';
require 'utils/fetch_vehicle_inventory_details.php';

// Fetch user details based on session
$session_usr = fetchSessionUserDetails( $pdo );
$usr_id = $session_usr['usr_id'];
$usr_firstname = $session_usr['usr_firstname'];

// Get booking details that was saved to the session
if( isset($_SESSION['booking_info']) )
{
	$booking_info = $_SESSION['booking_info'];
	$inventory_id = $booking_info['inventory_id'];
	$pickup_date = $booking_info['pickup_date'];
	$return_location = $booking_info['return_location'];
	$return_date = $booking_info['return_date'];

	// Let's get the vehicle details using the inventory ID
	$vehicle_details = fetchVehicleInventoryDetails($pdo, $inventory_id );
	$rate = $vehicle_details['vehicle_rate'];

	// Let's recalculate the duration incase the value was altered on the previous page
	$pd_date = DateTime::createFromFormat('m-d-Y', $pickup_date);
	$rd_date = DateTime::createFromFormat('m-d-Y', $return_date);
	$interval = $pd_date->diff($rd_date);
	$duration = $interval->days;

	// Total charge is the daily rate * duration + service charge
	$total_charge = ($rate * $duration) + 120;

	$pickup_date = str_replace("-", "/", $pickup_date);
	$return_date = str_replace("-", "/", $return_date);
}
else
{
	header('Location: /novaride/index');
}

?>
<title>Book Rental | Novaride #1 Car Rental Company</title>
<style media="screen">
.jumbotron{
	background-color:#f9f9f9;
	padding:50px;
	border-radius:30px;
	margin-bottom:20px;
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
			<div class="row">
				<div class="col-lg-8">
					<div class="jumbotron">
						<h3>Complete Booking</h3>
						<hr>

						<?php
						if( $session_usr == "empty" )
						{
							?>
							<div class="row">
								<div class="col-md-6">
									<div style="padding-top:20px;padding-bottom:20px;">
										<h4>Sign In</h4>
										<p>If you have an account with us, please log in</p>
										<a href="login?r=ref" class="btn-default">Log in</a>
									</div>
								</div>
								<div class="col-md-6">
									<div style="padding-top:20px;padding-bottom:20px;">
										<h4>Create account</h4>
										<p>If you're new here, please create an account</p>
										<a href="create-account?r=ref" class="btn-default">Create account</a>
									</div>
								</div>
							</div>
							<?php
						}
						else
						{
							?>
							<div>
								<p>Enter the delivery address for this order.
									The fields below will be prefilled with the last used address.
									Please confirm it is correct before submitting.
								</p>
								<?php
								try {
									// Get the last used delivery address
									$fetch_addr_query = " SELECT * FROM delivery_addresses WHERE user_id = :usr_id ORDER BY id DESC LIMIT 1 ";

									$fetch_addr_stmt = $pdo->prepare( $fetch_addr_query );

									$fetch_addr_stmt->bindParam(":usr_id", $usr_id);

									$fetch_addr_stmt->execute();

									$addr = $fetch_addr_stmt->fetch(PDO::FETCH_ASSOC);

									$del_addr = $addr['address'];
									$del_city = $addr['city'];
									$del_province = $addr['province'];
									$del_postal_code = $addr['postal_code'];
									$del_country_id = $addr['country_id'];

									?>
									<form class="del-addr">
										<div class="form-group col-md-12 mb-2">
											<label>Address</label>
											<textarea class="form-control" rows="8" cols="80" name="address" id="address" placeholder="Enter your address" required><?= $del_addr; ?></textarea>
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group col-md-12 mb-2">
													<label>City</label>
													<input type="text" value="<?= $del_city; ?>" name="city" class="form-control" id="city" placeholder="Enter your city" required>
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group col-md-12 mb-2">
													<label>Province</label>
													<input type="text" name="province" value="<?= $del_province; ?>" class="form-control" id="province" placeholder="Enter your province">
												</div>
											</div>

											<div class="col-md-4">
												<div class="form-group col-md-12 mb-2">
													<label>Country</label>
													<select class="form-control" name="country" required>
														<option value="">Choose Country</option>
														<?php
														$fetch_countries_query = " SELECT * FROM country ";
														$fetch_countries_stmt = $pdo->query( $fetch_countries_query );

														if( $fetch_countries_stmt->rowCount() > 0 )
														{
															while( $countries_result = $fetch_countries_stmt->fetch(PDO::FETCH_ASSOC) )
															{
																$db_country_id = $countries_result['id'];
																$db_country_name = $countries_result['country_name'];
																$selected = ($db_country_id == $del_country_id) ? 'selected' : '';

																?>
																<option value="<?= $db_country_id; ?>" <?= $selected; ?>><?= $db_country_name; ?></option>
																<?php
															}
														}
														?>
													</select>
												</div>
											</div>

											<div class="col-md-4">
												<div class="form-group col-md-12 mb-2">
													<label>Phone</label>
													<input type="text" name="phone" class="form-control" id="recipient_phone" placeholder="Enter your phone" required>
												</div>
											</div>

											<div class="col-md-4">
												<div class="form-group col-md-12 mb-2">
													<label>Postal Code</label>
													<input type="text" name="postal_code" value="<?= $del_postal_code; ?>" class="form-control" id="postal_code" placeholder="Enter your postal code">
												</div>
											</div>
										</div>

										<button type="submit" class="btn btn-short btn-save-addr" style="margin-top:10px;">Next Step <i class="fa fa-angle-right" style="font-size: 14px;"></i> </button>
									</form>
									<?php

								} catch (PDOException $e) {
									echo "Error: " . $e->getMessage();
								}

								?>
							</div>
							<?php
						}
						?>

						<hr>
						<p>By continuing to use our services, you acknowledge that your personal data will be processed in accordance
							with Rentcars’ Privacy Policy. By creating an account, you agree to our Terms of Use.</p>

					</div>
				</div>



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
							<!-- Feets Single Sidebar Pricing End -->

							<!-- Feets Single Sidebar List Start -->
							<div class="fleets-single-sidebar-list">
								<ul>
									<li><img src="assets/images/calendar-tick.svg">Delivery Date: <span><?= $pickup_date; ?></span></li>
									<li><img src="assets/images/calendar-tick.svg">Return Date: <span><?= $return_date; ?></span></li>
									<li><img src="assets/images/clock-2.svg">Duration: <span><?= $duration; ?> days</span></li>
									<li><img src="assets/images/return.svg">Return To: <span><?= ucfirst($return_location) . " office"; ?></span></li>
									<li><img src="assets/images/money.svg">Service Charge: <span>£120</span></li>
								</ul>
							</div>
							<!-- Feets Single Sidebar List End -->

							<!-- Feets Single Sidebar Btn Start -->
							<div class="fleets-single-sidebar-btn">
								<button type="button" class="btn btn-full btn-book" style="color:#fff;" disabled>Book now for £<?= number_format($total_charge, 2); ?></button>
							</div>
							<!-- Feets Single Sidebar Btn End -->
						</div>
					</div>
					<!-- Feets Single Sidebar End -->
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
		$('.del-addr').submit(function(){
			$.ajax({
				type:'POST',
				url:'controller/save_address.php',
				data: $(this).serialize(),
				beforeSend:function(){
					$('.btn-save-addr').text("Saving addresss...");
				},
				success:function( response ){
					if( response == "saved" )
					{
						$('.btn-save-addr').text("Address saved");
						$('.btn-save-addr').attr("disabled", true);
						$('.btn-save-addr').css("color", "#fff");
						$('.del-addr :input').attr("disabled", true);
						$('.btn-book').attr("disabled", false);
					}
					else
					{
						alert("Unable to save address. Error: " + response);
						$('.btn-save-addr').attr("disabled", false);
					}
				},
				error: function(jqXHR, textStatus, errorThrown) {
	        alert("Failed!");
		    }
			});

			return false;
		});

		$('.btn-book').click(function(){
			let recipient_phone = $('#recipient_phone').val();

			$.ajax({
				type:'POST',
				url:'controller/submit_booking.php',
				data:{ recipient_phone },
				beforeSend:function(){
					$('.btn-book').text("Placing order...");
					$('.btn-book').attr("disabled", true);
				},
				success:function( response ){
					if(response == "success")
					{
						$('.btn-book').text("Vehicle booked! Please wait...");
						$('.btn-book').attr("disabled", true);
						setTimeout(function(){
							window.location.href='account';
						}, 2000);
					}
					else
					{
						$('.btn-book').text("Failed!");
						$('.btn-book').attr("disabled", true);
						alert("Unable to submit your order. Error: " + response);
					}
				},
				error: function(jqXHR, textStatus, errorThrown) {
	        alert("Failed!");
		    }


			});


		});

	</script>
</body>
</html>
