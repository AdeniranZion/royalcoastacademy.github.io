<?php include_once "partials/header.php"; ?>

<?php
    // Define image details (could be retrieved from a database)
    function get_image_details($filename) {
        $details = [
            'IMG-20240616-WA0030.jpg' => ['title' => 'School Event', 'description' => 'A fun event at our school.'],
            'IMG-20240616-WA0039.jpg' => ['title' => 'Best Science Project', 'description' => 'Awarded for an innovative project at the Science Fair.'],
            // Add more image details as needed...
        ];

        return $details[$filename] ?? ['title' => 'Unknown', 'description' => 'No description available.'];
    }

    // Load images based on the page and handle AJAX requests
    function load_images($page) {
        $imagesPerPage = 6;
        $imageDir = 'images/'; // The directory containing your images
        $images = glob($imageDir . 'IMG-202*.jpg'); // Get all jpg images starting with IMG-202 in the directory

        $totalImages = count($images);
        $startIndex = ($page - 1) * $imagesPerPage;
        $endIndex = $startIndex + $imagesPerPage;
        $hasMore = $endIndex < $totalImages;
        $hasLess = $page > 1;

        $imagesToLoad = array_slice($images, $startIndex, $imagesPerPage);
        $imageData = [];

        foreach ($imagesToLoad as $image) {
            $filename = basename($image);
            $details = get_image_details($filename);
            $imageData[] = [
                'url' => $image,
                'filename' => $filename,
                'title' => $details['title'],
                'description' => $details['description']
            ];
        }

        return [
            'images' => $imageData,
            'hasMore' => $hasMore,
            'hasLess' => $hasLess
        ];
    }

    // Handle AJAX request
    if (isset($_GET['page'])) {
        header('Content-Type: application/json');
        echo json_encode(load_images((int)$_GET['page']));
        exit;
    }
?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.14/css/lightgallery.min.css" integrity="sha384-3H5qqmDTB6/ZBG5aw+DxLtTqNYyEKshc+MK5G6qAtC6axGpT2GZvg1ewHf6E8P88" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.14/js/lightgallery.min.js" integrity="sha384-Ay9kkXZFOwvFtDrK3/6kznvB68pThk1me6XJhSpqlkXU7CB2obLR7ux9GPn5V9Pd" crossorigin="anonymous"></script>

    <title>School Photo Gallery</title>
    <style>
        /* Existing CSS styles omitted for brevity */
        .photobody {
            margin: 0;
            box-sizing: border-box;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 20px;
        }

        .gallery-container {
            max-width: 1200px;
            width: 100%;
            text-align: center;
        }

        .gallery-container h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #333;
        }

        .gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            justify-content: center;
        }

        .gallery img {
            width: 300px;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .gallery img:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        }

        .expanded-container {
            position: relative;
            display: none;
            width: 100%;
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .expanded-container.active {
            display: block;
        }

        .expanded-image {
            width: 100%;
            height: auto;
        }

        .expanded-details {
            padding: 15px;
            text-align: left;
        }

        .expanded-title {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: #333;
        }

        .expanded-description {
            font-size: 1rem;
            color: #666;
        }

        .buttons {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .gallery img {
                width: 100%;
            }
        }

        @media (max-width: 480px) {
            .gallery img {
                width: 100%;
            }

            .expanded-container {
                width: 90%;
            }
        }
            /* New styles for Award Section */
            .award-section {
                max-width: 1500px;
                width: 100%;
                text-align: center;
                margin-top: 50px;
                /* padding: 20px; */
            }

            .award-section h2 {
                font-size: 3rem;
                margin-bottom: 20px;
                color: #333;
            }

            .award-container {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
                gap: 20px;
                margin-top: 20px;
                justify-items: center;
            }

            .award-card {
                width: 90%;
                background-color: #fff;
                border-radius: 10px;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
                overflow: hidden;
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }

            .award-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
            }

            .award-image {
                width: 100%;
                height: 300px;
                object-fit: cover;
                object-position: top; /* Ensure faces are at the top */
                border-top-left-radius: 10px;
                border-top-right-radius: 10px;
            }

            .award-details {
                padding: 15px;
                text-align: left;
            }

            .award-title {
                font-size: 2rem;
                margin-bottom: 10px;
                color: #333;
            }

            .award-description {
                font-size: 1.3rem;
                color: #666;
            }
        </style>
</head>
<body>
    <div style="background-color: #671470; padding: 35px; padding-right: 12.5%; text-align: right; position: relative;">
        <h1 class="logo" style="margin: 0; color: #fff8ec; font-size: 3rem;"  data-aos="fade-right">Photo Gallery</h1>
        <div style="position: absolute; bottom: 0; right: 0; width: 90px; height: 2px; background-color: white; margin-right:12%;" data-aos="fade-left"></div>
    </div>
        <section class="photobody">
                <div class="gallery-container" data-aos="fade-left" data-aos-duration="1200">
                    <div id="gallery" class="gallery" data-aos="fade-left" data-aos-duration="1200">
                        <!-- Images will be loaded here by JavaScript -->
                </div>
                <div class="buttons">
                    <button id="load-less" class="button">Load Less</button>
                    <button id="load-more" class="button">Load More</button>
                </div>
            </div>

            <!-- Expanded Image and Details Container -->
            <div id="expanded-container" class="expanded-container">
                <img id="expanded-image" class="expanded-image" src="" alt="">
                <div class="expanded-details">
                    <h2 id="expanded-title" class="expanded-title"></h2>
                    <p id="expanded-description" class="expanded-description"></p>
                </div>
            </div>
            <?php
                include_once 'pt2.php';
            ?>

            <!-- Award Section -->
            <section class="award-section" data-aos="fade-up">
                <h1>Our Award-Winning Students</h1>
                <div class="award-container" id="award-container">
                    <div class="award-card">
                        <img src="images/IMG-20240616-WA0039.jpg">
                        <h1>Hello</h1>

                    </div>
                    <!-- Awards will be loaded here by JavaScript -->
                </div>
            </section>
        </section>



    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let currentPage = 1;
            const gallery = document.getElementById('gallery');
            const loadMoreBtn = document.getElementById('load-more');
            const loadLessBtn = document.getElementById('load-less');
            const expandedContainer = document.getElementById('expanded-container');
            const expandedContent = document.querySelector('.expanded-content');
            const expandedImage = document.getElementById('expanded-image');
            const expandedTitle = document.getElementById('expanded-title');
            const expandedDescription = document.getElementById('expanded-description');
            const awardContainer = document.getElementById('award-container'); // New element

            function loadImages(page) {
                fetch('?page=${page}')
                    .then(response => response.json())
                    .then(data => {
                        gallery.innerHTML = ''; // Clear gallery for new page load
                        data.images.forEach(image => {
                            const imgContainer = document.createElement('div');
                            imgContainer.classList.add('image-container');
                            
                            const img = document.createElement('img');
                            img.src = image.url;
                            img.alt = image.title;
                            img.setAttribute('data-title', image.title);
                            img.setAttribute('data-description', image.description);

                            imgContainer.appendChild(img);
                            gallery.appendChild(imgContainer);

                            // Add click event for image expansion
                            img.addEventListener('click', function() {
                                // Set expanded image details
                                expandedImage.src = img.src;
                                expandedTitle.textContent = img.getAttribute('data-title');
                                expandedDescription.textContent = img.getAttribute('data-description');

                                // Show the expanded container with animation
                                expandedContainer.classList.add('active');
                                setTimeout(() => expandedContent.classList.add('active'), 50); // Delayed animation for smoother effect
                            });
                        });

                        // Handle Load More and Load Less button visibility
                        loadMoreBtn.style.display = data.hasMore ? 'inline-block' : 'none';
                        loadLessBtn.style.display = data.hasLess ? 'inline-block' : 'none';
                    })
                    .catch(error => console.error('Error loading images:', error));
            }

            function loadAwards() {
                // Simulate awards data (replace with actual data retrieval logic)
                const awardsData = [
                    { image: 'IMG-20240616-WA0039.jpg', title: 'Best Science Project 🥇👨‍🔬', description: 'Awarded for an innovative project at the Science Fair.' },
                    { image: 'IMG-20240616-WA0041.jpg', title: 'Sports Champion 🏅🏈', description: 'Won first place in the annual Sports Day competitions.' },
                    { image: 'IMG-20240616-WA0024.jpg', title: 'Top Artist🥇', description: 'Recognized for exceptional talent in the Art Exhibition.' },
                    // Add more awards as needed
                ];

                awardContainer.innerHTML = ''; // Clear previous content

                awardsData.forEach(award => {
                    const card = document.createElement('div');
                    card.classList.add('award-card');

                    const image = document.createElement('img');
                    image.src = 'images/' + award.image; // Assuming awards images are stored in 'images/' directory
                    image.alt = award.title;
                    image.classList.add('award-image');

                    const details = document.createElement('div');
                    details.classList.add('award-details');

                    const title = document.createElement('h3');
                    title.classList.add('award-title');
                    title.textContent = award.title;

                    const description = document.createElement('p');
                    description.classList.add('award-description');
                    description.textContent = award.description;

                    details.appendChild(title);
                    details.appendChild(description);

                    card.appendChild(image);
                    card.appendChild(details);

                    awardContainer.appendChild(card);
                });
            }

            loadMoreBtn.addEventListener('click', function() {
                currentPage++;
                loadImages(currentPage);
            });

            loadLessBtn.addEventListener('click', function() {
                if (currentPage > 1) {
                    currentPage--;
                    loadImages(currentPage);
                }
            });

            // Close expanded view when clicking outside the image
            expandedContainer.addEventListener('click', function(event) {
                if (event.target === expandedContainer) {
                    expandedContent.classList.remove('active');
                    setTimeout(() => expandedContainer.classList.remove('active'), 300); // Delay for smoother transition
                }
            });

            // Initial load
            loadImages(currentPage);
            loadAwards(); // Load awards section
        });
    </script>

<?php include_once "partials/footer.php"; ?>

</body>
</html>