<?php include_once "partials/header.php"; 

include_once "partials/db_connect.php"; // Include your database connection

// Query to fetch events
$query = "SELECT image, title, description, category, date FROM events ORDER BY date DESC";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$events = [];
while ($row = $result->fetch_assoc()) {
    $events[] = $row;
}

$stmt->close();
$conn->close();

function displayNewsAndEvents($items) {
   foreach ($items as $item) {
       echo '
       <div class="box">
           <div class="image">
               <img src="' . $item["image"] . '" alt="">
               <h3>' . $item["category"] . '</h3>
               <!-- Modal for additional details -->
               <div class="modal">
                   <h4>' . $item["title"] . '</h4>
                   <p>' . $item["description"] . '</p>
                   <span class="close-modal">&times;</span>
               </div>
           </div>
           <div class="content">
               <h3>' . $item["title"] . '</h3>
               <p>' . $item["description"] . '</p>
               <a href="#" class="btn">read more</a>
               <div class="icons">
                   <span><i class="fas fa-clock"></i> Updated <span class="time-elapsed" data-date="' . $item["date"] . '"></span></span>
               </div>
           </div>
       </div>';
   }
}
?>

<!-- header section ends -->

<section class="heading-link">
   <h3>The Royal Gazette</h3>
   <p> <a href="index.php">home</a> / events </p>
</section>

<section class="courses">
   <h1 class="heading"> Our Latest News and Events </h1>
   <div class="box-container" data-aos="fade-up">
      <?php displayNewsAndEvents($events); ?>
   </div>
   <div class="load-more"> <div class="btn">Load More</div> </div>
</section>


<?php include_once "partials/footer.php"; ?>

<!-- Add the modal CSS in the style block or in your CSS file -->
<style>
      /* Styling for the modal inside the box */
      .courses .box-container .box .modal {
         position: absolute;
         top: 0;
         left: 0;
         width: 100%;
         height: 100%;
         background: rgba(70, 70, 70, 0.6); /* Charcoal gray, 60% opacity */
         color: #fff;
         display: none; /* Hide by default */
         align-items: center;
         justify-content: center;
         text-align: center;
         padding: 1rem;
         z-index: 10; /* Ensure it appears above other content */
         opacity: 0;
         transition: opacity 0.3s ease-in-out;
      }

      /* Show the modal on hover */
      .courses .box-container .box:hover .modal {
         display: grid; /* Show modal as flexbox */
         opacity: 1; /* Smooth transition to visible */
         transition: opacity 1s ease-in-out;
         align-items: center;
         padding: 30px;
         gap: 0.5rem;
      }

      .courses .box-container .box .modal h4 {
         font-size: 2.5rem;
         margin-bottom: 2px;
         margin-top: 50px;
      }

      .courses .box-container .box .modal p {
         font-size: 1.5rem;
         margin-bottom: 20px;
      }


      /* Ensure the image container is positioned relative to contain the modal */
      .courses .box-container .box .image {
         position: relative;
         overflow: hidden;
      }

      /* Ensure the modal doesn't appear abruptly */
      .courses .box-container .box .modal {
         transition: opacity 1s ease, display 1s 3s; /* Delay display none until opacity transition ends */
      }
</style>

<script>
   // Function to calculate the time difference
   function timeSince(date) {
      const seconds = Math.floor((new Date() - new Date(date)) / 1000);
      const intervals = {
         year: 31536000,
         month: 2592000,
         week: 604800,
         day: 86400,
         hour: 3600,
         minute: 60,
         second: 1,
      };

      for (let [key, value] of Object.entries(intervals)) {
         const interval = Math.floor(seconds / value);
         if (interval >= 1) {
            return `${interval} ${key}${interval !== 1 ? 's' : ''} ago`;
         }
      }
   }

   // Update all elements with the class 'time-elapsed'
   document.querySelectorAll('.time-elapsed').forEach((el) => {
      const uploadDate = el.getAttribute('data-date');
      el.innerText = timeSince(uploadDate);
   });

   document.addEventListener('DOMContentLoaded', () => {
    const items = document.querySelectorAll('.item');  // Select all items
    const loadMoreBtn = document.querySelector('.load-more .btn'); // Select the button
    const itemsPerPage = 3;    // Number of items to show initially and on load more
    let currentPage = 0;

    // Function to show items based on the current page
    function showItems() {
        items.forEach((item, index) => {
            if (index < (currentPage + 1) * itemsPerPage) {
                item.style.display = 'block'; // Show item
            } else {
                item.style.display = 'none'; // Hide item
            }
        });
    }

    // Function to toggle between "Load More" and "Show Less"
    function toggleButton() {
        if ((currentPage + 1) * itemsPerPage < items.length) {
            loadMoreBtn.textContent = 'Load More';
        } else {
            loadMoreBtn.textContent = 'Show Less';
        }
    }

    // Initial display setup
    showItems();
    toggleButton();

    // Event listener for the button
    loadMoreBtn.addEventListener('click', () => {
        if (loadMoreBtn.textContent === 'Load More') {
            currentPage++; // Increase page count to show more items
        } else {
            currentPage = 0; // Reset to show initial items
        }
        showItems();
        toggleButton();
       });
   });

   // Handle close modal button click if needed
   document.addEventListener('DOMContentLoaded', () => {
      document.querySelectorAll('.close-modal').forEach((closeBtn) => {
         closeBtn.addEventListener('click', (e) => {
            e.target.parentElement.style.display = 'none';
            e.stopPropagation();
         });
      });
   });
</script>

<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>
