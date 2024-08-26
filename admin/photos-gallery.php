<?php
session_start();
include_once '../partials/db_connect.php'; // Adjust path as needed

if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: ../auth/login.php");
    exit;
}

$sqlPhotos = "SELECT COUNT(*) AS total_photos FROM photos";
$resultPhotos = $conn->query($sqlPhotos);
$totalPhotos = ($resultPhotos->num_rows > 0) ? $resultPhotos->fetch_assoc()['total_photos'] : 0;

include_once 'header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle the file upload
    $targetDir = "../uploads/";
    $fileName = basename($_FILES["image"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    if (!empty($_FILES["image"]["name"])) {
        // Allow certain file formats
        $allowTypes = array('jpg','png','jpeg','gif');
        if (in_array($fileType, $allowTypes)) {
            // Upload file to server
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
                // Insert image file name into database
                $tags = htmlspecialchars($_POST['tags']);
                $insert = $conn->query("INSERT INTO photos (file_name, file_path, tags) VALUES ('$fileName', '$targetFilePath', '$tags')");

                if ($insert) {
                    $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
                } else {
                    $statusMsg = "File upload failed, please try again.";
                } 
            } else {
                $statusMsg = "Sorry, there was an error uploading your file.";
            }
        } else {
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
        }
    } else {
        $statusMsg = 'Please select a file to upload.';
    }
}
?>
<style>
    body {
        font-size: 140%; 
    }
    @media (max-width: 480px) {
        body{
            padding: 10px;
        }
    }
</style>
<div class="container">
<div class="my-4">
        <div class="card text-center">
            <div class="card-body">
                <i class="fas fa-image card-icon card-news"></i>
                <h5 class="card-title">Total Photos Uploaded</h5>
                <p class="h3"><?php echo $totalPhotos; ?></p>
            </div>
        </div>
    </div>
    <h2 class="my-4">Upload a New Photo</h2>

    <?php if (isset($statusMsg)) { ?>
        <div class="alert alert-info">
            <?php echo $statusMsg; ?>
        </div>
    <?php } ?>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group my-3">
            <label for="image">Select Image:</label>
            <input type="file" name="image" class="form-control my-1" id="image" required>
        </div>

        <div class="form-group">
            <label for="tags">Tags (comma-separated):</label>
            <input type="text" name="tags" class="form-control my-1" id="tags" placeholder="e.g., Sports Day, Graduation" required>
        </div>

        <button type="submit" name="submit" class="btn btn-primary mt-4">Upload</button>
    </form>
        <hr>
    <a href="index.php" class="btn btn-outline-danger">Go back</a>


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
