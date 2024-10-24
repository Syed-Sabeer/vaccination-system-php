<?php 
include("../Utilities/connection.php");
include("./Common/Nav.php");
?>
<?php
session_start(); // Start the session

// Check if registration steps are completed
if (!isset($_SESSION['registration_step']) || $_SESSION['registration_step'] < 1) {
    header("Location: signup.php"); // Redirect to the signup page if step 1 is not completed
    exit;
}

// Check if the user has completed step 2
if ($_SESSION['registration_step'] < 2) {
    header("Location: child_detail.php"); // Redirect to child_detail.php if step 2 is not completed
    exit;
}


$query = "SELECT * FROM vaccine ORDER BY id DESC LIMIT 10"; // Adjust 'id' as necessary
$result = mysqli_query($con, $query);
?>


<section class="hero-banner">
      <div class="container">
        <!-- Hero-Banner Start -->
        <div class="banner-area">
          <div class="row align-items-center">
            <div class="col-xl-6 col-lg-6 col-md-12">
              <div class="text-block mb-48 mt-xl-0 mt-60">
                <h1 class="light-black mb-8">We Listen, We Care, We Heal.</h1>
                <p class="mb-32 gray">Lorem ipsum dolor sit amet consectetur. Massa mauris convallis in eget <br
                    class="d-xl-flex d-none">
                  volutpat.
                  Vitae nunc varius proin rhoncus cursus et nulla posuere. Eros.
                </p>
                <a href="appointment.html" class="cus-btn h6">Appointment</a> &nbsp;&nbsp;&nbsp;&nbsp;
                <a href="contact.html" class="cus-btn active h6">Contact Us</a>
              </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
              <div class="banner-right-image">
                <img src="assets/media/banner/banner-image.png" alt="" class="banner-image">
                <div class="banner-card">
                  <h4 class="color-primary">10</h4>
                  <h6 class="light-black">Best Specialists</h6>
                </div>
                <div class="banner-card box-2">
                  <h4 class="color-primary">20K</h4>
                  <h6 class="light-black">Patients healed</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Hero-Banner End -->

        <!-- Benifits Start -->
        <div class="benifits p-120">
          <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4">
              <div class="benifits-block mb-lg-0 mb-24">
                <h5 class="white mb-4p">Expert Doctors</h5>
                <p class="white">Lorem ipsum dolor sit amet consect etur massa mauris convallis.</p>
                <div class="image-circle">
                  <img src="assets/media/icons/benefits-1.png" alt="">
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4">
              <div class="benifits-block mb-lg-0 mb-24">
                <h5 class="white mb-4p">Emergency Care</h5>
                <p class="white">Lorem ipsum dolor sit amet consect etur massa mauris convallis.</p>
                <div class="image-circle">
                  <img src="assets/media/icons/benefits-2.png" alt="">
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4">
              <div class="benifits-block mb-lg-0 mb-24">
                <h5 class="white mb-4p">24/7 Availability</h5>
                <p class="white">Lorem ipsum dolor sit amet consect etur massa mauris convallis.</p>
                <div class="image-circle">
                  <img src="assets/media/icons/benefits-3.png" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Benifits Bar End-->
    </section>

    <!-- About Us Start-->
    <section class="about-us pt-40">
      <div class="container">
        <div class="row">
          <div class="col-xl-6 col-lg-7">
            <div class="content-area">
              <h6 class="color-prOur Vaccinationimary mb-4p">About Us</h6>
              <h2 class="light-black mb-16">A Legacy of Compassionate Care!</h2>
              <p class="gray mb-32">Lorem ipsum dolor sit amet consectetur. Vestibulum elit eu vulputate tristique enim
                molestie neque. Ultricies arcu
                sed tempor integer. Nulla aliquet tellus vel dictum tempus.</p>
              <div class="row g-0">
                <div class="col-md-6 col-sm-6 mb-md-0 mb-24">
                  <div class="msg-box box-1 shadow br-30 p-24">
                    <h4 class="light-black mb-16">Our Vision</h4>
                    <p class="gray">Lorem ipsum dolor sit amet consect etur. Vestibulum elit eu vulputate tristique
                      enim.</p>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="msg-box box-2 mb-32 shadow br-30 p-24">
                    <h4 class="light-black mb-16">Our Mission</h4>
                    <p class="gray">Lorem ipsum dolor sit amet consect etur. Vestibulum elit eu vulputate tristique
                      enim.</p>
                  </div>
                </div>
              </div>
              <a href="about.html" class="cus-btn mb-xl-0 mb-24">Learn More</a>
            </div>
          </div>
          <div class="col-xl-6 col-lg-5">
            <img src="assets/media/about/about-image.png" alt="" class="about_image br-30">
          </div>
        </div>
      </div>
    </section>
    <!-- About Us End-->
<style>
  .image-circle{
    /* width: 30%; */
    height: 35%;
  }
</style>
<!-- Vaccinatiom Section Start -->
<section class="services p-120">
  <div class="container">
    <h6 class="color-primary fw-600 mb-4p">Vaccinations</h6>
    <h2 class="light-black mb-32">Our Vaccination Offerings</h2>
    <div class="row">
      <?php while($row = mysqli_fetch_assoc($result)): ?>
      <div class="col-xl-4 col-lg-6 col-md-6">
        <div class="service-block mb-32">
          <!-- Circular Image -->
          <div class="image-circle">
            <img src="../Hospital/<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>">
          </div>
          <!-- Vaccine Name and Description -->
          <div class="text-block">
            <h4 class="light-black mb-16"><?php echo $row['name']; ?></h4>
            <p class="gray">
              <?php echo substr($row['description'], 0, 100); ?>... <!-- Limit description to 2 lines -->
            </p>
          </div>
          <!-- Book Appointment Button -->
          <div class="bottom-bar">
            <a href="vaccine_detail.php?vaccine_id=<?php echo $row['id']; ?>" class="cus-btn small-pad-2">Book An Appointment</a>
          </div>
        </div>
      </div>
      <?php endwhile; ?>
    </div>
  </div>
</section>
<!-- Vaccinatiom Section End -->



    <!-- BG Wrapper Start -->
    <div class="bg-wrapper">

      <!-- Team Section Start -->
      <section class="team p-120">
        <div class="container">
          <h6 class="color-primary fw-600 mb-4p">Get Vaccinated</h6>
          <h2 class="light-black">Our Top <br> Hospitals</h2>
          <div class="mb-32 mt-32">
            <div class="row">
              <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6">
                <div class="team_card mb-md-0 mb-24">
                  <div class="image_block mb-16">
                    <a href="team-detail.html"><img src="assets/media/team/doctor-1.png" alt=""></a>
                    <ul class="social-media-links unstyled">
                      <li><a href=""><img src="assets/media/icons/instagram.png" alt=""></a></li>
                      <li><a href=""><img src="assets/media/icons/twitter.png" alt=""></a></li>
                      <li><a href=""><img src="assets/media/icons/facebook.png" alt=""></a></li>
                      <li><a href=""><img src="assets/media/icons/linkedin.png" alt=""></a></li>
                    </ul>
                  </div>
                  <div class="text_block text-center">
                    <h4 class="light-black mb-8"><a href="team-detail.html">Agha Khan Hospital</a></h4>
                    <h6 class="gray fw-600 m-0">Karachi</h6>
                  </div>
                </div>
              </div>
        
            </div>
          </div>
          <a href="team.html" class="cus-btn d-flex m-auto">See All</a>
        </div>
      </section>
      <!-- Team Section End -->


    <!-- Contact Us Banner Start -->
    <section class="contact-us p-120">
      <div class="container">
        <div class="row">
          <div class="contact-banner">
            <div class="text-area">
              <h2 class="white">Get Helpline Services with <br>one Call Away</h2>
              <div class="d-flex align-items-center">
                <a href="" class="h2 color-primary"><img src="assets/media/icons/telephone.png" alt="">+123 456
                  789</a>
              </div>
              <h5 class="white mb-32">We are available for your help 24/7</h5>
              <a href="contact.html" class="cus-btn">Contact Us</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Contact Us Banner End -->

    <!-- FAQ's Start -->
    <section class="faq">
      <div class="container">
        <div class="row">
       
          <div class="col-xl-8 col-lg-8">
            <div class="row m-0 p-md-0 p-24" id="accordionExample">
              <div class="faq-block border-0">
                <a href="#" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq1"
                  aria-expanded="true" aria-controls="faq1">How do I buy Medicare here?
                </a>
                <div id="faq1" class="accordion-collapse collapse show" aria-labelledby="faq1"
                  data-bs-parent="#accordionExample">
                  <p class="gray">You can buy Medicare by clicking on the buy now button and get the most amazing
                    clinic theme on the platform!
                    Get the theme now and set up your online clinic presence! and help as many customers as you can.
                  </p>
                </div>
              </div>
              <div class="faq-block">
                <a href="#" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq2"
                  aria-expanded="true" aria-controls="faq2"> Are walk-in appointments available?
                </a>
                <div id="faq2" class="accordion-collapse collapse " aria-labelledby="faq2"
                  data-bs-parent="#accordionExample">
                  <p class="gray">You can buy Medicare by clicking on the buy now button and get the most amazing
                    clinic theme on the platform!
                    Get the theme now and set up your online clinic presence! and help as many customers as you can.
                  </p>
                </div>
              </div>
              <div class="faq-block">
                <a href="#" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq3"
                  aria-expanded="true" aria-controls="faq3">What are the accepted payment methods for medical <br>
                  services at your clinic?
                </a>
                <div id="faq3" class="accordion-collapse collapse " aria-labelledby="faq3"
                  data-bs-parent="#accordionExample">
                  <p class="gray">You can buy Medicare by clicking on the buy now button and get the most amazing
                    clinic theme on the platform!
                    Get the theme now and set up your online clinic presence! and help as many customers as you can.
                  </p>
                </div>
              </div>
              <div class="faq-block">
                <a href="#" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq4"
                  aria-expanded="true" aria-controls="faq4">Do you offer telemedicine or virtual appointments?
                </a>
                <div id="faq4" class="accordion-collapse collapse " aria-labelledby="faq4"
                  data-bs-parent="#accordionExample">
                  <p class="gray">You can buy Medicare by clicking on the buy now button and get the most amazing
                    clinic theme on the platform!
                    Get the theme now and set up your online clinic presence! and help as many customers as you can.
                  </p>
                </div>
              </div>
              <div class="faq-block">
                <a href="#" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq5"
                  aria-expanded="true" aria-controls="faq5">Is parking available on-site for patients and visitors?
                </a>
                <div id="faq5" class="accordion-collapse collapse " aria-labelledby="faq5"
                  data-bs-parent="#accordionExample">
                  <p class="gray">You can buy Medicare by clicking on the on the platform!
                    Get the theme now and set up your online clinic presence! and help as many customers as you can.
                  </p>
                </div>
              </div>
              <div class="faq-block">
                <a href="#" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq6"
                  aria-expanded="true" aria-controls="faq6">How can I access my medical records or request a <br> copy
                  of my health information?
                </a>
                <div id="faq6" class="accordion-collapse collapse " aria-labelledby="faq6"
                  data-bs-parent="#accordionExample">
                  <p class="gray">You can buy Medicare by platform!
                    Get the theme now and set up your online clinic presence! and help as many customers as you can.
                  </p>
                </div>
              </div>
              <div class="faq-block">
                <a href="#" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq7"
                  aria-expanded="true" aria-controls="faq7">How can I make an appointment in advance?
                </a>
                <div id="faq7" class="accordion-collapse collapse " aria-labelledby="faq7"
                  data-bs-parent="#accordionExample">
                  <p class="gray">You can buy Medicare by clicking on the buy now button and get the most amazing
                    clinic theme on the platform!
                    Get the theme now </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- FAQ's End -->




  </div>

<?php 
include("./Common/Footer.php");
?>