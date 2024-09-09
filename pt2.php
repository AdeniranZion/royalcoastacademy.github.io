<?php
$imageDir = 'images/'; // The directory containing your images
$images = glob($imageDir . 'IMG-202*.jpg');

// Split the images into two columns
$columnCount = 2;
$imagesPerColumn = array_chunk($images, ceil(count($images) / $columnCount));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photo Gallery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 5px;
        }

        .gallery-container {
            display: flex;
            position: relative;
            max-width: 900px;
            margin: 0 auto;
        }

        .sidebar {
            display: flex;
            max-width: 150px;
            overflow-y: auto;
            height: 500px; /* Fixed height to ensure scrollbar */
            padding-right: 10px;
            min-width: 300px;
        }

        .column {
            display: flex;
            flex-direction: column; /* Stack images vertically */
            flex: 1; /* Ensure both columns take equal space */
            padding: 5px;
            transition: transform 0.3s ease;
        }
        .thumbnail {
            width: 100%;
            cursor: pointer;
            margin-bottom: 0; /* Ensure no margin between images */
            object-fit: cover; /* Cover the space without stretching */
            flex-shrink: 0; /* Prevent images from shrinking */
            margin: 5px;
            border-radius: 10px;
            transition: transform 0.3s ease;
        }
        .thumbnail:hover{
            transform: scale(1.05);
        }

        .main-image-container {
            position: relative;
            flex-grow: 1;
            margin-left: 20px;
            border-radius: 10px;
            padding: 10px;
            background-color: #aa7e8b;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        .main-image-container p{
            font-size: 12px;
            color: #f1f1f1;
            margin: 10px;
        }

        .main-image {
            width: 100%;
            height: auto;
            border-radius: 10px;
            max-height: 490px;
            object-fit: contain;
            transition: transform 1s ease;
        }

        /* Image Details */
        .image-name, .image-details {
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .main-image-container:hover .image-name, 
        .main-image-container:hover .image-details {
            opacity: 1;
            transform: scale(1.05);

        }
        .main-image:hover{
            transform: scale(1.03);
        }

        .image-name {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            padding: 5px;
            border-radius: 5px;
            font-size: 14px;
            z-index: 1;
        }

        .image-details {
            position: absolute;
            bottom: 10px;
            left: 10px;
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            padding: 10px;
            border-radius: 5px;
            font-size: 12px;
            max-width: calc(100% - 20px);
        }

        /* Navigation Buttons */
        .nav-button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.3);
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 25%;
        }

        .prev-button {
            left: 10px;
        }

        .next-button {
            right: 10px;
        }

        /* Custom Scrollbar */
        .sidebar::-webkit-scrollbar {
            width: 8px; /* Width of the scrollbar */
        }

        .sidebar::-webkit-scrollbar-track {
            background: #f1f1f1; /* Background of the scrollbar track */
            border-radius: 10px;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background-color: #888; /* Color of the scrollbar thumb */
            border-radius: 10px;
            border: 2px solid #f1f1f1; /* Adds padding around the thumb */
        }

        .sidebar::-webkit-scrollbar-thumb:hover {
            background-color: #555; /* Color when hovering over the scrollbar thumb */
        }

        @media (max-width: 768px) {
            .sidebar {
                height: 300px; /* Adjust height for smaller screens */
            }

            .gallery-container {
                flex-direction: column;
                align-items: center;
            }

            .main-image-container {
                margin: 20px;
                max-width: 100%;
            }

            .nav-button {
                padding: 8px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Our Photo Speaks</h1>
        <div class="gallery-container">
            <div class="sidebar">
                <div class="column left-column">
                    <?php foreach ($imagesPerColumn[0] as $image): ?>
                        <img src="<?php echo $image; ?>" class="thumbnail" onclick="showImage('<?php echo $image; ?>', <?php echo array_search($image, $images); ?>)" />
                    <?php endforeach; ?>
                </div>
                <div class="column right-column">
                    <?php foreach ($imagesPerColumn[1] as $image): ?>
                        <img src="<?php echo $image; ?>" class="thumbnail" onclick="showImage('<?php echo $image; ?>', <?php echo array_search($image, $images); ?>)" />
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Main Image Display and Navigation -->
            <div class="main-image-container">
                <div class="image-name" id="image-name"></div>
                <img id="displayed-image" class="main-image" src="<?php echo $images[0]; ?>" alt="Main Image" data-bs-toggle="modal" data-bs-target="#imageModal" />
                <div class="image-details" id="image-details">Details about the image...</div>
                <button class="nav-button prev-button" onclick="navigateImage(-1)">&#10094;</button>
                <button class="nav-button next-button" onclick="navigateImage(1)">&#10095;</button>
                <p>Each image in our gallery captures a unique moment in the life of Royal Coast Academy.</p>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <img id="modal-image" src="<?php echo $images[0]; ?>" class="img-fluid" alt="Modal Image">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const columns = document.querySelectorAll('.column');
            let maxHeight = 0;

            // Find the maximum height among the columns
            columns.forEach(column => {
                const height = column.offsetHeight;
                if (height > maxHeight) {
                    maxHeight = height;
                }
            });

            // Set all columns to the maximum height
            columns.forEach(column => {
                column.style.height = maxHeight + 'px';
            });
        });

        let images = [
            <?php
                foreach ($images as $image) {
                    echo '"' . $image . '",';
                }
            ?>
        ].slice(0, -1); // Remove the trailing comma

        let currentIndex = 0;

        function showImage(src, index) {
            document.getElementById('displayed-image').src = src;
            document.getElementById('image-name').textContent = src.split('/').pop(); // Display image name
            document.getElementById('image-details').textContent = 'Details about ' + src.split('/').pop(); // Display image details
            document.getElementById('modal-image').src = src; // Display image in modal
            currentIndex = index;
        }

        function navigateImage(direction) {
            currentIndex += direction;
            if (currentIndex < 0) {
                currentIndex = images.length - 1;
            } else if (currentIndex >= images.length) {
                currentIndex = 0;
            }
            showImage(images[currentIndex], currentIndex);
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
