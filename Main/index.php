<?php 
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

// Proceed with the rest of your page's logic after validation
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
              <h6 class="color-primary mb-4p">About Us</h6>
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

    <!-- Services Section Start -->
    <section class="services p-120">
      <div class="container">
        <h6 class="color-primary fw-600 mb-4p">Vaccinations</h6>
        <h2 class="light-black mb-32">Our Care Offerings</h2>
        <div class="row">
          <div class="col-xl-4 col-lg-6 col-md-6">
            <div class="service-block mb-32">
              <div class="image-circle">
                <img src="assets/media/services/service-1.png" alt="">
              </div>
              <div class="text-block">
                <h4 class="light-black mb-16">Pharmacy Service</h4>
                <p class="gray">Lorem ipsum dolor sit amet consect etur. Vestibulum elit eu vulputate tristique enim.
                </p>
              </div>
              <div class="bottom-bar">
                <a href="services-detail.html" class="cus-btn small-pad-2">Acquire Service</a>
                <a href="services-detail.html" class="color-primary">
                  <h6 class="fw-600">Learn More <i class="fal fa-chevron-right"></i></h6>
                </a>
              </div>
            </div>
          </div>
       
        </div>
      </div>
    </section>
    <!-- Services Section End -->



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
              <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6">
                <div class="team_card mb-md-0 mb-24">
                  <div class="image_block mb-16">
                    <a href="team-detail.html"><img src="assets/media/team/doctor-2.png" alt=""></a>
                    <ul class="social-media-links unstyled">
                      <li><a href=""><img src="assets/media/icons/instagram.png" alt=""></a></li>
                      <li><a href=""><img src="assets/media/icons/twitter.png" alt=""></a></li>
                      <li><a href=""><img src="assets/media/icons/facebook.png" alt=""></a></li>
                      <li><a href=""><img src="assets/media/icons/linkedin.png" alt=""></a></li>
                    </ul>
                  </div>
                  <div class="text_block text-center">
                    <h4 class="light-black mb-8"><a href="team-detail.html">Christopher Lee</a></h4>
                    <h6 class="gray fw-600 m-0">ENT Specialist</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6">
                <div class="team_card">
                  <div class="image_block mb-16">
                    <a href="team-detail.html"><img src="assets/media/team/doctor-3.png" alt=""></a>
                    <ul class="social-media-links unstyled">
                      <li><a href=""><img src="assets/media/icons/instagram.png" alt=""></a></li>
                      <li><a href=""><img src="assets/media/icons/twitter.png" alt=""></a></li>
                      <li><a href=""><img src="assets/media/icons/facebook.png" alt=""></a></li>
                      <li><a href=""><img src="assets/media/icons/linkedin.png" alt=""></a></li>
                    </ul>
                  </div>
                  <div class="text_block text-center">
                    <h4 class="light-black mb-8"><a href="team-detail.html">Liaquat National Hospital</a></h4>
                    <h6 class="gray fw-600 m-0">Karachi</h6>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6">
                <div class="team_card">
                  <div class="image_block mb-16">
                    <a href="team-detail.html"><img src="assets/media/team/doctor-4.png" alt=""></a>
                    <ul class="social-media-links unstyled">
                      <li><a href=""><img src="assets/media/icons/instagram.png" alt=""></a></li>
                      <li><a href=""><img src="assets/media/icons/twitter.png" alt=""></a></li>
                      <li><a href=""><img src="assets/media/icons/facebook.png" alt=""></a></li>
                      <li><a href=""><img src="assets/media/icons/linkedin.png" alt=""></a></li>
                    </ul>
                  </div>
                  <div class="text_block text-center">
                    <h4 class="light-black mb-8"><a href="team-detail.html">Rebecca Harris</a></h4>
                    <h6 class="gray fw-600 m-0">Cardiologist</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <a href="team.html" class="cus-btn d-flex m-auto">See All</a>
        </div>
      </section>
      <!-- Team Section End -->


      <!-- Testimonials Section Start -->
    <section class="testimonials p-120">
      <div class="container">
        <div class="row">
          <div class="col-xl-6 col-lg-6">
            <h6 class="color-primary fw-600 mb-4p">Testimonials</h6>
            <h2 class="light-black mb-16">See What Our Patients Say About Our Services</h2>
            <p class="gray">Lorem ipsum dolor sit amet consectetur. Vestibulum elit eu vulputate tristique enim
              molestie neque.
              Ultricies arcu sed tempor integer. Nulla aliquet tellus vel dictum tempus.</p>
          </div>
          <div class="col-xl-6 col-lg-6">
            <div class="testimonials-slider-1 mb-16">
              <div class="slide-item">
                <div class="testimonials-card">
                  <div class="user-image">
                    <img src="assets/media/users/user-1.png" alt="">
                  </div>
                  <div class="text-block">
                    <h5>Sonia Cleric</h5>
                    <p>Lorem ipsum dolor sit amet conse<br> ctetur. Vestibulum elit eu vulputate<br> tristique enim
                      molestie.</p>
                  </div>
                  <img src="assets/media/icons/qoutes.png" alt="" class="quote-img">
                </div>
              </div>
              <div class="slide-item">
                <div class="testimonials-card">
                  <div class="user-image">
                    <img src="assets/media/users/user-2.png" alt="">
                  </div>
                  <div class="text-block">
                    <h5>Moly Macrae</h5>
                    <p>Lorem ipsum dolor sit amet conse<br> ctetur. Vestibulum elit eu vulputate<br> tristique enim
                      molestie.</p>
                  </div>
                  <img src="assets/media/icons/qoutes.png" alt="" class="quote-img">
                </div>
              </div>
              <div class="slide-item">
                <div class="testimonials-card">
                  <div class="user-image">
                    <img src="assets/media/users/user-3.png" alt="">
                  </div>
                  <div class="text-block">
                    <h5>Sonia Cleric</h5>
                    <p>Lorem ipsum dolor sit amet conse<br> ctetur. Vestibulum elit eu vulputate<br> tristique enim
                      molestie.</p>
                  </div>
                  <img src="assets/media/icons/qoutes.png" alt="" class="quote-img">
                </div>
              </div>
            </div>
            <div class="testimonials-slider-2">
              <div class="slide-item">
                <div class="testimonials-card">
                  <div class="user-image">
                    <img src="assets/media/users/user-1.png" alt="">
                  </div>
                  <div class="text-block">
                    <h5>Sonia Cleric</h5>
                    <p>Lorem ipsum dolor sit amet conse<br> ctetur. Vestibulum elit eu vulputate<br> tristique enim
                      molestie.</p>
                  </div>
                  <img src="assets/media/icons/qoutes.png" alt="" class="quote-img">
                </div>
              </div>
              <div class="slide-item">
                <div class="testimonials-card">
                  <div class="user-image">
                    <img src="assets/media/users/user-4.png" alt="">
                  </div>
                  <div class="text-block">
                    <h5>Moly Macrae</h5>
                    <p>Lorem ipsum dolor sit amet conse<br> ctetur. Vestibulum elit eu vulputate<br> tristique enim
                      molestie.</p>
                  </div>
                  <img src="assets/media/icons/qoutes.png" alt="" class="quote-img">
                </div>
              </div>
              <div class="slide-item">
                <div class="testimonials-card">
                  <div class="user-image">
                    <img src="assets/media/users/user-5.png" alt="">
                  </div>
                  <div class="text-block">
                    <h5>Sonia Cleric</h5>
                    <p>Lorem ipsum dolor sit amet conse<br> ctetur. Vestibulum elit eu vulputate<br> tristique enim
                      molestie.</p>
                  </div>
                  <img src="assets/media/icons/qoutes.png" alt="" class="quote-img">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Testimonials Section End -->

    <!-- FAQ's Start -->
    <section class="faq">
      <div class="container">
        <div class="row">
          <div class="col-xl-6 col-lg-6">
            <h6 class="color-primary fw-600">FAQ's</h6>
            <h2 class="light-black mb-32">All Your Questions Have Answers Here</h2>
            <div class="faq-form">
              <form method="post" action="index.html" class="form-group contact-from">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="icon-block mb-24">
                      <label for="first_name" class="mb-4p">Name*</label>
                      <input type="text" class="form-control" id="first_name" name="name" required
                        placeholder="First Name">
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="icon-block mb-24">
                      <label for="e-mail" class="mb-4p">Email*</label>
                      <input type="email" class="form-control" id="e-mail" name="email" required
                        placeholder="email@example.com">
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="icon-block mb-32">
                      <label for="mssg" class="mb-4p">Question</label>
                      <textarea name="message" class="form-control" id="mssg" cols="30" rows="5"
                        placeholder="Hey there!"></textarea>
                    </div>
                  </div>
                </div>
                <button type="submit" class="cus-btn small-pad">Post Question</button>
                <!-- Alert Message -->
                <div id="messagee" class="alert-msg"></div>
              </form>
            </div>
          </div>
          <div class="col-xl-6 col-lg-6">
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


  </div>

<?php 
include("./Common/Footer.php");
?>