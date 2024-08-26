<?php
include 'partials/db_connect.php';

// Get news ID from the URL
$newsId = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($newsId > 0) {
    // Fetch news details from the database
    $sql = "SELECT * FROM news WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $newsId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $news = $result->fetch_assoc();
        $newsTitle = htmlspecialchars($news['title']);
        $newsDate = date('F j, Y', strtotime($news['date'])); // Format date
        $newsTime = date('H:i', strtotime($news['time'])); // Format time
        $newsImage = htmlspecialchars($news['image']);
        $newsContent = htmlspecialchars($news['description']);
        $newsSubheading = htmlspecialchars($news['subheading']);
        $newsBody = htmlspecialchars($news['body']);
        $newsAuthor = "Admin";
    } else {
        echo "No news found.";
        exit;
    }
} else {
    echo "Invalid news ID.";
    exit;
}

// Fetch other news for the "More news" section
$otherNewsSql = "SELECT * FROM news WHERE id != ? ORDER BY date DESC";
$otherNewsStmt = $conn->prepare($otherNewsSql);
$otherNewsStmt->bind_param('i', $newsId);
$otherNewsStmt->execute();
$otherNewsResult = $otherNewsStmt->get_result();

include_once 'partials/header.php';
?>
    <style>
        .news-detail {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            font-family: Arial, sans-serif;
        }
        .news-detail img {
            width: 100%;
            height: auto;
            object-fit: cover;
            border-radius: 8px;
            margin: 20px 0;
        }
        .news-detail h1 {
            font-size: 2.9rem;
            font-weight: bolder;
            color: #333;
        }
        .news-detail p.date {
            color: #777;
            font-size: 1.5rem;
            margin: 15px 0;
        }
        .news-detail p.content {
            font-size: 1.6rem;
            color: #555;
            padding: 10px 0;
            margin: 20px auto;
        }
        .more-news-section {
            margin-top: 40px;
            max-width: 50.75%;
        }
        .more-news-item {
            margin: 20px;
        }
        .more-news-item img {
            height: 250px;
            max-height: 300px;
            object-fit: cover;
        }
        .more-news-item .card-body {
            padding: 15px;
        }
        .carousel-container {
            position: relative;
            width: 100%;
            overflow: hidden;
            margin: 15px 0;
        }
        .scrolling-wrapper {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }
        .card {
            min-width: 300px;
            min-height: 300px;
            margin-right: 20px;
            background-color: #fcf5fc;
            border-radius: 10px;
        }
        .card-text {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .next-prev-nav {
            position: absolute;
            top: 23px;
            /* bottom: 1px; */
            right: 1%;
            transform: translateY(-50%);
            display: flex;
            gap: 10px;
            /* margin-bottom: 30px; */
        }

        .next-prev-nav a.button {
            width: 40px;
            height: 40px;
            background-color: #fff;
            color: #000;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid #000;
            text-decoration: none;
            font-size: 24px;
            border-radius: 0; /* Square shape */
            box-shadow: 0 2px 5px #ddd;
            cursor: pointer;
        }

        .next-prev-nav a.button:hover {
            background-color: #ddd;
            color: #fff;
        }

        .next-prev-nav a.button span {
            font-weight: bold;
            line-height: 1;
        }
        @media (max-width: 480px){
            .more-news-section {
                margin-top: 40px;
                max-width: 100%;
            }
        }
    </style>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<div style="background-color: #671470; padding: 35px; padding-right: 12.5%; text-align: right; position: relative;">
    <h1 class="logo" style="margin: 0; color: #fff8ec; font-size: 3rem;"  data-aos="fade-right">News</h1>
    <div style="position: absolute; bottom: 0; right: 0; width: 90px; height: 2px; background-color: white; margin-right:12%;" data-aos="fade-left"></div>
</div>
    <div class="news-detail" data-aos="fade-up">
        <h1><?php echo $newsTitle; ?></h1>
        <p class="date"><i class='fas fa-file' style='color: #555'></i> <?php echo $newsDate . ' at ' . $newsTime . '  '; ?> <i class='fas fa-user ' style='color: #555; margin-left: 20px;'></i> <?php echo $newsAuthor; ?></p>
        <hr>
        <img src="<?php echo $newsImage; ?>" alt="<?php echo $newsTitle; ?>">
        <i>View our <?php
            echo $newsTitle . ' pictures.';
        ?></i>
        <p class="content"><?php echo $newsContent; ?></p>
        <h2><?php echo $newsSubheading; ?></h2>
        <p class="content"><?php echo $newsBody; ?></p>
        <i>
        <i class="far fa-comment-dots"></i> Comments have been turned off.</i>
        <hr>
    </div>

    <div class="container more-news-section">
        <h1>More News</h1>
        <div class="carousel-container">
            <div class="scrolling-wrapper" id="newsCarousel">
                <?php
                if ($otherNewsResult->num_rows > 0) {
                    while ($otherNews = $otherNewsResult->fetch_assoc()) {
                        $otherNewsTitle = htmlspecialchars($otherNews['title']);
                        $otherNewsDate = date('F j, Y', strtotime($otherNews['date']));
                        $otherNewsImage = htmlspecialchars($otherNews['image']);
                        $otherNewsExcerpt = htmlspecialchars($otherNews['excerpt']);
                        echo "<div class='card'>
                            <img src='$otherNewsImage' class='card-img-top' alt='$otherNewsTitle'>
                            <div class='card-body'>
                                <h5 class='card-title'>$otherNewsTitle</h5>
                                <p class='card-text'>$otherNewsExcerpt</p>
                                <h5 class='card-text'><i class='fas fa-clock' style='color: #ccc'></i> $otherNewsDate</h5>
                                <a href='news.php?id={$otherNews['id']}' class='btnSmall'>Read News</a>
                            </div>
                        </div>";
                    }
                } else {
                    echo "<p>No other news available.</p>";
                }
                ?>
            </div>
        </div>
        <div style="margin: 10px; margin-bottom: 30px; padding: 10px; position:relative;">
            <div class="next-prev-nav">
                <a class="btnSmall btn-outline-light" id="prevButton"><span>&lt;</span></a>
                <a class="btnSmall btn-outline-light" id="nextButton"><span>&gt;</span></a>
            </div>
        </div>
    </div>
    <hr>

    <div class="contact-admissions">
        <h1>Ready to embark on a journey of excellence at <strong>Royal Coast Academy?</strong></h2>
        <a href="admissionpage.php" class="btn">Apply Now</a>
    </div>

    <?php include_once 'partials/footer.php'; ?>
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            var $carouselWrapper = $('#newsCarousel');
            var $cards = $carouselWrapper.find('.card');
            var cardWidth = $cards.outerWidth(true); // Width including margin
            var totalWidth = $cards.length * cardWidth;

            $carouselWrapper.css('width', totalWidth); // Set the width of the wrapper to accommodate all cards

            function scrollCarousel() {
                $carouselWrapper.css({
                    'transform': 'translateX(-' + cardWidth + 'px)',
                    'transition': 'transform 0.5s ease-in-out'
                }).one('transitionend', function() {
                    var $firstCard = $carouselWrapper.find('.card').first();
                    $carouselWrapper.append($firstCard); // Move the first card to the end
                    $carouselWrapper.css({
                        'transform': 'translateX(0px)', // Reset the transform property
                        'transition': 'none' // Disable transition during reset
                    });
                });
            }
            setInterval(scrollCarousel, 7000);
        });

        document.addEventListener('DOMContentLoaded', function () {
            const newsCarousel = document.getElementById('newsCarousel');
            const nextButton = document.getElementById('nextButton');
            const prevButton = document.getElementById('prevButton');

            nextButton.addEventListener('click', function () {
                newsCarousel.scrollBy({
                    top: 0,
                    left: 300,  // Adjust this value depending on your card width
                    behavior: 'smooth'
                });
            });

            prevButton.addEventListener('click', function () {
                newsCarousel.scrollBy({
                    top: 0,
                    left: -300, // Adjust this value depending on your card width
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>
</html>
