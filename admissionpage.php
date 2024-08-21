<head>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* Reset any unwanted overrides */
        .navbar .nav-link {
            margin-right: initial;
            padding-right: initial;
            /* Add more reset properties as needed */
        }
        /* Header Section */
        .hero, .hero-text {
            text-align: center;
            color: #fff;
        }

        .hero {
            background-color: #671470;
            padding: 80px 0;
        }

        .hero-title {
            font-size: 3rem;
            margin-bottom: 10px;
        }

        .hero-subtitle {
            font-size: 1.5rem;
            font-weight: 300;
        }

        /* Form Styles */
        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }

        input[type="text"], input[type="email"], input[type="tel"], textarea, input[type="file"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1.6rem;
            margin-top: 5px;
            color: #333;
        }

        textarea {
            resize: vertical;
        }

        /* Hero Section */
        .hero-section {
            position: relative;
            text-align: center;
            height: 60vh;
            background: url('images/wids.jpg') no-repeat center center/cover;
        }

        .hero-section .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .hero-section .hero-text {
            font-size: 18px;
            color: #fff;
            text-align: center;
        }

        /* Admissions Overview Section */
        .admissions-overview {
            padding: 50px 20px;
            text-align: center;
        }

        .admissions-overview h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .admissions-overview p {
            font-size: 1.5rem;
            max-width: 800px;
            margin: 0 auto 40px;
        }

        .steps-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 30px;
        }

        .step {
            flex: 1;
            min-width: 280px;
            max-width: 350px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .step-number {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            font-size: 1.5em;
            margin-bottom: 15px;
        }

        .step-number-1 { background-color: #FF5733; }
        .step-number-2 { background-color: #33A1FF; }
        .step-number-3 { background-color: #28A745; }
        .step-number-4 { background-color: #FFC107; }

        .step h3 {
            font-size: 2em;
            margin-bottom: 20px;
        }

        .step p {
            font-size: 1.5em;
            color: #555;
            text-align: center;
            margin-bottom: 5px;
        }

        /* Contact Admissions Section */
        .contact-admissions {
            padding: 50px 20px;
            text-align: center;
            background-color: #fcf5fc;
        }

        .contact-admissions h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .contact-admissions p {
            font-size: 1.5rem;
            max-width: 800px;
            margin: 0 auto 40px;
        }

        .contact-admissions .btn {
            font-size: 1.5rem;
            padding: 10px 20px;
            background-color: #671470;
            color: #fff;
            border-radius: 5px;
            text-decoration: none;
        }

        .info h2 {
            font-size: 2.5rem;
            text-align: center;
            margin-bottom: 20px;
            font-weight: bolder;
        }

        .info2 p {
            font-size: 1.2rem;
            margin: 20px 0;
        }
        @media (max-width: 480px) {
            .hero-text p{
                text-align: center;
                color: #fff;
                font-size: 1.6rem;
            }
        }
    </style>
</head>

<body>
    <?php include_once 'partials/header.php'; ?>

    <div class="header-section" style="background-color: #671470; padding: 35px; padding-right: 12.5%; text-align: right; position: relative;">
        <h1 class="logo" style="margin: 0; color: white; font-size: 3rem;" data-aos="fade-right">Admission into Royal Coast Academy</h1>
        <div style="position: absolute; bottom: 0; right: 0; width: 300px; height: 2px; background-color: white; margin-right: 12%;" data-aos="fade-left"></div>
    </div>

    <!-- Hero Section -->
    <section class="hero-section" data-aos="fade-up" data-aos-duration="1000">
        <div class="overlay">
            <div class="hero-text">
                <p>Royal Coast Academy offers an excellent opportunity through our entrance examination for prospective students. We prioritize academic excellence and holistic development. Admission is open to all who meet our criteria, irrespective of religion, ethnicity, nationality, or gender. To apply, click the application link and follow instructions. For assistance, email admissions@royalcoastacademy.org or call (234) 705 847 7260 during office hours (Monday to Friday).</p>
            </div>
        </div>
    </section>
    <!-- End Hero Section -->

    <!-- Admissions Overview Section -->
    <section class="admissions-overview">
        <h2>Admissions Overview</h2>
        <p>At Royal Coast Academy, we welcome students from all backgrounds who are eager to learn and grow in a supportive and challenging environment. Our admissions process is designed to ensure we find the best match for our community. Below, you will find detailed steps to help guide you through our application process.</p>
        <div class="steps-container">
            <!-- Step 1 -->
            <div class="step" data-aos="zoom-in" data-aos-duration="600">
                <div class="step-number step-number-1">1</div>
                <h3>Application</h3>
                <p>Complete and submit the online application form. Please ensure all required documents are uploaded.</p>
            </div>
            
            <!-- Step 2 -->
            <div class="step" data-aos="zoom-in" data-aos-duration="800">
                <div class="step-number step-number-2">2</div>
                <h3>Assessment</h3>
                <p>Our team will carefully review your ward's application before taking the assessment test.</p>
            </div>
            
            <!-- Step 3 -->
            <div class="step" data-aos="zoom-in" data-aos-duration="1000">
                <div class="step-number step-number-3">3</div>
                <h3>Interview</h3>
                <p>Participate in a personal interview. This is an opportunity for us to learn more about you and for you to ask questions about our school.</p>
            </div>
            
            <!-- Step 4 -->
            <div class="step" data-aos="zoom-in" data-aos-duration="1200">
                <div class="step-number step-number-4">4</div>
                <h3>Decision</h3>
                <p>Receive your admission details via email. Our admissions team will notify you of the outcome and guide you through the next steps if your child is accepted.</p>
            </div>
        </div>
    </section>
    <!-- End Admissions Overview Section -->

    <!-- Contact Admissions Section -->
    <!-- <section class="contact-admissions">
        <h2>ENROLL YOUR CHILD NOW!</h2>
        <p>Application form into our schools are available online, right here on this website. Click here to access the form. <strong style="color: red;">Application closes on Friday, March 1, 2024.</strong></p>
        <a href="https://royalcoastacademy.org/admission_form.php" class="btn">Apply Now</a>
    </section> -->
    <!-- End Contact Admissions Section -->

    <?php include_once 'partials/footer.php'; ?>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>
