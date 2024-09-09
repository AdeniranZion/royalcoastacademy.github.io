<?php
session_start();
require_once '../partials/db_connect.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $confirm_password = filter_var($_POST['confirm_password'], FILTER_SANITIZE_STRING);
    $key = filter_var($_POST['key'], FILTER_SANITIZE_STRING);
    $authorisationkey = "RC1_4S@cure!_2024";

    if ($password !== $confirm_password) {
        $_SESSION['error_message'] = 'Passwords do not match.';
        header("Location: register.php");
        exit();
    }

    if ($key !== $authorisationkey) {
        $_SESSION['error_message'] = 'Invalid Key! Contact your Administrator';
        header("Location: register.php");
        exit();
    }

    // Check if the username already exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $_SESSION['error_message'] = 'Username already taken.';
        header("Location: register.php");
        exit;
    }

    // Insert new user
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $hashed_password);
    
    
    if ($stmt->execute()) {
        $_SESSION['success_message'] = "Registration successful!";
        header("Location: login.php");
    } else {
        $_SESSION['error_message'] = "Registration failed!";
        header("Location: register.php");
    }

    $stmt->close();
}
$conn->close();
?>
