<?php
require 'frag/header.php';
require 'config/dbconnect.php';
require 'utils/fetch_user_details.php';

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

    <!-- Page Header Start -->
	<div class="page-header bg-section parallaxie">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<!-- Page Header Box Start -->
					<div class="page-header-box">
						<h1 class="text-anime-style-3" data-cursor="-opaque">Our Services</h1>
						<nav class="wow fadeInUp">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index">home</a></li>
								<li class="breadcrumb-item active" aria-current="page">services</li>
							</ol>
						</nav>
					</div>
					<!-- Page Header Box End -->
				</div>
			</div>
		</div>
	</div>
	<!-- Page Header End -->

    <!-- Page Services Section Start -->
    <div class="page-services">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <!-- Service Item Start -->
                    <div class="service-item wow fadeInUp">
                        <div class="icon-box">
                            <img src="assets/images/icon-service-1.svg" alt="">
                        </div>
                        <div class="service-content">
                            <h3>car rental with driver</h3>
                            <p>Enhance your rental experience with additional options.</p>
                        </div>
                        <div class="service-footer">
                            <a href="service.html#" class="section-icon-btn"><img src="assets/images/arrow-white.svg" alt=""></a>
                        </div>
                    </div>
                    <!-- Service Item End -->
                </div>

                <div class="col-lg-3 col-md-6">
                    <!-- Service Item Start -->
                    <div class="service-item wow fadeInUp" data-wow-delay="0.2s">
                        <div class="icon-box">
                            <img src="assets/images/icon-service-2.svg" alt="">
                        </div>
                        <div class="service-content">
                            <h3>business car rental</h3>
                            <p>Enhance your rental experience with additional options.</p>
                        </div>
                        <div class="service-footer">
                            <a href="service.html#" class="section-icon-btn"><img src="assets/images/arrow-white.svg" alt=""></a>
                        </div>
                    </div>
                    <!-- Service Item End -->
                </div>

                <div class="col-lg-3 col-md-6">
                    <!-- Service Item Start -->
                    <div class="service-item wow fadeInUp" data-wow-delay="0.4s">
                        <div class="icon-box">
                            <img src="assets/images/icon-service-3.svg" alt="">
                        </div>
                        <div class="service-content">
                            <h3>airport transfer</h3>
                            <p>Enhance your rental experience with additional options.</p>
                        </div>
                        <div class="service-footer">
                            <a href="service.html#" class="section-icon-btn"><img src="assets/images/arrow-white.svg" alt=""></a>
                        </div>
                    </div>
                    <!-- Service Item End -->
                </div>

                <div class="col-lg-3 col-md-6">
                    <!-- Service Item Start -->
                    <div class="service-item wow fadeInUp" data-wow-delay="0.6s">
                        <div class="icon-box">
                            <img src="assets/images/icon-service-4.svg" alt="">
                        </div>
                        <div class="service-content">
                            <h3>chauffeur services</h3>
                            <p>Enhance your rental experience with additional options.</p>
                        </div>
                        <div class="service-footer">
                            <a href="service.html#" class="section-icon-btn"><img src="assets/images/arrow-white.svg" alt=""></a>
                        </div>
                    </div>
                    <!-- Service Item End -->
                </div>

                <div class="col-lg-3 col-md-6">
                    <!-- Service Item Start -->
                    <div class="service-item wow fadeInUp" data-wow-delay="0.8s">
                        <div class="icon-box">
                            <img src="assets/images/icon-service-5.svg" alt="">
                        </div>
                        <div class="service-content">
                            <h3>private transfer</h3>
                            <p>Enhance your rental experience with additional options.</p>
                        </div>
                        <div class="service-footer">
                            <a href="service.html#" class="section-icon-btn"><img src="assets/images/arrow-white.svg" alt=""></a>
                        </div>
                    </div>
                    <!-- Service Item End -->
                </div>

                <div class="col-lg-3 col-md-6">
                    <!-- Service Item Start -->
                    <div class="service-item wow fadeInUp" data-wow-delay="1s">
                        <div class="icon-box">
                            <img src="assets/images/icon-service-6.svg" alt="">
                        </div>
                        <div class="service-content">
                            <h3>VIP transfer</h3>
                            <p>Enhance your rental experience with additional options.</p>
                        </div>
                        <div class="service-footer">
                            <a href="service.html#" class="section-icon-btn"><img src="assets/images/arrow-white.svg" alt=""></a>
                        </div>
                    </div>
                    <!-- Service Item End -->
                </div>

                <div class="col-lg-3 col-md-6">
                    <!-- Service Item Start -->
                    <div class="service-item wow fadeInUp" data-wow-delay="1.2s">
                        <div class="icon-box">
                            <img src="assets/images/icon-service-7.svg" alt="">
                        </div>
                        <div class="service-content">
                            <h3>roadside assistance</h3>
                            <p>Enhance your rental experience with additional options.</p>
                        </div>
                        <div class="service-footer">
                            <a href="service.html#" class="section-icon-btn"><img src="assets/images/arrow-white.svg" alt=""></a>
                        </div>
                    </div>
                    <!-- Service Item End -->
                </div>

                <div class="col-lg-3 col-md-6">
                    <!-- Service Item Start -->
                    <div class="service-item wow fadeInUp" data-wow-delay="1.4s">
                        <div class="icon-box">
                            <img src="assets/images/icon-service-8.svg" alt="">
                        </div>
                        <div class="service-content">
                            <h3>event transportation</h3>
                            <p>Enhance your rental experience with additional options.</p>
                        </div>
                        <div class="service-footer">
                            <a href="service.html#" class="section-icon-btn"><img src="assets/images/arrow-white.svg" alt=""></a>
                        </div>
                    </div>
                    <!-- Service Item End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Services Section End -->

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
	<script src="assets/assets/js/theme-panel.js"></script>
</body>
</html>
