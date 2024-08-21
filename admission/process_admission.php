<?php
// Validate and process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $full_name = htmlspecialchars($_POST['full-name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $address = htmlspecialchars($_POST['address']);
    $dob = htmlspecialchars($_POST['dob']);
    $gender = htmlspecialchars($_POST['gender']);
    $grade = htmlspecialchars($_POST['grade']);
    $previous_school = htmlspecialchars($_POST['previous-school']);
    $message = htmlspecialchars($_POST['message']);

    // Process the data (e.g., store in database, send email, etc.)

    // Example: Store in a text file (for demo purposes)
    $data = "Full Name: $full_name\nEmail: $email\nPhone: $phone\nAddress: $address\nDate of Birth: $dob\nGender: $gender\nGrade Applying For: $grade\nPrevious School: $previous_school\nMessage: $message\n\n";

    // Append data to a file
    $file = 'admission_data.txt';
    file_put_contents($file, $data, FILE_APPEND | LOCK_EX);

    // Redirect to a thank you page
    header('Location: thank_you.php');
    exit;
}
?>
