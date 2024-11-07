<?php
// Database connection (replace with your own credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "event"; // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check if connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is posted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve and sanitize form data
    $first_name = trim($_POST['first_name']);
    $email = trim($_POST['email']);

    // Prepare the SQL insert statement
    $stmt = $conn->prepare("INSERT INTO response (first_name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $first_name, $email,);

    // Execute the query and check for errors
    if ($stmt->execute()) {
        // Successful registration
        echo "Registration successful!";

        // Send thank you email
        $to = $email;
        $subject = "Thank You for Registering!";
        $message = "Hello $first_name,\n\nThank you for registering on our platform. We are excited to have you with us!\n\nBest regards,\nYour Company Name";
        $headers = "From: hello@nextswitch.org"; // Replace with your sender email

        // Send email
        if (mail($to, $subject, $message, $headers)) {
            echo " A thank you email has been sent to $email.";
        } else {
            echo "Failed to send the thank you email.";
        }

    } else {
        // Check if the error is due to a duplicate entry
        if ($conn->errno == 1062) { // 1062 is the error code for duplicate entry
            echo "This email or username is already registered. Please try logging in.";
        } else {
            echo "An error occurred: " . $conn->error;
        }
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
