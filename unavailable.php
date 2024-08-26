<?php include_once "partials/header.php"; ?>

    <title>404 Not Found</title>
    <style>
      
        .container {
            text-align: center;
            max-width: 600px;
            padding: 2rem;
        }

        .container h2 {
            font-size: 3.5rem;
            font-weight: bolder;
            margin: 1rem 0;
        }

        .container p {
            font-size: 1.5rem;
            margin: 2.5rem 0;
        }

        .container .image {
            margin: 2rem 0;
        }

        .container .image img {
            max-width: 100%;
            height: auto;
        }
        .button{
          color: #061c30;
        }

        @media (max-width: 600px) {
            .container h1 {
                font-size: 6rem;
            }

            .container h2 {
                font-size: 3rem;
            }

            .container p {
                font-size: 1.8rem;
            }

            .container .button {
                font-size: 1rem;
                padding: 0.6rem 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Coming Soon!</h2>
        <div class="image">
            <img src="images/undraw_Page_not_found_re_e9o6.png" alt="404 Illustration">
        </div>
        <p>The page you are looking for is under construction.</p>
        <a href="#" class="btn" onclick="history.back(); return false;">Go Back</a>
      </div>
</body>
</html>


<script>
    AOS.init({
        duration: 800, // animation duration in milliseconds
        offset: 200, // offset (in pixels) from the top of the page for the start of the animation
        easing: 'ease-out', // easing function to use for the animation
        once: true, // only animate elements once on page load
    });
  </script>


