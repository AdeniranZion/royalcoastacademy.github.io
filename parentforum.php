<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .pf-head {
            background-image: url('images/pta.jpg');
            background-size: cover;
            background-color: rgba(0, 0, 0, 0.5);
            height: 90vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            background-repeat: no-repeat;
            position: relative;
            color: #fff;
        }

        .pf-head::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Black background tint */
            z-index: 1; /* Ensure it appears above the background image */
        }

        .pf-title {
            padding: 30px;
            border-radius: 8px;
            max-width: 40%;
            position: absolute;
            left: 15%;
            bottom: 15%;
            text-align: left;
            z-index: 2;
        }

        .pf-title h1 {
            position: relative;
            left: 0;
            font-size: 50px;
            margin-bottom: 20px;
        }

        .pf-title p {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .pf-content {
            display: flex;
            flex-wrap: wrap;
            padding: 40px 40vh;
            justify-content: space-between;
        }

        .pf-box {
            background-color: #f5f5f5;
            border-radius: 8px;
            margin-bottom: 20px;
            padding: 20px;
            flex: 0 0 48%;
            display: flex;
            align-items: center;
            border-left: 5px solid;
            border-color: RGB(103, 20, 112, 0.5);
        }

        .pf-box img {
            max-width: 100px;
            margin-right: 20px;
            border-radius: 5%;
            min-height: 80px;
            max-height: 80px;
            min-width: 90px;
            object-fit: cover;
        }

        .pf-box .pf-box-text {
            flex: 1;
        }

        .pf-box .pf-box-text h3 {
            margin-bottom: 10px;
            font-size: 24px;
        }

        .pf-box .pf-box-text p {
            font-size: 16px;
            margin-bottom: 5px;
        }

        .pf-icons {
            text-align: center;
            padding: 20px;
        }

        .pf-icons .icon {
            font-size: 40px;
            margin: 20px;
            color: green;
        }

        .pf-icons .icon:hover {
            color: #555;
        }

        @media (max-width: 768px) {
            .pf-box {
                flex: 0 0 100%;
            }
        }

        @media (max-width: 480px) {
            .pf-head {
                min-height: 80vh;
                padding: 10px 5px;
            }

            .pf-title {
                min-width: 80%;
                margin-right: 20%;
                left: 2;
            }
            .pf-title h1 {
                font-size: 30px;
            }

            .pf-title p {
                font-size: 16px;
            }

            .pf-content {
                padding: 30px;
            }
        }
    </style>
</head>
<body>
    <?php include_once "partials/header.php" ?>
    
    <section class="pf-head" data-aos="fade-in">
        <div class="pf-title"  data-aos="fade-up">
            <h1>Parents Forum</h1>
            <p>"Join our Parents Forum to connect, share insights, and support each other in our children's educational journey!"</p>
        </div>
    </section>

    <section class="pf-content" data-aos="fade-up">
        <div class="pf-box">
            <img src="images/wids.jpg" alt="Parent Image">
            <div class="pf-box-text">
                <h3>Supportive Community</h3>
                <p>Connect with other parents to share experiences and offer support.</p>
            </div>
        </div>

        <div class="pf-box">
            <img src="images/IMG-20240616-WA0023.jpg" alt="Parent Image">
            <div class="pf-box-text">
                <h3>Educational Insights</h3>
                <p>Gain valuable insights into your child's education and development.</p>
            </div>
        </div>

        <div class="pf-box">
            <img src="images/IMG-20240616-WA0042.jpg" alt="Parent Image">
            <div class="pf-box-text">
                <h3>Event Discussions</h3>
                <p>Stay updated and discuss upcoming school events and activities.</p>
            </div>
        </div>

        <div class="pf-box">
            <img src="images/wids2.jpg" alt="Parent Image">
            <div class="pf-box-text">
                <h3>Resources Sharing</h3>
                <p>Share and discover helpful resources for parenting and education.</p>
            </div>
        </div>
    </section>

    <section class="pf-icons">
        <h1>Connect with us via Whatsapp</h1>
        <a href="https://wa.me/+2348027664776">
        <i class="fab fa-whatsapp icon"></i>
        </a>
    </section>
    <?php
    include_once "partials/footer.php"
    ?>
</body>
</html>
