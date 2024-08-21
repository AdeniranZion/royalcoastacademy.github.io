<?php
// Check if the form data was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $fullname = htmlspecialchars($_POST['fullname']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    $subject = htmlspecialchars($_POST['subject']);
    $to = "royalcoastacademy21@gmail.com";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    
    // Example validation (you should add your own validation)
    $valid = true;
    if (empty($fullname) || empty($email) || empty($message)) {
        $valid = false;
        // Handle validation errors or redirect back to form page with error message
        header("Location: index.php?error=1");
        exit();
    }
    
    // Example: Send email or save to database
    // Replace with your actual processing logic
    
    // Redirect to confirmation page after successful submission
    header("Location: submit.php");
    exit();
} else {
    // If accessed directly without form submission, redirect to index.php or handle as needed
    header("Location: index.php");
    exit();
}
?>
