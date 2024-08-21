<?php
session_start();
include_once '../partials/db_connect.php'; // Adjust path as needed

if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: ../auth/login.php");
    exit;
}

include_once 'header.php';
include_once '../news_fetch.php';

// Fetch key metrics
$sqlUsers = "SELECT COUNT(*) AS total_users FROM users";
$resultUsers = $conn->query($sqlUsers);
$totalUsers = ($resultUsers->num_rows > 0) ? $resultUsers->fetch_assoc()['total_users'] : 0;

$sqlNews = "SELECT COUNT(*) AS total_news FROM news";
$resultNews = $conn->query($sqlNews);
$totalNews = ($resultNews->num_rows > 0) ? $resultNews->fetch_assoc()['total_news'] : 0;

$sqlEvents = "SELECT COUNT(*) AS total_events FROM events";
$resultEvents = $conn->query($sqlEvents);
$totalEvents = ($resultEvents->num_rows > 0) ? $resultEvents->fetch_assoc()['total_events'] : 0;

// Fetch the 3 most recent news items
$sql = "SELECT id, title, date, image, description FROM news ORDER BY date DESC LIMIT 3";
$result = $conn->query($sql);

// Store news items in an array
$newsItems = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $newsItems[] = [
            "id" => htmlspecialchars($row['id']),
            "title" => htmlspecialchars($row['title']),
            "date" => htmlspecialchars($row['date']),
            "image" => htmlspecialchars($row['image']),
            "excerpt" => htmlspecialchars(substr($row['description'], 0, 100)) . '...', // Create an excerpt
            "link" => "news_detail.php?id=" . $row['id'] // Adjust link as needed
        ];
    }
}
?>
<style>
        .card-icon {
            font-size: 3rem; /* Adjust icon size as needed */
            margin-bottom: 1rem;
        }
        .card-users {
            color: #007bff; /* Blue */
        }
        .card-news {
            color: #28a745; /* Green */
        }
        .card-events {
            color: #dc3545; /* Red */
        }
    </style>

<div class="container">
    <h1 class="my-4">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>

    <!-- Key Metrics Overview -->
    <div class="row">
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <i class="fas fa-users card-icon card-users"></i>
                    <h5 class="card-title">Total Users</h5>
                    <p class="h3"><?php echo $totalUsers; ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <i class="fas fa-newspaper card-icon card-news"></i>
                    <h5 class="card-title">Total News</h5>
                    <p class="h3"><?php echo $totalNews; ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <i class="fas fa-calendar-alt card-icon card-events"></i>
                    <h5 class="card-title">Total Events</h5>
                    <p class="h3"><?php echo $totalEvents; ?></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Links -->
    <div class="row">
        <div class="col-md-4" data-aos="fade-up">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">News Section</h5>
                    <p class="card-text">Edit and update the latest news articles.</p>
                    <a href="news/index.php" class="btn btn-primary">Edit News</a>
                </div>
            </div>
        </div>
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Events Section</h5>
                    <p class="card-text">Edit and update upcoming events.</p>
                    <a href="events/index.php" class="btn btn-primary">Edit Events</a>
                </div>
            </div>
        </div>
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="400">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Newsletter</h5>
                    <p class="card-text">Additional management features.</p>
                    <a href="newsletter.php" class="btn btn-primary">Newsletter</a>
                </div>
            </div>
        </div>
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="400">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Photo Gallery</h5>
                    <p class="card-text">Add, Edit and Delete Photos </p>
                    <a href="photos-gallery.php" class="btn btn-primary">Photos</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Latest News Section -->
    <h2 class="my-4">Latest News</h2>
    <div class="row">
        <?php foreach ($newsItems as $news) : ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="<?php echo $news['image']; ?>" class="card-img-top" alt="<?php echo $news['title']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $news['title']; ?></h5>
                        <p class="card-text"><?php echo $news['excerpt']; ?></p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Published on: <?php echo $news['date']; ?></small><br>
                        <a href="<?php echo $news['link']; ?>" class="stretched-link">Read more</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<div class="footer">
    <div class="credit">
        <p>&copy; <?php echo date("Y"); ?> Royal Coast Academy.</p>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script src="./script.js"></script>
<script>
    AOS.init();
</script>

</body>
</html>
