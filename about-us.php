<?php
require 'frag/header.php';
require 'config/dbconnect.php';
require 'utils/fetch_user_details.php';

// Fetch user details based on session
$session_usr = fetchSessionUserDetails( $pdo );

?>
<!-- Page Title -->
<title>About Us - Car Rental Company</title>
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
						<h1 class="text-anime-style-3" data-cursor="-opaque">About Us</h1>
						<nav class="wow fadeInUp">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index">home</a></li>
								<li class="breadcrumb-item active" aria-current="page">about us</li>
							</ol>
						</nav>
					</div>
					<!-- Page Header Box End -->
				</div>
			</div>
		</div>
	</div>
	<!-- Page Header End -->

    <!-- Page About Us Section Start -->
    <div class="about-us page-about-us">
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
                            <h2 class="text-anime-style-3" data-cursor="-opaque">Your trusted partner in reliable car rental</h2>
                            <p class="wow fadeInUp" data-wow-delay="0.25s">Book a rental in the shortest possible time and have your vehicle delivered to you when you want it. No hassle, no bottle neck, different from the usual.
                        <!-- Section Title End -->

                        <!-- About Content Body Start -->
                        <div class="about-content-body">
                            <!-- About Trusted Booking Start -->
                            <div class="about-trusted-booking wow fadeInUp" data-wow-delay="0.5s">
                                <div class="icon-box">
                                    <img src="assets/images/icon-about-trusted-1.svg" alt="">
                                </div>
                                <div class="trusted-booking-content">
                                    <h3>easy booking process</h3>
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
                    </div>
                    <!-- About Us Content End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page About Us Section End -->

    <!-- Exclusive Partners Section Start -->
    <div class="exclusive-partners bg-section">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">executive partners</h3>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">Trusted by leading brands</h2>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- Partners Logo Start -->
                    <div class="partners-logo wow fadeInUp" data-wow-delay="0.2s">
                        <img src="assets/images/uber.png" alt="">
                    </div>
                    <!-- Partners Logo End -->
                </div>
                <div class="col-lg-3 col-6">
                    <!-- Partners Logo Start -->
                    <div class="partners-logo wow fadeInUp" data-wow-delay="0.2s">
                        <img src="assets/images/uber.png" alt="">
                    </div>
                    <!-- Partners Logo End -->
                </div>
                <div class="col-lg-3 col-6">
                    <!-- Partners Logo Start -->
                    <div class="partners-logo wow fadeInUp" data-wow-delay="0.2s">
                        <img src="assets/images/uber.png" alt="">
                    </div>
                    <!-- Partners Logo End -->
                </div>
                <div class="col-lg-3 col-6">
                    <!-- Partners Logo Start -->
                    <div class="partners-logo wow fadeInUp" data-wow-delay="0.2s">
                        <img src="assets/images/uber.png" alt="">
                    </div>
                    <!-- Partners Logo End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Exclusive Partners Section End -->

    <!-- Vision Mission Section Start -->
    <div class="vision-mission">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">vision mission</h3>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">Driving excellence and innovation in car rental services</h2>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <!-- Sidebar Our Vision Mission Nav start -->
					<div class="our-projects-nav wow fadeInUp" data-wow-delay="0.25s">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#vision" type="button" role="tab" aria-selected="true">our vision</button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#mission" type="button" role="tab" aria-selected="false">our mission</button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#approach" type="button" role="tab" aria-selected="false">our approach</button>
                            </li>
                        </ul>
					</div>
					<!-- Sidebar Our Vision Mission Nav End -->

                    <!-- Vision Mission Box Start -->
                    <div class="vision-mission-box tab-content" id="myTabContent">
                        <!-- Our Vision Item Start -->
                        <div class="our-vision-item tab-pane fade show active" id="vision" role="tabpanel">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <!-- Vision Mission Content Start -->
                                    <div class="vision-mission-content">
                                        <!-- Section Title Start -->
                                        <div class="section-title">
                                            <h3 class="wow fadeInUp">our vision</h3>
                                            <h2 class="text-anime-style-3" data-cursor="-opaque">Pioneering excellence in car rental services</h2>
                                            <p class="wow fadeInUp" data-wow-delay="0.25s">We aim to continually innovate and integrate the latest technology into our services. From easy online bookings to advanced vehicle tracking systems, our goal is to make the car rental process seamless and efficient for our customers.  Quality is at the heart of everything we do. We maintain a diverse fleet of well-maintained vehicles that meet the highest standards of safety and comfort.</p>
                                        </div>
                                        <!-- Section Title End -->

                                        <!-- Vision Mission List Start -->
                                        <div class="vision-mission-list wow fadeInUp" data-wow-delay="0.5s">
                                            <ul>
                                                <li>Our customers are our top priority</li>
                                                <li>Quality is at the heart of everything we do</li>
                                                <li>every vehicle leaves care looking its absolute best</li>
                                            </ul>
                                        </div>
                                        <!-- Vision Mission List End -->
                                    </div>
                                    <!-- Vision Mission Content End -->
                                </div>

                                <div class="col-lg-6">
                                    <!-- Vision Image Start -->
                                    <div class="vision-image">
                                        <figure class="image-anime reveal">
                                            <img src="assets/images/our-vision-img.jpg" alt="">
                                        </figure>
                                    </div>
                                    <!-- Vision Image End -->
                                </div>
                            </div>
                        </div>
                        <!-- Our Vision Item End -->

                        <!-- Our Vision Item Start -->
                        <div class="our-vision-item tab-pane fade" id="mission" role="tabpanel">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <!-- Vision Mission Content Start -->
                                    <div class="vision-mission-content">
                                        <!-- Section Title Start -->
                                        <div class="section-title">
                                            <h3>our mission</h3>
                                            <h2 data-cursor="-opaque">Pioneering excellence in car rental services</h2>
                                            <p>We aim to continually innovate and integrate the latest technology into our services. From easy online bookings to advanced vehicle tracking systems, our goal is to make the car rental process seamless and efficient for our customers.  Quality is at the heart of everything we do. We maintain a diverse fleet of well-maintained vehicles that meet the highest standards of safety and comfort.</p>
                                        </div>
                                        <!-- Section Title End -->

                                        <!-- Vision Mission List Start -->
                                        <div class="vision-mission-list">
                                            <ul>
                                                <li>Our customers are our top priority</li>
                                                <li>Quality is at the heart of everything we do</li>
                                                <li>every vehicle leaves care looking its absolute best</li>
                                            </ul>
                                        </div>
                                        <!-- Vision Mission List End -->
                                    </div>
                                    <!-- Vision Mission Content End -->
                                </div>

                                <div class="col-lg-6">
                                    <!-- Vision Image Start -->
                                    <div class="vision-image">
                                        <figure class="image-anime reveal">
                                            <img src="assets/images/our-mission-img.jpg" alt="">
                                        </figure>
                                    </div>
                                    <!-- Vision Image End -->
                                </div>
                            </div>
                        </div>
                        <!-- Our Vision Item End -->

                        <!-- Our Mission Item Start -->
                        <div class="our-mission-item tab-pane fade" id="approach" role="tabpanel">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <!-- Vision Mission Content Start -->
                                    <div class="vision-mission-content">
                                        <!-- Section Title Start -->
                                        <div class="section-title">
                                            <h3>our approach</h3>
                                            <h2 data-cursor="-opaque">Pioneering excellence in car rental services</h2>
                                            <p>We aim to continually innovate and integrate the latest technology into our services. From easy online bookings to advanced vehicle tracking systems, our goal is to make the car rental process seamless and efficient for our customers.  Quality is at the heart of everything we do. We maintain a diverse fleet of well-maintained vehicles that meet the highest standards of safety and comfort.</p>
                                        </div>
                                        <!-- Section Title End -->

                                        <!-- Vision Mission List Start -->
                                        <div class="vision-mission-list">
                                            <ul>
                                                <li>Our customers are our top priority</li>
                                                <li>Quality is at the heart of everything we do</li>
                                                <li>every vehicle leaves care looking its absolute best</li>
                                            </ul>
                                        </div>
                                        <!-- Vision Mission List End -->
                                    </div>
                                    <!-- Vision Mission Content End -->
                                </div>

                                <div class="col-lg-6">
                                    <!-- Vision Image Start -->
                                    <div class="vision-image">
                                        <figure class="image-anime reveal">
                                            <img src="assets/images/our-approach-img.jpg" alt="">
                                        </figure>
                                    </div>
                                    <!-- Vision Image End -->
                                </div>
                            </div>
                        </div>
                        <!-- Our Mission Item End -->
                    </div>
                    <!-- Vision Mission Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Vision Mission Section End -->

    <!-- Our Video Section Start -->
    <div class="our-video bg-section">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">watch our video</h3>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">Discover what sets us apart in the car rental industry</h2>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-5">
                    <!-- Customer Counter Item Start -->
                    <div class="customer-counter-item">
                        <!-- Customer Counter Image Start -->
                        <div class="customer-counter-image">
                            <img src="assets/images/video-counter-img-1.jpg" alt="">
                        </div>
                        <!-- Customer Counter Image End -->

                        <!-- Satisfied Customer Counter Start -->
                        <div class="satisfied-customer-counter">
                            <h3><span class="counter">3100</span>+</h3>
                            <p>satisfied customer</p>
                        </div>
                        <!-- Satisfied Customer Counter End -->

                        <!-- Satisfied Customer Image Start -->
                        <div class="satisfied-customer-image">
                            <img src="assets/images/satisfied-customer-img.png" alt="">
                        </div>
                        <!-- Satisfied Customer Image End -->
                    </div>
                    <!-- Customer Counter Item End -->
                </div>

                <div class="col-lg-8 col-md-7">
                    <!-- Video Image Box Start -->
                    <div class="video-image-box">
                        <!-- Video Image Start -->
                        <div class="video-image">
                            <figure>
                                <img src="assets/images/video-counter-img-2.jpg" alt="">
                            </figure>
                        </div>
                        <!-- Video Image End -->

                    </div>
                    <!-- Video Image Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Our Video Section End -->


    <!-- Our Testiminial Start -->
    <div class="our-testimonial">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">testimonials</h3>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">What our customers are saying about us</h2>
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
	<script src="assets/js/theme-panel.js"></script>
</body>
</html>
