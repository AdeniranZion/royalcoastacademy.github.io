<!-- footer section starts  -->
 <head>
   <link href="../css/style.css" rel="stylesheet">
 </head>
<style>
      input[type="submit"] {
         background-color: #4CAF50;
          color: #fff;
          padding: 10px 20px;
          border: none;
          border-radius: 5px;
          cursor: pointer;
      }
      .success {
         color: #4CAF50;
      }
      .error {
         color: #ff0000;
      }
</style>

<section class="footer">

<?php
// Configuration
$newsletter_email_list = '/royalcoastacademy/test/newsletter_subscribers.txt'; // file to store email addresses

// Form submission handler
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Check if email exists
        $emails = file($newsletter_email_list, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $already_subscribed = false;
        foreach ($emails as $line) {
            list($existing_email, $existing_date) = explode(',', $line);
            if ($existing_email == $email) {
                $already_subscribed = true;
                break;
            }
        }

        if (!$already_subscribed) {
            // Add email to list with date and time
            $date = date('Y-m-d H:i:s');
            $file = fopen($newsletter_email_list, 'a');
            fwrite($file, $email . ',' . $date . "\n");
            fclose($file);
            $success = true;
        } else {
            $error = 'Email address already subscribed';
        }
    } else {
        $error = 'Invalid email address';
    }
}
?>

   <div class="box-container">
      <div class="box">
         <h3> <img src="/royalcoastacademy/images/RCALogo.png" width="50"> Royal Coast Academy </h3>
         <p>Empowering young minds into becoming better versions of themselves - The Leaders of tomorrow</p>
         <p>Follow Us:</p>
         <div class="share">
            <a href="#" class="fa-brands fa-facebook-f" style="margin-left: -15px;"></a>
            <a href="#" class="fa-brands fa-x-twitter"></a>
            <a href="https://www.instagram.com/royalcoastacademy/" class="fa-brands fa-instagram" target="_blank"></a>
            <a href="#" class="fa-brands fa-linkedin"></a>
            <a href="https://wa.me/+2348027664776" class="fa-brands fa-whatsapp"></a>
         </div>
      </div>

      <div class="box">
         <h3>Reach Us</h3>
         <a href="tel:+2348027664776" class="link"><i class="fa-solid fa-phone"></i> <span> +234 802 766 4776</span></a>
         <a href="mailto:royalcoastacademy21@gmail.com" class="link"><i class="fa-sharp fa-solid fa-envelope"></i> royalcoastacademy21@gmail.com</a>
         <a class="link"><i class="fa-solid fa-clock"></i><span> Mon — Fri: 8:00 AM — 4:00 PM (GMT+1)
         </span></a>
         <a href="https://www.google.com/maps/place/Royal+Coast+Academy/@6.6436294,3.3875633,17z/data=!4m15!1m8!3m7!1s0x103b937ae5824571:0xccc23bd1c27304eb!2s10+Oluwole+Daramola+Cres,+Isheri+Oke+102109,+Ojodu+Berger,+Ogun+State!3b1!8m2!3d6.6436294!4d3.3875633!16s%2Fg%2F11sk8n63bg!3m5!1s0x103b9320de5d0e97:0x8af30d24481b53f6!8m2!3d6.6436294!4d3.3875633!16s%2Fg%2F11smwgcrfj" class="link"><i class="fa-solid fa-location-dot"></i><span> 10 Oluwole Daramola, Off Mabinuori, Opic Bus stop, Lagos - Ibadan Expressway, Ogun State.</span></a>
      </div>

      <div class="box">
         <h3>Quick links</h3>
         <a href="/royalcoastacademy/admissionpage.php" class="link">Admissions</a>
         <a href="/royalcoastacademy/blog.php?id=22" class="link">News and Events</a>
         <a href="/royalcoastacademy/photogallery.php" class="link">Photo Gallery</a>
         <a href="/royalcoastacademy/parentforum.php" class="link">Parents Forum</a>
         <a href="/royalcoastacademy/unavailable.php" class="link">Job Oppurtunities</a>
         <a href="/royalcoastacademy/faq.php" class="link">Help and Support</a>
      </div>


      <div class="box">
         <h3>newsletter</h3>
         <p>Subscribe for latest updates</p>
         <form id="subscription-form" action="" method="post">
            <input type="email" name="email" placeholder="Enter your email" id="email" class="email" required>
            <input type="submit" value="subscribe" class="btn">
         </form>
         <?php if (isset($success)): ?>
         <p style="color: #4CAF50;" class="success">Thank you for subscribing to our newsletter!. An Email will be sent to you very shortly.</p>
         <script>
            const successMessage = document.querySelector('.success');
            if (successMessage) {
               setTimeout(() => {
               successMessage.style.display = 'none';
               }, 4000);
            }
         </script>
         <?php elseif (isset($error)): ?>
         <p style="color:#ff0000" class="error"><?= $error ?></p>
         <?php endif; ?>

      </div>

      <script>
         window.onload = function() {
            var modal = document.getElementById("myModal");
            var span = document.getElementsByClassName("close")[0];

           if(modal){
            if (<?= json_encode($subscribed??'') ?>) {
               modal.style.display = "block";
            }

            span.onclick = function() {
               modal.style.display = "none";
            }

            window.onclick = function(event) {
               if (event.target == modal) {
                     modal.style.display = "none";
               }
            }
           }
         }
      </script>

      <script>
         const successModal = document.getElementById('success-modal');
         const closeBtn = document.getElementById('close-modal');
         
        if(successModal){
          // Show the modal when someone subscribes
          <?php if (isset($success)): ?>
            successModal.style.display = 'block';
         <?php endif; ?>
         
         // Close the modal when the close button is clicked
         closeBtn.onclick = function() {
            successModal.style.display = 'none';
         }

         setTimeout(() => {
            successModal.style.display = 'none';
         }, 3000);
        }

      </script>


   </div>

   <div class="credit">&copy; <?php echo date("Y");?> Royal Coast Academy. all rights reserved. </div>

</section>

<!-- footer section ends -->







<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7.4.1/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script defer src="js/script.js"></script>
<script defer src="js/aos.js"></script>
