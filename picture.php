<?php
// Database connection
$servername = "server217";
$username = "nextkdjr_event";
$password = "SR~l4rCXfSyb";
$dbname = "nextkdjr_event"; // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch image data
$sql = "SELECT id, file FROM response"; // Make sure 'image_path' is the correct column name
$result = $conn->query($sql);

// Check if the query was successful
if ($result === false) {
    die("SQL error: " . $conn->error);
}

if ($result->num_rows > 0) {
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr><th>file</th></tr>";

    while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $imagePath = $row['file']; // Get the image path from the database

        // Check if the image file exists
        if (file_exists($imagePath)) {
            echo "<tr>";
            echo "<td>$id</td>";
            echo '<td><img src="' .htmlspecialchars($imagePath) . '" style="max-width: 200px; max-height: 200px;" /></td>';
            echo "</tr>";
        } else {
            echo "<tr>";
            echo "<td>$id</td>";
            echo '<td>Image not found</td>'; // Display message if image doesn't exist
            echo "</tr>";
        }
    }
    echo "</table>";
} else {
    echo "No images found.";
}

// Close the database connection
$conn->close();
?>
