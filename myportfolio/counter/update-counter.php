<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection details
$servername = "localhost";
$username = "root"; // default XAMPP username
$password = ""; // default XAMPP password
$dbname = "counter_db"; // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS counter (
    id INT AUTO_INCREMENT PRIMARY KEY,
    count INT NOT NULL
)";
if (!$conn->query($sql)) {
    echo "Error creating table: " . $conn->error;
    exit;
}

// Check if the count is set and handle updating
if (isset($_POST['count'])) {
    $count = $_POST['count'];

    // Sanitize input
    $count = intval($count);

    // Check if there is already a count in the table
    $sql = "SELECT count FROM counter ORDER BY id DESC LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Update the existing count
        $sql = "UPDATE counter SET count = ? ORDER BY id DESC LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $count);
    } else {
        // Insert a new count
        $sql = "INSERT INTO counter (count) VALUES (?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $count);
    }

    if ($stmt->execute()) {
        echo 'Count updated successfully.';
    } else {
        echo 'Failed to update the count.';
    }

    $stmt->close();
} else {
    echo 'No count provided.';
}

$conn->close();
?>
