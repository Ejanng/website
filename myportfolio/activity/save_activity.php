<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "activity_tracker";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$title = $_POST['title'];
$message = $_POST['message'];
$date = $_POST['date'];
$time = date("H:i:s"); // Get the current time in HH:MM:SS format

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO activities (title, message, date, time) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $title, $message, $date, $time);

if ($stmt->execute()) {
    header("Location: index.html"); // Redirect on success
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
