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

?>
<title>My Documents | Novaride #1 Car Rental Company</title>
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
        <h3 style="margin-top:30px;">My Documents</h3>
        <hr>

        <div class="upload-box">
          <h5 style="margin-bottom:10px;">Upload Document here</h5>
          <form class="uploadForm" method="post" enctype="multipart/form-data">
            <input type="file" name="file" accept="application/pdf" required>
            <div style="margin-top:10px;margin-bottom:10px;">
              <p style="margin-bottom:0;">Document Title</p>
              <input type="text" name="document-title" class="form-control document-title" style="width:300px;" required>
            </div>
            <button type="submit" class="btn btn-short btn-upload" name="submit">Upload</button>
          </form>
        </div>



        <div class="row data-row">
          <?php
            // Get documents
            $my_docs_stmt = $pdo->prepare("SELECT * FROM user_documents WHERE user_id = ? ORDER BY id DESC ");
            $my_docs_stmt->execute([$usr_id]);

            if( $my_docs_stmt->rowCount() < 1 )
            {
              ?>
              <div class="col-md-12">
                <div class="jumbotron-large" style="text-align:center;padding:90px;">
                  <img src="assets/images/document.svg" style="height:150px;" alt="">
                  <h5 style="margin-top:20px;">You have not uploaded your Drivers License and Insurance</h5>
                  <p>You need to upload your license and Insurance before your vehicle will be delivered to you!</p>
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

                  <div class="col-lg-3 col-md-6">
                    <div class="service-item wow fadeInUp">
                        <div class="icon-box">
                            <img src="assets/images/file.svg">
                        </div>
                        <div class="service-content">
                            <h3><?= $document_title; ?></h3>
                            <p>You uploaded this document on <?= $upload_date; ?></p>
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
  <script src="assets/js/my-documents.js"></script>

</body>
</html>
