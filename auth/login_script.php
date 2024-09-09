<!-- header("Location: admin/index.php"); -->

<?php
session_start();
require_once '../partials/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // sanitize your input
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    // "''; update users set password = '' "
    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $db_username, $db_password);
        $stmt->fetch();

        if (password_verify($password, $db_password)) {
            session_regenerate_id(true);
            $_SESSION['user_id'] = $id;
            $_SESSION['username'] = $db_username;
            header("Location: ../admin/index.php");
            exit;
            
        } else {
            $_SESSION['error_message'] = 'Invalid username or password.';
            header("Location: login.php");
            exit;
        }
    } else {
        $_SESSION['error_message'] = 'Invalid username or password.';
        header("Location: login.php");
        exit;
    }

    $stmt->close();
}
$conn->close();
?>
