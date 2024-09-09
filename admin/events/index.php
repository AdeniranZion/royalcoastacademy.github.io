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

// Handle form submissions for adding or updating events
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'add') {
        // Add event
        $title = $_POST['title'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $category = $_POST['category'];
        $location = $_POST['location'];
        $description = $_POST['description'];
        $image = '';

        if (!empty($_FILES['image']['name'])) {
            $image = 'images/' . basename($_FILES['image']['name']);
            move_uploaded_file($_FILES['image']['tmp_name'], '../../images/' . basename($_FILES['image']['name']));
        }

        $sql = "INSERT INTO events (title, date, time, location, category, image, description) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssssss', $title, $date, $time, $location, $category, $image, $description);
        $stmt->execute();
    } elseif (isset($_POST['action']) && $_POST['action'] === 'update') {
        // Update event
        $id = $_POST['id'];
        $title = $_POST['title'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $category = $_POST['category'];
        $location = $_POST['location'];
        $description = $_POST['description'];
        $image = '';

        if (!empty($_FILES['image']['name'])) {
            $image = 'images/' . basename($_FILES['image']['name']);
            move_uploaded_file($_FILES['image']['tmp_name'], '../../images/' . basename($_FILES['image']['name']));
        } else {
            // Keep existing image if no new one is uploaded
            $sql = "SELECT image FROM events WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $event = $result->fetch_assoc();
                $image = $event['image'];
            }
        }

        $sql = "UPDATE events SET title = ?, date = ?, time = ?, location = ?, category = ?, image = ?, description = ? WHERE id = ?";
        $stmt->prepare($sql);
        $stmt->bind_param('sssssssi', $title, $date, $time, $location, $category, $image, $description, $id);
        $stmt->execute();
    }
}

// Handle event deletion
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Optionally delete the associated image file
    $sql = "SELECT image FROM events WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $event = $result->fetch_assoc();
        $imagePath = '../../' . $event['image'];
        if (!empty($event['image']) && file_exists($imagePath) && !is_dir($imagePath)) {
            unlink($imagePath);
        }
    }

    $sql = "DELETE FROM events WHERE id = ?";
    $stmt->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
}

// Fetch events
$sql = "SELECT * FROM events";
$result = $conn->query($sql);

// Get current date in YYYY-MM-DD format
$currentDate = date('Y-m-d');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Events Management</title>
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
        .container .event-section {
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
                    <a class="nav-link" href="../news/index.php">
                        <i class="fas fa-newspaper"></i> News
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
        <h1 class="mb-4">Manage Events</h1>

        <!-- Add Event Form -->
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
                <label for="time">Time:</label>
                <input type="time" name="time" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="location">Location:</label>
                <input type="text" name="location" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="category">Category:</label>
                <input type="text" name="category" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" name="image" class="form-control-file">
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Event</button>
            <a href="../index.php" class="btn btn-secondary">
                <i class="fas fa-long-arrow-alt-left"></i> Go Back
            </a>
        </form>

        <hr>

        <!-- Display Existing Events -->
        <h2>Existing Events</h2>
        <?php if ($result->num_rows > 0) : ?>
            <div class="row">
                <?php while ($row = $result->fetch_assoc()) : ?>
                    <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="../../<?php echo $row['image']; ?>" class="card-img-top fixed-aspect-ratio" alt="Event Image">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['title']; ?></h5>
                            <p class="card-text">
                                <!-- <strong>Date:</strong> <?php echo $row['date']; ?><br>
                                <strong>Time:</strong> <?php echo isset($row['time']) ? $row['time'] : 'N/A'; ?><br>
                                <strong>Location:</strong> <?php echo isset($row['location']) ? $row['location'] : 'N/A'; ?><br>
                                <strong>Category:</strong> <?php echo isset($row['category']) ? $row['category'] : 'N/A'; ?><br> -->
                                <strong>Description:</strong> <?php echo $row['description']; ?>
                            </p>
                            <button class="btn btn-info btn-sm edit-btn" data-toggle="modal" data-target="#editEventModal" 
                                data-id="<?php echo $row['id']; ?>" 
                                data-title="<?php echo $row['title']; ?>" 
                                data-date="<?php echo $row['date']; ?>" 
                                data-time="<?php echo isset($row['time']) ? $row['time'] : ''; ?>" 
                                data-location="<?php echo isset($row['location']) ? $row['location'] : ''; ?>" 
                                data-category="<?php echo isset($row['category']) ? $row['category'] : ''; ?>"
                                data-description="<?php echo $row['description']; ?>" 
                                data-image="../../<?php echo $row['image']; ?>">
                                <i class="fas fa-pen"><span> </i>  Edit
                            </button>
                            <a href="?action=delete&id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this event?');"><i class="fas fa-trash"></i> Delete</a>
                        </div>
                    </div>

                    </div>
                <?php endwhile; ?>
            </div>
        <?php else : ?>
            <p>No events found.</p>
        <?php endif; ?>
    </div>

    <!-- Edit Event Modal -->
    <div class="modal fade" id="editEventModal" tabindex="-1" role="dialog" aria-labelledby="editEventModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editEventModalLabel">Edit Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="index.php" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="action" value="update">
                        <input type="hidden" name="id" id="edit-event-id">
                        <div class="form-group">
                            <label for="edit-title">Title:</label>
                            <input type="text" name="title" class="form-control" id="edit-title" required>
                        </div>
                        <div class="form-group">
                            <label for="edit-date">Date:</label>
                            <input type="date" name="date" class="form-control" id="edit-date" required>
                        </div>
                        <div class="form-group">
                            <label for="edit-time">Time:</label>
                            <input type="time" name="time" class="form-control" id="edit-time" required>
                        </div>
                        <div class="form-group">
                            <label for="edit-location">Location:</label>
                            <input type="text" name="location" class="form-control" id="edit-location" required>
                        </div>
                        <div class="form-group">
                            <label for="edit-category">Category:</label>
                            <input type="text" name="category" class="form-control" id="edit-category" required>
                        </div>
                        <div class="form-group">
                            <label for="edit-image">Image:</label>
                            <input type="file" name="image" class="form-control-file" id="edit-image">
                            <img src="" id="edit-image-preview" alt="Event Image" class="mt-2" style="width: 100%; max-height: 200px;">
                        </div>
                        <div class="form-group">
                            <label for="edit-description">Description:</label>
                            <textarea name="description" class="form-control" id="edit-description" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS and dependencies -->
    <script src="../script.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Handle Edit button click
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.dataset.id;
                const title = this.dataset.title;
                const date = this.dataset.date;
                const time = this.dataset.time;
                const location = this.dataset.location;
                const category = this.dataset.category;
                const description = this.dataset.description;
                const image = this.dataset.image;

                // Set modal fields
                document.getElementById('edit-event-id').value = id;
                document.getElementById('edit-title').value = title;
                document.getElementById('edit-date').value = date;
                document.getElementById('edit-time').value = time;
                document.getElementById('edit-location').value = location;
                document.getElementById('edit-category').value = category;
                document.getElementById('edit-description').value = description;
                document.getElementById('edit-image-preview').src = image;
            });
        });
    </script>
</body>
</html>
