<?php
// photo_gallery.php
$dir = '../images/';
$files = scandir($dir);
$allowed_types = array('jpg', 'jpeg', 'png', 'gif');
$photos = [];

foreach ($files as $file) {
    if (strpos($file, 'IMG') === 0) { // Filter for filenames starting with 'IMG'
        $file_info = pathinfo($file);
        if (in_array(strtolower($file_info['extension']), $allowed_types)) {
            $tag = 'event1'; // Example tag, adjust as needed
            $photos[] = [
                'path' => $dir . $file,
                'alt' => 'School Photo', // Can be customized based on filename or other metadata
                'tag' => $tag
            ];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Photos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/lightgallery@2.6.0/dist/css/lightgallery-bundle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }
        .container {
            margin-top: 50px;
        }
        .photo-card {
            position: relative;
            overflow: hidden;
            border-radius: 15px;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .photo-card img {
            width: 100%;
            height: auto;
            border-radius: 15px;
            transition: transform 0.3s, opacity 0.3s;
        }
        .photo-card:hover img {
            transform: scale(1.1);
            opacity: 0.8;
        }
        .photo-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
        .card-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 15px;
            background: rgba(0, 0, 0, 0.5);
            color: white;
            text-align: center;
            border-radius: 0 0 15px 15px;
            opacity: 0;
            transition: opacity 0.3s;
        }
        .photo-card:hover .card-overlay {
            opacity: 1;
        }
        h1 {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 40px;
            color: #343a40;
        }
        .search-box {
            margin-bottom: 20px;
        }
        .tag-filter {
            margin-bottom: 20px;
        }
        .carousel {
            margin-top: 30px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="text-center mb-4">School Photos</h1>
    <div class="search-box text-center">
        <input type="text" id="searchInput" class="form-control" placeholder="Search photos...">
    </div>
    <div class="tag-filter text-center">
        <button class="btn btn-primary filter-btn" data-filter="all">All</button>
        <button class="btn btn-secondary filter-btn" data-filter="event1">Event 1</button>
        <button class="btn btn-secondary filter-btn" data-filter="event2">Event 2</button>
        <!-- Add more tags as needed -->
    </div>
    <div class="row" id="photoGallery">
        <?php foreach ($photos as $photo): ?>
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4 photo-card" data-tags="<?php echo htmlspecialchars($photo['tag']); ?>">
                <a href="<?php echo htmlspecialchars($photo['path']); ?>" class="photo-card-link" data-lg-size="1600-1200">
                    <img src="<?php echo htmlspecialchars($photo['path']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($photo['alt']); ?>">
                    <div class="card-overlay">School Event</div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="carousel mt-4">
        <?php foreach ($photos as $photo): ?>
            <div><img src="<?php echo htmlspecialchars($photo['path']); ?>" alt="<?php echo htmlspecialchars($photo['alt']); ?>"></div>
        <?php endforeach; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/lightgallery@2.6.0/dist/js/lightgallery.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/lightgallery@2.6.0/dist/js/lg-thumbnail.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/lightgallery@2.6.0/dist/js/lg-fullscreen.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/lightgallery@2.6.0/dist/js/lg-zoom.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize LightGallery
        lightGallery(document.querySelector('#photoGallery'), {
            thumbnail: true,
            selector: '.photo-card-link',
            download: false,
            zoom: true,
            fullScreen: true,
            actualSize: true,
            closeOnBackdropClick: true
        });

        // Initialize Slick Carousel
        $('.carousel').slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            arrows: true,
            dots: true
        });

        // Search functionality
        document.getElementById('searchInput').addEventListener('input', function() {
            var filter = this.value.toLowerCase();
            var items = document.querySelectorAll('.photo-card');
            items.forEach(function(item) {
                var altText = item.querySelector('img').alt.toLowerCase();
                item.style.display = altText.includes(filter) ? 'block' : 'none';
            });
        });

        // Tag filter functionality
        document.querySelectorAll('.filter-btn').forEach(function(button) {
            button.addEventListener('click', function() {
                var filter = this.getAttribute('data-filter');
                var items = document.querySelectorAll('.photo-card');
                items.forEach(function(item) {
                    var tags = item.getAttribute('data-tags').split(',');
                    item.style.display = filter === 'all' || tags.includes(filter) ? 'block' : 'none';
                });
            });
        });
    });
</script>
</body>
</html>
