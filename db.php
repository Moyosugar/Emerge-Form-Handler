<?php
// Database connection (modify with your details)
$servername = "server217";
$username = "nextkdjr_event";
$password = "SR~l4rCXfSyb";
$dbname = "nextkdjr_event"; // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to count the records in the table
$sql = "SELECT COUNT(*) as total FROM response"; // Replace 'users' with your table name
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalRecords = $row['total'];
    echo " " . $totalRecords;
} else {
    echo "No records found.";
}

// Close the database connection
$conn->close();
?>
