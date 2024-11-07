<?php
// Load the PHPMailer library
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Database connection
$servername = "localhost";
$username = "nextkdjr_event";
$password = "SR~l4rCXfSyb";
$dbname = "nextkdjr_event"; // Replace with your actual database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize input data
    $full_name = $conn->real_escape_string(trim($_POST['full_name']));
    $email = $conn->real_escape_string(trim($_POST['email']));
    // $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash password

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO response (full_name, email) VALUES (?, ?)");
    $stmt->bind_param("ss", $full_name, $email);

    if ($stmt->execute()) {
        echo "Registration successful!";

        // Import PHPMailer
        require 'PHPMailer/src/Exception.php';
        require 'PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/src/SMTP.php';

        // Sending email with SMTP
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'nextswitch.org'; //  SMTP host
            $mail->SMTPAuth = true;
            $mail->Username = 'emerge@nextswitch.org'; //  email
            $mail->Password = 'Oluwadunsin9ja@'; //  email password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587; // Changed from 578 to 587 (standard port)

            $mail->setFrom('emerge@nextswitch.org', 'NextSwitch Ltd');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Thank You for Registering!';
            $mail->Body    = "Hello $full_name,<br><br>Thank you for registering!<br><br>Best regards,<br>Emerge | Powered by NextSwitch Ltd ";

            $mail->send();
            echo ' An email has been sent.';
        } catch (Exception $e) {
            echo "Failed to send email. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>