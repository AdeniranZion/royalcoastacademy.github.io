<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .pf-head {
            background-image: url('images/IMG_2543.jpg');
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
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1;
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
            font-size: 50px;
            margin-bottom: 20px;
            color: #fff;
        }

        .pf-title p {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .container {
            margin-top: 50px;
        }

        .gallery {
            margin-bottom: 30px;
        }

        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            height: 200px;
            margin: 10px 0;
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;
            transition: transform 0.3s, opacity 0.3s;
        }

        .gallery-item img:hover {
            transform: scale(1.05);
            opacity: 0.8;
        }

        .gallery-item .caption {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 10px;
            background: rgba(0, 0, 0, 0.5);
            color: white;
            text-align: center;
            border-radius: 0 0 10px 10px;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .gallery-item:hover .caption {
            opacity: 1;
        }

        .category-filter {
            margin-bottom: 20px;
        }

        .category-filter button.active {
            background-color: purple;
            color: white;
        }

        h1 {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 40px;
            color: #343a40;
        }

        @media (max-width: 767.98px) {
            .gallery {
                margin-bottom: 20px;
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

            .sidebar {
                display: flex;
                max-width: 150px;
                overflow-y: auto;
                height: 500px;
                padding-right: 10px;
                min-width: 300px;
            }

            .thumbnail {
                width: 100%;
                cursor: pointer;
                margin: 5px;
                border-radius: 10px;
                transition: transform 0.3s ease;
            }

            .thumbnail:hover {
                transform: scale(1.05);
            }

            .main-image-container {
                margin: 20px;
                max-width: 100%;
            }

            .nav-button {
                padding: 8px;
            }
        }

        .modal-dialog {
            position: relative;
            left: 4%;
            max-width: 90%;
            max-height: 90%;
        }

        .modal-body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: #ffef;
        }

        .modal-body img {
            max-width: 100%;
            max-height: 500px;
        }

        .thumbnail-container {
            display: flex;
            overflow-x: auto;
            padding: 10px;
            background-color: #f9f9f9;
            border-radius: 10px;
            width: 100%;
            box-sizing: border-box;
        }

        .thumbnail-container::-webkit-scrollbar {
            height: 8px;
        }

        .thumbnail-container::-webkit-scrollbar-track {
            background: #e1e1e1;
            border-radius: 10px;
        }

        .thumbnail-container::-webkit-scrollbar-thumb {
            background-color: #888;
            border-radius: 10px;
        }

        .thumbnail-container::-webkit-scrollbar-thumb:hover {
            background-color: #555;
        }

        .thumbnail {
            width: 100px;
            height: 70px;
            margin-right: 10px;
            border-radius: 5px;
            cursor: pointer;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .thumbnail:hover {
            transform: scale(1.05);
            border: 2px solid #007bff;
        }

        .nav-button {
            position: absolute;
            top: 28%;
            max-width: 20px;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 15%;
            z-index: 1000;
        }

        .prev-button {
            z-index: 2;
        }

        .next-button {
        }
        
        /* Pagination CSS */
        .pagination {
            margin: 20px 0;
        }

        .pagination .page-item.active .page-link {
            /* background-color: purple; */
            color: white;
            font-size: 1.9rem;
        }

        .pagination .page-item.disabled .page-link {
            background-color: #e9ecef;
            color: #6c757d;
            cursor: not-allowed;
        }
    </style>
</head>
<body>
    <?php include_once 'partials/header.php'; ?>

    <section class="pf-head" data-aos="fade-in" data-aos-duration="1500">
        <div class="pf-title" data-aos="fade-up">
            <h1>Photo Gallery</h1>
            <p>Welcome to the Royal Coast Academy Photo Gallery! Here, we capture the essence of our vibrant community, celebrating the moments that make our academy special. From academic achievements to cultural events, sports victories, and daily life around campus, our gallery offers a glimpse into the diverse experiences of our students and staff.</p>
        </div>
    </section>

    <div class="container">
        <h1 class="text-center my-5">School Photos</h1>

        <!-- Category Filters -->
        <div class="category-filter text-center">
            <button class="btnSmall btn-primary" data-filter="all">All</button>
            <button class="btnSmall btn-secondary" data-filter="events">Events</button>
            <button class="btnSmall btn-secondary" data-filter="sports">Sports</button>
            <button class="btnSmall btn-secondary" data-filter="trips">Field Trips</button>
        </div>

        <!-- Photo Gallery -->
        <div id="gallery" class="row gallery">
            <?php
            $dir = 'uploads/';
            $files = array_filter(scandir($dir), function($file) {
                return strpos($file, 'IMG') === 0 && in_array(pathinfo($file, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif']);
            });
            $total_files = count($files);
            $images_per_page = 12; // 3 rows * 4 columns
            $total_pages = ceil($total_files / $images_per_page);

            $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $current_page = max(min($current_page, $total_pages), 1);
            $start_index = ($current_page - 1) * $images_per_page;
            $current_files = array_slice($files, $start_index, $images_per_page);
            ?>

            <?php foreach ($current_files as $file): ?>
                <div class="col-lg-3 col-md-4 col-sm-6 gallery-item">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#imageModal" data-file="<?= htmlspecialchars($file) ?>">
                        <img src="<?= $dir . $file ?>" alt="<?= htmlspecialchars(pathinfo($file, PATHINFO_FILENAME)) ?>">
                    </a>
                    <div class="caption"><?= htmlspecialchars(pathinfo($file, PATHINFO_FILENAME)) ?></div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Pagination Controls -->
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <li class="page-item <?= $current_page == 1 ? 'disabled' : '' ?>">
                    <a class="page-link" href="?page=<?= max($current_page - 1, 1) ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                    <li class="page-item <?= $i == $current_page ? 'active' : '' ?>">
                        <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                    </li>
                <?php endfor; ?>
                <li class="page-item <?= $current_page == $total_pages ? 'disabled' : '' ?>">
                    <a class="page-link" href="?page=<?= min($current_page + 1, $total_pages) ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Image Modal -->
        <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="imageModalLabel">Image Preview</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img id="modal-image" src="" alt="" class="img-fluid">
                        <div class="thumbnail-container">
                            <?php foreach ($files as $file): ?>
                                <img src="<?= $dir . $file ?>" class="thumbnail" data-file="<?= htmlspecialchars($file) ?>" alt="<?= htmlspecialchars(pathinfo($file, PATHINFO_FILENAME)) ?>">
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php
        include_once "partials/footer.php";
    ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script>
        // JavaScript for the modal functionality
        document.addEventListener('DOMContentLoaded', function () {
            const modal = document.getElementById('imageModal');
            const modalImage = document.getElementById('modal-image');
            const thumbnails = document.querySelectorAll('.thumbnail');

            document.querySelectorAll('.gallery-item a').forEach(item => {
                item.addEventListener('click', function () {
                    const file = this.getAttribute('data-file');
                    modalImage.src = 'images/' + file;
                });
            });

            thumbnails.forEach(thumbnail => {
                thumbnail.addEventListener('click', function () {
                    const file = this.getAttribute('data-file');
                    modalImage.src = 'images/' + file;
                });
            });
        });
    </script>
</body>
</html>
