<?php
session_start();
include '../db_connect.php';

if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: ../auth/login.php");
    exit;
}

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// Fetch main news item based on ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM news WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $mainNews = $result->fetch_assoc();
    } else {
        echo "News item not found.";
        exit;
    }
} else {
    echo "No news ID specified.";
    exit;
}

// Pagination
$itemsPerPage = 3;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $itemsPerPage;

// Fetch all other news items
$sql = "SELECT COUNT(*) AS total FROM news WHERE id != ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
$totalItems = $result->fetch_assoc()['total'];
$totalPages = ceil($totalItems / $itemsPerPage);

$sql = "SELECT * FROM news WHERE id != ? LIMIT ? OFFSET ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('iii', $id, $itemsPerPage, $offset);
$stmt->execute();
$otherNews = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($mainNews['title']); ?></title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .navbar {
            background-color: #671470;
            color: #fff;
            padding: 0 20px;
        }
        .navbar-brand {
            display: flex;
            align-items: center;
            color: #fff;
        }
        .navbar-brand img {
            width: 50px;
            margin-right: 10px;
        }
        .navbar-brand h2 {
            margin: 0;
            font-size: 1.2rem;
        }
        .navbar-nav {
            margin-left: auto;
            display: flex;
        }
        .nav-item {
            margin-left: 20px;
            align-items: center;
            color: #fff;
            font-size: 1rem;
            display: flex;
        }
        .nav-link {
            color: #fff;
            text-decoration: none;
            margin: 0 30px 0 10px;
        }
        .nav-link:hover {
            color: #ddd;
        }
        .container {
            margin-top: 5px;
            padding: 8px;
        }
        .container h2 {
            margin-top: 10px;
            font-size: 1.25rem;
        }
        .container .news-section {
            margin: 30px 0;
        }
        .fixed-aspect-ratio {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .news-image {
            width: 100%;
            height: auto;
        }
        .news-content {
            margin-top: 20px;
        }
        .other-news {
            margin-top: 50px;
        }
        .pagination {
            margin-top: 20px;
        }
        .news-carousel {
            display: flex;
            overflow-x: auto;
            white-space: nowrap;
            scroll-behavior: smooth;
            width: 100%; /* Adjust width as needed */
        }
        .news-carousel .news-item {
            display: inline-block;
            width: 300px; /* Adjust width as needed */
            margin-right: 15px; /* Space between items */
        }
        .carousel-controls {
            text-align: center;
            margin-top: 20px;
        }
        .carousel-controls button {
            margin: 0 5px;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <div class="navbar-brand">
                <img src="/royalcoastacademy/images/RCALogo.png" alt="logo">
                <h2>Royal Coast Academy<br>News</h2>
            </div>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../events/index.php">
                        <i class="fas fa-calendar"></i> Events
                    </a>
                    <a class="nav-link" href="../newsletter.php">
                        <i class="fas fa-envelope"></i> Newsletter
                    </a>
                    <a class="nav-link" href="../logout.php">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-4">
        <div class="news-section">
            <h1><?php echo htmlspecialchars($mainNews['title']); ?></h1>
            <small class="text-muted">Published on: <?php echo htmlspecialchars($mainNews['date']); ?></small>
            <div>
                <?php if ($mainNews['image']) : ?>
                    <img src="/royalcoastacademy/<?php echo htmlspecialchars($mainNews['image']); ?>" class="news-image mt-4 mw-20 mh-120" alt="News Image">
                <?php endif; ?>
            </div>
            
            <div class="news-content">
                <p><?php echo nl2br(htmlspecialchars($mainNews['description'])); ?></p>
            </div>
        </div>
        <hr>
        
        <div class="other-news">
            <h2>More News</h2>
            <div class="news-carousel">
                <?php while ($row = $otherNews->fetch_assoc()) : ?>
                    <div class="news-item">
                        <div class="card">
                            <?php if ($row['image']) : ?>
                                <img src="/royalcoastacademy/<?php echo htmlspecialchars($row['image']); ?>" class="card-img-top fixed-aspect-ratio" alt="News Image">
                            <?php endif; ?>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($row['title']); ?></h5>
                                <p class="card-text"><?php echo htmlspecialchars($row['description']); ?></p>
                                <a href="news_detail.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>

            <!-- Pagination -->
            <?php if ($totalPages > 1) : ?>
                <div class="carousel-controls">
                    <?php if ($page > 1) : ?>
                        <button class="btn btn-secondary" onclick="window.location.href='?id=<?php echo $id; ?>&page=<?php echo $page - 1; ?>'">Previous</button>
                    <?php endif; ?>
                    <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                        <button class="btn btn-<?php echo $i == $page ? 'primary' : 'secondary'; ?>" onclick="window.location.href='?id=<?php echo $id; ?>&page=<?php echo $i; ?>'"><?php echo $i; ?></button>
                    <?php endfor; ?>
                    <?php if ($page < $totalPages) : ?>
                        <button class="btn btn-secondary" onclick="window.location.href='?id=<?php echo $id; ?>&page=<?php echo $page + 1; ?>'">Next</button>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>

        <a href="index.php" class="btn btn-secondary mt-4">
            <i class="fas fa-long-arrow-alt-left"></i> Back to News List
        </a>
    </div>


    <div class="footer">
        <div class="credit">
            <p>&copy; <?php echo date("Y"); ?> Royal Coast Academy.</p>
        </div>
    </div>
    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let scrollInterval;
            const scrollDuration = 5000; // Scroll every 5 seconds
            const carousel = document.querySelector('.news-carousel');
            const scrollAmount = 300; // Amount to scroll per interval (adjust based on item width)

            function startScroll() {
                scrollInterval = setInterval(() => {
                    if (carousel.scrollLeft + carousel.clientWidth >= carousel.scrollWidth) {
                        carousel.scrollLeft = 0; // Reset to start
                    } else {
                        carousel.scrollLeft += scrollAmount; // Scroll by defined amount
                    }
                }, scrollDuration);
            }
            
            function stopScroll() {
                clearInterval(scrollInterval);
            }

            // Start auto-scrolling when the page loads
            startScroll();

            // Stop scrolling when the mouse enters the carousel
            carousel.addEventListener('mouseenter', stopScroll);

            // Resume scrolling when the mouse leaves the carousel
            carousel.addEventListener('mouseleave', startScroll);
        });
    </script>


</body>
</html>
