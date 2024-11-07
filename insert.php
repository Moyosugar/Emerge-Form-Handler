<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"> -->
<style>
        .alert {
            margin-top;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
            font-size: 16px;
            font-weight: bold;
        }

        .success {
            color: #155724;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
        }

        </style>
 
<?php
// Load the PHPMailer library
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$servername = "localhost";
$username = "nextkdjr_event";
$password = "SR~l4rCXfSyb";
$dbname = "nextkdjr_event";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $full_name = $_POST['full_name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $user_address = $_POST['user_address'];
  $business_name = $_POST['business_name'];
  $business_location = $_POST['business_location'];
  $business_sector = $_POST['business_sector'];
  $histagram_handle = $_POST['histagram_handle'];
  $facebook_handle = $_POST['facebook_handle'];
  $business_registered = $_POST['business_registered'];
  $business_existence = $_POST['business_existence'];
  $major_challenge = $_POST['major_challenge'];
  $business_funding = $_POST['business_funding'];
  $expectation = $_POST['expectation'];

  //  Handling Image Upload
  $image = $_FILES["image"]; // Retrieving the uploaded file
  $imageName = basename($image['name']); // Using the original file name
  $targetDIR = "businessimage/"; // Directory to save the uploaded file
  $targetFile = $targetDIR . $imageName; // Complete path to the uploaded image

  //  Move the uploaded file to the target directory
  if (move_uploaded_file($image['tmp_name'], $targetFile)) {
      
      //insert into the database
    
    $sql = "INSERT INTO response (full_name, email, phone, user_address, business_name, business_location, business_sector, histagram_handle, facebook_handle, business_registered, business_existence, major_challenge, business_funding, expectation, file)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql); // Prepare the SQL Statement
    $stmt->bind_param("sssssssssssssss", $full_name, $email, $phone, $user_address, $business_name, $business_location, $business_sector, $histagram_handle, $facebook_handle, $business_registered, $business_existence, $major_challenge, $business_funding, $expectation, $targetFile);

    // Execute and check for success
    if ($stmt->execute()) {
        
      echo '<div class="alert success">Thank you for registering! A thank you email has been sent.</div>';
      
      
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
            $mail->Body    = "Hello $full_name,<br><br>Thank you for registering!<br><br>Best regards,<br>Emerge | NextSwitch";

            $mail->send();
            echo '';
        } catch (Exception $e) {
            echo "Failed to send email. Mailer Error: {$mail->ErrorInfo}";
        }
        // Display success message and redirect to WhatsApp after 3 seconds
            echo "<p>Registration successful! Redirecting to WhatsApp...</p>";
            echo "<script>
                    setTimeout(function() {
                        window.location.href = 'https://chat.whatsapp.com/KRPZ8xMQfpqJUfcfvXgu4f';
                    }, 3000); // Redirects after 3 seconds
                  </script>";
   
    } else {
        echo "Error: " . $stmt->error; // Displays error if the query fails
    }

    $stmt->close();
     
  } else {
    echo "Error Uploading Image";
  }
$conn->close();
}
?>

