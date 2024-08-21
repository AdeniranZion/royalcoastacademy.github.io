<?php
session_start();
include '../../partials/db_connect.php';

if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: ../../auth/login.php");
    exit;
}

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");


// Handle form submissions for adding or updating news
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'add') {
        // Add news
        $title = $_POST['title'];
        $date = $_POST['date'];
        $description = $_POST['description'];
        $excerpt = $_POST['excerpt'];
        $subheading = $_POST['subheading'];
        $body = $_POST['body'];
        $image = '';

        if (!empty($_FILES['image']['name'])) {
            $image = 'images/' . basename($_FILES['image']['name']);
            move_uploaded_file($_FILES['image']['tmp_name'], '../../images/' . basename($_FILES['image']['name']));
        }

        $sql = "INSERT INTO news (title, date, image, excerpt, description, subheading, body) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssssss', $title, $date, $image, $excerpt, $description, $subheading, $body);
        $stmt->execute();
    } elseif (isset($_POST['action']) && $_POST['action'] === 'update') {
        // Update news
        $id = $_POST['id'];
        $title = $_POST['title'];
        $date = $_POST['date'];
        $description = $_POST['description'];
        $excerpt = $_POST['excerpt'];
        $subheading = $_POST['subheading'];
        $body = $_POST['body'];
        $image = '';

        if (!empty($_FILES['image']['name'])) {
            $image = 'images/' . basename($_FILES['image']['name']);
            move_uploaded_file($_FILES['image']['tmp_name'], '../../images/' . basename($_FILES['image']['name']));
        } else {
            // Keep existing image if no new one is uploaded
            $sql = "SELECT image FROM news WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $news = $result->fetch_assoc();
                $image = $news['image'];
            }
        }

        $sql = "UPDATE news SET title = ?, date = ?, image = ?, excerpt = ?, description = ?, subheading = ?, body = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssssssi', $title, $date, $image, $excerpt, $description, $subheading, $body, $id);
        $stmt->execute();
    }
}

// Handle news deletion
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Optionally delete the associated image file
    $sql = "SELECT image FROM news WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $news = $result->fetch_assoc();
        $imagePath = '../../' . $news['image'];
        if (!empty($news['image']) && file_exists($imagePath) && !is_dir($imagePath)) {
            unlink($imagePath);
        }
    }

    $sql = "DELETE FROM news WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
}

// Fetch news items
$sql = "SELECT * FROM news";
$result = $conn->query($sql);

// Get current date in YYYY-MM-DD format
$currentDate = date('Y-m-d');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin News Management</title>
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
        .container .row {
            margin-top: 20px;
        }
        .container .news-section {
            margin: 30px 0;
        }
        .fixed-aspect-ratio {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <div class="navbar-brand">
                <img src="/royalcoastacademy/images/RCALogo.png" alt="logo">
                <h2>Royal Coast Academy<br>Online Portal</h2>
            </div>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../events/index.php">
                        <i class="fas fa-calendar"></i> Events
                    </a>
                    <a class="nav-link" href="../newsletter.php">
                        <i class="fas fa-envelope"></i> Newsletter
                    </a>
                    <a class="nav-link" href="../../auth/logout.php">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-4">
        <h1 class="mb-4">Manage News</h1>

        <!-- Add News Form -->
        <form action="index.php" method="post" enctype="multipart/form-data" class="mb-5">
            <input type="hidden" name="action" value="add">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" name="date" class="form-control" value="<?php echo $currentDate; ?>" required>
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" name="image" class="form-control-file">
            </div>
            <div class="form-group">
                <label for="location">Excerpt:</label>
                <input type="text" name="excerpt" class="form-control" placeholder="Short Description" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="subheading">Subheadings:</label>
                <input type="text" name="subheading" class="form-control" placeholder="Title for another section" required>
            </div>
            <div class="form-group">
                <label for="body">Full Content:</label>
                <textarea name="body" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add News</button>
            <a href="../index.php" class="btn btn-secondary">
                <i class="fas fa-long-arrow-alt-left"></i> Go Back
            </a>
        </form>

        <hr>

        <!-- Display Existing News -->
        <h2>Existing News Items</h2>
        <?php if ($result->num_rows > 0) : ?>
            <div class="row">
                <?php while ($row = $result->fetch_assoc()) : ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <?php if ($row['image']) : ?>
                                <img src="../../<?php echo htmlspecialchars($row['image']); ?>" class="card-img-top fixed-aspect-ratio" alt="News Image">
                            <?php endif; ?>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($row['title']); ?></h5>
                                <p class="card-text"><strong>Date:</strong> <?php echo htmlspecialchars($row['date']); ?></p>
                                <p class="card-text"><?php echo htmlspecialchars($row['excerpt']); ?></p>
                                
                                <button class="btn btn-warning btn-sm edit-button" data-id="<?php echo $row['id']; ?>" data-title="<?php echo htmlspecialchars($row['title']); ?>" data-date="<?php echo htmlspecialchars($row['date']); ?>" data-excerpt="<?php echo htmlspecialchars($row['excerpt']); ?>" data-description="<?php echo htmlspecialchars($row['description']); ?>" data-subheading="<?php echo htmlspecialchars($row['subheading']); ?>" data-body="<?php echo htmlspecialchars($row['body']); ?>" data-image="<?php echo htmlspecialchars($row['image']); ?>">
                                    <i class="fas fa-pen"></i> Edit
                                </button>
                                <a href="index.php?action=delete&id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this news item?')">
                                    <i class="fas fa-trash"></i> Delete
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else : ?>
            <p>No news items found.</p>
        <?php endif; ?>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="index.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="update">
                    <input type="hidden" name="id" id="edit-id">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit News</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="edit-title">Title:</label>
                            <input type="text" name="title" id="edit-title" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="edit-date">Date:</label>
                            <input type="date" name="date" id="edit-date" class="form-control" value="<?php echo $currentDate; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="edit-excerpt">Excerpt:</label>
                            <input type="text" name="excerpt" id="edit-excerpt" class="form-control" required></input>
                        </div>
                        <div class="form-group">
                            <label for="edit-image">Image:</label>
                            <input type="file" name="image" id="edit-image" class="form-control-file">
                            <img id="current-image" class="mt-2" style="width: 100px;">
                        </div>
                        <div class="form-group">
                            <label for="edit-description">Description:</label>
                            <textarea name="description" id="edit-description" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="edit-subheading">Subheadings:</label>
                            <input type="text" name="subheading" id="edit-subheading" class="form-control" required></input>
                        </div>
                        <div class="form-group">
                            <label for="edit-body">Full Content:</label>
                            <textarea name="body" id="edit-body" class="form-control" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS and dependencies -->
    <script src="../script.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const editButtons = document.querySelectorAll('.edit-button');
            const editModal = new bootstrap.Modal(document.getElementById('editModal'));

            editButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const id = this.getAttribute('data-id');
                    const title = this.getAttribute('data-title');
                    const date = this.getAttribute('data-date');
                    const description = this.getAttribute('data-description');
                    const excerpt = this.getAttribute('data-excerpt');
                    const subheading = this.getAttribute('data-subheading');
                    const body = this.getAttribute('data-body');
                    const image = this.getAttribute('data-image');

                    document.getElementById('edit-id').value = id;
                    document.getElementById('edit-title').value = title;
                    document.getElementById('edit-date').value = date;
                    document.getElementById('edit-description').value = description;
                    document.getElementById('edit-excerpt').value = excerpt;
                    document.getElementById('edit-subheading').value = subheading;
                    document.getElementById('edit-body').value = body;
                    document.getElementById('current-image').src = `../../${image}`;

                    editModal.show();
                });
            });
        });
    </script>
</body>
</html>
