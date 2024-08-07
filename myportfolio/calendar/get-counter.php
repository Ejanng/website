<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "counter_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the current count
$sql = "SELECT count FROM counter ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo $row['count'];
} else {
    echo "0";
}

$conn->close();
?>
