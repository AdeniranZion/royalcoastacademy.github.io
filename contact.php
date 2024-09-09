<?php include_once "partials/header.php"; ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<!-- header section ends -->

<section class="heading-link" data-aos="fade-in">
   <h3>contact <span style="color: #e070dd;">us</span></h3>
   <p> <a href="index.php">home</a> / contact </p>
</section>

<!-- contact section starts  -->

<section class="contact">

   <div class="row">

      <div class="image" data-aos="fade-right">
         <img src="images/contact-img.png" alt="">
      </div>

      <form action="contact_script.php" method="POST">
         <h3 style="font-size: 3.5rem">Get in Touch</h3>
         <input type="text" name="name" id="name" placeholder="name" class="box" required>
         <input type="email" name="email" id="email" placeholder="email" class="box" required>
         <input type="number" name="phone" id="phone" placeholder="phone" class="box">
         <textarea name="message" class="box" id="message" placeholder="message" cols="30" rows="10" required></textarea>
         <input type="submit" value="send message" class="btn" data-aos="fade-left" data-aos-duration="1000">
      </form>
   </div>
</section>
          <!-- Contact Admissions Section -->
          <div class="contact-admissions" style="padding: 50px 50px; text-align: center; background-color: #fcf5fc">
            <h2 style="font-size: 3.5rem; margin-bottom: 20px;">Ready to embark on a journey of excellence at <strong>Royal Coast Academy?</strong></h2>
            <a href="admissionpage.php" class="btn" >Apply Now</a>
         </div>
    <!-- End Contact Admissions Section -->

<!-- contact section ends -->


<?php include_once "partials/footer.php"; ?>
<script>
$(document).ready(function() {
    <?php if (isset($_GET['success']) && $_GET['success'] == 'true'): ?>
        toastr.success('Message has been sent successfully!');
    <?php elseif (isset($_GET['success']) && $_GET['success'] == 'false'): ?>
        toastr.error('Message could not be sent. Please try again.');
    <?php endif; ?>
});
</script>



<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>