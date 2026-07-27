<?php
// Fetch form data safely
$name     = $_POST['name'] ?? '';
$phone    = $_POST['phone'] ?? '';
$problem  = $_POST['problem'] ?? '';
$date     = $_POST['date'] ?? '';
$message  = $_POST['message'] ?? '';

// Basic validation
if (empty($name) || empty($phone)) {
    echo "Name and phone are required.";
    exit;
}

// Email details
$to      = "cortexushealth@gmail.com";   // YOUR EMAIL
$subject = "New Appointment Request - CORTEXUS";

$body = "New appointment request:\n\n"
     . "Name: $name\n"
     . "Phone: $phone\n"
     . "Problem: $problem\n"
     . "Preferred Date: $date\n"
     . "Message: $message\n";

$headers = "From: noreply@cortexus.com\r\n";

// Send email
if (mail($to, $subject, $body, $headers)) {
    echo "<h2 style='font-family:Arial; color:#0a4b78;'>Thank you! Your appointment request has been received.</h2>";
    echo "<p style='font-family:Arial;'>We will contact you soon.</p>";
} else {
    echo "<h2 style='font-family:Arial; color:red;'>Error sending request.</h2>";
    echo "<p style='font-family:Arial;'>Please try again or call us directly at 9115092012.</p>";
}
?>
