<?php
session_start();
require_once '../partials/db_connect.php';

if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: ../auth/login.php");
    exit;
}

// Read the contents of the file
$file = '../dev/newsletter_subscribers.txt';
$subscribers = [];

if (file_exists($file)) {
    $file_handle = fopen($file, 'r');
    if ($file_handle) {
        while (($line = fgets($file_handle)) !== false) {
            // Parse the line to get email and date
            list($email, $date) = explode(',', trim($line));
            $subscribers[] = ['email' => $email, 'date' => $date];
        }
        fclose($file_handle);
    } else {
        echo "Error opening the file.";
    }
} else {
    echo "File not found.";
}

// Form submission handler for adding new email
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_email'])) {
    $email = $_POST['email'];
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Check if email exists
        $emails = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $already_subscribed = false;
        foreach ($emails as $line) {
            list($existing_email, $existing_date) = explode(',', $line);
            if (isset($existing_email) && $existing_email == $email) {
                $already_subscribed = true;
                break;
            }
        }

        if (!$already_subscribed) {
            // Add email to list with date and time
            $date = date('Y-m-d H:i:s');
            $file_handle = fopen($file, 'a');
            fwrite($file_handle, $email . ',' . $date . "\n");
            fclose($file_handle);
            $success = true;
        } else {
            $error = 'Email address already subscribed';
        }
    } else {
        $error = 'Invalid email address';
    }
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Form submission handler for deleting email
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_email'])) {
    $email_to_delete = $_POST['email'];
    $subscribers = array_filter($subscribers, function($subscriber) use ($email_to_delete) {
        return $subscriber['email'] !== $email_to_delete;
    });

    // Write the updated list back to the file
    $file_handle = fopen($file, 'w');
    foreach ($subscribers as $subscriber) {
        fwrite($file_handle, $subscriber['email'] . ',' . $subscriber['date'] . "\n");
    }
    fclose($file_handle);

    $delete_success = true;
}

include_once 'header.php';
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
<div class="container mt-5">
    <h2>Newsletter Subscribers</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">S/N</th>
            <th scope="col">Date Added</th>
            <th scope="col">Email</th>
            <th scope="col">Action</th>
            <!-- echo "<button type='submit' name='delete_email' class='btn btn-danger'><i class='fas fa-trash-alt'></i> Delete</button>"; -->

        </tr>
        </thead>
        <tbody>
        <?php
        $sn = 1;
        foreach ($subscribers as $subscriber) {
            echo "<tr>";
            echo "<th scope='row'>{$sn}</th>";
            echo "<td>{$subscriber['date']}</td>";
            echo "<td>{$subscriber['email']}</td>";
            echo "<td>";
            echo "<form method='post' action='' style='display:inline;'>";
            echo "<input type='hidden' name='email' value='{$subscriber['email']}'>";
            echo "<button type='submit' name='delete_email' class='btn btn-outline-danger'><i class='fas fa-trash-alt'></i></button>";
            
            echo "</form>";
            echo "</td>";
            echo "</tr>";
            $sn++;
        }
        ?>
        </tbody>
    </table>
    <a href="index.php" class="btn btn-primary" style="position: relative; left: 0"><i class="fas fa-long-arrow-alt-left"></i> Go Back</a>

    <!-- Form to add new email -->
    <h2>Add New Subscriber</h2>
    <?php if (!empty($success)): ?>
        <div id="success-message" class="alert alert-success">Thank you for subscribing!</div>
    <?php endif; ?>
    <?php if (!empty($error)): ?>
        <div id="error-message" class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>
    <?php if (!empty($delete_success)): ?>
        <div id="delete-success-message" class="alert alert-success">Subscriber deleted successfully!</div>
    <?php endif; ?>

    <form method="post" action="">
        <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <button type="submit" name="add_email" class="btn btn-primary">Subscribe</button>
    </form>

    <!-- Button to send email -->
    <form method="post" action="" class="mt-3" style="margin-bottom: 50px">
        <?php
        if (count($subscribers) > 0) {
            $email_addresses = array_column($subscribers, 'email');
            $mailto_link = 'mailto:?bcc=' . implode(',', $email_addresses);
            echo '<a href="' . $mailto_link . '" class="btn btn-success">Send Newsletter <i class="fas fa-paper-plane"></i></a>';
        } else {
            echo '<button type="button" class="btn btn-success" disabled>No subscribers to send to</button>';
        }
        ?>
    </form>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="./script.js"></script>


<!-- JavaScript to hide messages after 5 seconds -->
<script>
    setTimeout(function() {
        var successMessage = document.getElementById('success-message');
        var errorMessage = document.getElementById('error-message');
        var deleteSuccessMessage = document.getElementById('delete-success-message');
        if (successMessage) {
            successMessage.style.display = 'none';
        }
        if (errorMessage) {
            errorMessage.style.display = 'none';
        }
        if (deleteSuccessMessage) {
            deleteSuccessMessage.style.display = 'none';
        }
    }, 3000);
</script>

