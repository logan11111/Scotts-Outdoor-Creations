<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "hepfnerlogan609@gmail.com"; // Replace with your email address
    $subject = "New Order Received";

    // Sanitize and validate input
    $firstName = htmlspecialchars($_POST['firstName']);
    $lastName = htmlspecialchars($_POST['lastName']);
    $phoneNumber = htmlspecialchars($_POST['phoneNumber']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $specialRequests = htmlspecialchars($_POST['specialRequests']);
    $orderDetails = htmlspecialchars($_POST['orderDetails']);
    $grandTotal = htmlspecialchars($_POST['grandTotal']);

    $message = "
    <html>
    <head>
        <title>Order Details</title>
    </head>
    <body>
        <h1>New Order Received</h1>
        <p><strong>First Name:</strong> $firstName</p>
        <p><strong>Last Name:</strong> $lastName</p>
        <p><strong>Phone Number:</strong> $phoneNumber</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Special Requests:</strong> $specialRequests</p>
        <h2>Order Details:</h2>
        $orderDetails
        <h2>Total Amount: $grandTotal</h2>
    </body>
    </html>
    ";

    // Set content-type header for sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: hepfnerl344@gmail.com' . "\r\n"; // Replace with your from address

    if (mail($to, $subject, $message, $headers)) {
        echo "Email sent successfully.";
    } else {
        echo "Failed to send email.";
    }
} else {
    echo "Invalid request.";
}
?>