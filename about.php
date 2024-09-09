<?php include_once "partials/header.php"; ?>

<div style="background-color: #671470; padding: 35px; padding-right: 12.5%; text-align: right; position: relative;">
    <h1 class="logo" style="margin: 0; color: #fff8ec; font-size: 3rem;"  data-aos="fade-right">About Us</h1>
    <div style="position: absolute; bottom: 0; right: 0; width: 90px; height: 2px; background-color: white; margin-right:12%;" data-aos="fade-left"></div>
</div>




<!-- About Header Section -->
<div class="swiper-container" style="height: 55vh; margin-bottom: 50px; object-fit: cover; text-align:right" data-aos="fade-in">
  <div class="swiper-wrapper">
    <div class="swiper-slide" style="background-image: url('images/IMG-20240616-WA0035.jpg'); background-size: cover; background-position: 50% 70%;"></div>
    <div class="swiper-slide" style="background-image: url('images/wids2.jpg');"></div>
    <div class="swiper-slide" style="background-image: url('images/IMG-20240616-WA0029.jpg');"></div>
    <div class="swiper-slide" style="background-image: url('images/IMG-20240616-WA0027.jpg');"></div>
    
  </div>
  <!-- Pagination -->
  <div class="swiper-pagination" style="bottom: 5px;"></div>

  
  <!-- Navigation buttons -->
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>
</div>  

<!-- Initialize Swiper -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    var swiper = new Swiper('.swiper-container', {
      slidesPerView: 1,
      spaceBetween: 30,
      loop: true,
      autoplay: {
        delay: 10000, // Change image every 3 seconds
        disableOnInteraction: false,
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
        dynamicBullets: true, // Adjust bullet size based on number of slides
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      effect: 'fade', // Fade effect between slides
        fadeEffect: {
          crossFade: true,
          duration: 3000, // Fade duration in milliseconds (1000ms = 1 second)
        },
      });
    });
</script>


  <section class="aboutms" data-aos="fade-up">
    <div class="container" style="background-color: #fff; position:relative; margin-top: 2px;">
      <h2 class="section-title">About US</h2>
      <div style="width: 90px; height: 3px; margin-bottom:60px;background-color:#e070dd;position:absolute;"></div>
      <p class="section-description"></p>
      <div class="row" style="background-color: #fff;">
              <div class="col-md-6 content p-4" style="text-align: justify;">
                  <p>Royal Coast Academy is a distinguished institution dedicated to providing exceptional education for primary and secondary students in Lagos, Nigeria. Our school is committed to nurturing young minds, fostering academic excellence, and preparing students for a successful future in a globally interconnected world.</p>

                  <p>At Royal Coast Academy, we believe in a holistic approach to education that encompasses both intellectual and personal growth. Our experienced faculty members are passionate about teaching and employ innovative teaching methods to inspire curiosity and critical thinking in our students.</p>

                  Located in the vibrant city of Lagos, Royal Coast Academy offers a conducive learning environment equipped with modern facilities and resources. We emphasize values such as integrity, respect, and responsibility, ensuring that our students develop into well-rounded individuals who contribute positively to society.

                  Whether in our primary or secondary school divisions, Royal Coast Academy strives for educational excellence, aiming to empower each student to achieve their full potential academically, socially, and personally. We are proud to be a part of shaping the future leaders of tomorrow through quality education and unwavering commitment to our students' success.</p>
                  
              </div>
              <div class="col-md-6 d-flex justify-content-center align-items-center" style="background-color: #fff ;">
                  <img src="images/IMG-20240616-WA0029.jpg" class="img-fluid" alt="Science Lab" style="border-radius: 10px; margin:1px 1px; height: auto">
              </div>
          </div>
      </div>
  </section>

  <!-- Mission Statement -->
  <section class="aboutms"  data-aos="fade-up" >
    <div class="container" style="background-color: #fff; position:relative">
      <h2 class="section-title" style="text-align:right">Our Mission Statement</h2>
      <div style="width: 120px; height: 3px; margin-bottom:60px; background-color:#e070dd;position:absolute; right:15px"></div>
      <p class="section-description" data-aos="fade-up" data-aos-delay="200"></p>
      <div class="row" style="background-color: #fff;">
              <div class="col-md-6 d-flex justify-content-center align-items-center" style="background-color: #fff;">
                  <img src="images/IMG-20240616-WA0025.jpg" class="img-fluid" alt="Science Lab" style="border-radius: 10px; margin:1px 1px; height: auto">
              </div>
              <div class="col-md-6 content p-4" style="text-align: justify;">
                  <p style="text-align:justify;">At Royal Coast Academy, we are dedicated to nurturing young minds and empowering future leaders through excellence in education. Located in the vibrant city of Lagos, Nigeria, our mission is to provide a supportive and stimulating learning environment where every student can achieve their full potential academically, socially, and personally.

                  We strive to cultivate a passion for lifelong learning by offering a balanced curriculum that emphasizes critical thinking, creativity, and global awareness. Through innovative teaching practices and state-of-the-art facilities, we aim to foster a strong foundation of knowledge and skills that prepares our students to thrive in a rapidly changing world.

                  Our commitment extends beyond academic success to the holistic development of each student. We promote values of integrity, respect, and responsibility, instilling in our students a sense of civic duty and ethical leadership. By embracing diversity and promoting inclusivity, we create a community where every individual is valued and supported.

                  At Royal Coast Academy, we envision a future where our graduates are equipped with the confidence and capabilities to make positive contributions to society. Through collaboration with parents, educators, and the broader community, we uphold our mission to inspire excellence, cultivate character, and empower the next generation of leaders.
                </p>
              </div>
          </div>
      </div>
  </section>

  <div class="container" style="display: flex; justify-content: space-between; background-color: #fcf5fc; margin-bottom: 35px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);">

    <!-- Mission Statement Section -->
    <section class="aboutms" style="width: 48%;">
      <div class="container">
        <h2 class="section-title" data-aos="fade-up">Our Mission <i class="fas fa-bullseye" style="color: #e070dd; font-size: 3.5rem"></i></h2>
        <p class="section-description" data-aos="fade-up" data-aos-delay="200">At Royal Coast Academy, we are committed to fostering academic excellence and moral integrity. We aim to develop well-rounded individuals who are equipped to thrive in a global society. Our inclusive community welcomes students from all backgrounds and celebrates diversity.</p>
      </div>
    </section>

    <!-- Vision Statement Section -->
    <section class="aboutms" style="width: 48%;">
      <div class="container">
        <h2 class="section-title" data-aos="fade-up">Our Vision <i class="fas fa-eye" style="color: #e070dd; font-size: 3.5rem"></i></h2>
        <p class="section-description" data-aos="fade-up" data-aos-delay="200">Our vision is to be a leading educational institution renowned for nurturing the full potential of each student. We aspire to create a dynamic learning environment that inspires creativity, critical thinking, and lifelong learning.</p>
      </div>
    </section>

  </div>


  <!-- Values Section -->
  <section class="values">
    <div class="container">
      <h2 class="section-title" data-aos="fade-up" style="font-size: 3rem">Our Core Values</h2>
      <div class="values-grid">
        <div class="value-item" data-aos="fade-right" data-aos-delay="200">
          <div><i class="fas fa-trophy"></i></div>
          <h3>Excellence</h3>
          <p>We strive for the highest standards in everything we do.</p>
        </div>
        <div class="value-item" data-aos="fade-up" data-aos-delay="400">
          <div><i class="fas fa-balance-scale"></i></div>
          <h3>Integrity</h3>
          <p>We believe in honesty, transparency, and strong moral principles.</p>
        </div>
        <div class="value-item" data-aos="fade-up" data-aos-delay="600">
          <div><i class="fas fa-lightbulb"></i></div>
          <h3>Innovation</h3>
          <p>We embrace creativity and new ideas to advance learning.</p>
        </div>
        <div class="value-item" data-aos="fade-left" data-aos-delay="800">
          <div><i class="fas fa-handshake"></i></div>
          <h3>Respect</h3>
          <p>We foster an environment of mutual respect and inclusivity.</p>
        </div>
    </div>
    </div>
  </section>

  <!-- Team Section -->
  <section class="team">
    <div class="container">
      <h2 class="section-title" data-aos="fade-up" style="font-size: 3rem">Meet Our Team</h2>
      <div class="team-grid">
        <div class="team-member" data-aos="fade-right" data-aos-delay="200">
          <img src="images/bassey.jpg" alt="Jane Doe">
          <h3>Edifon Bassey</h3>
          <p>Head of Academics</p>
          <div class="socials">
            <a href="#" class="fa-brands fa-linkedin"></a>
            <a href="#" class="fa-brands fa-twitter"></a>
            <a href="#" class="fa-brands fa-facebook-f"></a>
          </div>
        </div>
        <div class="team-member" data-aos="fade-up" data-aos-delay="400">
          <img src="images/yemi.jpg" alt="John Smith">
          <h3>Yemi Adeniran</h3>
          <p>Technical Manager</p>
          <div class="socials">
            <a href="#" class="fa-brands fa-linkedin"></a>
            <a href="#" class="fa-brands fa-twitter"></a>
            <a href="#" class="fa-brands fa-facebook-f"></a>
          </div>
        </div>
        <div class="team-member" data-aos="fade-up" data-aos-delay="600">
          <img src="images/chiamaka.JPG" alt="Chiamaka Amaiheuwa">
          <h3>Chiamaka Amaiheuwa</h3>
          <p>Head of Admissions</p>
          <div class="socials">
            <a href="#" class="fa-brands fa-linkedin"></a>
            <a href="#" class="fa-brands fa-twitter"></a>
            <a href="#" class="fa-brands fa-facebook-f"></a>
          </div>
        </div>
        <div class="team-member" data-aos="fade-left" data-aos-delay="800">
          <img src="images/Salami.jpg" alt="Hajara Salami">
          <h3>Hajara Salami</h3>
          <p>Head Administrations</p>
          <div class="socials">
            <a href="#" class="fa-brands fa-linkedin"></a>
            <a href="#" class="fa-brands fa-twitter"></a>
            <a href="#" class="fa-brands fa-facebook-f"></a>
          </div>
        </div>
      </div>
    </div>
  </section>

    <!-- Contact Admissions Section -->
    <div class="contact-admissions" style="padding: 50px 50px; text-align: center; background-color: #fcf5fc">
        <h2 style="font-size: 3.5rem; margin-bottom: 20px;">Ready to embark on a journey of excellence at <strong>Royal Coast Academy?</strong></h2>
        <a href="admissionpage.php" class="btn" >Apply Now</a>
    </div>

<?php include_once "partials/footer.php"; ?>


<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- AOS Animation Library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

<!-- <script>
    AOS.init();
  </script> -->
<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>