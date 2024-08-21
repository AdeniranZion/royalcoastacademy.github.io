<?php include_once "partials/header.php";
include 'partials/db_connect.php';
?>
<html>
<body>

<!-- <div id="loadingOverlay" class="loading-overlay">
    <div class="spinner"></div>
</div> -->

<script>
  document.addEventListener("DOMContentLoaded", function() {
    // Simulate a delay of 3 seconds (3000 milliseconds) before fading out the loading overlay
    setTimeout(function() {
        var loadingOverlay = document.getElementById("loadingOverlay");
        loadingOverlay.style.opacity = 0;
        setTimeout(function() {
            loadingOverlay.style.display = "none"; // Hide the loading overlay completely
            document.getElementById("swiper-container").classList.remove("hidden"); // Show the main content
        }, 900); // Fading out takes 0.5 seconds (500 milliseconds)
    }, 2000); // Show spinner for 3 seconds (3000 milliseconds)
});

</script>


<!-- home section starts  -->
<div class="swiper-container" class="hidden">
  <div class="swiper-wrapper">
    <div class="swiper-slide" style="background-image: url('images/web1.jpg');">
      <div class="content">
        <h3  data-aos="fade-up" data-aos-duration="700">Discover the World of Knowledge: Explore Royal Coast Academy</h3>
        <p  data-aos="fade-up" data-aos-duration="1700">At Royal Coast, we develop an enriching educational experience that empowers students to explore and thrive in the world of knowledge through our dynamic curriculum.</p>
        <a href="about.php" class="btn"  data-aos="fade-up" data-aos-duration="2400">Explore</a>
      </div>
    </div>
    <div class="swiper-slide" style="background-image: url('images/web2.jpg');">
    <div class="content" data-aos="fade-up" data-aos-duration="1000">
        <h3><span style="color: #FED005;">Education</span>  is not preparation for life; education <span style="color: #FED005;">is life</span> itself</h3>
        <p>Here at Royal Coast, we believe that Education is not just a precursor to life but an essential, ongoing journey that enriches our everyday experiences and shapes our understanding of the world.</p>
        <a href="about.php" class="btn">Explore</a>
      </div>
    </div>
    <div class="swiper-slide" style="background-image: url('images/web3.jpg');">
    <div class="content" data-aos="fade-up" data-aos-duration="1000">
        <h2><span style="background: linear-gradient(45deg, #FED005, #fff); -webkit-background-clip: text; color: transparent">ADMISSION</span> IN PROGRESS </h2>
        <h4>ADMISSION FOR THE 2024/25 ACADEMIC SESSION INTO:</h4>
        <div style="font-size: 1.8rem; padding: 15px;">
          <li>Pre-school</li>
          <li>Nursery</li>
          <li>Basic Classes</li>
          <li>JSS 1</li>
        </div>
        <a href="admissionpage.php" class="btn">Enroll Now</a>
      </div>
    </div>
  </div>
  <!-- Pagination -->
  <div class="swiper-pagination"></div>

  
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



<!-- home section ends -->

<section class="about">

   <div class="imgbox" data-aos="fade-right" data-aos-duration="1000" loading="lazy">
      <!-- Initially empty, images will be added by JavaScript -->
   </div>
   <div class="content p-4" data-aos="fade-left" data-aos-duration="1000">
      <h3 style="font-size: 4.5rem" class="about-title">Welcome to Royal Coast Academy</h3>
      <p style="font-size: 15px; text-align: justify;">At Royal Coast Academy, we believe that education is the foundation of a successful life, and we are committed to providing our students with the best possible education. Our curriculum is designed to meet the needs of all students, regardless of their abilities or interests. We have a team of highly qualified and experienced teachers who are dedicated to helping students achieve their full potential.</p>
      <a href="about.php" class="btn">Read more</a>
   </div>

</section>


<!-- Icons Dsc -->
<section style="display: flex; justify-content: center; align-items: center;">
  <div style="background-color: #fff; padding: 20px; display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); grid-gap: 20px; width: 80%;">
    <div style="background-color: white; text-align: center;"  data-aos="zoom-in" data-aos-duration="900">
      <i class="fas fa-award" style="color: #e070dd; font-size: 11em;"></i>
      <h3 style="margin: 10px 0; font-size: 3em; font-weight:light; color:#444;">Center for Excellence</h3>
      <p style="font-size: 1.6em; padding: 20px;">Our commitment to academic excellence ensures that every student receives a top-tier education, preparing them for success in higher education and their future careers.</p>
    </div>
    <div style="background-color: white; text-align: center;"  data-aos="zoom-in" data-aos-duration="1500">
      <i class="fas fa-graduation-cap" style="color: #e070dd; font-size: 11em;"></i>
      <h3 style="margin: 10px 0; font-size: 3em; font-weight:light; color:#444;">Citadel of Knowledge</h3>
      <p style="font-size: 1.6em; padding: 20px;">At Royal Coast Academy, we are a hub of intellectual growth, fostering a love for learning and critical thinking in a supportive and dynamic environment.</p>
    </div>
    <div style="background-color: white; text-align: center;"  data-aos="zoom-in" data-aos-duration="1900">
      <i class="fas fa-gift" style="color: #e070dd; font-size: 11em;"></i>
      <h3 style="margin: 10px 0; font-size: 3em; font-weight:light; color:#444;">Developing A Total Child</h3>
      <p style="font-size: 1.6em; padding: 20px;">We focus on holistic development, nurturing not just academic skills but also the social, emotional, and ethical growth of each student to become well-rounded individuals.</p>
    </div>
  </div>
</section>


<!-- Welcome Speech -->
<section class="intro-section" style="display: flex; justify-content: center; align-items: center; background-color: #F8F8FF;">
  <div style="flex-basis: 50%; padding: 20px;">
     <h2 data-aos="fade-left" data-aos-duration="800" style="font-size: 3.9em; font-weight: bolder; margin-bottom: 20px;">An Introduction from the Proprietress</h2>
     <div data-aos="fade-left" data-aos-duration="1000" style="width: 40px; height: 3px; background-color:#e070dd; margin-bottom: 20px;"></div>
     <p data-aos="fade-left" data-aos-duration="1200" style="font-size: 1.6em; line-height: 1.6; margin-bottom: 20px; text-align: justify;">I welcome you to Royal Coast Academy's official website on behalf of the 
     administration, faculty, and students there. Excellence is our watchword here at <span style="color:#e070dd;"><b>Royal Coast Academy</b></span>. We think that anything worth doing is 
     worth doing well, and we work to infuse this quality in all of our activities and Wards. Every child committed to our care is guaranteed a 
     top-notch education from qualified teachers. For all of our children, we want to lay a strong foundation that will support them throughout 
     their academic and professional careers. We are also concerned with our students' physical, social, and psychological growth, helping them 
     to mature into accountable, impactful citizens. <br>Enjoy the journey.<br><h2 data-aos="fade-left" data-aos-duration="1600" >Mercy O. Adeniran.</h2></p>
  </div>
  <div data-aos="fade-left" data-aos-duration="2000" style="width: 300px; height: 450px;">
     <img src="images/mama.jpg" alt="Image description" style="width: 100%; height: 100%; border-radius: 2.5%;">
  </div>
</section>


<!-- About Us Header-->
<div class="text" style="text-align: center; margin-top: 40px; margin-bottom: 10px;">
  <h3 style="font-size: 48px;" class="about-title">About <span style="color: #e070dd;">Us</span></h3>
</div>

<section style="padding: 0 16px" class="about">
    <div style="padding: 0 20px;" class="container">
        <div class="row">
            <div style="padding: 0 12px;" class="col-md-6 content p-4">
                <p style="font-size: 1.8rem; text-align:justify; line-height: 30px" data-aos="fade-left" data-aos-duration="1000">Royal Coast Academy is a distinguished institution dedicated to providing exceptional education for primary and secondary students in Lagos, Nigeria. Our school is committed to nurturing young minds, fostering academic excellence, and preparing students for a successful future in a globally interconnected world. A premier educational institution dedicated to providing a transformative and enjoyable learning experience, Royal Coast Academy stands as a distinguished choice for students aged 6 months to 18 years, committed to excellence. At Royal Coast Academy, we cultivate a supportive environment where innovation and technology propel educational excellence. Our mission is to empower students with the knowledge and skills to navigate the digital age confidently.</p>
                <a href="about.php" class="btn btn-primary" data-aos="zoom-in" data-aos-duration="1500">Read more</a>
            </div>
            <div class="col-md-6 d-flex justify-content-center align-items-center"  data-aos="zoom-in" data-aos-duration="1800">
                <img src="images/IMG-20240616-WA0029.jpg" class="img-fluid" alt="Science Lab" style="border-radius: 30px; margin-top:20px">
            </div>
        </div>
    </div>
</section>

<!-- Mission Statement -->
<section data-aos="fade-up" data-aos-duration="1500" style="display: flex; justify-content: center; align-items: center; background-color: #FFF8EC;">
  <div style="padding: 20px; display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); grid-gap: 20px; width: 80%;">
      <div style="text-align: center;">
         <i class="fa-solid fa-crosshairs" style="color: #e070dd; font-size: 11em;"></i>
         <h3 style="margin: 10px 0; font-size: 3em; font-weight:light; color:#444;">Our Mission</h3>
         <p style="font-size: 1.7em; text-align:justify">Royal Coast Academy is dedicated to the intellectual, moral, and spiritual formation of girls and boys from diverse religious faiths, tribes, and socioeconomic backgrounds. Our mission is to cultivate leaders who serve God and humanity selflessly. Inspired by the values of Royal Coast Academy, we foster a community united in the pursuit of excellence and service. Our commitment lies in nurturing individuals who embody compassion, justice, academic proficiency, and reverence for God and His creation. Aligned with the Nigerian education policy, we strive to develop individuals of faith, guided by the principles of Christ’s love and justice. Our graduates are characterized by emotional intelligence, social responsibility, and a relentless pursuit of the magis—the relentless pursuit of excellence in all aspects of life—for the betterment of society. At Royal Coast Academy, we are dedicated to shaping future generations who are empowered to make a positive impact through their commitment to service, leadership, and ethical conduct in a global context.</p>
      </div>
  </div>
</section>

<!-- Vision and Values -->
<section style="display: flex; justify-content: center; align-items: center;">
  <div style="background-color: #fff; padding: 20px; display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); grid-gap: 20px; width: 80%;">
    <div data-aos="fade-right" data-aos-duration="1500" style="background-color: white; text-align: center;">
    <i class="fa-regular fa-eye" style="color: #e070dd; font-size: 11em;"></i>
      <h3 style="margin: 10px 0; font-size: 3em; font-weight:light; color:#444;">Our Vision</h3>
      <p style="font-size: 1.6em; padding: 20px;">At Royal Coast Academy, our vision is to raise a crop of purpose driven, morally sound, disciplined and God-fearing generation.</p>
    </div>
    <div data-aos="fade-left" data-aos-duration="1500" style="background-color: white; text-align: center;">
    <i class="fa-regular fa-heart" style="color: #e070dd; font-size: 11em;"></i>
      <h3 style="margin: 10px 0; font-size: 3em; font-weight:light; color:#444;">Our Values</h3>
      <p style="font-size: 1.6em; padding: 20px;">We are dedicated to giving our pupils the greatest education possible.</p>
    </div>
  </div>
</section>


<!--News Page-->
<section  id="TRG" class="news-section" data-aos="fade-up" data-aos-duration="1500">
  <div class="parallax-bg" style="position: absolute;
    top: 0; left: 0; width: 100%; height: 100%;background-image: url('images/wids2.jpg');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    z-index: -1;"></div>
  <div class="news-container">
    <article class="news-item">
      <h3>RCA 2024 Graduation Ceremony</h3>
      <p>Royal Coast Academy proudly celebrated its 2024 Graduation Ceremony on June 10th, 2024. Over 150 graduates took to the stage, marking the end of their high school journey. Families, friends, and faculty gathered to applaud the achievements of the Class of 2024 as they prepared to embark on new adventures in higher education and beyond. The day was filled with emotional speeches, heartfelt moments, and joyous celebrations.</p>
      <a href="news.php?id=23" class="btn">EXPAND DETAILS</a>
    </article>
    <article class="news-item">
      <h3>2024 Founder’s Day Celebration</h3>
      <p>On May 20th, 2024, Royal Coast Academy celebrated its annual Founder’s Day. This year's event was especially significant as it marked the school's 25th anniversary. The day was packed with activities, including a keynote address by an esteemed alumnus, cultural performances by students, and a series of awards recognizing exceptional achievements in academics, sports, and community service.</p>
      <a href="news.php?id=24" class="btn">EXPAND DETAILS</a>
    </article>
    <!-- Add more news items as needed -->
  </div>
</section>

<h1 class="section-title" data-aos="fade-up" style="margin: 0 0;">The Royal Gazette</h1>

<section class="newsbody">
    <div class="container">
        <!-- News Section -->
        <section class="news-section">
            <div class="news-grid">
                <?php
                // Fetch news from the database
                // $sql = "SELECT * FROM news ORDER BY date DESC";
                $sql = "SELECT * FROM news ORDER BY date DESC LIMIT 3";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $newsTitle = htmlspecialchars($row['title']);
                        $newsDate = date('F j, Y', strtotime($row['date'])); // Format date
                        $newsImage = htmlspecialchars($row['image']); // Make sure you have this field in your table
                        $newsExcerpt = htmlspecialchars($row['excerpt']);
                        ?>
                        <div class="card" data-aos="zoom-in" data-aos-duration="1000">
                            <img src="<?php echo $newsImage; ?>" alt="<?php echo $newsTitle; ?>">
                            <div class="card-content">
                                <h3 class="card-title"><?php echo $newsTitle; ?></h3>
                                <p class="card-date"><i class="fas fa-clock" style="color: #ccc"></i> <?php echo $newsDate; ?></p>
                                <p class="card-text"><?php echo $newsExcerpt; ?></p>
                            </div>
                            <div class="card-footer">
                                <a href="news.php?id=<?php echo $row['id']; ?>"><i class="fas fa-book"> </i> Read More</a>    

                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "No news available";
                }
                ?>
            </div>
        </section>
        <div class="card-footer" style="background-color: #fff;">
          <a href="news.php?id=22" class="link-underline-light" style="font-size: 1.8rem;"> <i class="fas fa-th"> </i> More News</a>
        </div>
    </div>
</section>

<?php include 'animate.php'; ?>

<!--Admissions-->
<section data-aos="fade-up" data-aos-duration="1500" style="display: flex; justify-content: center; align-items: center; background-image: url('images/IMG_2543.jpg'); background-size: cover; background-position: center;">
  <div style="background-color: #F2C1D1; padding: 20px; display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); grid-gap: 20px; max-width: 80%; text-align: center;">

      <!-- Admission Icon and Information -->
      <div style="background-color: white; padding: 20px;">
         <!-- <i class="pe-7s-users" style="color: #e070dd; font-size: 6em;"></i> -->
         <i class="fas fa-bullhorn" style="color: #e070dd; font-size: 6em;"></i>
         <h3 style="margin: 20px 0; font-size: 2.5em; font-weight: light; color: #444;">Admissions in Progress</h3>
         <p style="font-size: 1.4em; line-height: 1.6; color: #666;">Join our school community! Our admissions are currently open. Contact us today for more information.</p>
         <div style="margin-top: 20px;">
         <p style="font-size: 1.4em; font-weight: bold; color: #333;">Call Us:</p>
         <p style="font-size: 1.4em; color: #666;">+234-802-7664-776</p>
         </div>
         <div style="margin-top: 20px;">
         <p style="font-size: 1.4em; font-weight: bold; color: #333;">Visit Us:</p>
         <p style="font-size: 1.4em; color: #666;">10 Oluwole Daramola Crescent, Isheri Oke 102109, Ojodu Berger, Ogun State.</p>
         </div>
    </div>

    <!-- Apply Now Icon and Information -->
    <div style="background-color: white; padding: 40px;">
      <i class="pe-7s-pen" style="color: #e070dd; font-size: 6em;"></i>
      <h3 style="margin: 20px 0; font-size: 2.5em; font-weight: light; color: #444;">Apply Now</h3>
      <p style="font-size: 1.4em; line-height: 1.6; color: #666;">Ready to join? Submit your application now and begin your educational journey with us.</p>
      <a href="admissions.php" class="btn">Apply Online</a>
    </div>
  </div>
</section>

<!-- Contact Us -->
<div class="parent" data-aos="fade-up" data-aos-duration="1000">
   <div class="text" style="text-align: center; margin-top: 40px; margin-bottom: 40px;">
      <h3 style="font-size: 48px;" class="about-title">Contact <span style="color: #e070dd;">Us</span></h3>
   </div>
</div>
<section class="contact" data-aos="fade-up" data-aos-duration="1000" style="padding: 24px; padding-top:10px;">
        <div class="row" style="background-color: #fff; padding: 24px; padding-top:1px;">
              <div class="p-24 mx-auto sm:max-w-md md:max-w-lg lg:max-w-xl">
                    <form action="contact_script.php" style="padding-top:1px;">
                        <h3 class="heading">You can send a message. We'll be delighted to hear from you</h3>
                              <input type="text" name="name" placeholder="Full Name" class="box mb-4">
                              <input type="email" name="email" placeholder="Email Address" class="box mb-4">
                              <input type="text" name="phone" placeholder="Phone Number" class="box mb-4">
                              <textarea name="message" class="box mb-4" placeholder="Message" id="" cols="30" rows="10"></textarea>
                              <input type="submit" value="Submit" class="btn bg-blue-500 hover:bg-blue-600 font-bold py-2 px-6 rounded">
                    </form>
              </div>
        </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js"></script>

<!-- AOS JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init();
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    const imgbox = document.querySelector('.imgbox');
    const images = [
      'images/IMG-20240616-WA0023.jpg',
      'images/IMG-20240616-WA0024.jpg',
      'images/IMG-20240616-WA0025.jpg'
    ];
    let currentIndex = 0;

    // Initialize with two images
    let img1 = document.createElement('img');
    let img2 = document.createElement('img');
    
    // Apply CSS class to control size
    img1.classList.add('current', 'resized');
    img2.classList.add('resized');

    // Set initial sources
    img1.src = images[currentIndex];
    img2.src = images[(currentIndex + 1) % images.length];

    // Append images to the imgbox
    imgbox.appendChild(img1);
    imgbox.appendChild(img2);

    function changeImage() {
      // Alternate between img1 and img2 for crossfade effect
      const nextIndex = (currentIndex + 1) % images.length;
      const currentImg = imgbox.querySelector('img.current');
      const nextImg = imgbox.querySelector('img:not(.current)');

      nextImg.src = images[nextIndex]; // Set the next image source
      nextImg.classList.add('current');
      currentImg.classList.remove('current');

      // Update currentIndex
      currentIndex = nextIndex;
    }

    // Set interval to change images
    setInterval(changeImage, 5000); // Change image every 5 seconds
  });

  window.addEventListener('DOMContentLoaded', (event) => {
      // Check if the URL contains the #newsbody hash
      if (window.location.hash === '#section-title') {
        // Scroll to the section with the class 'newsbody'
        var section = document.querySelector('.section-title');
        if (section) {
          section.scrollIntoView({ behavior: 'smooth' });
        }
      }
    });

</script>


<?php include_once "partials/footer.php"; ?>

</body>
</html>