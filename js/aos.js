{/* <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js" integrity="sha512-FJx4hL6GvF6g4W2E+bFL25ZCnNQY9XnFO5GZi5/5c/3q1NhN5w5d5KFziSZCTZos2QspE9UNW34Oo5LOxjSwcA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> */}
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>


// Load AOS library
var script = document.createElement('script');
script.src = 'https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js';
document.head.appendChild(script);

// Initialize AOS
script.onload = function() {
  AOS.init();
};

// Initialize AOS library
AOS.init({
      duration: 800, // animation duration in milliseconds
      offset: 200, // offset (in pixels) from the top of the page for the start of the animation
      easing: 'ease-out', // easing function to use for the animation
      once: true, // only animate elements once on page load
  });
  
  // Apply animations to elements with data-aos attribute
  AOS.refresh();
