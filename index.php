<?php
/**
* Entry point for this web application.
*
* File Structure:
* '/frag/...' Fragment files for each page in the web app for reusability
* '/controller/...' handles logic
* '/config/dbconnection.php' handles DB connection. Other files like API connections should be placed here too
* 'filename.php' handles user input
*
* This helps keep the code DRY(Don't Repeat Yourself)
*
* @author Moyo
*/

require 'frag/header.php';
require 'config/dbconnect.php';
require 'utils/fetch_user_details.php';
require 'utils/fetch_vehicle_name.php';
require 'utils/fetch_vehicle_model.php';
require 'utils/fetch_vehicle_category.php';
require 'utils/fetch_power_train.php';

// Fetch user details based on session
$session_usr = fetchSessionUserDetails( $pdo );

?>
<!-- Page Title -->
<title>Novaride - Car Rental Company</title>
</head>
<body>
	<!-- Preloader Start -->
	<?php include 'frag/preloader.php'; ?>
	<!-- Preloader End -->

	<!-- Header Start -->
	<?php require 'frag/navbar.php'; ?>
	<!-- Header End -->

	<!-- Hero Section Start -->
	<div class="hero">
		<div class="hero-section bg-section parallaxie">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-12">
						<!-- Hero Content Start -->
						<div class="hero-content">
							<div class="section-title">
								<h3 class="wow fadeInUp">Welcome to Nova Ride</h3>
								<h1 class="text-anime-style-3" data-cursor="-opaque">Looking to save more on your rental car?</h1>
								<p class="wow fadeInUp" data-wow-delay="0.25s">Whether you're planning a weekend getaway, a business trip, or just need a reliable ride for the day, we offers a wide range of vehicles to suit your needs.</p>
							</div>

							<div class="hero-content-body wow fadeInUp" data-wow-delay="0.5s">
								<a href="index.html#" class="btn-default">book a rental</a>
								<a href="index.html#" class="btn-default btn-highlighted">learn more</a>
							</div>
						</div>
						<!-- Hero Content End -->
					</div>
				</div>
			</div>
		</div>

		<!-- Rent Details Section Start -->
		<div class="rent-details wow fadeInUp" data-wow-delay="0.75s">
			<div class="container">
				<!-- Filter Form Start -->
				<form class="filterForm" name="filterForm">
					<div class="row no-gutters align-items-center">
						<div class="col-md-12">
							<div class="rent-details-box">
								<div class="rent-details-form">
									<!-- Rent Details Item Start -->
									<div class="rent-details-item">
										<div class="icon-box">
											<img src="assets/images/icon-rent-details-1.svg" alt="">
										</div>
										<div class="rent-details-content">
											<h3>Car Type</h3>
											<select class="rent-details-form form-select vehicleCategory" required>
												<option value="" disabled selected>Choose Car Type</option>
												<?php
													// Fetch all car categories from db
													$fetch_car_cat_query = " SELECT * FROM vehicle_category ";
													$fetch_car_cat_result = $pdo->query($fetch_car_cat_query);

													if( $fetch_car_cat_result->rowCount() > 0 )
													{
														while( $car_cat_row = $fetch_car_cat_result->fetch(PDO::FETCH_ASSOC) )
														{
															$car_category_id = $car_cat_row['id'];
															$car_category_name = $car_cat_row['category_name'];

															echo '<option value="' . $car_category_id . '">' . $car_category_name . '</option>';
														}

													}
												?>
											</select>
										</div>
									</div>
									<!-- Rent Details Item End -->

									<!-- Rent Details Item Start -->
									<div class="rent-details-item">
										<div class="icon-box">
											<img src="assets/images/icon-rent-details-3.svg" alt="">
										</div>
										<div class="rent-details-content">
											<h3>Delivery date</h3>
											<p><input type="text" name="date" placeholder="MM/DD/YYYY" class="rent-details-form datepicker pickupDateField" required></p>
										</div>
									</div>
									<!-- Rent Details Item End -->

									<!-- Rent Details Item Start -->
									<div class="rent-details-item">
										<div class="icon-box">
											<img src="assets/images/icon-rent-details-4.svg" alt="">
										</div>
										<div class="rent-details-content">
											<h3>Return Location</h3>
											<select class="rent-details-form form-select returnLocation" required>
												<option value="" disabled selected>Return Location</option>
												<option value="london">London Office</option>
												<option value="liverpool">Liverpool Office</option>
												<option value="hull">Hull Office</option>
											</select>
										</div>
									</div>
									<!-- Rent Details Item End -->

									<!-- Rent Details Item Start -->
									<div class="rent-details-item" style="width: 230px !important;">
										<div class="icon-box">
											<img src="assets/images/icon-rent-details-5.svg" alt="">
										</div>
										<div class="rent-details-content">
											<h3>Return Date</h3>
											<p><input type="text" name="date" placeholder="MM/DD/YYYY" class="rent-details-form datepicker returnDateField" required></p>
										</div>
									</div>
									<!-- Rent Details Item End -->

									<div class="rent-details-item rent-details-search searchRentals" style="width: 80px !important;">
										<button type="submit" class="btn"><i class="fa-solid fa-magnifying-glass"></i></button>
									</div>
								</div>

							</div>
						</div>
					</div>
				</form>
				<!-- Filter Form End -->
			</div>
		</div>
		<!-- Rent Details Section End -->
	</div>
	<!-- Hero Section End -->

	<!-- About Us Section Start -->
	<div class="about-us">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6">
					<!-- About Us Image Start -->
					<div class="about-image">
						<!-- About Image Start -->
						<div class="about-img-1">
							<figure class="reveal">
								<img src="assets/images/about-img-1.jpg" alt="">
							</figure>
						</div>
						<!-- About Image End -->

						<!-- About Image Start -->
						<div class="about-img-2">
							<figure class="reveal">
								<img src="assets/images/about-img-2.jpg" alt="">
							</figure>
						</div>
						<!-- About Image End -->
					</div>
					<!-- About Us Image End -->
				</div>

				<div class="col-lg-6">
					<!-- About Us Content Start -->
					<div class="about-content">
						<!-- Section Title Start -->
						<div class="section-title">
							<h3 class="wow fadeInUp">about us</h3>
							<h2 class="wow fadeInUp" data-cursor="-opaque">Your trusted partner in reliable car rental</h2>
							<p class="wow fadeInUp" data-wow-delay="0.25s">Book a rental in the shortest possible time and have your vehicle delivered to you when you want it. No hassle, no bottle neck, different from the usual.</p>
						</div>
						<!-- Section Title End -->

						<!-- About Content Body Start -->
						<div class="about-content-body">
							<!-- About Trusted Booking Start -->
							<div class="about-trusted-booking wow fadeInUp" data-wow-delay="0.5s">
								<div class="icon-box">
									<img src="assets/images/icon-about-trusted-1.svg" alt="">
								</div>
								<div class="trusted-booking-content">
									<h3>Easy booking process</h3>
									<p>We have optimised our booking process so that our clients can experience the easiest and safest service</p>
								</div>
							</div>
							<!-- About Trusted Booking End -->

							<!-- About Trusted Booking Start -->
							<div class="about-trusted-booking wow fadeInUp" data-wow-delay="0.75s">
								<div class="icon-box">
									<img src="assets/images/icon-about-trusted-2.svg" alt="">
								</div>
								<div class="trusted-booking-content">
									<h3>convenient delivery & return process</h3>
									<p>We deliver your vehicle to your doorstep and ensure the return process is easy and fast. We know your time is valuable and we keep it that way!</p>
								</div>
							</div>
							<!-- About Trusted Booking End -->
						</div>
						<!-- About Content Body End -->

						<!-- About Content Footer Start -->
						<div class="about-content-footer wow fadeInUp" data-wow-delay="1s">
							<a href="about-us" class="btn-default">About Us</a>
						</div>
						<!-- About Content Footer End -->
					</div>
					<!-- About Us Content End -->
				</div>
			</div>
		</div>
	</div>
	<!-- About Us Section End -->

	<!-- Our Services Section Start -->
	<div class="our-services bg-section">
		<div class="container">
			<div class="row section-row">
				<div class="col-lg-12">
					<!-- Section Title Start -->
					<div class="section-title">
						<h3 class="wow fadeInUp">our services</h3>
						<h2 class="wow fadeInUp" data-cursor="-opaque">Explore our wide range of clients we cater to</h2>
					</div>
					<!-- Section Title End -->
				</div>
			</div>

			<div class="row">
				<div class="col-lg-3 col-md-6">
					<!-- Service Item Start -->
					<div class="service-item wow fadeInUp">
						<div class="icon-box">
							<img src="assets/images/icon-service-1.svg" alt="">
						</div>
						<div class="service-content">
							<h3>personal use car rental</h3>
							<p>Need a car for a period of time? We got you, anyday anytime!</p>
						</div>
						<div class="service-footer">
							<a href="index.html#" class="section-icon-btn"><img src="assets/images/arrow-white.svg" alt=""></a>
						</div>
					</div>
					<!-- Service Item End -->
				</div>

				<div class="col-lg-3 col-md-6">
					<!-- Service Item Start -->
					<div class="service-item wow fadeInUp" data-wow-delay="0.25s">
						<div class="icon-box">
							<img src="assets/images/icon-service-2.svg" alt="">
						</div>
						<div class="service-content">
							<h3>business car rental</h3>
							<p>Running a business? Rent our cars for premium services</p>
						</div>
						<div class="service-footer">
							<a href="index.html#" class="section-icon-btn"><img src="assets/images/arrow-white.svg" alt=""></a>
						</div>
					</div>
					<!-- Service Item End -->
				</div>

				<div class="col-lg-3 col-md-6">
					<!-- Service Item Start -->
					<div class="service-item wow fadeInUp" data-wow-delay="0.5s">
						<div class="icon-box">
							<img src="assets/images/icon-service-3.svg" alt="">
						</div>
						<div class="service-content">
							<h3>airport transfer rental</h3>
							<p>Our vehicles can be rented for your airport transfer needs</p>
						</div>
						<div class="service-footer">
							<a href="index.html#" class="section-icon-btn"><img src="assets/images/arrow-white.svg" alt=""></a>
						</div>
					</div>
					<!-- Service Item End -->
				</div>

				<div class="col-lg-3 col-md-6">
					<!-- Service Item Start -->
					<div class="service-item wow fadeInUp" data-wow-delay="0.75s">
						<div class="icon-box">
							<img src="assets/images/icon-service-4.svg" alt="">
						</div>
						<div class="service-content">
							<h3>chauffeur car rental</h3>
							<p>Rent our cars for your chauffeur business</p>
						</div>
						<div class="service-footer">
							<a href="index.html#" class="section-icon-btn"><img src="assets/images/arrow-white.svg" alt=""></a>
						</div>
					</div>
					<!-- Service Item End -->
				</div>

				<div class="col-lg-12">
					<!-- Service Box Footer Start -->
					<div class="services-box-footer wow fadeInUp" data-wow-delay="1s">
						<p>Need to rent a fleet of vehicles for business use or long term use? Our services cater to a wide range of people. Speak with our assistant today and get the best deal!</p>
						<a href="contact-us" class="btn-default">Speak with an agent</a>
					</div>
					<!-- Service Box Footer End -->
				</div>
			</div>
		</div>
	</div>
	<!-- Our Services Section End -->

	<!-- Perfect Fleets Section Start -->
	<div class="perfect-fleet bg-section">
		<div class="container-fluid">
			<div class="row section-row">
				<div class="col-lg-12">
					<!-- Section Title Start -->
					<div class="section-title">
						<h3 class="wow fadeInUp">our fleets</h3>
						<h2 class="wow fadeInUp" data-cursor="-opaque">Explore our perfect and extensive fleet</h2>
					</div>
					<!-- Section Title End -->
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
					<!-- Testimonial Slider Start -->
					<div class="car-details-slider">
						<div class="swiper">

							<div class="swiper-wrapper" data-cursor-text="Drag">
								<?php
									// Randomly fetch six records from the inventory table
									$rand_query = " SELECT * FROM inventory ORDER BY RAND() LIMIT 6 ";
									$rand_result = $pdo->query( $rand_query );

									if( $rand_result->rowCount() > 0 )
									{
										while( $rand_row = $rand_result->fetch(PDO::FETCH_ASSOC) )
										{
											$vehicle_id = $rand_row['id'];
											$vehicle_category_id = $rand_row['vehicle_category_id'];
											$vehicle_make_id = $rand_row['vehicle_make_id'];
											$vehicle_model_id = $rand_row['vehicle_model_id'];
											$power_train_id = $rand_row['power_train_id'];
											$max_passengers = $rand_row['max_passengers'];
											$transmission_type = $rand_row['transmission_type'];
											$num_doors = $rand_row['num_doors'];
											$num_bags = $rand_row['num_bags'];
											$photo_name = $rand_row['photo_name'];
											$rate = $rand_row['rate'];

											$vehicle_name = fetchVehicleName( $pdo, $vehicle_make_id );
											$vehicle_model = fetchVehicleModel( $pdo, $vehicle_model_id );
											$vehicle_category = fetchVehicleCategory( $pdo, $vehicle_category_id );
											$power_train = fetchPowerTrain( $pdo, $power_train_id );


											?>
											<!-- Fleet Slide Start -->
											<div class="swiper-slide">
												<!-- Perfect Fleets Item Start -->
												<div class="perfect-fleet-item">
													<!-- Image Box Start -->
													<div class="image-box">
														<img src="assets/images/vehicles/<?= $photo_name; ?>">
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
																<li><img src="assets/images/icon-fleet-list-1.svg" alt=""><?= $max_passengers; ?> passenger</li>
																<li><img src="assets/images/icon-fleet-list-2.svg" alt=""><?= $num_doors; ?>  doors</li>
																<li><img src="assets/images/icon-fleet-list-3.svg" alt=""><?= $num_bags; ?> bags</li>
																<li><img src="assets/images/icon-fleet-list-4.svg" alt=""><?= $power_train; ?></li>
															</ul>
														</div>
														<!-- Perfect Fleets Body End -->

														<!-- Perfect Fleets Footer Start -->
														<div class="perfect-fleet-footer">
															<!-- Perfect Fleets Pricing Start -->
															<div class="perfect-fleet-pricing">
																<h2>£<?= $rate; ?><span>/day</span></h2>
															</div>
															<!-- Perfect Fleets Pricing End -->

														</div>
														<!-- Perfect Fleets Footer End -->
													</div>
													<!-- Perfect Fleets Content End -->
												</div>
												<!-- Perfect Fleets Item End -->
											</div>
											<!-- Fleet Slide End -->
											<?php
										}
									}
									else
									{
										?>
										<h3>There are no vehicles saved at the moment!</h3>
										<p>Admin will be adding some shortly. Please bear with us!</p>
										<?php
									}

								?>

							</div>

							<div class="car-details-btn">
								<div class="car-button-prev"></div>
								<div class="car-button-next"></div>
							</div>
						</div>
					</div>
					<!-- Testimonial Slider End -->
				</div>
			</div>
		</div>
	</div>
	<!-- Perfect Fleets Section End -->

	<!-- Luxury Collection Section Start -->
	<div class="luxury-collection">
		<div class="container-fluid">
			<div class="row no-gutters">
				<div class="col-lg-12">
					<div class="luxury-collection-box">
						<!-- Standard Collection Item Start -->
						<div class="luxury-collection-item wow fadeInUp">
							<!-- Image Start -->
							<div class="luxury-collection-image" data-cursor-text="">
								<figure>
									<img src="assets/images/luxury-collection-img-1.jpg" alt="">
								</figure>
							</div>
							<!-- Image End -->

							<!-- Title Start -->
							<div class="luxury-collection-title">
								<h2>Standard</h2>
							</div>
							<!-- Title End -->
						</div>
						<!-- Standard Collection Item End -->

						<!-- Convertible Collection Item Start -->
						<div class="luxury-collection-item wow fadeInUp" data-wow-delay="0.25s">
							<!-- Image Start -->
							<div class="luxury-collection-image" data-cursor-text="">
								<figure>
									<img src="assets/images/luxury-collection-img-2.jpg" alt="">
								</figure>
							</div>
							<!-- Image End -->

							<!-- Title Start -->
							<div class="luxury-collection-title">
								<h2>Convertible</h2>
							</div>
							<!-- Title End -->

						</div>
						<!-- Convertible Collection Item End -->

						<!-- Economy Collection Item Start -->
						<div class="luxury-collection-item wow fadeInUp" data-wow-delay="0.5s">
							<!-- Image Start -->
							<div class="luxury-collection-image" data-cursor-text="">
								<figure>
									<img src="assets/images/luxury-collection-img-3.jpg" alt="">
								</figure>
							</div>
							<!-- Image End -->

							<!-- Title Start -->
							<div class="luxury-collection-title">
								<h2>Economy</h2>
							</div>
							<!-- Title End -->

						</div>
						<!-- Economy Collection Item End -->

						<!-- Luxury Collection Item Start -->
						<div class="luxury-collection-item wow fadeInUp" data-wow-delay="0.75s">
							<!-- Luxury Collection Image Start -->
							<div class="luxury-collection-image" data-cursor-text="">
								<figure>
									<img src="assets/images/luxury-collection-img-4.jpg" alt="">
								</figure>
							</div>
							<!-- Luxury Collection Image End -->

							<!-- Luxury Collection Title Start -->
							<div class="luxury-collection-title">
								<h2>Luxury</h2>
							</div>
							<!-- Luxury Collection Title End -->

						</div>
						<!-- Luxury Collection Item End -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Luxury Collection Section End -->

	<!-- How It Work Section Start -->
	<div class="how-it-work">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6">
					<!-- How Work Content Start -->
					<div class="how-work-content">
						<!-- Section Title Start -->
						<div class="section-title">
							<h3 class="wow fadeInUp">how it work</h3>
							<h2 class="text-anime-style-3" data-cursor="-opaque">Streamlined processes for a hassle-free experience</h2>
							<p class="wow fadeInUp" data-wow-delay="0.25s">Our streamlined process ensures a seamless car rental experience from start to finish. With easy online booking, flexible pick-up and drop-off options.</p>
						</div>
						<!-- Section Title End -->

						<!-- How Work Accordion Start -->
						<div class="how-work-accordion" id="workaccordion">
							<!-- FAQ Item Start -->
							<div class="accordion-item wow fadeInUp" data-wow-delay="0.5s">
								<div class="icon-box">
									<img src="assets/images/icon-how-it-work-1.svg" alt="">
								</div>
								<h2 class="accordion-header" id="workheading1">
									<button class="accordion-button" type="button" data-bs-toggle="collapse"
									data-bs-target="#workcollapse1" aria-expanded="true" aria-controls="workcollapse1">
									browse and select
								</button>
							</h2>
							<div id="workcollapse1" class="accordion-collapse collapse show" aria-labelledby="workheading1"
							data-bs-parent="#workaccordion">
							<div class="accordion-body">
								<p>Explore our diverse selection of high-end vehicles, choose your preferred pickup and return dates, and select a location that best fits your needs.</p>
							</div>
						</div>
					</div>
					<!-- FAQ Item End -->

					<!-- FAQ Item Start -->
					<div class="accordion-item wow fadeInUp" data-wow-delay="0.75s">
						<div class="icon-box">
							<img src="assets/images/icon-how-it-work-2.svg" alt="">
						</div>
						<h2 class="accordion-header" id="workheading2">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
							data-bs-target="#workcollapse2" aria-expanded="false" aria-controls="workcollapse2">
							book and confirm
						</button>
					</h2>
					<div id="workcollapse2" class="accordion-collapse collapse" aria-labelledby="workheading2"
					data-bs-parent="#workaccordion">
					<div class="accordion-body">
						<p>Explore our diverse selection of high-end vehicles, choose your preferred pickup and return dates, and select a location that best fits your needs.</p>
					</div>
				</div>
			</div>
			<!-- FAQ Item End -->

			<!-- FAQ Item Start -->
			<div class="accordion-item wow fadeInUp" data-wow-delay="1s">
				<div class="icon-box">
					<img src="assets/images/icon-how-it-work-3.svg" alt="">
				</div>
				<h2 class="accordion-header" id="workheading3">
					<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
					data-bs-target="#workcollapse3" aria-expanded="false" aria-controls="workcollapse3">
					book and enjoy
				</button>
			</h2>
			<div id="workcollapse3" class="accordion-collapse collapse" aria-labelledby="workheading3"
			data-bs-parent="#workaccordion">
			<div class="accordion-body">
				<p>Explore our diverse selection of high-end vehicles, choose your preferred pickup and return dates, and select a location that best fits your needs.</p>
			</div>
		</div>
	</div>
	<!-- FAQ Item End -->
</div>
<!-- How Work Accordion End -->
</div>
<!-- How Work Content End -->
</div>

<div class="col-lg-6">
	<!-- How Work Image Start -->
	<div class="how-work-image">
		<!-- How Work Image Start -->
		<div class="how-work-img">
			<figure class="reveal">
				<img src="assets/images/about-img-1.jpg" alt="">
			</figure>
		</div>
		<!-- How Work Image End -->

		<!-- Trusted Client Start -->
		<div class="trusted-client">
			<div class="trusted-client-content">
				<h3><span class="counter">5</span>m+ Trusted world wide global clients</h3>
			</div>
			<div class="trusted-client--image">
				<img src="assets/images/trusted-client-img.png" alt="">
			</div>
		</div>
		<!-- Trusted Client End -->
	</div>
	<!-- How It Work Image End -->
</div>
</div>
</div>
</div>
<!-- How It Work Section End -->

<!-- Intro Video Section Start -->
<div class="intro-video bg-section parallaxie">
	<div class="container">
		<div class="row section-row">
			<div class="col-lg-12">
				<!-- Section Title Start -->
				<div class="section-title">
					<h3 class="wow fadeInUp">Your #1 Car Rental Service</h3>
					<h2 class="text-anime-style-3" data-cursor="-opaque">Discover the ease and convenience of renting with Us</h2>
				</div>
				<!-- Section Title End -->
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<!-- Intro Video Box Start -->
				<div class="intro-video-box">
					<!-- Video Play Button Start -->
					<div class="video-play-button">

					</div>
					<!-- Video Play Button End -->

					<!-- Client Slider Start -->
					<div class="client-slider">
						<div class="swiper client_logo_slider">
							<div class="swiper-wrapper">
								<!-- company Logo Start -->
								<div class="swiper-slide">
									<div class="company-logo">
										<img src="assets/images/client-logo-1.svg" alt="">
									</div>
								</div>
								<!-- company Logo End -->

								<!-- company Logo Start -->
								<div class="swiper-slide">
									<div class="company-logo">
										<img src="assets/images/client-logo-2.svg" alt="">
									</div>
								</div>
								<!-- company Logo End -->

								<!-- company Logo Start -->
								<div class="swiper-slide">
									<div class="company-logo">
										<img src="assets/images/client-logo-3.svg" alt="">
									</div>
								</div>
								<!-- company Logo End -->

								<!-- company Logo Start -->
								<div class="swiper-slide">
									<div class="company-logo">
										<img src="assets/images/client-logo-4.svg" alt="">
									</div>
								</div>
								<!-- company Logo End -->

								<!-- company Logo Start -->
								<div class="swiper-slide">
									<div class="company-logo">
										<img src="assets/images/client-logo-5.svg" alt="">
									</div>
								</div>
								<!-- company Logo End -->

								<!-- company Logo Start -->
								<div class="swiper-slide">
									<div class="company-logo">
										<img src="assets/images/client-logo-6.svg" alt="">
									</div>
								</div>
								<!-- company Logo End -->

								<!-- company Logo Start -->
								<div class="swiper-slide">
									<div class="company-logo">
										<img src="assets/images/client-logo-5.svg" alt="">
									</div>
								</div>
								<!-- company Logo End -->

								<!-- company Logo Start -->
								<div class="swiper-slide">
									<div class="company-logo">
										<img src="assets/images/client-logo-4.svg" alt="">
									</div>
								</div>
								<!-- company Logo End -->
							</div>
						</div>
					</div>
					<!-- Client Slider End -->
				</div>
				<!-- Intro Video Box End -->
			</div>
		</div>
	</div>
</div>
<!-- Intro Video Section End -->

</div>
<!-- Our Faqs Accordion End -->
</div>
<!-- Our Faqs Content End -->
</div>
</div>
</div>
</div>
<!-- Our FAQs Section End -->

<!-- Our Testiminial Start -->
<div class="our-testimonial">
	<div class="container">
		<div class="row section-row">
			<div class="col-lg-12">
				<!-- Section Title Start -->
				<div class="section-title">
					<h3 class="wow fadeInUp">testimonials</h3>
					<h2 class="wow fadeInUp" data-cursor="-opaque">What our customers are saying about us</h2>
				</div>
				<!-- Section Title End -->
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<!-- Testimonial Slider Start -->
				<div class="testimonial-slider">
					<div class="swiper">
						<div class="swiper-wrapper" data-cursor-text="Drag">
							<!-- Testimonial Slide Start -->
							<div class="swiper-slide">
								<div class="testimonial-item">
									<div class="testimonial-header">
										<div class="testimonial-rating">
											<i class="fa-solid fa-star"></i>
											<i class="fa-solid fa-star"></i>
											<i class="fa-solid fa-star"></i>
											<i class="fa-solid fa-star"></i>
											<i class="fa-solid fa-star"></i>
										</div>
										<div class="testimonial-content">
											<p>Renting a car from nova ride was a great decision. Not only did I get a reliable and comfortable vehicle, but the prices were also very competitive.</p>
										</div>
									</div>
									<div class="testimonial-body">
										<div class="author-image">
											<figure class="image-anime">
												<img src="assets/images/author-1.jpg" alt="">
											</figure>
										</div>
										<div class="author-content">
											<h3>floyd miles</h3>
											<p>project manager</p>
										</div>
									</div>
								</div>
							</div>
							<!-- Testimonial Slide End -->

							<!-- Testimonial Slide Start -->
							<div class="swiper-slide">
								<div class="testimonial-item">
									<div class="testimonial-header">
										<div class="testimonial-rating">
											<i class="fa-solid fa-star"></i>
											<i class="fa-solid fa-star"></i>
											<i class="fa-solid fa-star"></i>
											<i class="fa-solid fa-star"></i>
											<i class="fa-regular fa-star"></i>
										</div>
										<div class="testimonial-content">
											<p>Renting a car from nova ride was a great decision. Not only did I get a reliable and comfortable vehicle, but the prices were also very competitive.</p>
										</div>
									</div>
									<div class="testimonial-body">
										<div class="author-image">
											<figure class="image-anime">
												<img src="assets/images/author-2.jpg" alt="">
											</figure>
										</div>
										<div class="author-content">
											<h3>annette black</h3>
											<p>project manager</p>
										</div>
									</div>
								</div>
							</div>
							<!-- Testimonial Slide End -->

							<!-- Testimonial Slide Start -->
							<div class="swiper-slide">
								<div class="testimonial-item">
									<div class="testimonial-header">
										<div class="testimonial-rating">
											<i class="fa-solid fa-star"></i>
											<i class="fa-solid fa-star"></i>
											<i class="fa-solid fa-star"></i>
											<i class="fa-regular fa-star"></i>
											<i class="fa-regular fa-star"></i>
										</div>
										<div class="testimonial-content">
											<p>Renting a car from nova ride was a great decision. Not only did I get a reliable and comfortable vehicle, but the prices were also very competitive.</p>
										</div>
									</div>
									<div class="testimonial-body">
										<div class="author-image">
											<figure class="image-anime">
												<img src="assets/images/author-3.jpg" alt="">
											</figure>
										</div>
										<div class="author-content">
											<h3>leslie alexander</h3>
											<p>project manager</p>
										</div>
									</div>
								</div>
							</div>
							<!-- Testimonial Slide End -->

							<!-- Testimonial Slide Start -->
							<div class="swiper-slide">
								<div class="testimonial-item">
									<div class="testimonial-header">
										<div class="testimonial-rating">
											<i class="fa-solid fa-star"></i>
											<i class="fa-solid fa-star"></i>
											<i class="fa-solid fa-star"></i>
											<i class="fa-solid fa-star"></i>
											<i class="fa-solid fa-star"></i>
										</div>
										<div class="testimonial-content">
											<p>Renting a car from nova ride was a great decision. Not only did I get a reliable and comfortable vehicle, but the prices were also very competitive.</p>
										</div>
									</div>
									<div class="testimonial-body">
										<div class="author-image">
											<figure class="image-anime">
												<img src="assets/images/author-4.jpg" alt="">
											</figure>
										</div>
										<div class="author-content">
											<h3>alis white</h3>
											<p>project manager</p>
										</div>
									</div>
								</div>
							</div>
							<!-- Testimonial Slide End -->
						</div>
						<div class="testimonial-btn">
							<div class="testimonial-button-prev"></div>
							<div class="testimonial-button-next"></div>
						</div>
					</div>
				</div>
				<!-- Testimonial Slider End -->
			</div>
		</div>
	</div>
</div>
<!-- Our Testiminial End -->

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
	$('.pickupDateField').change(function(){
		// Get the value of the pickup date
		let pickupDateVal = $('.pickupDateField').val();

		let result = checkDate(pickupDateVal);

		if( result == "past" )
		{
			alert("The selected date is in the past.");
			$('.pickupDateField').val('');
		}
	});

	$('.returnDateField').change(function(){
		// Get the value of the pickup date
		let returnDateVal = $('.returnDateField').val();

		let result = checkDate(returnDateVal);

		if( result == "past" )
		{
			alert("The selected date is in the past.");
			$('.returnDateField').val('');
		}
	});

	function checkDate( inputDate ){
		// Get current date
		var today = new Date();
    var currentDate = new Date(today.getFullYear(), today.getMonth(), today.getDate());

    // Convert pickup date to a Date object
    var parts = inputDate.split('/');
    var formattedInputDate = new Date(parts[2], parts[0] - 1, parts[1]);

    // Compare the dates
    if (formattedInputDate < currentDate) {
			return "past";
    }
	}


	// WHEN THE SEARCH ICON IS CLICKED
	$('.filterForm').submit(function(){
		let vehicleCategory = $('.vehicleCategory').val();
		let pickupDateField = $('.pickupDateField').val();
		let returnLocation = $('.returnLocation').val();
		let returnDateField = $('.returnDateField').val();

		pickupDateField = pickupDateField.split("/").join("-");
		returnDateField = returnDateField.split("/").join("-");

		// redirect
		window.location.href = "vehicle-list?vc=" + vehicleCategory + "&pd=" + pickupDateField + "&rl=" + returnLocation + "&rd=" + returnDateField;

		return false;

	});

</script>

</body>
</html>
